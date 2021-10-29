<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

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

Route::get('/create', function () {
    return view('create-surat');
})->middleware(['auth'])->name('create-surat');

Route::get('/', function () {
    return view('aparat');
})->middleware(['auth'])->name('list-cetak');

Route::get('cetak/{nik}', [PDFController::class, 'cetakSurat'])->middleware(['auth'])->name('cetak-surat');
Route::get('download/surat/{nik}', [PDFController::class, 'downloadSurat'])->middleware(['auth'])->name('download-surat');

Route::get('download/buku-register/{nik}', [PDFController::class, 'downloadBukuRegister'])->middleware(['auth'])->name('download-buku-register');

Route::resource('/admin',App\Http\Controllers\AdminController::class);
Route::post('/admin',[AdminController::class, 'store']);
Route::resource('/admin/data-aparat',App\Http\Controllers\DaftarAparatController::class);
// Route::get('/admin/data-aparat',[DaftarAparatController::class, 'dataAparat']);

require __DIR__.'/auth.php';

