@extends('index')
@section('body')
    <form action="" method="post">
        <input type="text" name="username" class="form-control" placeholder="Enter email or phone">
        <input type="text" name="password" class="form-control" placeholder="Enter password">
        <button type="submit" class="btn btn-primary">Sign In</button>
        <div><a href="" >Forgot password?</a></div>
        <hr>
        <a href="" class="btn btn-success">Create your account</a>
    </form>
@endsection