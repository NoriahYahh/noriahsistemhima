<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CalonPengurusController;
use App\Http\Controllers\DataAlumniController;
use App\Http\Controllers\DataPengurusController;
use App\Http\Controllers\HimaController;
use App\Http\Controllers\InfoKegiatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\SkController;
use App\Models\Hima;
use App\Models\InfoKegiatan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $himas = Hima::all();
    $info_kegiatans = InfoKegiatan::all();
    return view('welcome', compact('himas', 'info_kegiatans'));
});
Route::get('/daftar', function () {
    $himas = Hima::all();
    return view('daftar', compact('himas'));
});
Route::get('/home/{himas}', function (Hima $himas) {
    $himas->load('user');
    return view('detail', compact('himas'));
})->name('home.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/hima', function () {
//     return view('pengurus.data_hima.index');
// })->middleware(['auth', 'verified'])->name('hima');
// Route::get('/hima-input',  () {
//     return view('pengurus.data_functionhima.create');
// })->middleware(['auth', 'verified'])->name('hima.create');



Route::middleware('auth')->group(function () {
    // SK Routes
    Route::resource('sk', SkController::class);
    Route::resource('proker', ProkerController::class);
    Route::get('/sk/{sk}/download', [SkController::class, 'download'])->name('sk.download');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:crud data hima')->group(function () {
        Route::resource('hima', HimaController::class)->middleware(['auth', 'verified']);
        // Route::resource('beranda',BerandaController::class)->middleware(['auth', 'verified']);
        Route::resource('jabatan', JabatanController::class)->middleware(['auth', 'verified']);
        Route::resource('data_pengurus', DataPengurusController::class)->middleware(['auth', 'verified']);
        Route::resource('sk', SkController::class)->middleware(['auth', 'verified']);
        Route::resource('info_kegiatan', InfoKegiatanController::class)->middleware(['auth', 'verified']);
        Route::resource('keuangan', KeuanganController::class)->middleware(['auth', 'verified']);
        Route::resource('data_alumni', DataAlumniController::class)->middleware(['auth', 'verified']);
        Route::resource('laporan_kegiatan', LaporanKegiatanController::class)->middleware(['auth', 'verified']);
        Route::resource('calon_pengurus', CalonPengurusController::class)->middleware(['auth', 'verified']);
    });
    Route::middleware('can:admin melihat semua data hima')->group(function () {
        Route::get('/admin', [AdminController::class, 'hima'])->name('adminhima.index');
        Route::get('/admin/{hima}', [AdminController::class, 'showhima'])->name('adminhima.show');
        Route::get('/admin/{hima}/pengurus', [AdminController::class, 'datapengurus'])->name('adminhima.pengurus');
       Route::resource('akun', AdminController::class)->parameters([
    'akun' => 'user',
]);

    });
});

require __DIR__ . '/auth.php';
