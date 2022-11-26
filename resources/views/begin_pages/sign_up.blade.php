@extends('begin')
@section('begin')
<h3 class="text-center">Đăng ký</h3>
<hr>
<form action="{{ route('xl-dang-ky') }}" method="post">
    @csrf
    <div class="m-3">
        &ensp;<label class="mb-1">Họ tên</label>
        <div class="input-group mb-2">
            <input type="text" name="ho_ten" class="form-control" placeholder="Họ tên" style="background-color:#D6FFFF">
        </div>
        @error('ho_ten')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="m-3">
        &ensp;<label class="mb-1">Mật khẩu</label>
        <div class="input-group mb-2">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" style="background-color:#D6FFFF">
        </div>
        @error('password')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="m-3">
        &ensp;<label class="mb-1">Email</label>
        <div class="input-group mb-2">
            <input type="email" name="email" class="form-control" placeholder="Email" style="background-color:#D6FFFF">
        </div>
        @error('email')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="m-3">
        &ensp;<label class="mb-1">Giới tính</label>
        <div class="input-group mb-2">
            <select class="form-select" name="gioi_tinh" aria-label=".form-select-sm example" style="background-color:#D6FFFF">
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
            </select>
        </div>
    </div>
    <div class="m-3">

        <div class="d-flex flex-row">
            <div class="input-group mb-2 d-flex flex-column" style="margin-right: .5em">
                <div class="mb-1">&ensp;Ngày</div>
                <div>
                    <select class="form-select" name="ngay" aria-label="Default select example" style="background-color:#D6FFFF">
                        @for ($i = 1; $i<=31; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="input-group mb-2 d-flex flex-column" style="margin-right: .5em">
                <div class="mb-1">&ensp;Tháng</div>
                <div>
                    <select class="form-select" name="thang" aria-label="Default select example" style="background-color:#D6FFFF">
                        @for ($i=1; $i<=12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="input-group mb-2 d-flex flex-column">
                <div class="mb-1">&ensp;Năm</div>
                <div>
                    <select class="form-select" name="nam" aria-label="Default select example" style="background-color:#D6FFFF">
                        @for ($i = 1960; $i <= 2010; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4"><button type="submit" class="btn btn-success">Đăng ký</button>
    </div>
</form>
@endsection