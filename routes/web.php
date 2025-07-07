<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CalonPengurusController;
use App\Http\Controllers\DaftarHimaController;
use App\Http\Controllers\DataAlumniController;
use App\Http\Controllers\DataPengurusController;
use App\Http\Controllers\HimaController;
use App\Http\Controllers\InfoKegiatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\SkController;
use App\Models\DaftarHima;
use App\Models\DataPengurus;
use App\Models\Hima;
use App\Models\InfoKegiatan;
use App\Models\Jabatan;
use App\Models\LaporanKegiatan;
use App\Models\Pengumuman;
use App\Models\Sk;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/', function (Request $request) {
    $himas = Hima::all();

    $query = InfoKegiatan::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('nama', 'like', "%$search%")
            ->orWhere('keterangan', 'like', "%$search%");
    }

    $info_kegiatans = $query->paginate(6); // agar pagination tetap bawa query

    return view('welcome', compact('himas', 'info_kegiatans'));
})->name('home');

// Route yang diperbaiki
// Route::get('/home/{himas}', function (Hima $himas) {
//     $himas->load('user');
//     $info_kegiatans = InfoKegiatan::where('user_id', $himas->user_id)->get();
//     $pengumumans = Pengumuman::where('user_id', $himas->user_id)->get();

//     // Ambil semua data jabatan
//     $jabatans = Jabatan::all();



//     $year = date('Y'); // contoh: 2025

//      // Cari periode yang mengandung tahun ini, misalnya "2024-2025"
//     $periodeSaatIni = DataPengurus::select('periode')
//         ->where('periode', 'like', "%$year%")
//         ->pluck('periode')
//         ->first(); // Ambil satu periode yang cocok
//     $pengurus = DataPengurus::where('periode', $periodeSaatIni)
//         ->where('is_alumni', false)
//         ->whereHas('jabatan', function ($query) use ($himas) {
//             $query->where('user_id', $himas->user_id);
//         })
//         ->with(['user', 'jabatan'])
//         ->get()
//         ->groupBy(fn($item) => $item->jabatan->tingkatan);

//     $alumni = DataPengurus::where('is_alumni', true)
//         ->whereHas('jabatan', function ($query) use ($himas) {
//             $query->where('user_id', $himas->user_id);
//         })
//         ->with(['user', 'jabatan'])
//         ->orderBy('periode', 'desc') // urut dari periode terbaru
//         ->get()
//         ->groupBy('periode');

//     return view('detail', compact('himas', 'info_kegiatans', 'pengurus', 'jabatans', 'pengumumans', 'alumni'));
// })->name('home.show');
Route::get('/home/{himas}', function (Hima $himas) {
    $himas->load('user');
    $info_kegiatans = InfoKegiatan::where('user_id', $himas->user_id)->get();
    $pengumumans = Pengumuman::where('user_id', $himas->user_id)->get();

    // Ambil semua data jabatan
    $jabatans = Jabatan::all();

    $currentYear = date('Y'); // contoh: 2025
    $limitYear = $currentYear - 2; // 2 tahun ke bawah: 2023
// Ambil semua pengurus aktif (is_alumni = false)
$allPengurus = DataPengurus::where('is_alumni', false)
    ->whereHas('jabatan', function ($query) use ($himas) {
        $query->where('user_id', $himas->user_id);
    })
    ->with(['user', 'jabatan'])
    ->get();

// Filter berdasarkan periode (2 tahun ke bawah)
$filteredPengurus = $allPengurus->filter(function ($pengurus) use ($limitYear) {
    $periodeParts = explode('-', $pengurus->periode);
    $periodeYear = count($periodeParts) === 1
        ? (int) substr($pengurus->periode, 0, 4)
        : (int) $periodeParts[0];

    return $periodeYear >= $limitYear;
});

// Group berdasarkan tingkatan jabatan, hanya 1 sampai 3
$pengurus = $filteredPengurus
    ->filter(fn($item) =>
        $item->jabatan &&
        $item->jabatan->tingkatan &&
        in_array($item->jabatan->tingkatan, [1, 2, 3, 4, 5])
    )
    ->groupBy(fn($item) => $item->jabatan->tingkatan)
    ->sortKeys(); // Urutkan berdasarkan tingkatan




    // Untuk alumni, ambil semua dengan urutan periode terbaru
    // Tapi bisa juga dibatasi periode jika diperlukan
    $alumni = DataPengurus::where('is_alumni', true)
        ->whereHas('jabatan', function ($query) use ($himas) {
            $query->where('user_id', $himas->user_id);
        })
        ->with(['user', 'jabatan'])
        ->orderBy('periode', 'desc') // urut dari periode terbaru
        ->get()
        ->groupBy('periode');

    return view('detail', compact('himas', 'info_kegiatans', 'pengurus', 'jabatans', 'pengumumans', 'alumni'));
})->name('home.show');

Route::get('/pengumuman/{pengumuman}/file', function (Pengumuman $pengumuman) {
    return Storage::response('public/' . $pengumuman->file);
})->name('pengumuman-hima.show');


// Route untuk menampilkan form pendaftaran spesifik hima
Route::get('/daftar/{hima}', [DaftarHimaController::class, 'create'])->name('daftar.create');

// Route untuk menyimpan pendaftaran
Route::post('/daftar/{hima}', [DaftarHimaController::class, 'store'])->name('daftar.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $data = [];

    // Jika role pengurus
    if ($user->hasRole('pengurus')) {
        $hima = Hima::where('user_id', $user->id)->first();

        // Ambil periode aktif
        $year = date('Y');
        $periodeSaatIni = DataPengurus::select('periode')
            ->where('periode', 'like', "%$year%")
            ->pluck('periode')
            ->first();

        $data = [
            'hima' => $hima,
            'totalKegiatan' => InfoKegiatan::where('user_id', $user->id)->count(),
            'totalPengumuman' => Pengumuman::where('user_id', $user->id)->count(),
            'totalPengurusAktif' => DataPengurus::where('periode', $periodeSaatIni)
                ->where('is_alumni', false)
                ->whereHas('jabatan', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->count(),
            'totalJabatan' => Jabatan::where('user_id', $user->id)->count(),
            'kegiatanTerbaru' => InfoKegiatan::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get(),
            'pengumumanTerbaru' => Pengumuman::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get(),
            'pendaftarHima' => DaftarHima::where('user_id', $user->id)->orderBy('created_at', 'desc')->get(),
        ];
    }

    // Jika role admin
    if ($user->hasRole('admin')) {
        $data['himas'] = Hima::all();
        $data['totalSk'] = Sk::count();
        $data['totalLaporan'] = LaporanKegiatan::count();
        $data['totalHima'] = Hima::count();
    }

    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {

//     $user = auth()->user();

//     // Data umum yang dibutuhkan untuk semua role
//     $data = [];
//     // Jika pengurus HIMA, ambil data HIMA tersebut
//     $hima = Hima::where('user_id', $user->id)->first();

//     // Cari periode saat ini
//     $year = date('Y');
//     $periodeSaatIni = DataPengurus::select('periode')
//         ->where('periode', 'like', "%$year%")
//         ->pluck('periode')
//         ->first();

//     $data = [
//         'hima' => $hima,
//         'totalKegiatan' => InfoKegiatan::where('user_id', $user->id)->count(),
//         'totalPengumuman' => Pengumuman::where('user_id', $user->id)->count(),
//         'totalPengurusAktif' => DataPengurus::where('periode', $periodeSaatIni)
//             ->where('is_alumni', false)
//             ->whereHas('jabatan', function ($query) use ($user) {
//                 $query->where('user_id', $user->id);
//             })
//             ->count(),
//         'totalJabatan' => Jabatan::where('user_id', $user->id)->count(),
//         'kegiatanTerbaru' => InfoKegiatan::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get(),
//         'pengumumanTerbaru' => Pengumuman::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get(),
//      'pendaftarHima' => DaftarHima::where('user_id', $user->id)->orderBy('created_at', 'desc')->get(),

//     ];
//     return view('dashboard', $data);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // SK Routes
    Route::resource('sk', SkController::class);
    Route::resource('proker', ProkerController::class);
    Route::get('/sk/{sk}/download', [SkController::class, 'download'])->name('sk.download');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('sk', SkController::class)->middleware(['auth', 'verified']);

    Route::middleware('can:crud data hima')->group(function () {
        Route::resource('hima', HimaController::class)->middleware(['auth', 'verified']);
        // Route::resource('beranda',BerandaController::class)->middleware(['auth', 'verified']);
        Route::resource('jabatan', JabatanController::class)->middleware(['auth', 'verified']);
        Route::resource('data_pengurus', DataPengurusController::class)->parameters([
            'data_pengurus' => 'data_pengurus',
        ])->middleware(['auth', 'verified']);
        // Route::resource('sk', SkController::class)->middleware(['auth', 'verified']);
        Route::resource('info_kegiatan', InfoKegiatanController::class)->middleware(['auth', 'verified']);
        Route::resource('pengumuman', PengumumanController::class)->middleware(['auth', 'verified']);
        Route::get('pengumuman/{pengumuman}/download', [PengumumanController::class, 'download'])
            ->name('pengumuman.download');
        Route::resource('keuangan', KeuanganController::class)->middleware(['auth', 'verified']);
        Route::resource('data_alumni', DataAlumniController::class)->middleware(['auth', 'verified']);
        Route::resource('laporan_kegiatan', LaporanKegiatanController::class)->middleware(['auth', 'verified']);
        Route::resource('calon_pengurus', CalonPengurusController::class)->middleware(['auth', 'verified']);
        Route::get('/calon_pengurus/file/{daftar_hima}', [CalonPengurusController::class, 'pendaftar'])->name('calon_pengurus.pendaftar');
    });
    Route::middleware('can:admin melihat semua data hima')->group(function () {
        Route::get('/admin', [AdminController::class, 'hima'])->name('adminhima.index');
        Route::get('/admin/{hima}', [AdminController::class, 'showhima'])->name('adminhima.show');
        Route::get('/admin/{hima}/pengurus', [AdminController::class, 'datapengurus'])->name('adminhima.pengurus');
        Route::get('/admin/{hima}/alumni', [AdminController::class, 'dataalumni'])->name('adminhima.alumni');
        Route::get('/admin/{hima}/proker', [AdminController::class, 'proker'])->name('adminhima.proker');
        Route::get('/admin/{hima}/laporan_kegiatan', [AdminController::class, 'laporan_kegiatan'])->name('adminhima.laporan_kegiatan');
        Route::patch('/admin/{hima}/laporan_kegiatan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('adminhima.laporan_kegiatan.update-status');

        Route::resource('akun', AdminController::class)->parameters([
            'akun' => 'user',
        ]);
    });
});

require __DIR__ . '/auth.php';
