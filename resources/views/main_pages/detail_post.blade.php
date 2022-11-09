@extends('main')
@section('main')
    <div style="padding-left:20em;padding-right:20em;">
        <div class="bg-light p-4 mt-3 mb-3 pt-3 pb-3 rounded-2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <a href="">
                    <img src="{{ URL('images/avatar.jpg') }}" alt="img" width="50px" height="50px"
                        class="rounded-circle mr-3">
                </a>
                <div class="d-flex align-content-center flex-column" style="padding-left:2%">
                    <div>
                        <a href="" class="text-decoration-none fw-semibold"
                            style="color:black">{{ $baiDang->nguoiDung->ho_ten }}</a>
                    </div>
                    <div style="color:rgb(154, 155, 157)">{{ $baiDang->created_at->format('d/m/Y') }}</div>
                </div>
                @if ($baiDang->trang_thai == 1)
                    <div class="col" style="text-align: right;">
                        <div class="dropdown">
                            <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ URL('images/detail.png') }}" class="rounded-circle"
                                    style="width: 2.3em;height:2.3em">
                            </button>
                            <ul class="dropdown-menu">
                                @if (Auth::id() == $baiDang->nguoiDung->id)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('da-tim-thay', ['id' => $baiDang->id]) }}">{{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('chinh-sua-bai-dang', ['id' => $baiDang->id]) }}">Chỉnh sửa</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('xoa-bai-dang', ['id' => $baiDang->id]) }}">Xoá</a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item" href="{{ Auth::id() == null ? '/dang-nhap' : '' }}">Theo
                                            dõi</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ Auth::id() == null ? '/dang-nhap' : '' }}">Báo
                                            cáo</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col" style="text-align: right;opacity:.3">
                        <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ URL('images/detail.png') }}" class="rounded-circle"
                                style="width: 2.3em;height:2.3em">
                        </button>
                    </div>
                @endif
            </div>
            <hr>
            <div class=" d-flex flex-column justify-content-between">
                <div class="fs-4 fw-semibold text-justify">{{ $baiDang->tieu_de }}</div>
                <div class="d-flex text-center mt-2">
                    @if ($baiDang->trang_thai == 0)
                        <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                            {{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</div>
                        &ensp;
                    @else
                        <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">{{ $baiDang->theLoai->ten }}
                        </div>
                        &ensp;
                    @endif
                    <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">{{ $baiDang->danhMuc->ten }}
                    </div>
                    &ensp;
                    <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">{{ $baiDang->khuVuc->ten }}</div>
                </div>
                <div class="mt-2">{{ $baiDang->noi_dung }}</div>
                <div class="mt-2 mb-2">Địa chỉ: {{ $baiDang->dia_chi }}</div>
            </div>
            <div class="mt-3 mb-3">
                <img src="https://i.pinimg.com/236x/48/8c/3d/488c3d2ff60ce74dff843d578b2a615d.jpg" width="100%"
                    height="100%" alt="" class="img-fluid rounded">
            </div>
            @if (Auth::id() != null)
                <div class="input-group">
                    <input class=" form-control rounded-5" type="text" name="" class="form-control"
                        placeholder="Bình luận ...">&ensp;
                    <div class="rounded-3" style="padding-left:10px">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"> <img
                                src="{{ URL('images/send.png') }}" style="width:1.45em;"> </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
