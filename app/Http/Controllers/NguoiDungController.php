<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function index()
    {
        return view('main_pages.new_feed');

    }
    public function get_sign_in(Request $request)
    {
        $xuly =$request->only('email','password');
        if(Auth::attempt($xuly))
        {
        // return redirect()->route('index');
        return view('main_pages.new_feed');
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
        $nguoiDung=NguoiDung::create([
            'ho_ten'=>$request->ho.$request->ten,
            'mat_khau'=>Hash::make($request->password),
            'email'=>$request->email,
            'so_dien_thoai'=>"",
            'admin'=>0,
            
            'ngay_sinh'=>date('Y/m/d', strtotime($request->nam.$request->thang.$request->ngay)),
            'gioi_tinh'=>$request->gioi_tinh,
            'anh_dai_dien'=>""
        ]);
        $xuly =$request->only('email','password');
        if(Auth::attempt($xuly))
        {
        // return redirect()->route('index');
        return view('main_pages.new_feed');
        }
       return redirect()->back()->with("error", "Đăng ký thất bại, Vui lòng kiểm tra lại =(");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
