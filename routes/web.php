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
use App\Models\DataPengurus;
use App\Models\Hima;
use App\Models\InfoKegiatan;
use App\Models\Jabatan;
use App\Models\Pengumuman;
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
Route::get('/home/{himas}', function (Hima $himas) {
    $himas->load('user');
    $info_kegiatans = InfoKegiatan::where('user_id', $himas->user_id)->get();
    $pengumumans = Pengumuman::where('user_id', $himas->user_id)->get();

    // Ambil semua data jabatan
    $jabatans = Jabatan::all();


    // Ambil data pengurus berdasarkan user_id dari himas
    // Menggunakan user_id karena Jabatan memiliki relasi ke User
    // $pengurus = DataPengurus::whereHas('jabatan', function ($query) use ($himas) {
    //     $query->where('user_id', $himas->user_id);
    // })
    //     ->with(['user', 'jabatan']) // Load relasi user dan jabatan
    //     ->get();
    // $periodeSaatIni = now()->format('Y'); // atau sesuai format periode kamu, contoh: '2024-2025'

    // $pengurus = DataPengurus::where('periode', $periodeSaatIni)
    //     ->whereHas('jabatan', function ($query) use ($himas) {
    //         $query->where('user_id', $himas->user_id);
    //     })
    //     ->with(['user', 'jabatan'])
    //     ->get()
    //     ->groupBy(fn($item) => $item->jabatan->tingkatan);
$year = date('Y'); // contoh: 2025

// Cari periode yang mengandung tahun ini, misalnya "2024-2025"
$periodeSaatIni = DataPengurus::select('periode')
    ->where('periode', 'like', "%$year%")
    ->pluck('periode')
    ->first(); // Ambil satu periode yang cocok
$pengurus = DataPengurus::where('periode', $periodeSaatIni)
    ->where('is_alumni', false)
    ->whereHas('jabatan', function ($query) use ($himas) {
        $query->where('user_id', $himas->user_id);
    })
    ->with(['user', 'jabatan'])
    ->get()
    ->groupBy(fn($item) => $item->jabatan->tingkatan);


    // Alternatif jika ingin mengambil semua pengurus dari jabatan yang dibuat oleh user himas
    // $pengurus = DataPengurus::with(['user', 'jabatan'])
    //                        ->whereIn('jabatan_id', 
    //                            Jabatan::where('user_id', $himas->user_id)->pluck('id')
    //                        )
    //                        ->get();

    return view('detail', compact('himas', 'info_kegiatans', 'pengurus', 'jabatans', 'pengumumans'));
})->name('home.show');
Route::get('/pengumuman/{pengumuman}/file', function (Pengumuman $pengumuman) {
    return Storage::response('public/' . $pengumuman->file);
})->name('pengumuman-hima.show');


// Route untuk menampilkan form pendaftaran spesifik hima
Route::get('/daftar/{hima}', [DaftarHimaController::class, 'create'])->name('daftar.create');

// Route untuk menyimpan pendaftaran
Route::post('/daftar/{hima}', [DaftarHimaController::class, 'store'])->name('daftar.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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
    });
    Route::middleware('can:admin melihat semua data hima')->group(function () {
        Route::get('/admin', [AdminController::class, 'hima'])->name('adminhima.index');
        Route::get('/admin/{hima}', [AdminController::class, 'showhima'])->name('adminhima.show');
        Route::get('/admin/{hima}/pengurus', [AdminController::class, 'datapengurus'])->name('adminhima.pengurus');
        Route::get('/admin/{hima}/proker', [AdminController::class, 'proker'])->name('adminhima.proker');
        Route::get('/admin/{hima}/laporan_kegiatan', [AdminController::class, 'laporan_kegiatan'])->name('adminhima.laporan_kegiatan');
        Route::patch('/admin/{hima}/laporan_kegiatan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('adminhima.laporan_kegiatan.update-status');

        Route::resource('akun', AdminController::class)->parameters([
            'akun' => 'user',
        ]);
    });
});

require __DIR__ . '/auth.php';
