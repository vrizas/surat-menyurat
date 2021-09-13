<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('create-surat');
});

Route::get('admin/list-cetak', function () {
    return view('antri-cetak');
})->name('list-cetak');

Route::get('admin/data-warga', function () {
    return view('data-warga');
});

Route::get('admin/data-kelurahan', function () {
    return view('data-kelurahan');
});

Route::get('admin/buku-register', function () {
    return view('buku-register');
});

Route::get('admin', function () {
    return redirect()->route('list-cetak');
});

Route::get('test', [PDFController::class, 'create']);

Route::get('cetak-surat/{nik}', [PDFController::class, 'index']);