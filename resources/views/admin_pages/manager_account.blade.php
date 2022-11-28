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
</style>
<div class="father">
    <a class="son " href="/manager-account" style="color:grey">Tài khoản</a>
    <a class="son " href="/manager-post">Bài đăng</a>
    <a class="son " href="/manager-comment">Bình luận</a>
</div>
<hr>
<div class="som">
<a href="" class="text-decoration-none text-dark">
        <div class="rounded-2 d-flex p-4 pt-3 pb-3 mt-2 mb-3 justify-content-between  shadow-sm" style="background-color:white">
            <div class="d-flex flex-fill align-items-center">
                <img src="/images/default_images/woman.png" alt="" class="rounded-2" style="width:5em;height:5em">
                <div style="margin-left:3%">
                    <div class="fs-5 fw-semibold">Tieu de</div>
                    <div>ten nguoi dung</div>
                    <div class="d-flex text-center mt-2 ">
                        <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                            the loai</div>
                        &ensp;
                        <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                            danh muc</div>
                        &ensp;
                        <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                            khu vuc</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row" style="padding-top:.3%;">
                <p>xóa</p>
            </div>
        </div>
    </a>
</div>
@endsection