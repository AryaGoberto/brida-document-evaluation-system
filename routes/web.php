<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('inovator.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/inovator/dashboard', [\App\Http\Controllers\Inovator\DashboardController::class, 'index'])->name('inovator.dashboard');
    Route::get('/inovator/inovasi/{id}', [\App\Http\Controllers\Inovator\InovasiController::class, 'show'])->name('inovator.inovasi.show');

    // Profil & Pengaturan Inovator
    Route::get('/inovator/profil', [\App\Http\Controllers\Inovator\ProfilController::class, 'edit'])->name('inovator.profil');
    Route::patch('/inovator/profil/instansi', [\App\Http\Controllers\Inovator\ProfilController::class, 'updateInstansi'])->name('inovator.profil.instansi');
    Route::put('/inovator/profil/password', [\App\Http\Controllers\Inovator\ProfilController::class, 'updatePassword'])->name('inovator.profil.password');

    // Wizard Pengajuan Inovasi 5 Tahap
    Route::prefix('inovator/pengajuan')->name('inovator.pengajuan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'redirectStart'])->name('index');
        Route::get('/tahap-1', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'tahap1'])->name('tahap1');
        Route::post('/tahap-1', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'simpanTahap1'])->name('simpanTahap1');

        Route::get('/tahap-2', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'tahap2'])->name('tahap2');
        Route::post('/tahap-2', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'simpanTahap2'])->name('simpanTahap2');

        Route::get('/tahap-3', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'tahap3'])->name('tahap3');
        Route::post('/tahap-3', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'simpanTahap3'])->name('simpanTahap3');

        Route::get('/tahap-4', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'tahap4'])->name('tahap4');
        Route::post('/tahap-4', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'simpanTahap4'])->name('simpanTahap4');

        Route::get('/tahap-5', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'tahap5'])->name('tahap5');
        Route::post('/tahap-5', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'simpanTahap5'])->name('simpanTahap5');
        Route::post('/upload-indikator', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'uploadIndikator'])->name('uploadIndikator');
        Route::post('/kirim', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'kirimFinal'])->name('kirimFinal');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
