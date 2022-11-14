@extends('main')
@section('main')
    <div style="padding-left:10em;padding-right:10em;">
        <div class="d-flex flex-row">
            <div class="mt-3 rounded shadow-sm flex-shrink-2 p-4 align-self-start" style="background-color:white">
                <div class="text-center">
                    <?php
                    if ($user->anh_dai_dien != '') {
                        echo '<img src="images/added_images/' . $user->anh_dai_dien . '" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    } elseif ($user->gioi_tinh == 1) {
                        echo '<img src="images/default_images/man.png" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    } else {
                        echo '<img src="images/default_images/woman.png" alt="" class="rounded-circle" style="width:10em;height:10em">';
                    }
                    ?>
                </div>
                <div class="fs-3 fw-bold mt-3 mb-2 text-center">{{ $user->ho_ten }}</div>
                <hr>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/default_images/circle-phone.png') }}"
                        style="width:1.2em;height:1.2em;margin-right:.5em">
                    {{ $user->so_dien_thoai }}
                </div>
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
                <div class="text-center mt-2">
                    <a href="{{ route('chinh-sua-tai-khoan') }}" class="btn btn-light btn-sm fw-semibold">Chỉnh sửa thông
                        tin cá nhân</a>
                </div>
            </div>
            <div class="mt-3 rounded shadow-sm w-100 p-4 pt-0 pb-2"
                style="margin-left:3%;background-color:white">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('ds-bai-dang') }}" class=" text-decoration-none text-success m-3 mb-0 ">Bài đăng</a>
                    <a href="#" class="text-decoration-none fw-semibold text-dark m-3  mb-0">Theo
                        dõi</a>
                </div>
                <hr>
                <a href="" class="text-decoration-none text-dark">
                    <div class="rounded-2 d-flex p-4 pt-0 pb-3 mt-2 justify-content-between ">
                        <div class="d-flex flex-fill align-items-center">
                            <img src="{{ URL('images/default_images/user.png') }}" class="rounded-2"
                                style="width:5em;height:5em">
                            <div style="margin-left:3%;background-color:white">
                                <div class="fs-5 fw-semibold">Mất chó ở công viên Lê Thị Riêng</div>
                                <div>Lưu Hằng Nga</div>
                                <div class="d-flex text-center mt-2">
                                    <div class="rounded p-2 pt-0 pb-0" style="background-color:#D6FFFF;color:#052147 ;">Tìm
                                        đồ</div>&ensp;
                                    <div class="rounded p-2 pt-0 pb-0" style="background-color:#D6FFFF;color:#052147 ;">Balo
                                    </div>&ensp;
                                    <div class="rounded p-2 pt-0 pb-0" style="background-color:#D6FFFF;color:#052147 ;">
                                        TP.HCM</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row" style="padding-top:.3%;">
                            <div>
                                20:34
                            </div>
                            &ensp;<div>
                                07/05/2022
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
