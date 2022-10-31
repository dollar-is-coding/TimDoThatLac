@extends('begin')
@section('begin')
<h3 class="text-center">Đăng Nhập</h3>
<hr>
<form action="{{route('xl-dang-nhap')}}" method="post">
    @csrf
    <div class="m-2">
        <label for="">Username</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email or phone">
    </div>
    <div class="m-2">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password">
    </div>
    @if(session('error'))
    <p style="color:red ;">{{session('error')}}</p>
    @endif
    <div class="text-center m-2 mt-4">
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
</form>
<div class="text-center m-2">
    <a href="">Forgot password?</a>
</div>
<hr>
<div class="text-center">
    <a href="" class="btn btn-success m-2">Create your account</a>
</div>
@endsection