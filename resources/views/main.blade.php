@extends('index')
@section('body')
    <style>
        .text {
            color: white;
        }

        .text:hover {
            color: #052147;
            background-color: rgb(202, 221, 255);
        }
    </style>
    <div class="d-flex flex-row justify-content-between align-items-center shadow-sm"
        style="padding:0.2em;padding-left:20.5em;padding-right:20em;background-color:white">
        <div>
            <a
                href="{{ (Auth::id() == null ? route('trang-chu') : Auth::user()->admin == 0) ? route('trang-chu') : route('trang-chu-admin') }}">
                <img src="{{ URL('images/default_images/timdothatlac.png') }}" style="width: 30%">
            </a>
        </div>

        <div class="d-flex flex-row align-items-center">
            <a href="{{ (Auth::id() == null ? '/dang-nhap' : Auth::user()->admin == 0) ? '/dang-bai' : '#' }}">
                <img src="{{ URL('images/default_images/add.png') }}" class="rounded-circle border p-2"
                    style="width: 2.7em;height:2.7em;background-color: rgb(202, 221, 255)">
            </a>
            @if (Auth::id() != null)
                <div class="dropdown">
                    <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL('images/default_images/user.png') }}" class="rounded-circle border p-2"
                            style="width: 2.7em;height:2.7em;background-color: rgb(202, 221, 255)">
                    </button>
                    @if (Auth::user()->admin == 0)
                        <ul class="dropdown-menu mt-1 shadow" style="background-color: #052147">
                            <li class="hover">
                                <a class="dropdown-item text" href="{{ route('ds-bai-dang', ['id' => Auth::id()]) }}">Cá
                                    nhân</a>
                            </li>
                            <li class="hover">
                                <a class="dropdown-item text" href="{{ route('dang-xuat') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    @endif
                </div>
            @else
                <a href="{{ route('dang-nhap') }}" class="btn btn-success" style="width: 7em;margin-left:20px;">Đăng
                    nhập</a>
            @endif
        </div>
    </div>
    @yield('main')
@endsection
