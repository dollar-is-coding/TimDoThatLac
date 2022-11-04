@extends('index')
@section('body')
<div class="d-flex flex-row justify-content-between align-items-center bg-light shadow-sm " style="padding:0.5em;padding-left:20.5em;padding-right:20em;">
    <div>
        <img src="{{ URL('images/timdothatlac.png') }}" style="width: 30%">
    </div>
    <div class="d-flex flex-row align-items-center">
        
        <div>
            <img src="{{ URL('images/add.png') }}" style="width: 2em;">
        </div>
        <div>
            <img src="{{ URL('images/bell.png') }}" style="width: 2em;margin-left:20px;">
        </div>
        <div class="dropdown" style="padding-left:10px">
            <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ URL('images/avatar.jpg') }}" class="rounded-circle" style="width: 2.3em;height:2.3em">
            </button>
            <ul class="dropdown-menu mt-1">
              <li><a class="dropdown-item" href="#">Cá nhân</a></li>
              <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</div>

    <div style="padding-left:20em;padding-right:20em;">
        @yield('main')
    </div>
@endsection