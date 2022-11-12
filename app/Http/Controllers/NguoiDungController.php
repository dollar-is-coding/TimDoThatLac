<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use App\Models\BaiDang;
use App\Models\TheLoai;
use App\Models\DanhMuc;
use App\Models\KhuVuc;
use Carbon\Carbon;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sign_in()
    {
        return view('begin_pages.sign_in');
    }
    public function trang_chu()
    {
        $dsTheLoai=TheLoai::all();
        $dsDanhMuc=DanhMuc::all();
        $dsKhuVuc=KhuVuc::all();
        $dsBaiDang=BaiDang::where('trang_thai',1)->orderBy('updated_at','DESC')->get();
        return view('main_pages.new_feed',['dsTheLoai'=>$dsTheLoai,'dsDanhMuc'=>$dsDanhMuc,'dsKhuVuc'=>$dsKhuVuc,'dsBaiDang'=>$dsBaiDang]);
    }

    public function get_sign_in(Request $request)
    {
        $xuly =$request->only('email','password');
        if(Auth::attempt($xuly))
        {
            return redirect()->route('trang-chu');
        }
       return redirect()->back()->with("error", "Đăng nhập thất bại, Vui lòng kiểm tra lại =(");

    }
    public function log_out()
    {
        Auth::logout();
        return redirect()->route('dang-xuat');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('begin_pages.sign_up');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngay_sinh=$request->nam."/".$request->thang."/".$request->ngay;
        $nguoiDung=NguoiDung::create([
            'ho_ten'=>$request->ho_ten,
            'mat_khau'=>Hash::make($request->password),
            'email'=>$request->email,
            'so_dien_thoai'=>"",
            'admin'=>0,
            'ngay_sinh'=>date('Y/m/d', strtotime($ngay_sinh)),
            'gioi_tinh'=>(int)$request->gioi_tinh,
            'anh_dai_dien'=>""
        ]);
        // $xuly =$request->only('email','password');
        // if(Auth::attempt($xuly))
        // {
        //     return redirect()->route('trang-chu');
        // }
        // return redirect()->back()->with("error", "Đăng ký thất bại, Vui lòng kiểm tra lại =(");
        return redirect()->route('xl-dang-nhap');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $day = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->day;
        $month = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->month;
        $year = Carbon::createFromFormat('Y-m-d', $nguoiDung->ngay_sinh)->year;
        return view('main_pages.edit_account',['user'=>$nguoiDung,'id'=>$id,'day'=>$day,'month'=>$month,'year'=>$year]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=Auth::id();
        $ngay_sinh=$request->nam."/".$request->thang."/".$request->ngay;
        $nguoiDung=NguoiDung::where('id',$id)->update([
            'ho_ten'=>$request->ho_ten,
            'email'=>$request->email,
            'so_dien_thoai'=>$request->so_dien_thoai,
            'ngay_sinh'=>date('Y/m/d', strtotime($ngay_sinh)),
            'gioi_tinh'=>(int)$request->gioi_tinh,
        ]);
        $img =NguoiDung::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $img->anh_dai_dien = $filename;
        }
        $img->save();
        return redirect()->route('ds-bai-dang');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
