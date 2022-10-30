@extends('index')
@section('body')
<h3>Change password</h3>
<form action="">
    <div class="mb-3">
        &ensp; <label class="form-label">Old password</label>
        <input type="password" class="form-control">
    </div>
    <div class="mb-3">
        &ensp; <label class="form-label">New password</label>
        <input type="password" class="form-control">
    </div>
    <div class="mb-3">
        &ensp; <label class="form-label">Confirm new password</label>
        <input type="password" class="form-control">
    </div>
    <div class="d-flex justify-content-center"><button type="button" class="btn btn-success">Confirm</button></div>
</form>
@endsection