@extends('main_admin')
@section('main_admin')
<style>
    .son {
        text-decoration: none;
        color: black;
        text-align: center;
        margin: 0 auto;
        font-weight: 600;
        border-radius: 10px;
        margin-top: 20px;
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
<div class="father">
    <a class="son " href="{{route('report-account')}}" style="color:grey">Tài khoản ({{$nguoidung}})</a>
    <a class="son " href="{{route('report-post')}}">Bài đăng ({{$baidang}})</a>
    <a class="son " href="{{route('report-comment')}}">Bình luận ({{$binhluan}})</a>
</div>
<hr>
<div class="som">
    <p>account</p>
    @foreach($dstaikhoan as $item)
    <a href="{{route('ds-bai-dang',['id'=>$item->nguoiDung->id])}}" class="text-decoration-none text-dark">
        <div class="rounded-2 d-flex p-4 pt-3 pb-3 mt-2 mb-3 justify-content-between  shadow-sm" style="background-color:white">
            <div class="d-flex flex-fill align-items-center">

                <img src="/images/default_images/woman.png" alt="" class="rounded-2" style="width:5em;height:5em">
                <div style="margin-left:3%">
                    <div class="fs-5 fw-semibold">{{$item->nguoiDung->ho_ten}}</div>
                    <div style="width:500px">{{$item->noi_dung}}</div>
                  
                </div>
            </div>
            <div class="d-flex flex-col" style="padding-top:.3%;margin-top: 10px;">
                <a class="ma" href="{{route('xoa-bai-dang-nguoi-dung',['id'=>$item->nguoiDung->id,'idbd'=>$item->bai_dang_id])}}">Xóa</a>
                <a class="na" href="{{route('bo-qua-tai-khoan',['id'=>$item->id])}}">Bỏ qua</a>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection
