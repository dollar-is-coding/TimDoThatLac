@extends('main')
@section('main')
    <style>
        .box-full-zoom {
            position: fixed;
            background-color: rgba(3, 5, 4, 0.8);
            width: 100%;
            height: 100%;
            display: none;
            top: 0;
        }

        .box-full-zoom article {
            width: 100%;
            height: 80%;
            margin: 0 auto;
            margin-top: 5%;
            margin-bottom: 5%;
            text-align: center;
        }

        .box-full-zoom article img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".zoomin").click(function() {
                a = this.src;
                $("#imageszoom").attr("src", a);
                $(".box-full-zoom").show();
                $(".hienthi").css("visibility", "hidden");
                $("body").css({
                    "overflow": "hidden"
                });
            });
            $(".box-full-zoom").click(function() {
                $(".box-full-zoom").hide();
                $(".hienthi").css("visibility", "visible");
                $("body").css({
                    "overflow": "visible"
                });
            });
        });
    </script>

    <section class="box-full-zoom">
        <article>
            <img src="" alt="" id="imageszoom">
        </article>
    </section>

    <div style="padding-left:20em;padding-right:20em;">
        <div class=" p-4 mt-3 mb-3 pt-3 pb-3 rounded-2 shadow-sm" style="background-color:white">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('ds-bai-dang', ['id' => $baiDang->nguoi_dung_id]) }}">
                    <?php
                    if ($baiDang->nguoiDung->anh_dai_dien != '') {
                        echo '<img src="/images/added_images/' . $baiDang->nguoiDung->anh_dai_dien . '" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                    } elseif ($baiDang->nguoiDung->gioi_tinh == 1) {
                        echo '<img src="/images/default_images/man.png" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                    } else {
                        echo '<img src="/images/default_images/woman.png" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                    }
                    ?>
                </a>
                <div class="d-flex align-content-center flex-column" style="padding-left:2%">
                    <div>
                        <a href="{{ route('ds-bai-dang', ['id' => $baiDang->nguoi_dung_id]) }}"
                            class="text-decoration-none fw-semibold"
                            style="color:black">{{ $baiDang->nguoiDung->ho_ten }}</a>
                    </div>
                    <div style="color:rgb(154, 155, 157)">{{ $baiDang->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="col" style="text-align: right;">
                    <div class="dropdown hienthi">
                        <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ URL('images/default_images/menu-dots.png') }}" class="rounded-circle"
                                style="width: 1.3em;height:1.3em">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            @if (Auth::id() == $baiDang->nguoiDung->id)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('da-tim-thay', ['id' => $baiDang->id]) }}">{{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('chinh-sua-bai-dang', ['id' => $baiDang->id]) }}">Chỉnh sửa</a>
                                </li>
                                @if ($baiDang->trang_thai == 1)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('xoa-bai-dang', ['id' => $baiDang->id]) }}">Xoá</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    @if (Auth::id() == null)
                                        <a class="dropdown-item" href="{{ route('dang-nhap') }}">Theo
                                            dõi</a>
                                    @else
                                        @if ($daTheoDoi != null)
                                            @if ($daTheoDoi->trang_thai == 1)
                                                <a class="dropdown-item"
                                                    href="{{ route('xl-bo-theo-doi', ['bai_dang_id' => $baiDang->id]) }}">Bỏ
                                                    theo dõi</a>
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ route('xl-theo-doi-lai', ['bai_dang_id' => $baiDang->id]) }}">Theo
                                                    dõi</a>
                                            @endif
                                        @else
                                            <a class="dropdown-item"
                                                href="{{ route('xl-theo-doi', ['bai_dang_id' => $baiDang->id]) }}">Theo
                                                dõi</a>
                                        @endif
                                    @endif
                                </li>
                                <li>
                                    @if (Auth::id() == null)
                                        <a class="dropdown-item" href="/dang-nhap">Báo cáo</a>
                                    @else
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            href="">Báo cáo</a>
                                    @endif
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="hienthi">
            <div class=" d-flex flex-column justify-content-between">
                <div class=" d-flex flex-column justify-content-between">
                    <div class="fs-4 fw-semibold text-justify">{{ $baiDang->tieu_de }}</div>
                    <div class="mt-2 d-flex align-items-center">
                        <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                        <div>{{ $baiDang->noi_dung }}</div>
                    </div>

                    <div class="mt-2 d-flex align-items-center">
                        <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                        <div class="fw-semibold">Địa chỉ:</div>
                        <div>&ensp;{{ $baiDang->dia_chi }}</div>
                    </div>
                    <div class="mt-2 d-flex align-items-center">
                        <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                        <div class="fw-semibold">Hình thức liên hệ </div>
                    </div>
                    <div class="d-flex justify-content-left mt-2">
                        @if ($lienHe->dien_thoai != null)
                            <div class="d-flex align-items-center">
                                &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="4%">
                                <div class="fw-semibold">&ensp;Điện thoại: </div>
                                <div>&ensp;{{ $lienHe->dien_thoai }}</div>
                            </div>
                        @endif
                        @if ($lienHe->zalo != null)
                            <div class="d-flex align-items-center">
                                &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="4%">
                                <div class="fw-semibold">&ensp;Zalo: </div>
                                <div>&ensp;{{ $lienHe->zalo }}</div>
                            </div>
                        @endif
                        @if ($lienHe->facebook != null)
                            <div class="d-flex align-items-center">
                                &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="4%">
                                <div class="fw-semibold">&ensp;Facebook:</div>
                                <div>&ensp;{{ $lienHe->facebook }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex text-center mt-4 mb-3">
                        @if ($baiDang->trang_thai == 0)
                            <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                                {{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}
                            </div>
                            &ensp;
                        @else
                            <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                                {{ $baiDang->theLoai->ten }}
                            </div>
                            &ensp;
                        @endif
                        <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                            {{ $baiDang->danhMuc->ten }}
                        </div>
                        &ensp;
                        <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                            {{ $baiDang->khuVuc->ten }}</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-between flex-wrap mt-2 mb-2">
                    @if ($soLuongHA == 2 || $soLuongHA == 4)
                        @foreach ($hinhAnh as $key => $item)
                            <div style="width:49.5%;height:30%" class="mb-2  rounded-2">
                                <img src="{{ URL("images/added_images/$item->hinh_anh") }}" class="border rounded-2 zoomin"
                                    style="object-fit:cover" width="100%" height="320px">
                            </div>
                        @endforeach
                    @else
                        @if ($soLuongHA == 1)
                            @foreach ($hinhAnh as $key => $item)
                                <div style="width:100%;height:60%" class="mb-2  rounded-2">
                                    <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                        class="border rounded-2 zoomin" style="object-fit:cover" width="100%"
                                        height="650px">
                                </div>
                            @endforeach
                        @else
                            @if ($soLuongHA == 3)
                                @foreach ($hinhAnh as $key => $item)
                                    @if ($key == 0)
                                        <div style="width:60%;height:60%" class="mb-2  rounded-2">
                                            <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                class="border rounded-2 zoomin" style="object-fit:cover" width="100%"
                                                height="647px">
                                        </div>
                                    @endif
                                @endforeach
                                <div style="width:39%;height:60%" class="d-flex flex-column">
                                    @foreach ($hinhAnh as $key => $item)
                                        @if ($key != 0)
                                            <div class="mb-2  rounded-2">
                                                <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                    class="border rounded-2 zoomin" style="object-fit:cover"
                                                    width="100%" height="320px">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                @if ($soLuongHA == 5)
                                    <div class="d-flex flex-row justify-content-between">
                                        @foreach ($hinhAnh as $key => $item)
                                            @if ($key == 0 || $key == 1)
                                                <div style="width:49.5%" class="mb-2  rounded-2">
                                                    <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                        class="border rounded-2 zoomin" style="object-fit:cover"
                                                        width="100%" height="400px">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div style="width:100%" class="d-flex flex-row justify-content-between">
                                        @foreach ($hinhAnh as $key => $item)
                                            @if ($key != 0 && $key != 1)
                                                <div style="width:32.7%" class="mb-2  rounded-2">
                                                    <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                        class="border rounded-2 zoomin" style="object-fit:cover"
                                                        width="100%" height="250px">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endif
                </div>

                @if (Auth::id() != null)
                    <div class="input-group hienthi d-flex flex-row align-items-center">

                        <?php
                        if ($user->anh_dai_dien != '') {
                            echo '<img src="/images/added_images/' . $user->anh_dai_dien . '" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px">';
                        } elseif ($user->gioi_tinh == 1) {
                            echo '<img src="/images/default_images/man.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px">';
                        } else {
                            echo '<img src="/images/default_images/woman.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px">';
                        }
                        ?>
                        <input class=" form-control rounded-5" type="text" name="" class="form-control"
                            placeholder="Bình luận ...">&ensp;
                        <div class="rounded-3" style="padding-left:5px">
                            <button class="btn btn-light pt-1 pb-1 border" type="submit" id="button-addon2"> <img
                                    src="{{ URL('images/default_images/paper-plane.png') }}"
                                    style="width:1.45em;padding-bottom:.1em">
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Hien thi chon bao cao --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Báo Cáo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Báo cáo bài viết với quản trị viên</h5>
                    Hãy cho quản trị viên biết bài viết này có vấn đề gì.
                    Chúng tôi sẽ không thông báo cho người đăng rằng bạn đã báo cáo.
                </div>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action">Tin giả</a>
                    <a class="list-group-item list-group-item-action">Nội dung không liên
                        quan</a>
                    <a class="list-group-item list-group-item-action">Vi phạm quy tắc nhóm</a>
                    <a class="list-group-item list-group-item-action">Khác . . .</a>
                    {{-- <input type="text" name="khac" placeholder="Vi phạm khác..." class="form-control"> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
@endsection
