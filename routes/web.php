<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\RekomController;

Route::get('/cetak-surat/{id}', [RekomController::class, 'cetakSurat'])->name('cetak.surat');
