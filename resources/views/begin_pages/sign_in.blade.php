@extends('begin')
@section('begin')
    <h3 class="text-center">Đăng Nhập</h3>
    <hr>
    <form action="{{ route('xl-dang-nhap') }}" method="post">
        @csrf
        <div class="m-3">
            &ensp;<label for="floatingTextarea"  class="mb-1">Email</label>
            <div class="input-group mb-2">
                <input type="text" name="email" class="form-control" placeholder="Email" style="background-color:#D6FFFF">
            </div>
        </div>
        <div class="m-3">
            &ensp;<label for="floatingTextarea"  class="mb-1">Mật khẩu</label>
            <div class="input-group mb-2">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" style="background-color:#D6FFFF">
            </div>
        </div>
        @if (session('error'))
            <p style="color:red ;">{{ session('error') }}</p>
        @endif
        <div class="text-center m-2 mt-4">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
    </form>
    <div class="text-center m-2">
        <a href="">Quên mật khẩu?</a>
    </div>
    <hr>
    <div class="text-center">
        <a href="{{ route('dang-ky') }}" class="btn btn-success m-2">Tạo tài khoản</a>

    </div>
@endsection
