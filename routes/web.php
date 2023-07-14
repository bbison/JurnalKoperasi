<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main_controller;
use App\Http\Controllers\periode_controller;
use App\Http\Controllers\kelompok_rekening_controller;
use App\Http\Controllers\sub_kelompok_rekening_controller;
use App\Http\Controllers\rekening_controller;
use App\Http\Controllers\jurnal_controller;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\subRekeningController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[main_controller::class,'index'])->name('login')->middleware('guest');
Route::post('/',[main_controller::class,'Login'])->name('logic.login')->middleware('guest');
Route::get('/profile',[main_controller::class,'profile'])->name('profile')->middleware('auth');
Route::get('/profile/1/edit',[main_controller::class,'updateprofile'])->name('updateprofile')->middleware('auth');
Route::post('/profile/1',[main_controller::class,'prosesupdate'])->name('prosesupdate')->middleware('auth');
Route::get('/logout',[main_controller::class, 'logout'])->name('logout')->Middleware('auth');
Route::get('/ajax-kode',[jurnal_controller::class, 'ajaxkode'])->name('ajaxkode')->Middleware('auth');
Route::get('/ajax-jurnal-sesuaikan',[jurnal_controller::class, 'ajaxjurnal'])->name('ajaxjurnal')->Middleware('auth');
Route::get('/ajax-jurnal-sesuaikan-lawan',[jurnal_controller::class, 'ajaxjurnallawan'])->name('ajaxjurnallawan')->Middleware('auth');

Route::name('anggota.')->group(function () {
    Route::get('/anggota/password-change',[main_controller::class, 'updatepassword'])->name('gantipassword')->Middleware('auth');
    Route::post('/anggota/password-change',[main_controller::class, 'logicupdatepassword'])->name('logicgantipassword')->Middleware('auth');
});

Route::resource('/periode', periode_controller::class)->middleware('auth');
Route::resource('/kelompok-rekening', kelompok_rekening_controller::class)->middleware('auth');
Route::resource('/sub-kelompok-rekening', sub_kelompok_rekening_controller::class)->middleware('auth');
Route::resource('/rekening', rekening_controller::class)->middleware('auth');
Route::resource('/jurnal', jurnal_controller::class)->middleware('auth');
Route::resource('/sub-rekening', subRekeningController::class)->middleware('auth');

//laporan
Route::get('/laporan-kelompok-rekening',[laporanController::class, 'kelompokRekening'])->name('kelompokRekening')->Middleware('auth');
Route::get('/neraca',[laporanController::class, 'neraca'])->name('neraca')->Middleware('auth');
Route::get('/laporan-neraca-saldo',[laporanController::class, 'neracaSaldo'])->name('neracaSaldo')->Middleware('auth');

//print
Route::get('/print-jurnal',[laporanController::class, 'printJurnal'])->name('printJurnal')->Middleware('auth');

//download
Route::get('/download-jurnal',[laporanController::class, 'downloadJurnal'])->name('downloadJurnal')->Middleware('auth');

//input saldo
Route::get('/input-saldo-awal',[main_controller::class, 'inputsaldoawal'])->name('inputsaldoawal')->Middleware('auth');
Route::post('/input-saldo-awal',[main_controller::class, 'prosesinputsaldoawal'])->name('inputsaldoawal')->Middleware('auth');




