@extends('main')
@section('main')
    <script>
        function chooseFile(fileinput) {
            if (fileinput.files && fileinput.files[0]) {
                var read = new FileReader();

                read.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                read.readAsDataURL(fileinput.files[0]);
            }
        }
    </script>
    <style>
        .fa {

            position: relative;
            margin-top: 10px;
            width: 300px;
            height: 50px;
            background-color: rgb(14, 71, 29);
            border-radius: 10px;
            margin: 0px auto;
        }

        .la {
            position: absolute;
            font-size: 15px;
            text-align: center;
            color: white;
            width: 100%;
            height: 100%;
            top: 12px;
        }

        .in {
            font-size: 30px;
            position: absolute;
            opacity: 0;
            background-color: rgb(248, 248, 255);
            width: 100%;
            height: 100%;
        }

        :hover.fa {
            background-color: brown;
        }
    </style>

    <div style="padding-left:20em;padding-right:20em;">
        <div class="bg-light rounded p-5 pt-3 pb-3 shadow-sm mt-4">
            <div class="fs-3 fw-semibold text-center">Đăng bài</div>
            <hr>
            <form action="{{ route('xl-dang-bai') }}" method="POST">
                @csrf
                <div class="mb-2">
                    &ensp;<label class="form-label">Tiêu đề</label>
                    <input class="form-control" rows="1" name="tieu_de" contenteditable="true"></input>
                </div>
                <div class="mb-2">
                    &ensp;<label class="form-label">Nội dung</label>
                    <textarea class="form-control" rows="5" name="noi_dung" contenteditable="true"></textarea>
                </div>
                <div class="mb-2">
                    &ensp;<label class="form-label">Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="dia_chi" contenteditable="true"></textarea>
                </div>
                <div class="d-flex flex-row mb-2">
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="form-label">Danh mục</label>
                        <select class="form-select" name="danh_muc" aria-label="Default select example">
                            @foreach ($danhMuc as $item)
                            <option value="{{$item->id}}">{{$item->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill" style="margin-right:1em">
                        &ensp;<label class="form-label">Thể loại</label>
                        <select class="form-select" name="the_loai" aria-label="Default select example">
                            @foreach ($theLoai as $item)
                            <option value="{{$item->id}}">{{$item->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        &ensp;<label class="form-label">Khu vực</label>
                        <select class="form-select" name="khu_vuc" aria-label="Default select example">
                            @foreach ($khuVuc as $item)
                            <option value="{{$item->id}}">{{$item->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                {{-- <div class=" mb-3">
                    <form action="">
                        <div>
                            &ensp;<label class="form-label">Ảnh liên quan</label>
                            <img style="text-align: center;"class=" rounded mx-auto d-block" src="" id="image"
                                alt="" srcset="" width="300px" height="200px">
                        </div>
                        <div class="fa mt-3">
                            <label class="la" for="" for="'file">Choose Image</label>
                            <input class="in" type="file" onchange="chooseFile(this)" name=""
                                accept="image/gif, image/jpeg, image/png">
                        </div>
        
                    </form>
                </div> --}}
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary p-4 pt-1 pb-1 mt-5 mb-3">
                        Đăng
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
