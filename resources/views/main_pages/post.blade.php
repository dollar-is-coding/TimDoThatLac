@extends('main')
@section('main')
    <style type="text/css">
        .wrap {
            margin: 10% auto;
            width: 60%;
        }

        .dandev-reviews {
            position: relative;
            margin: 20px 0;
        }

        .dandev-reviews .form_upload {
            width: 320px;
            position: relative;
            padding: 5px;
            bottom: 0px;
            height: 40px;
            left: 0;
            z-index: 5;
            box-sizing: border-box;
            background: #f7f7f7;
            border-top: 1px solid #ddd;
        }

        .dandev-reviews .form_upload>label {
            height: 35px;
            /* width: 160px; */
            display: block;
            cursor: pointer;
        }

        .dandev-reviews .form_upload label span {
            padding-left: 26px;
            display: inline-block;
            background: url(images/camera.png) no-repeat;
            background-size: 23px 20px;
            margin: 5px 0 0 10px;
        }

        .list_attach {
            display: block;
            margin-top: 20px;
        }

        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* day ne */
        ul.dandev_attach_view li {
            float: left;
            width: 112px;
            margin: 0 20px 20px 0 !important;
            padding: 0 !important;
            border: 0 !important;
            overflow: inherit;
            clear: none;
        }

        ul.dandev_attach_view .img-wrap {
            position: relative;
        }

        ul.dandev_attach_view .img-wrap .close {
            position: absolute;
            right: -10px;
            top: -10px;
            background: #000;
            color: #fff !important;
            border-radius: 50%;
            z-index: 2;
            display: block;
            width: 20px;
            height: 20px;
            font-size: 16px;
            text-align: center;
            line-height: 18px;
            cursor: pointer !important;
            opacity: 1 !important;
            text-shadow: none;
        }

        ul.dandev_attach_view li.li_file_hide {
            opacity: 0;
            visibility: visible;
            width: 0 !important;
            height: 0 !important;
            overflow: hidden;
            margin: 0 !important;
        }

        ul.dandev_attach_view .img-wrap-box {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
            height: auto;
            background-position: 50% 50%;
            background-size: cover;
        }

        .img-wrap-box img {
            right: 0;
            width: 100% !important;
            height: 100% !important;
            bottom: 0;
            left: 0;
            top: 0;
            position: absolute;
            object-position: 50% 50%;
            object-fit: cover;
            transition: all .5s linear;
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            -ms-transition: all .5s linear;
        }

        ul li,
        ol li {
            list-style-position: inside;
        }

        .list_attach span.dandev_insert_attach {
            width: 112px;
            height: 112px;
            text-align: center;
            display: inline-block;
            border: 2px dashed #ccc;
            line-height: 76px;
            font-size: 25px;
            color: #ccc;
            display: none;
            cursor: pointer;
            /* float: left; */
        }

        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.dandev_attach_view .img-wrap {
            position: relative;
        }

        .list_attach.show-btn span.dandev_insert_attach {
            display: block;
            margin: 0 0 20px !important;
            padding-top: 15px;
        }

        i.dandev-plus {
            font-style: normal;
            font-weight: 900;
            font-size: 60px;
            line-height: 1;
        }

        ul.dandev_attach_view li input {
            display: none;
        }

        .m {
            padding-left: 5px;
            padding-right: 5px;
            background-color: green;
            color: white;
        }
    </style>

    <div style="padding-left:20em;padding-right:20em;" class="mb-4">
        <div class="rounded p-5 pt-3 pb-3 shadow-sm mt-3" style="background-color: white">
            <div class="fs-3 fw-semibold text-center">Đăng bài</div>
            <hr>
            <form action="{{ route('xl-dang-bai') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    &ensp;<label class="mb-1 fw-semibold">Tiêu đề</label>
                    @error('tieu_de')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <input class="form-control" rows="1" name="tieu_de" contenteditable="true"
                        style="background-color:#D6FFFF" autocomplete="off">
                    @error('tieu_de')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    &ensp;<label class="mb-1 fw-semibold">Nội dung</label>
                    @error('noi_dung')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <textarea class="form-control" rows="5" name="noi_dung" contenteditable="true" style="background-color:#D6FFFF"></textarea>
                    @error('noi_dung')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    &ensp;<label class="mb-1 fw-semibold">Địa chỉ</label>
                    @error('dia_chi')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <textarea class="form-control" rows="2" name="dia_chi" contenteditable="true" style="background-color:#D6FFFF"></textarea>
                    @error('dia_chi')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    &ensp;<label class="mb-1 fw-semibold">Liên hệ</label>
                    @error('dien_thoai')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="width:30%">
                            <span class="input-group-text" id="basic-addon1">ĐT</span>
                            <input type="number" name="dien_thoai" class="form-control" placeholder="Số điện thoại"
                                aria-label="Email" aria-describedby="basic-addon1" style="background-color:#D6FFFF"
                                autocomplete="off">
                        </div>
                        <div class="input-group" style="width:32%">
                            <span class="input-group-text" id="basic-addon1">Z</span>
                            <input type="number" name="zalo" class="form-control" placeholder="Zalo" aria-label="Email"
                                aria-describedby="basic-addon1" style="background-color:#D6FFFF" autocomplete="off">
                        </div>
                        <div class="input-group" style="width:35%">
                            <span class="input-group-text" id="basic-addon1">F</span>
                            <input type="text" name="facebook" class="form-control" placeholder="Facebook"
                                aria-label="Email" aria-describedby="basic-addon1" style="background-color:#D6FFFF"
                                autocomplete="off">
                        </div>
                    </div>
                    @error('dien_thoai')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-row mb-2">
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="mb-1 fw-semibold">Danh mục</label>
                        <select class="form-select" name="danh_muc" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($danhMuc as $item)
                                <option value="{{ $item->id }}">{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="mb-1 fw-semibold">Thể loại</label>
                        <select class="form-select" name="the_loai" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($theLoai as $item)
                                <option value="{{ $item->id }}">{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        &ensp;<label class="mb-1 fw-semibold">Khu vực</label>
                        <select class="form-select" name="khu_vuc" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @foreach ($khuVuc as $item)
                                <option value="{{ $item->id }}">{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dandev-reviews">
                    <label class="dandev_insert_attach rounded-2">
                        <span class=" d-inline-flex align-items-center">
                            &ensp;
                            <div class="fw-semibold p-2 pt-0 pb-0 rounded shadow-sm"
                                style="background-color: #052147;color:white">
                                + Thêm ảnh
                            </div>
                        </span>
                    </label>
                    @error('file[]')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                    <div class="list_attach d-flex">
                        <ul class="dandev_attach_view">
                        </ul>
                        <span class="dandev_insert_attach"><i class="dandev-plus">+</i></span>

                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary p-4 pt-1 pb-1 mt-5 mb-3">
                        Đăng
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var i = 1;
        $('.dandev_insert_attach').click(function() {
            if ($('.list_attach').hasClass('show-btn') === false) {
                $('.list_attach').addClass('show-btn');
            }
            var _lastimg = jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();
            if (_lastimg != '') {
                var d = new Date();
                var _time = d.getTime();
                var _html = '<li id="li_files_' + _time + '" class="li_file_hide" >';
                _html += '<div class="img-wrap ">';
                _html += '<span class="close" onclick="DelImg(this)">×</span>';
                _html += ' <div class="img-wrap-box"></div>';
                _html += '</div>';
                _html += '<div class="' + _time + '">';
                if (i < 6) {
                    _html +=
                        '<input type="file" class="hidden" name="file[]"  onchange="uploadImg(this)" id="files_' +
                        _time + '" multiple  />';
                } else {
                    _html += '<input type="hidden" class="hidden"  onchange="uploadImg(this)" id="files_' + _time +
                        '"  />';
                }
                _html += '</div>';
                _html += '</li>';
                jQuery('.dandev_attach_view').append(_html);
                jQuery('.dandev_attach_view li').last().find('input[type="file"]').click(i++);
                console.log(i);
            } else {
                if (_lastimg == '') {
                    jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                } else {
                    if ($('.list_attach').hasClass('show-btn') === true) {
                        $('.list_attach').removeClass('show-btn');
                    }
                }
            }
        });

        function uploadImg(el) {
            var file_data = $(el).prop('files')[0];
            var type = file_data.type;
            var fileToLoad = file_data;

            var fileReader = new FileReader();

            fileReader.onload = function(fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result;

                var newImage = document.createElement('img');
                newImage.src = srcData;
                var _li = $(el).closest('li');
                if (_li.hasClass('li_file_hide')) {
                    _li.removeClass('li_file_hide');
                }
                _li.find('.img-wrap-box').append(newImage.outerHTML);


            }
            fileReader.readAsDataURL(fileToLoad);

        }

        function DelImg(el) {
            i--;
            jQuery(el).closest('li').remove();

        }
    </script>
@endsection
