<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;


class BinhLuanController extends Controller
{
    public function xu_ly_binh_luan(Request $request, $idBaiDang,$idNguoiDung) {
        BinhLuan::create([
            'nguoi_dung_id'=>$idNguoiDung,
            'bai_dang_id'=>$idBaiDang,
            'noi_dung'=>$request->binh_luan,
        ]);
        return redirect()->route('xem-bai-dang',['id'=>$idBaiDang]);
    }
}
