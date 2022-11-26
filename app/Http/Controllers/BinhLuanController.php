<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;


class BinhLuanController extends Controller
{
    public function xu_ly_binh_luan(Request $request, $idBaiDang) {
        BinhLuan::create([
            'binh_luan_id'=>0,
            'bai_dang_id'=>$idBaiDang,
            'nguoi_dung_id'=>Auth::id(),
            'noi_dung'=>$request->binh_luan,
        ]);
        return redirect()->route('xem-bai-dang',['id'=>$idBaiDang]);
    }
    public function xu_ly_phan_hoi(Request $request,$idBinhLuan, $idBaiDang) {
        BinhLuan::create([
            'binh_luan_id'=>$idBinhLuan,
            'bai_dang_id'=>$idBaiDang,
            'nguoi_dung_id'=>Auth::id(),
            'noi_dung'=>$request->binh_luan,
        ]);
        return redirect()->route('xem-bai-dang',['id'=>$idBaiDang]);
    }
    public function xu_ly_xoa_binh_luan($idBinhLuan,$idBaiDang) {
        BinhLuan::find($idBinhLuan)->delete();
        return redirect()->route('xem-bai-dang',['id'=>$idBaiDang]);
    }
}
