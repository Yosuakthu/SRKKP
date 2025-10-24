<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\RekomController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'index'])->middleware(['auth:nelayan', 'verified'])->name('dashboard');

Route::middleware('auth:nelayan')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permohonan routes
    Route::get('/permohonan/create', [PermohonanController::class, 'create'])->name('permohonan.create');
    Route::post('/permohonan', [PermohonanController::class, 'store'])->name('permohonan.store');
    Route::get('/permohonan/{id}', [PermohonanController::class, 'show'])->name('permohonan.show');
    Route::get('/permohonan/{id}/edit', [PermohonanController::class, 'edit'])->name('permohonan.edit');
    Route::patch('/permohonan/{id}', [PermohonanController::class, 'update'])->name('permohonan.update');
    Route::post('/permohonan/{id}/submit', [PermohonanController::class, 'submit'])->name('permohonan.submit');

    // Rekom routes
    Route::get('/cetak-surat/{id}', [RekomController::class, 'cetakSurat'])->name('cetak.surat');
});

Route::get('/login-admin', function () {
    return view('auth.login-admin');
})->name('login-admin');

require __DIR__.'/auth.php';
