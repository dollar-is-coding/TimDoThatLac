@extends('main')
@section('main')
    <div style="padding-left:20em;padding-right:20em;">
        <div class=" p-4 mt-3 mb-3 pt-3 pb-3 rounded-2  shadow-sm" style="background-color:white">
            <form class="row d-flex justify-content-center" action="{{ route('tim-kiem') }}">
                <div class="col-auto" style="width:17%">
                    <select class="form-select" name="danh_muc" aria-label="Default select example"
                        style="background-color:#D6FFFF">
                        <option selected>Danh mục</option>
                        @foreach ($dsDanhMuc as $item)
                            <option class="m-3" value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:17%">
                    <select class="form-select" name="the_loai" aria-label="Default select example"
                        style="background-color:#D6FFFF">
                        <option selected>Thể loại</option>
                        @foreach ($dsTheLoai as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:17%">
                    <select class="form-select" name="khu_vuc" aria-label="Default select example"
                        style="background-color:#D6FFFF">
                        <option selected>Khu vực</option>
                        @foreach ($dsKhuVuc as $item)
                            <option class="m-3" value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto" style="width:35%">
                    <input type="text" name="search" placeholder="Từ khoá" class="form-control"
                        style="background-color:#D6FFFF" autocomplete="off">
                </div>
                <div class="col-auto">
                    <button class="btn" style="background-color: #052147;color:white;" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <hr>
        {{-- Danh sách tìm kiếm --}}
        @if (count($dsBaiDang) > 0)
            <div class="fs-5 fw-bold" style="padding-left:.8%">Danh sách bài đăng</div>
        @else
            <div class="fs-5 fw-bold text-center" style="padding-left:.8%">Chưa có bài đăng</div>
        @endif
        @foreach ($dsBaiDang as $item)
            <a href="{{ route('xem-bai-dang', ['id' => $item->id]) }}" class="text-decoration-none text-dark">
                <div class="rounded-2 d-flex p-4 pt-3 pb-3 mt-2 mb-3 justify-content-between  shadow-sm"
                    style="background-color:white">
                    <div class="d-flex flex-fill align-items-center">
                        @if ($item->nguoiDung->admin == 0)
                            <?php
                            if ($item->nguoiDung->anh_dai_dien != '') {
                                echo '<img src="/images/added_images/' . $item->nguoiDung->anh_dai_dien . '" alt="" class="rounded-2" style="width:5em;height:5em">';
                            } elseif ($item->nguoiDung->gioi_tinh == 1) {
                                echo '<img src="/images/default_images/man.png" alt="" class="rounded-2" style="width:5em;height:5em">';
                            } else {
                                echo '<img src="/images/default_images/woman.png" alt="" class="rounded-2" style="width:5em;height:5em">';
                            }
                            ?>
                        @else
                            <img src="/images/default_images/admin.png" alt="" class="rounded-2"
                                style="width:5em;height:5em">
                        @endif
                        <div style="margin-left:3%">
                            <div class="fs-5 fw-semibold">{{ $item->tieu_de }}</div>
                            <div>{{ $item->nguoiDung->admin == 0 ? $item->nguoiDung->ho_ten : 'TimDoThatLac' }}</div>
                            <div class="d-flex text-center mt-2 ">
                                <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                                    <div> {{ $item->theLoai->ten }} </div>
                                </div>
                                @if ($item->nguoiDung->admin == 0)
                                    &ensp;
                                    <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                        style="background-color:#D6FFFF;color:#052147">
                                        <div> {{ $item->danhMuc->ten }} </div>
                                    </div>
                                    &ensp;
                                    <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                        style="background-color:#D6FFFF;color:#052147">
                                        <div> {{ $item->khuVuc->ten }} </div>
                                    </div>
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
@endsection
