@extends('index')
@section('body')
    <div class="d-flex flex-row justify-content-between align-items-center bg-light shadow-sm "
        style="padding:0.5em;padding-left:20.5em;padding-right:20em;">
        <div>
            <a href="{{ route('trang-chu') }}">
                <img src="{{ URL('images/timdothatlac.png') }}" style="width: 30%">
            </a>
        </div>
        <div class="d-flex flex-row align-items-center">
            <a href="{{ Auth::id() == null ? '/dang-nhap' : '/dang-bai' }}">
                <img src="{{ URL('images/add.png') }}" style="width: 2em;">
            </a>
            <a href="">
                <img src="{{ URL('images/bell.png') }}" style="width: 2em;margin-left:20px;">
            </a>

            @if (Auth::id() != null)
                <div class="dropdown" style="padding-left:10px">
                    <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL('images/avatar.jpg') }}" class="rounded-circle" style="width: 2.3em;height:2.3em">
                    </button>
                    <ul class="dropdown-menu mt-1">
                        <li><a class="dropdown-item" href="{{ route('ds-bai-dang') }}">Cá nhân</a></li>
                        <li><a class="dropdown-item" href="{{ route('dang-xuat') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('dang-nhap') }}" class="btn btn-success" style="width: 7em;margin-left:20px;">Đăng
                    nhập</a>
            @endif
        </div>
    </div>
    @yield('main')
@endsection
