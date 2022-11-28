@extends('main_admin')
@section('main_admin')
<style>
    .ctn {

        width: 200px;
        height: 150px;
        border-radius: 10px;
        margin-right: 2em;
        text-align: center;
        font-size: 20px;
        text-align: center;
        padding-top: 1em;

        color: #090909;
 padding: 0.7em 1.7em;
 font-size: 18px;
 border-radius: 0.5em;
 background: #e8e8e8;
 border: 1px solid #e8e8e8;
 transition: all .3s;
 box-shadow: 6px 6px 12px #c5c5c5,
             -6px -6px 12px #ffffff;
    }

    .ct {
        margin-left: 4em;
        margin-top: 1.6em;
    }
</style>
<div class="d-flex flex-row justify-content-end" style="margin-right: 2.7em;margin-top: 10px;">
    <a href="">
        <img src="{{ URL('images/default_images/add.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;margin-left:12px;background-color: rgb(202, 221, 255)">
    </a>
    <a href="">
        <img src="{{ URL('images/default_images/user.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;margin-left:12px;background-color: rgb(202, 221, 255)">
    </a>
</div>

<div class="ct d-flex">
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số bài đăng</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$tong_bai_dang}}</h3></div>
    </div>
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số người dùng</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$tong_nguoi_dung}}</h3></div>
    </div>
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số bài đăng đã tìm thấy</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$tong_bd_tim_thay}}</h3></div>
    </div>
</div>
@endsection