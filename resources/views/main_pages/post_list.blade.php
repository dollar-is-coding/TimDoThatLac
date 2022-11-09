@extends('main')
@section('main')
    <div style="padding-left:10em;padding-right:10em;">
        <div class="d-flex flex-row">
            <div class="bg-light mt-3 rounded shadow-sm flex-shrink-2 p-4">
                <div class="text-center">
                    <img src="{{ URL('images/avatar.jpg') }}" class="rounded-circle" style="width:10em;height:10em">
                </div>
                <div class="fs-3 fw-bold mt-3 mb-2 text-center">{{ $user->ho_ten }}</div>
                <hr>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/circle-phone.png') }}" style="width:1.1em;height:1.1em;margin-right:.5em">
                    {{ $user->so_dien_thoai }}
                </div>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/envelope.png') }}" style="width:1em;height:1em;margin-right:.5em">
                    {{ $user->email }}
                </div>
                <div class="d-flex align-items-center mb-1">
                    <img src="{{ URL('images/calendar.png') }}" style="width:1em;height:1em;margin-right:.5em">
                    {{ date('d/m/Y', strtotime($user->ngay_sinh)) }}
                </div>
                <div class="d-flex align-items-center">
                    <img src="{{ URL('images/venus-mars.png') }}" style="width:1.1em;height:1.1em;margin-right:.5em">
                    {{ $user->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}
                </div>
                <div class="text-center mt-2">
                    <a href="{{ route('chinh-sua-tai-khoan') }}" class="btn btn-light btn-sm fw-semibold">Chỉnh sửa thông
                        tin cá nhân</a>
                </div>
            </div>
            <div class="bg-light mt-3 rounded shadow-sm w-100 p-4 pt-0" style="margin-left:3%">
                <div class="d-flex justify-content-center">
                    <a href="#" class=" text-decoration-none text-dark m-3 border-bottom border-dark mb-0">Bài
                        đăng</a>
                    <a href="{{ route('ds-theo-doi') }}" class=" text-decoration-none text-success m-3 mb-0">Theo dõi</a>
                </div>
                <hr>
                @foreach ($dsBaiDang as $item)
                    <a href="{{ route('xem-bai-dang', ['id' => $item->id]) }}" class="text-decoration-none text-dark">
                        <div class="rounded-2 bg-light d-flex p-4 pt-0 pb-3 mt-2 justify-content-between ">
                            <div class="d-flex flex-fill align-items-center">
                                <img src="{{ URL('images/avatar.jpg') }}" class="rounded-2" style="width:5em;height:5em">
                                <div style="margin-left:3%">
                                    <div class="fs-5 fw-semibold">{{ $item->tieu_de }}</div>
                                    <div>{{ $item->nguoiDung->ho_ten }}</div>
                                    <div class="d-flex text-center mt-2">
                                        @if ($item->trang_thai == 0)
                                            <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                                                {{ $item->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</div>
                                            &ensp;
                                        @else
                                            <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">
                                                {{ $item->theLoai->ten }}
                                            </div>
                                            &ensp;
                                        @endif
                                        <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">
                                            {{ $item->danhMuc->ten }}</div>
                                        &ensp;
                                        <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">
                                            {{ $item->khuVuc->ten }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row" style="padding-top:.3%;">
                                <div>
                                    {{ $item->updated_at->format('H:i') }}
                                </div>
                                &ensp;<div>
                                    {{ $item->updated_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
