@extends('main')
@section('main')
    <div style="padding-left:10em;padding-right:10em;">
        <div class="d-flex flex-row">
            <div class="mt-3 rounded shadow-sm flex-shrink-2 p-4 align-self-start" style="background-color:white;">
                @if (Auth::id() != null)
                    @if ($user->id != Auth::id())
                        <div class="d-flex align-items-end flex-column dropend" style="margin-top:-5%">
                            <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ URL('images/default_images/menu-dots.png') }}" class="rounded-circle"
                                    style="width: 1em;height:1em">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href="">Báo cáo</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex align-items-end flex-column dropend" style="margin-top:-5%">
                            <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ URL('images/default_images/menu-dots.png') }}" class="rounded-circle"
                                    style="width: 1em;height:1em">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <a class="dropdown-item" href="{{ route('hien-thi-thay-doi-mat-khau') }}">Thay đổi mật
                                        khẩu</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endif
                <div class="text-center">
                    <?php
                    if ($user->anh_dai_dien != '') {
                        echo '<img src="/images/added_images/' . $user->anh_dai_dien . '" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    } elseif ($user->gioi_tinh == 1) {
                        echo '<img src="/images/default_images/man.png" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    } else {
                        echo '<img src="/images/default_images/woman.png" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    }
                    ?>
                </div>
                <div class="fs-3 fw-bold mt-3 mb-2 text-center">{{ $user->ho_ten }}</div>
                <hr>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/default_images/at.png') }}" style="width:1.2em;height:1.2em;margin-right:.5em">
                    {{ $user->email }}
                </div>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/default_images/calendar.png') }}"
                        style="width:1.2em;height:1.2em;margin-right:.5em">
                    {{ date('d/m/Y', strtotime($user->ngay_sinh)) }}
                </div>
                <div class="d-flex align-items-center">
                    <img src="{{ URL('images/default_images/venus-mars.png') }}"
                        style="width:1.2em;height:1.2em;margin-right:.5em">
                    {{ $user->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}
                </div>
                @if (Auth::id() == $user->id)
                    <div class="text-center mt-2">
                        <a href="{{ route('chinh-sua-tai-khoan') }}" class="btn btn-light btn-sm fw-semibold">Chỉnh sửa
                            thông
                            tin cá nhân</a>
                    </div>
                @endif
            </div>
            <div class="mt-3 rounded shadow-sm w-100 p-4 pt-0 pb-2" style="margin-left:2%;background-color:white">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('ds-bai-dang', ['id' => $user->id]) }}"
                        class=" text-decoration-none text-success m-3 mb-0 ">Bài đăng</a>
                    <a href="#" class="text-decoration-none fw-semibold text-dark m-3  mb-0">Theo
                        dõi</a>
                </div>
                <hr>
                @foreach ($dsTheoDoi as $item)
                    <a href="{{ route('xem-bai-dang', ['id' => $item->bai_dang_id]) }}"
                        class="text-decoration-none text-dark">
                        <div class="rounded-2 d-flex p-4 pt-0 pb-3 mt-2 justify-content-between shadow-sm">
                            <div class="d-flex flex-fill align-items-center">
                                @if ($item->baiDang->nguoiDung->admin == 0)
                                    <?php
                                    if ($item->baiDang->nguoiDung->anh_dai_dien != '') {
                                        echo '<img src="/images/added_images/' . $item->baiDang->nguoiDung->anh_dai_dien . '" alt="" class="rounded-2" style="width:5em;height:5em">';
                                    } elseif ($item->baiDang->nguoiDung->gioi_tinh == 1) {
                                        echo '<img src="/images/default_images/man.png" alt="" class="rounded-2" style="width:5em;height:5em">';
                                    } else {
                                        echo '<img src="/images/default_images/woman.png" alt="" class="rounded-2" style="width:5em;height:5em">';
                                    }
                                    ?>
                                @else
                                    <img src="/images/default_images/admin.png" alt="" class="rounded-2"
                                        style="width:5em;height:5em">
                                @endif
                                <div style="margin-left:3%;background-color:white">
                                    <div class="fs-5 fw-semibold">{{ $item->baiDang->tieu_de }}</div>
                                    <div>
                                        {{ $item->baiDang->nguoiDung->admin == 0 ? $item->baiDang->nguoiDung->ho_ten : 'TimDoThatLac' }}
                                    </div>
                                    <div class="d-flex text-center mt-2">
                                        @if ($item->baiDang->trang_thai == 0)
                                            <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                                                {{ $item->baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</div>
                                            &ensp;
                                        @else
                                            <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                                style="background-color:#D6FFFF;color:#052147">
                                                {{ $item->baiDang->theLoai->ten }}
                                            </div>
                                            &ensp;
                                        @endif
                                        @if ($item->baiDang->nguoiDung->admin == 0)
                                            <div class="rounded p-2 pt-0 pb-0"
                                                style="background-color:#D6FFFF;color:#052147 ;">
                                                {{ $item->baiDang->danhMuc->ten }}
                                            </div>&ensp;
                                            <div class="rounded p-2 pt-0 pb-0"
                                                style="background-color:#D6FFFF;color:#052147 ;">
                                                {{ $item->baiDang->khuVuc->ten }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row" style="padding-top:.3%;">
                                <div>
                                    {{ \Carbon\Carbon::now()->format('d/m/Y') == $item->updated_at->format('d/m/Y') ? $item->updated_at->format('H:i') : $item->updated_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
