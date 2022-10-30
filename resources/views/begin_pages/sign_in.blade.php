@extends('begin')
@section('begin')
<h3 class="text-center">Đăng Nhập</h3>
<hr>
    <form action="" method="post">
        <div class="m-2">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter email or phone">
        </div>
        <div class="m-2">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Enter password">
        </div>
        <div class="text-center m-2 mt-4">
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
        <div class="text-center m-2">
            <a href="">Forgot password?</a>
        </div>
        <hr>
        <div class="text-center">
            <a href="" class="btn btn-success m-2">Create your account</a>
        </div>
    </form>
@endsection