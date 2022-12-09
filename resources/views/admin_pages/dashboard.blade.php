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
        margin-bottom: 1.6em;
    }
    .ma {
        text-decoration: none;
        height: 3em;
        width: 5em;
        border-radius: 20px;
        margin-right: 10px;


        color: black;
        text-align: center;
        padding-top: 13px;
        font-weight: 600;
        width: 9em;
        height: 3em;
        border-radius: 30em;
        font-size: 15px;
        font-family: inherit;
        border: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 6px 6px 12px #c5c5c5,
            -6px -6px 12px #ffffff;
    }

    .ma::before {
        content: '';
        width: 0;
        height: 3em;
        border-radius: 30em;
        position: absolute;
        top: 0;
        left: 0;
        background-image: linear-gradient(to right, #FF0000 0%, #f9f047 100%);
        transition: .5s ease;
        display: block;
        z-index: -1;
    }

    .ma:hover::before {
        width: 9em;
    }

    .ma:hover {
        color: black;
    }

    /* na */
    .na {
        text-decoration: none;
        height: 3em;
        width: 5em;
        border-radius: 20px;
        margin-right: 10px;


        color: black;
        text-align: center;
        padding-top: 13px;
        font-weight: 600;
        width: 9em;
        height: 3em;
        border-radius: 30em;
        font-size: 15px;
        font-family: inherit;
        border: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 6px 6px 12px #c5c5c5,
            -6px -6px 12px #ffffff;
    }

    .na::before {
        content: '';
        width: 0;
        height: 3em;
        border-radius: 30em;
        position: absolute;
        top: 0;
        left: 0;
        background-image: linear-gradient(to right, #0fd850 0%, #f9f047 100%);
        transition: .5s ease;
        display: block;
        z-index: -1;
    }

    .na:hover::before {
        width: 9em;
    }

    .na:hover {
        color: black;
    }
</style>
<div class="d-flex flex-row justify-content-end" style="margin-right: 2.7em;margin-top: 10px;">
    <a href="{{route('dang-bai-admin')}}">
        <img src="{{ URL('images/default_images/add.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;margin-left:12px;background-color: rgb(202, 221, 255)">
    </a>
    <a href="{{route('dang-ky-admin')}}">
        <img src="{{ URL('images/default_images/user.png') }}" class="rounded-circle border p-2" style="width: 2.7em;height:2.7em;margin-left:12px;background-color: rgb(202, 221, 255)">
    </a>
</div>

<div class="ct d-flex">
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số bài đăng</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$baidang}}</h3></div>
    </div>
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số người dùng</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$nguoidung}}</h3></div>
    </div>
    <div class="ctn">
        <div style="flex-basis:50% ;height: 50%;">
            <p>Tổng số bài đăng đã tìm thấy</p>
        </div>
        <div style="flex-basis: 50%;"><h3>{{$timthay}}</h3></div>
    </div>
</div>
<hr>

@foreach($dsBaiDangAdmin as $item)
<div style="margin-top:1em;overflow: auto;">
<a href="{{ route('xem-bai-dang', ['id' => $item->id]) }}" class="text-decoration-none text-dark">
        <div class="rounded-2 d-flex p-4 pt-3 pb-3 mt-2 mb-3 justify-content-between  shadow-sm" style="background-color:white">
            <div class="d-flex flex-fill align-items-center">

                <img src="/images/default_images/woman.png" alt="" class="rounded-2" style="width:5em;height:5em">
                <div style="margin-left:3%">
                <div class="fs-4" style="width:500px">{{$item->tieu_de}}</div>
                    <div class="fs-5 fw-semibold">{{$item->noi_dung}}</div>
                    <div class=" fw-semibold">Loại: {{$item->theLoai->ten }}</div>
                </div>
            </div>
            <div class="d-flex flex-col" style="padding-top:.3%;margin-top: 10px;">
                <a class="ma" href="">Xóa</a>
                <a class="na" href="">Chỉnh sửa</a>
            </div>
        </div>
    </a>
</div>
@endforeach


@endsection