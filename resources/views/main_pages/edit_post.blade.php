@extends('main')
@section('main')
    <div style="padding-left:20em;padding-right:20em;">
        <div class="rounded p-5 pt-3 pb-3 shadow-sm mt-3" style="background-color:white">
            <div class="fs-3 fw-semibold text-center">Chỉnh sửa bài đăng</div>
            <hr>
            <form action="{{ route('xl-chinh-sua-bai-dang', ['id' => $baiDang->id]) }}" method="POST">
                @csrf
                <div class="mb-2">
                    &ensp;<label class="form-label fw-semibold">Tiêu đề</label>
                    <input class="form-control" rows="1" name="tieu_de" contenteditable="true"
                        style="background-color:#D6FFFF" value="{{ $baiDang->tieu_de }}"></input>
                </div>
                <div class="mb-2">
                    &ensp;<label class="form-label  fw-semibold">Nội dung</label>
                    <textarea class="form-control" rows="5" name="noi_dung" contenteditable="true" style="background-color:#D6FFFF">{{ $baiDang->noi_dung }}</textarea>
                </div>
                <div class="mb-2">
                    &ensp;<label class="form-label fw-semibold">Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="dia_chi" contenteditable="true" style="background-color:#D6FFFF">{{ $baiDang->dia_chi }}</textarea>
                </div>
                <div class="mb-1">
                    &ensp;<label class="mb-1 fw-semibold">Liên hệ</label>
                    <div class="d-flex justify-content-between">
                        <div class="input-group mb-2" style="width:30%">
                            <span class="input-group-text" id="basic-addon1">ĐT</span>
                            <input type="text" name="dien_thoai" class="form-control" value="{{ $lienHe->dien_thoai }}"
                                placeholder="Số điện thoại" aria-label="Email" aria-describedby="basic-addon1"
                                style="background-color:#D6FFFF">
                        </div>
                        <div class="input-group mb-2" style="width:32%">
                            <span class="input-group-text" id="basic-addon1">Z</span>
                            <input type="text" name="zalo" class="form-control" value="{{ $lienHe->zalo }}"
                                placeholder="Zalo" aria-label="Email" aria-describedby="basic-addon1"
                                style="background-color:#D6FFFF">
                        </div>
                        <div class="input-group mb-2" style="width:35%">
                            <span class="input-group-text" id="basic-addon1">F</span>
                            <input type="text" name="facebook" class="form-control" value="{{ $lienHe->facebook }}"
                                placeholder="Facebook" aria-label="Email" aria-describedby="basic-addon1"
                                style="background-color:#D6FFFF">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row mb-2">
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="form-label  fw-semibold">Danh mục</label>
                        <select class="form-select" name="danh_muc" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($danhMuc as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $baiDang->danh_muc_id ? 'selected' : '' }}>
                                    {{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="form-label fw-semibold">Thể loại</label>
                        <select class="form-select" name="the_loai" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($theLoai as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $baiDang->the_loai_id ? 'selected' : '' }}>
                                    {{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        &ensp;<label class="form-label fw-semibold">Khu vực</label>
                        <select class="form-select" name="khu_vuc" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($khuVuc as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $baiDang->khu_vuc_id ? 'selected' : '' }}>
                                    {{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    @foreach ($hinhAnh as $item)
                        <div class="col-md-3">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img src="/images/added_images/{{ $item->hinh_anh }}" class="card-img-top">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary p-4 pt-1 pb-1 mt-5 mb-3">
                        Chỉnh sửa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
