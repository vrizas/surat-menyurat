<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('create-surat');
})->middleware(['auth'])->name('create-surat');

Route::get('admin', function () {
    return view('admin');
})->middleware(['auth'])->name('list-cetak');

Route::get('admin/data-warga', function () {
    return view('data-warga');
})->middleware(['auth'])->name('data-warga');

Route::get('admin/data-kelurahan', function () {
    return view('data-kelurahan');
})->middleware(['auth'])->name('data-kelurahan');

Route::get('cetak/{nik}', [PDFController::class, 'cetakSurat'])->middleware(['auth'])->name('cetak-surat');
Route::get('download/surat/{nik}', [PDFController::class, 'downloadSurat'])->middleware(['auth'])->name('download-surat');

Route::post('admin/download/buku-register', [PDFController::class, 'downloadBukuRegister'])->middleware(['auth'])->name('download-buku-register');

Route::get('admin/buku-register', [ReportController::class, 'render'])->middleware(['auth'])->name('buku-register');

require __DIR__.'/auth.php';

