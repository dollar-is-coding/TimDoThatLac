@extends('main')
@section('main')
{{-- <a href="{{route('dang-xuat')}}" class="btn btn-danger">Đăng Xuất</a> --}}

<div class="container">
    <div class=" row rounded-2 bg-light" style="height:max;width:max;display: flex;">
        <div class="col" style="flex-basis:10%;">
            <img src="{{URL('images/avatar.jpg') }}" class="rounded-4 pt-2 pb-2" style="width:9em; height:9em;">
        </div>
        <div class=" col" style="flex-basis:80%;">
            <div class="row " style="display: flex;">
                <div class="col pt-2 " style="flex-basis:80%;">
                    <div>
                        <div>
                            <b class="fs-4">Mất chó ở công viên Lê Thị Riêng</b>
                            <br>
                            <p class="fs-5">Liu Hằng Nga</p>
                        </div>
                        <div class="row text-center " style="padding-left: 12px;padding-top: 20px;">
                            <div class="col border rounded-2" style="background-color:#EEEEEE ;">Thú cưng</div>&ensp;
                            <div class="col border rounded-2" style="background-color:#EEEEEE ;">Tìm đồ</div>&ensp;
                            <div class="col border rounded-2" style="background-color:#EEEEEE ;">TP Hồ Chí Minh</div>
                        </div>
                    </div>
                </div>
                <div class="col pt-2" style="flex-basis:20%;text-align: end;">
                    <p>22/1/2022</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection