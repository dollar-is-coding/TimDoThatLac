@extends('index')
@section('body')
<h1>Đăng ký</h1>
<hr>

<form action="" method="post">
  &ensp;<label for="floatingTextarea">Họ tên</label>
  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Họ">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Tên">
    </div>
  </div>
  &ensp;<label for="floatingTextarea">Số điện thoại hoặc Email</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control " placeholder="Số điện thoại hoặc Email">
  </div>
  &ensp;<label for="floatingTextarea">Mật khẩu</label>
  <div class="input-group mb-3">
    <input type="password" class="form-control" placeholder="Mật khẩu">
  </div>
  <div>
    &ensp;<label for="floatingTextarea">Ngày sinh</label>
    <div class="row mb-3">
      <div class="col">
        <select class="form-select " aria-label="Default select example">
          <?php
          echo " <option selected>Ngày sinh</option>";
          for ($i = 1; $i < 32; $i++) {
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
      <div class="col">
        <select class="form-select " aria-label="Default select example">
          <?php
          echo " <option selected>Tháng sinh</option>";
          for ($i = 1; $i < 13; $i++) {
            echo "<option value='$i'>Tháng $i</option>";
          }
          ?>
        </select>
      </div>
      <div class="col">
        <select class="form-select " aria-label="Default select example">
          <?php
          echo " <option selected>Năm sinh</option>";
          for ($i = 1905; $i < 2023; $i++) {
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div>

    &ensp;<label for="floatingTextarea">Giới tính</label>

    <div class="row mb-3">
      <div class="col">
        <div class="form-check-end form-control ">
          <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
          <label class="form-check-label " for="flexRadioDefault1">Nam</label>
        </div>
      </div>
      <div class="col">
        <div class="form-check-end form-control ">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
          <label class="form-check-label" for="flexRadioDefault1">Nữ</label>
        </div>
      </div>
      <div class="col">

        <div class="form-check-end form-control  ">
          <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
          <label class="form-check-label" for="flexRadioDefault1">Ẩn</label>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center"><button type="button" class="btn btn-success">Đăng ký</button></div>
</form>

@endsection