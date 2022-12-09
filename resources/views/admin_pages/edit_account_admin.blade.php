@extends('main_admin')
@section('main_admin')
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
        .ongnoi {
            padding-top: 20px;
            width: 400px;
            height: 250px;
            position: relative;
            margin: 0px auto;
        }

        .cha {
            width: 200px;
            position: relative;
            height: 200px;
            margin: 0px auto;
            border-radius: 100px;
        }

        .con1 {
            width: 200px;
            height: 200px;
            position: absolute;
            border-radius: 100px;
        }

        .cha:hover {
            opacity: 0.8;

        }

        .con2 {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 100px;
        }

        .chau1 {
            position: absolute;
            border-radius: 100px;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
    <div style="">
        <div class=" rounded-3 p-5 pt-3 pb-1 shadow-sm mt-4 mb-3"
            style="margin-left:10em;margin-right:10em;background-color:white">
            <div class="fs-3 fw-semibold text-center">Chỉnh sửa tài khoản admin</div>
            <hr>
            <form action="{{ route('xl-chinh-sua-tai-khoan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ongnoi">
                    <div class="cha">
                        <div class="con1">
                            <img class="ca border rounded-circle" id="image" alt="" srcset=""
                                src="
                        <?php
                        if ($user->anh_dai_dien != '') {
                            echo "images/added_images/$user->anh_dai_dien";
                        } elseif ($user->gioi_tinh == 1) {
                            echo 'images/default_images/man.png';
                        } else {
                            echo 'images/default_images/woman.png';
                        }
                        ?>
                        
                        "
                                width="200px" height="200px" style="object-fit:cover">
                        </div>
                        <div class="con2">
                            <label for="file"></label>
                            <input class="chau1" type="file" value="" onchange="chooseFile(this)" name="file"
                                accept="image/gif, image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    &ensp;<label class="form-label">Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" value="{{ $user->ho_ten }}"
                        style="background-color:#D6FFFF" autocomplete="off">
                </div>
                <div class="mb-3">
                    &ensp; <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        placeholder="name@gmail.com" style="background-color:#D6FFFF" autocomplete="off">
                </div>
                <div class="mb-3">
                    &ensp;<label for="floatingTextarea" class="form-label">Giới tính</label>
                    <select class="form-select mb-3" type="number" name="gioi_tinh" aria-label=".form-select-sm example"
                        style="background-color:#D6FFFF">
                        <option value="1" {{ '1' == $user->gioi_tinh ? 'selected' : '' }}>Nam</option>
                        <option value="2" {{ '2' == $user->gioi_tinh ? 'selected' : '' }}>Nữ</option>

                    </select>
                </div>
                <div class="mb-5">
                    &ensp;<label for="floatingTextarea" class="form-label">Ngày sinh</label>
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-select" name="ngay" type="decimal" aria-label="Default select example"
                                style="background-color:#D6FFFF">
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" {{ $i == $day ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="thang" aria-label="Default select example"
                                style="background-color:#D6FFFF">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="nam" aria-label="Default select example"
                                style="background-color:#D6FFFF">
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