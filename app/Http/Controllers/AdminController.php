<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKyRequets;
use Illuminate\Support\Facades\Hash;
use App\Models\TheLoai;
use App\Models\DanhMuc;
use App\Models\KhuVuc;
use App\Models\BaiDang;
use App\Models\BaoCao;
use App\Models\BinhLuan;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
class AdminController extends Controller
{
    public function trang_chu_admin()
    {
        $tong_bai_dang =BaiDang::count();
        $tong_nguoi_dung =NguoiDung::where('admin','0')->count();
        $tong_bd_tim_thay =BaiDang::where('trang_thai','0')->count();
        $dsBaiDangAdmin=BaiDang::where('nguoi_dung_id',Auth::id())->orderBy('trang_thai','DESC')->orderBy('updated_at','DESC')->get();
        return view('admin_pages.dashboard',['dsBaiDangAdmin'=>$dsBaiDangAdmin,'baidang'=>$tong_bai_dang,'nguoidung'=> $tong_nguoi_dung,'timthay'=>$tong_bd_tim_thay]);
    }
    public function bao_cao_tai_khoan(){
        $tong_baocao_nguoidung =BaoCao::where('nguoi_dung_id','>','0')->count();
        $tong_baocao_baidang =BaoCao::where([
            ['bai_dang_id', '>', '0'],
            ['binh_luan_id', '=', '0'],
         ])->count();
        $tong_baocao_binhluan =BaoCao::where([
            ['binh_luan_id','>','0'],
            ['bai_dang_id','>','0'],
        ])->count();
        $dstaikhoan=BaoCao::where('nguoi_dung_id','>',0)->get();
        return view('admin_pages.report_account',['nguoidung'=>$tong_baocao_nguoidung,'baidang'=>$tong_baocao_baidang,'binhluan'=>$tong_baocao_binhluan,'dstaikhoan'=>$dstaikhoan]);
    }
    public function bao_cao_bai_dang(){
        $tong_baocao_nguoidung =BaoCao::where('nguoi_dung_id','>','0')->count();
        $tong_baocao_baidang =BaoCao::where([
            ['bai_dang_id', '>', '0'],
            ['binh_luan_id', '=', '0'],
         ])->count();
        $tong_baocao_binhluan =BaoCao::where([
            ['binh_luan_id','>','0'],
            ['bai_dang_id','>','0'],
        ])->count();

        $dsbaidang=BaoCao::where([['binh_luan_id','=','0'],['bai_dang_id','>','0']])->get();
        return view('admin_pages.report_post',['nguoidung'=>$tong_baocao_nguoidung,'baidang'=>$tong_baocao_baidang,'binhluan'=>$tong_baocao_binhluan,'dsbaidang'=>$dsbaidang]);
    }
    public function bao_cao_binh_luan(){
        $tong_baocao_nguoidung =BaoCao::where('nguoi_dung_id','>','0')->count();
        $tong_baocao_baidang =BaoCao::where([
            ['bai_dang_id', '>', '0'],
            ['binh_luan_id', '=', '0'],
         ])->count();
        $tong_baocao_binhluan =BaoCao::where([
            ['binh_luan_id','>','0'],
            ['bai_dang_id','>','0'],
        ])->count();
        $dsbinhluan=BaoCao::where([['binh_luan_id','>','0'],['bai_dang_id','>','0'],])->get();
        return view('admin_pages.report_comment',['nguoidung'=>$tong_baocao_nguoidung,'baidang'=>$tong_baocao_baidang,'binhluan'=>$tong_baocao_binhluan,'dsbinhluan'=>$dsbinhluan]);
    }
    public function bo_qua_tai_khoan($id) {
        $xoaBaiDang=BaoCao::find($id)->delete();
        return redirect()->route('report-account');
    }
    public function bo_qua_bai_dang($id) {
        $xoaBaiDang=BaoCao::find($id)->delete();
        return redirect()->route('report-post');
    }
    public function bo_qua_binh_luan($id) {
        $xoaBaiDang=BaoCao::find($id)->delete();
        return redirect()->route('report-comment');
    }
    public function create_admin()
    {
        return view('admin_pages.sign_up_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DangKyRequets $request)
    {
        $ngay_sinh=$request->nam."/".$request->thang."/".$request->ngay;
        $nguoiDung=NguoiDung::create([
            'ho_ten'=>$request->ho_ten,
            'mat_khau'=>Hash::make($request->password),
            'email'=>$request->email,
            'admin'=>1,
            'ngay_sinh'=>date('Y/m/d', strtotime($ngay_sinh)),
            'gioi_tinh'=>(int)$request->gioi_tinh,
            'anh_dai_dien'=>""
        ]);
        return redirect()->route('trang-chu-admin');
    }
    public function ds_tai_khoan(){
        $dstaikhoan=NguoiDung::where('admin',0)->get();
        return view('admin_pages.manager_account',['dstaikhoan'=> $dstaikhoan]);
    }
    public function ds_bai_dang(){
        $dsbaidang=BaiDang::all();
        return view('admin_pages.manager_post',['dsbaidang'=> $dsbaidang]);
    }
    public function ds_binh_luan(){
        $dsbinhluan=BinhLuan::all();
        return view('admin_pages.manager_comment',['dsbinhluan'=> $dsbinhluan]);
    }
    //
    public function xoa_tai_khoan($idtk,$idbd,$idbc){
       
        NguoiDung::find($idtk)->delete();
        BaiDang::find($idbd)->delete();
        BaoCao::find($idbc)->delete();
        return redirect()->route('quan-ly-tai-khoan');
    }
    public function xoa_bai_dang($idbd,$idbc){
        $idbd=BaiDang::find($idbd)->delete();
        $idbc=BaoCao::find($idbc)->update([
            'bai_dang_id'=>0,
            'binh_luan_id'=>0,
        ]);
        return redirect()->route('report-post');
    }
    public function xoa_binh_luan($idbl,$idbc){
        BinhLuan::find($idbl)->delete();
        BaoCao::find($idbc)->update([
            'binh_luan_id'=>0,
        ]);
        return redirect()->route('report-comment');
    }
    //
    public function show()
    {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $day = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->day;
        $month = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->month;
        $year = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->year;
        return view('admin_pages.edit_account_admin',['user'=>$nguoiDung,'id'=>$id,'day'=>$day,'month'=>$month,'year'=>$year]);
    }
    public function dang_bai_admin() {     
        $theLoai=TheLoai::all();
        return view('admin_pages.post_admin',['theLoai'=>$theLoai]);
    }
    public function xoa_tai_khoan_nguoi_dung($id,$idbd){//id nguoi dung
        // $binhluan=BinhLuan::where('nguoi_dung_id',$id)->delete();//xoa binh luan
        // $baidang=BaiDang::where('nguoi_dung_id',$id)->delete();//xoa bai dang
        
        // $baocao=BaoCao::where('nguoi_dung_id',$id)->update(//update bao cao nguoi dung
        //     [
        //         'nguoi_dung_id'=>0,
        //     ]
        //     );
        // $baocaobd=BaoCao::where('bai_dang_id', $idbd)->update([
        //     'bai_dang_id'=>0,
        //     'binh_luan_id'=>0
        // ]);
        // $taikhoan=NguoiDung::find($id)->delete();//xoa nguoi dung
        $getid=NguoiDung::find($id);
        dd($getid);
        $getidbd=BaoCao::where('bai_dang_id',$idbd);
        dd($getidbd);
        return redirect()->route('xoa-bai-dang-nguoi-dung');
    }
}
