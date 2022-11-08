<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\BaiDangController;

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
Route::get('/',[NguoiDungController::class,'trang_chu'])->name('trang-chu')->middleware('auth');
Route::get('/dang-ky',[NguoiDungController::class,'create'])->name('dang-ky')->middleware('guest');
Route::post('/dang-ky',[NguoiDungController::class,'store'])->name('xl-dang-ky')->middleware('guest');
Route::get('/dang-nhap',[NguoiDungController::class,'sign_in'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap',[NguoiDungController::class,'get_sign_in'])->name('xl-dang-nhap')->middleware('guest');
Route::get('/dang-xuat',[NguoiDungController::class,'log_out'])->name('dang-xuat')->middleware('auth');
Route::get('/chinh-sua-tai-khoan',[NguoiDungController::class,'show'])->name('chinh-sua-tai-khoan')->middleware('auth');
Route::post('/chinh-sua-tai-khoan',[NguoiDungController::class,'edit'])->name('xl-chinh-sua-tai-khoan')->middleware('auth');

Route::get('/xem-bai-dang/{id}',[BaiDangController::class,'xem_bai_dang'])->name('xem-bai-dang')->middleware('auth');
Route::get('/danh-sach-bai-dang',[BaiDangController::class,'ds_bai_dang'])->name('ds-bai-dang')->middleware('auth');
Route::get('/danh-sach-theo-doi',[BaiDangController::class,'ds_theo_doi'])->name('ds-theo-doi')->middleware('auth');
Route::get('/dang-bai',[BaiDangController::class,'dang_bai'])->name('dang-bai')->middleware('auth');
Route::post('/dang-bai',[BaiDangController::class,'xu_ly_dang_bai'])->name('xl-dang-bai')->middleware('auth');
Route::get('/chinh-sua-bai-dang/{id}',[BaiDangController::class,'show'])->name('chinh-sua-bai-dang')->middleware('auth');
Route::post('/chinh-sua-bai-dang/{id}',[BaiDangController::class,'edit'])->name('xl-chinh-sua-bai-dang')->middleware('auth');
Route::get('/xoa-bai-dang/{id}',[BaiDangController::class,'destroy'])->name('xoa-bai-dang')->middleware('auth');
Route::get('/da-tim-thay/{id}',[BaiDangController::class,'returned'])->name('da-tim-thay')->middleware('auth');


