<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use App\Models\NguoiDung;
class AdminController extends Controller
{
    public function trang_chu_admin()
    {
        $tong_bai_dang =BaiDang::count();
        $tong_nguoi_dung =NguoiDung::count();
        $tong_bd_tim_thay =BaiDang::where('trang_thai','0')->count();
        return view('admin_pages.dashboard',compact('tong_bai_dang','tong_nguoi_dung','tong_bd_tim_thay'));
    }
}
