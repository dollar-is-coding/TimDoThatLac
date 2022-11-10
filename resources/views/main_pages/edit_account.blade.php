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
        <div class="bg-light rounded p-5 pt-3 pb-3 shadow-sm mt-4" style="margin-left:10em;margin-right:10em;">
            <div class="fs-3 fw-semibold text-center">Chỉnh sửa tài khoản</div>
            <hr>
            <form action="{{ route('xl-chinh-sua-tai-khoan') }}" method="POST">
                @csrf
                {{-- <div class=" mb-3">
                    <form action="">
                        <div>
                            &ensp;<label class="form-label">Ảnh đại diện</label>
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
                <div class="mb-3">
                    &ensp;<label class="form-label">Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" value="{{ $user->ho_ten }}">
                </div>
                <div class="mb-3">
                    &ensp;<label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value="{{ $user->so_dien_thoai }}"
                        placeholder="Số điện thoại">
                </div>
                <div class="mb-3">
                    &ensp; <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        placeholder="name@gmail.com">
                </div>
                <div class="mb-3">
                    &ensp;<label for="floatingTextarea" class="form-label">Giới tính</label>
                    <select class="form-select mb-3" type="number" name="gioi_tinh" aria-label=".form-select-sm example">
                        <option value="1" {{ "1" == $user->gioi_tinh ? 'selected' : '' }}>Nam</option>
                        <option value="2" {{ "2" == $user->gioi_tinh ? 'selected' : '' }}>Nữ</option>

                    </select>
                </div>
                <div class="mb-5">
                    &ensp;<label for="floatingTextarea" class="form-label">Ngày sinh</label>
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-select" name="ngay" type="decimal" aria-label="Default select example">
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" {{ $i == $day ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="thang" aria-label="Default select example">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="nam" aria-label="Default select example">
                                @for ($i = 1960; $i <= 2015; $i++)
                                    <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-danger">
                        Chỉnh sửa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
