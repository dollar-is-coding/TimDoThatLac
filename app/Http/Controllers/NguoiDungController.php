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
use App\Http\Requests\DangNhapRequets;
use App\Http\Requests\DangKyRequets;
use App\Http\Requests\ChangePasswordRequest;



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
    
    public function get_sign_in(DangNhapRequets $request)
    {
        // $xuly =$request->only('email','password');
        $nguoidung =[
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>0,
        ];
        $admin =[
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>1,
        ];
        if(Auth::attempt($admin))
        {   
                return redirect()->route('trang-chu-admin');
                
        }else if(Auth::attempt($nguoidung)){
            return redirect()->route('trang-chu');
        }
       return redirect()->back()->with('error','Đăng nhập thất bại');

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
    public function store(DangKyRequets $request)
    {
        $ngay_sinh=$request->nam."/".$request->thang."/".$request->ngay;
        $nguoiDung=NguoiDung::create([
            'ho_ten'=>$request->ho_ten,
            'mat_khau'=>Hash::make($request->password),
            'email'=>$request->email,
            'admin'=>0,
            'ngay_sinh'=>date('Y/m/d', strtotime($ngay_sinh)),
            'gioi_tinh'=>(int)$request->gioi_tinh,
            'anh_dai_dien'=>""
        ]);
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
            'ngay_sinh'=>date('Y/m/d', strtotime($ngay_sinh)),
            'gioi_tinh'=>(int)$request->gioi_tinh,
        ]);
        $img =NguoiDung::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/added_images'), $filename);
            $img->anh_dai_dien = $filename;
        }
        $img->save();
       if(Auth::user()->admin==0){
        return redirect()->route('ds-bai-dang',['id'=>Auth::id()]);
       }
       else{
        return redirect()->route('trang-chu-admin',['id'=>Auth::id()]);
       }
    }


    public function destroy($id)
    {
        //
    }

    public function show_edit_password() {
        return view('main_pages.edit_password');
    }

    public function edit_password(ChangePasswordRequest $request) {
        $realPass=NguoiDung::find(Auth::id());
        if ($request->new_password==$request->confirm_new_password&&Hash::check($request->old_password,$realPass['mat_khau'])) {
            NguoiDung::find(Auth::id())->update([
                'mat_khau'=>Hash::make($request->new_password),
            ]);
            return redirect()->route('ds-bai-dang',['id'=>Auth::id()]);
        }
        return redirect()->back()->with('error','Thay đổi mật khẩu thất bại!');
    }
}
