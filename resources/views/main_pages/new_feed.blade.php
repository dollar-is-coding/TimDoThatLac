@extends('main')
@section('main')
    <div style="padding-left:20em;padding-right:20em;">
        <div class="bg-light p-4 mt-3 mb-3 pt-3 pb-3 rounded-2">
            <form class="row d-flex justify-content-center">
                <div class="col-auto" style="width:17%">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Danh mục</option>
                        @foreach ($dsDanhMuc as $item)
                            <option class="m-3" value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:17%">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Thể Loại</option>
                        @foreach ($dsTheLoai as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:17%">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Khu vực</option>
                        @foreach ($dsKhuVuc as $item)
                            <option class="m-3" value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:35%">
                    <input type="text" placeholder="Từ khoá" class="form-control">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
        {{-- Danh sách tìm kiếm --}}
        <div class="fs-5 fw-bold" style="padding-left:.8%">Danh sách bài đăng</div>
        @foreach ($dsBaiDang as $item)
            <a href="{{ route('xem-bai-dang', ['id' => $item->id]) }}" class="text-decoration-none text-dark">
                <div class="rounded-2 bg-light d-flex p-4 pt-3 pb-3 mt-2 justify-content-between ">
                    <div class="d-flex flex-fill align-items-center">
                        <img src="{{ URL('images/avatar.jpg') }}" class="rounded-2" style="width:5em;height:5em">
                        <div style="margin-left:3%">
                            <div class="fs-5 fw-semibold">{{ $item->tieu_de }}</div>
                            <div>{{ $item->nguoiDung->ho_ten }}</div>
                            <div class="d-flex text-center mt-2">
                                <div class="rounded p-2 pt-0 pb-0" style="background-color:#EEEEEE ;">
                                    {{ $item->theLoai->ten }}</div>
                                &ensp;
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
@endsection
