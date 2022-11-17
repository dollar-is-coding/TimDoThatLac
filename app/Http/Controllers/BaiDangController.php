<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use App\Models\NguoiDung;
use App\Models\TheLoai;
use App\Models\DanhMuc;
use App\Models\KhuVuc;
use App\Models\HinhAnh;
use App\Models\TheoDoi;
use Illuminate\Support\Facades\Auth;

class BaiDangController extends Controller
{
    public function xem_bai_dang($id) {
        $user=NguoiDung::where('id',Auth::id())->first();
        $chiTietBaiDang=BaiDang::find($id);
        $soLuongHinhAnh=HinhAnh::where('bai_dang_id',$id)->count();
        $hinhAnh=HinhAnh::where('bai_dang_id',$id)->get();
        $follow=TheoDoi::where('nguoi_dung_id',Auth::id())->where('bai_dang_id',$id)->first();
        return view('main_pages.detail_post',['baiDang'=>$chiTietBaiDang,'soLuongHA'=>$soLuongHinhAnh,'hinhAnh'=>$hinhAnh,'user'=>$user,'daTheoDoi'=>$follow]);
    }
    public function xl_theo_doi($bai_dang_id) {
        TheoDoi::create([
            'nguoi_dung_id'=>Auth::id(),
            'bai_dang_id'=>$bai_dang_id,
            'trang_thai'=>1
        ]);
        return back();
    }
    public function xl_bo_theo_doi($bai_dang_id) {
        TheoDoi::where('bai_dang_id',$bai_dang_id)->update(['trang_thai'=>0]);
        return back();
    }
    public function xl_theo_doi_lai($bai_dang_id) {
        TheoDoi::where('bai_dang_id',$bai_dang_id)->update(['trang_thai'=>1]);
        return back();
    }
    public function ds_bai_dang() {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $dsBaiDang=BaiDang::where('nguoi_dung_id',$id)->orderBy('trang_thai','DESC')->orderBy('updated_at','DESC')->get();
        return view('main_pages.post_list',['user'=>$nguoiDung,'dsBaiDang'=>$dsBaiDang,'id'=>$id]);
    }
    public function ds_theo_doi() {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $dsTheoDoi=TheoDoi::where('nguoi_dung_id',Auth::id())->where('trang_thai',1)->get();
        return view('main_pages.follow_list',['user'=>$nguoiDung,'id'=>$id,'dsTheoDoi'=>$dsTheoDoi]);
    }
    public function dang_bai() {
        $danhMuc=DanhMuc::all();
        $theLoai=TheLoai::all();
        $khuVuc=KhuVuc::all();
        return view('main_pages.post',['danhMuc'=>$danhMuc,'theLoai'=>$theLoai,'khuVuc'=>$khuVuc]);
    }
    public function xu_ly_dang_bai(Request $request) {
        $user=Auth::id();
        $dangBai=BaiDang::create([
            'nguoi_dung_id'=>$user,
            'the_loai_id'=>$request->the_loai,
            'danh_muc_id'=>$request->danh_muc,
            'khu_vuc_id'=>$request->khu_vuc,
            'tieu_de'=>$request->tieu_de,
            'noi_dung'=>$request->noi_dung,
            'dia_chi'=>$request->dia_chi,
            'trang_thai'=>1,
        ]);
        $hinhAnh=BaiDang::latest()->first();
        if ($request->has('file')) {
            foreach ($request->file('file') as $img) {
                $filename = $img->getClientOriginalName();
                $img->move(public_path('images/added_images'), $filename);
                HinhAnh::create([
                    'bai_dang_id'=>$hinhAnh->id,
                    'hinh_anh'=>$filename,
                ]);
            }
        }
        return redirect()->route('ds-bai-dang');
    }
    public function show($id) {
        $chiTietBaiDang =BaiDang::find($id);
        $danhMuc=DanhMuc::all();
        $theLoai=TheLoai::all();
        $khuVuc=KhuVuc::all();
        $hinhAnh=HinhAnh::where('bai_dang_id',$id)->get();
        return view('main_pages.edit_post',['baiDang'=>$chiTietBaiDang,'danhMuc'=>$danhMuc,'theLoai'=>$theLoai,'khuVuc'=>$khuVuc,'hinhAnh'=>$hinhAnh]);
    }
    public function edit($id,Request $request) {
        $chiTietBaiDang=BaiDang::find($id)->update([
            'the_loai_id'=>$request->the_loai,
            'danh_muc_id'=>$request->danh_muc,
            'khu_vuc_id'=>$request->khu_vuc,
            'tieu_de'=>$request->tieu_de,
            'noi_dung'=>$request->noi_dung,
            'dia_chi'=>$request->dia_chi,
        ]);
      
        return redirect()->route('trang-chu');
    }
    public function destroy($id) {
        $xoaBaiDang=BaiDang::find($id)->delete();
        return redirect()->route('trang-chu');
    }
    public function returned($id) {
        $daTimThay=BaiDang::find($id)->update(['trang_thai'=>0]);
        return redirect()->route('ds-bai-dang');
    }
}
