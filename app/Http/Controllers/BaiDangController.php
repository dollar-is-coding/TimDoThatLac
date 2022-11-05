<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;

class BaiDangController extends Controller
{
    public function index() {
        $baiDang=BaiDang::find(1);
        return view('main_pages.see_post',['post'=>$baiDang]);
    }
}
