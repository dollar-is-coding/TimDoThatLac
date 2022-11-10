<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;

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
Route::get('/',[NguoiDungController::class,'index'])->name('index')->middleware('auth');
Route::get('/dang-ky',[NguoiDungController::class,'create'])->name('dang-ky')->middleware('guest');
Route::post('/dang-ky',[NguoiDungController::class,'store'])->name('xl-dang-ky')->middleware('guest');
Route::get('/dang-nhap',[NguoiDungController::class,'sign_in'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap',[NguoiDungController::class,'get_sign_in'])->name('xl-dang-nhap')->middleware('guest');
Route::get('dangxuat',[NguoiDungController::class,'log_out'])->name('dang-xuat')->middleware('auth');
