@extends('begin')
@section('begin')
<h3 class="text-center">Đăng ký</h3>
<hr>
<script>
   function hoten(){
    var a =document.getElementById('ho').value;
    var b = document.getElementById('ten').value;
    var n = document.getElementById('ngay').value;
    var t = document.getElementById('thang').value;
    var na = document.getElementById('nam').value;
    var c = a+" "+b;
    var y = na +"/"+t+"/"+n;
    document.getElementById('hoten').value = c;
    document.getElementById('ngaysinh').value = y;
   }
</script>
<form action="" method="post">
    &ensp;<label for="floatingTextarea">Họ tên</label>
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="ho" class="form-control" placeholder="Họ" id="ho">
        </div>
        <div class="col">
            <input type="text" name="ten" class="form-control" placeholder="Tên" id="ten">
        </div>
        <div>
            <input type="text" id="hoten" name="ho_ten" class="form-control" hidden>
        </div>
    </div>
    &ensp;<label for="floatingTextarea">Email</label>
    <div class="input-group mb-2">
        <input type="email" name="email" class="form-control " placeholder="Email">
    </div>
    &ensp;<label for="floatingTextarea">Mật khẩu</label>
    <div class="input-group mb-2">
        <input type="password" name="mat_khau" class="form-control" placeholder="Mật khẩu">
    </div>
    <div>
        &ensp;<label for="floatingTextarea">Giới tính</label>
        <select class="form-select mb-3" name="gioi_tinh" aria-label=".form-select-sm example">
            <option selected>Chọn giới tính</option>
            <option value="1">Nam</option>
            <option value="2">Nữ</option>
            <option value="3">Ẩn</option>
        </select>
    </div>
    <div>
        &ensp;<label for="floatingTextarea">Ngày sinh</label>
        <div class="row mb-2">
            <div class="col">
                <select class="form-select" name="ngay" id="ngay" aria-label="Default select example">
                    <?php
                    echo " <option selected>Ngày</option>";
                    for ($i = 1; $i < 32; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select " name="thang" id="thang" aria-label="Default select example">
                    <?php
                    echo " <option selected>Tháng</option>";
                    for ($i = 1; $i < 13; $i++) {
                        echo "<option value='$i'>Tháng $i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" name="nam" id="nam" aria-label="Default select example">
                    <?php
                    echo " <option selected>Năm</option>";
                    for ($i = 1905; $i < 2023; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <input type="text" name="ngay_sinh" id="ngaysinh" class="form-control" placeholder="Tên" hidden>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4"><button onclick="hoten()" type="button" class="btn btn-success">Đăng ký</button></div>
</form>

@endsection