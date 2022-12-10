@extends('main_admin')
@section('main_admin')
<div>
    <div class="rounded p-5 pt-3 pb-3 shadow-sm mt-3" style="background-color:white">
        <div class="fs-3 fw-semibold text-center">Chỉnh sửa bài đăng admin</div>
        <hr>
        <form action="{{ route('xl-chinh-sua-bai-dang-admin', ['id' => $baiDang->id]) }}" method="POST">
            @csrf
            <div class="mb-2">
                &ensp;<label class="form-label fw-semibold">Tiêu đề</label>
                @error('tieu_de')
                <span class="fst-italic text-danger">*</span>
                @enderror
                <input class="form-control" rows="1" name="tieu_de" contenteditable="true" style="background-color:#D6FFFF" value="{{$baiDang->tieu_de}}" autocomplete="off">
                @error('tieu_de')
                <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                &ensp;<label class="form-label  fw-semibold">Nội dung</label>
                @error('noi_dung')
                <span class="fst-italic text-danger">*</span>
                @enderror
                <textarea class="form-control" rows="5" name="noi_dung" contenteditable="true" style="background-color:#D6FFFF">{{$baiDang->noi_dung}}</textarea>
                @error('noi_dung')
                <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-fill" style="margin-right:1em">
                &ensp;<label class="form-label fw-semibold">Thể loại</label>
                <select class="form-select" name="the_loai" aria-label="Default select example" style="background-color:#D6FFFF">
                    @foreach ($theLoai as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $baiDang->the_loai_id ? 'selected' : '' }}>
                        {{ $item->ten }}
                    </option>
                    @endforeach
                </select>
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