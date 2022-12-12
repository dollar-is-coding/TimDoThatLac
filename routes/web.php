<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\BinhLuanController;

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

Route::get('/dang-ky', [NguoiDungController::class, 'create'])->name('dang-ky')->middleware('guest');
Route::post('/dang-ky', [NguoiDungController::class, 'store'])->name('xl-dang-ky')->middleware('guest');
Route::get('/dang-nhap', [NguoiDungController::class, 'sign_in'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap', [NguoiDungController::class, 'get_sign_in'])->name('xl-dang-nhap')->middleware('guest');
Route::get('/dang-xuat', [NguoiDungController::class, 'log_out'])->name('dang-xuat')->middleware('auth');
Route::get('/chinh-sua-tai-khoan', [NguoiDungController::class, 'show'])->name('chinh-sua-tai-khoan')->middleware('auth');
Route::post('/chinh-sua-tai-khoan', [NguoiDungController::class, 'edit'])->name('xl-chinh-sua-tai-khoan')->middleware('auth');
Route::get('/thay-doi-mat-khau',[NguoiDungController::class, 'show_edit_password'])->name('hien-thi-thay-doi-mat-khau')->middleware('auth');
Route::post('/thay-doi-mat-khau',[NguoiDungController::class, 'edit_password'])->name('xu-ly-thay-doi-mat-khau')->middleware('auth');

Route::get('/',[BaiDangController::class,'trang_chu'])->name('trang-chu');
Route::get('/tim-kiem',[BaiDangController::class,'tim_kiem'])->name('tim-kiem');
Route::get('/xem-bai-dang/{id}',[BaiDangController::class,'xem_bai_dang'])->name('xem-bai-dang');
Route::get('/danh-sach-bai-dang/{id}',[BaiDangController::class,'ds_bai_dang'])->name('ds-bai-dang');
Route::get('/danh-sach-theo-doi/{id}',[BaiDangController::class,'ds_theo_doi'])->name('ds-theo-doi');
Route::get('/xu-ly-theo-doi/{bai_dang_id}',[BaiDangController::class,'xl_theo_doi'])->name('xl-theo-doi')->middleware('auth');
Route::get('/xu-ly-bo-theo-doi/{bai_dang_id}',[BaiDangController::class,'xl_bo_theo_doi'])->name('xl-bo-theo-doi')->middleware('auth');
Route::get('/xu-ly-theo-doi-lai/{bai_dang_id}',[BaiDangController::class,'xl_theo_doi_lai'])->name('xl-theo-doi-lai')->middleware('auth');
Route::get('/dang-bai',[BaiDangController::class,'dang_bai'])->name('dang-bai')->middleware('auth');
Route::post('/dang-bai',[BaiDangController::class,'xu_ly_dang_bai'])->name('xl-dang-bai')->middleware('auth');
Route::get('/chinh-sua-bai-dang/{id}',[BaiDangController::class,'show'])->name('chinh-sua-bai-dang')->middleware('auth');
Route::post('/chinh-sua-bai-dang/{id}',[BaiDangController::class,'edit'])->name('xl-chinh-sua-bai-dang')->middleware('auth');
Route::get('/xoa-bai-dang/{id}',[BaiDangController::class,'destroy'])->name('xoa-bai-dang')->middleware('auth');
Route::get('/da-tim-thay/{id}',[BaiDangController::class,'returned'])->name('da-tim-thay')->middleware('auth');
Route::post('/bao-cao',[BaiDangController::class,'bao_cao'])->name('bao-cao')->middleware('auth');

Route::post('/xu-ly-binh-luan/{idBaiDang}',[BinhLuanController::class,'xu_ly_binh_luan'])->name('xl-binh-luan')->middleware('auth');
Route::post('/xu-ly-phan-hoi/{idBinhLuan}/{idBaiDang}',[BinhLuanController::class,'xu_ly_phan_hoi'])->name('xl-phan-hoi')->middleware('auth');
Route::get('/xu-ly-xoa-binh-luan/{idBinhLuan}/{idBaiDang}',[BinhLuanController::class,'xu_ly_xoa_binh_luan'])->name('xl-xoa-binh-luan')->middleware('auth');
Route::post('/xu-ly-chinh-sua-binh-luan/{idBinhLuan}/{idBaiDang}',[BinhLuanController::class,'xu_ly_chinh_sua_binh_luan'])->name('xl-chinh-sua-binh-luan')->middleware('auth');

Route::get('/trang-chu-admin', [AdminController::class, 'trang_chu_admin'])->name('trang-chu-admin')->middleware('auth');
Route::get('/report-account',[AdminController::class, 'bao_cao_tai_khoan'])->name('report-account')->middleware('auth');
Route::get('/report-post',[AdminController::class, 'bao_cao_bai_dang'])->name('report-post')->middleware('auth');
Route::get('/report-comment',[AdminController::class, 'bao_cao_binh_luan'])->name('report-comment')->middleware('auth');
Route::get('/bo-qua-tai-khoan/{id}',[AdminController::class,'bo_qua_tai_khoan'])->name('bo-qua-tai-khoan')->middleware('auth');
Route::get('/bo-qua-bai-dang/{id}',[AdminController::class,'bo_qua_bai_dang'])->name('bo-qua-bai-dang')->middleware('auth');
Route::get('/bo-qua-binh-luan/{id}',[AdminController::class,'bo_qua_binh_luan'])->name('bo-qua-binh-luan')->middleware('auth');

Route::get('/dang-ky-admin', [AdminController::class, 'dang_ky_admin'])->name('dang-ky-admin')->middleware('auth');
Route::post('/dang-ky-admin', [AdminController::class, 'tao_tai_khoan_admin'])->name('xl-dang-ky-admin')->middleware('auth');

Route::get('/manager-account',[AdminController::class,'ds_tai_khoan'])->name('quan-ly-tai-khoan')->middleware('auth');
Route::get('/manager-post',[AdminController::class,'ds_bai_dang'])->name('quan-ly-bai-dang')->middleware('auth');
Route::get('/manager-comment',[AdminController::class,'ds_binh_luan'])->name('quan-ly-binh-luan')->middleware('auth');
Route::get('/chinh-sua-tai-khoan-admin', [AdminController::class, 'show'])->name('chinh-sua-tai-khoan-admin')->middleware('auth');

Route::get('/dang-bai-admin',[AdminController::class,'dang_bai_admin'])->name('dang-bai-admin')->middleware('auth');
Route::post('/xl-dang-bai-admin',[AdminController::class,'xu_ly_dang_bai'])->name('xl-dang-bai-admin')->middleware('auth');

Route::get('/chinh-sua-bai-dang-admin/{id}',[AdminController::class,'sua_bai_dang_admin'])->name('sua-bai-dang-admin')->middleware('auth');
Route::post('/chinh-sua-bai-dang-admin/{id}',[AdminController::class,'xl_sua_bai_dang_admin'])->name('xl-chinh-sua-bai-dang-admin')->middleware('auth');

Route::get('/xoa-binh-luan/{id}',[AdminController::class,'xoa_binh_luan'])->name('xoa-binh-luan')->middleware('auth');
Route::get('/xoa-bai-dang-admin/{id}',[AdminController::class,'xoa_bai_dang'])->name('xoa-bai-dang-admin')->middleware('auth');


Route::get('/danh-muc',[AdminController::class,'danh_muc'])->name('xem-danh-muc')->middleware('auth');
Route::post('/danh-muc/{id}', [AdminController::class, 'xl_sua_danh_muc'])->name('xl_sua_danh_muc')->middleware('auth');
Route::post('/tao-danh-muc', [AdminController::class, 'them_danh_muc'])->name('them_danh_muc')->middleware('auth');

Route::get('/the-loai',[AdminController::class,'the_loai'])->name('xem-the-loai')->middleware('auth');
Route::post('/the-loai/{id}', [AdminController::class, 'xl_sua_the_loai'])->name('xl_sua_the_loai')->middleware('auth');
Route::post('/tao-the-loai', [AdminController::class, 'them_the_loai'])->name('them_the_loai')->middleware('auth');