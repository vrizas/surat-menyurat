<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('create-surat');
});

Route::get('data-warga', function () {
    return view('data-warga');
});

Route::get('data-kelurahan', function () {
    return view('data-kelurahan');
});

Route::get('cetak-surat/{nik}', [PDFController::class, 'index']);