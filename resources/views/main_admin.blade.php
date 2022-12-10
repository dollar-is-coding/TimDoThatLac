@extends('index')
@section('body')
<style>
    .text {
        color: white;
    }

    .text:hover {
        color: #052147;
        background-color: rgb(202, 221, 255);
    }

    .father {
        display: flex;
        height: max;
    }

    .son1 {
        text-align: center;
        /* background-color: rgb(255, 105, 180); */
        flex-basis: 25%;
        display: flex;
        flex-direction: column;
        padding-top: 2em;
        margin-right: 5px;
        padding-bottom: 400px;

    }

    .son2 {

        flex-basis: 75%;

    }

    .ah {
        width: 95%;
        height: 50px;

        /* background-color: rgb(255, 105, 180); */
        color: black;
        margin: 0 auto;
        padding-top: 8px;
        margin-bottom: 1em;
        font-size: 20px;
        font-weight: 600;
        border-radius: 10px;
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

    .ah:active {
        box-shadow: 4px 4px 12px #c5c5c5,
            -4px -4px 12px #ffffff;
    }

    .ah:hover {
        border: 1px solid white;
    }
</style>
<div>
    <div class="d-flex flex-row justify-content-between align-items-center shadow-sm" style="padding:0.2em;padding-left:2em;padding-right:2em;background-color:white;">
        <div>
            <a href="">
                <img src="{{ URL('images/default_images/timdothatlac.png') }}" style="width: 20%">
            </a>
        </div>
        <div class="d-flex flex-row align-items-center">
            <!-- <a href="">
            <img src="{{ URL('images/default_images/user.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;background-color: rgb(202, 221, 255)">
        </a>
        <a href="">
                <img src="{{ URL('images/default_images/bell-ring.png') }}" class="rounded-circle border p-2"
                    style="width: 2.7em;height:2.7em;margin-left:12px;background-color: rgb(202, 221, 255)">
            </a> -->
            <div class="dropdown">
                <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL('images/default_images/user.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;background-color: rgb(202, 221, 255)">
                </button>
                <ul class="dropdown-menu mt-1 shadow" style="background-color: #052147">
                    <li class="hover">
                        <a class="dropdown-item text" href="{{ route('dang-xuat') }}">Đăng xuất</a>
                    </li>
                </ul>
            </div>
            <!-- <a href="" class="btn btn-success" style="width: 7em;margin-left:20px;">Đăng
                    nhập</a> -->
        </div>
    </div>
    <div class="father">
        <div class="son1 border">
            <div>
                <div class="text-center">
                    <a href="{{route('chinh-sua-tai-khoan-admin')}}">
                    <?php
                    use Illuminate\Support\Facades\Auth;
                    if (Auth::user()->anh_dai_dien != '') {
                        echo '<img src="/images/added_images/'.Auth::user()->anh_dai_dien.' "alt="" class="rounded-circle" style="width:150px;height:150px">';
                    } elseif (Auth::user()->gioi_tinh == 1) {
                        echo '<img src="/images/default_images/man.png" alt="" width="150px" height="150px" class="rounded-circle mr-3">';
                    } else {
                        echo '<img src="/images/default_images/woman.png" alt="" width="150px" height="150px" class="rounded-circle mr-3">';
                    }
                    ?>
                    </a>
                </div>
                <div class="fs-3 fw-bold mb-2 text-center">{{Auth::user()->ho_ten}}</div>
                <hr>
            </div>
            <a href="{{route('trang-chu-admin')}}" class="ah border" style="text-decoration: none;color:black;">Trang chủ</a>
            <a href="{{route('report-account')}}" class="ah border" style="text-decoration: none;color:black;">Báo cáo</a>
            <a href="{{route('quan-ly-tai-khoan')}}" class="ah border" style="text-decoration: none;color:black;">Quản lý</a>
            <!-- <a href="/admin" class="ah border" style="text-decoration: none;color:black;">Thống kê</a> -->
        </div>
        <div class="son2 ">

            <div class="">
                @yield('main_admin')
            </div>
        </div>
    </div>
</div>

<!-- @yield('main_admin') -->
@endsection