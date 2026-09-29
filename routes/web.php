<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Smart redirect: kirim user ke dashboard sesuai role-nya
Route::get('/dashboard', function () {
    /** @var \App\Models\User $user */
    $user = Auth::user();
    return redirect($user->dashboardRoute());
})->middleware(['auth', 'verified'])->name('dashboard');

// ───────────────────────────────────────────────
// INOVATOR ROUTES (role: inovator)
// ───────────────────────────────────────────────
Route::middleware(['auth', 'verified', 'role:inovator'])->group(function () {
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
        Route::post('/hapus-indikator', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'hapusIndikator'])->name('hapusIndikator');
        Route::post('/reset-indikator', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'resetIndikator'])->name('resetIndikator');
        Route::post('/kirim', [\App\Http\Controllers\Inovator\PengajuanInovasiController::class, 'kirimFinal'])->name('kirimFinal');
    });
});

// ───────────────────────────────────────────────
// EVALUATOR ROUTES (role: evaluator, admin)
// ───────────────────────────────────────────────
Route::middleware(['auth', 'verified', 'role:evaluator,admin'])->prefix('evaluator')->name('evaluator.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Evaluator\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/antrean', [\App\Http\Controllers\Evaluator\AntreanController::class, 'index'])->name('antrean');
    Route::get('/verifikasi/{id}', [\App\Http\Controllers\Evaluator\VerifikasiController::class, 'show'])->name('verifikasi.show');
    Route::post('/verifikasi/{id}/simpan', [\App\Http\Controllers\Evaluator\VerifikasiController::class, 'simpan'])->name('verifikasi.simpan');
    Route::get('/riwayat', [\App\Http\Controllers\Evaluator\RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/ekspor', [\App\Http\Controllers\Evaluator\RiwayatController::class, 'eksporRekap'])->name('riwayat.ekspor');
    Route::get('/riwayat/{id}', [\App\Http\Controllers\Evaluator\RiwayatController::class, 'show'])->name('riwayat.show');
    Route::get('/riwayat/{id}/cetak', [\App\Http\Controllers\Evaluator\RiwayatController::class, 'cetakBeritaAcara'])->name('riwayat.cetak');
});

// ───────────────────────────────────────────────
// Akun Breeze Profile (semua role)
// ───────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
