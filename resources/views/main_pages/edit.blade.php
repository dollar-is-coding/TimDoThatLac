@extends('index')
@section('body')
<h3>Edit profile</h3>
<script>
        function chooseFile(fileinput){
            if(fileinput.files && fileinput.files[0] ){
                var read = new FileReader();

                read.onload = function(e){
                    $('#image').attr('src',e.target.result);
                }
                read.readAsDataURL(fileinput.files[0]);
            }
        }
    </script>
<style>
    .fa{
        
        position: relative;
        margin-top: 10px;
        width: 300px;
        height: 50px;
        background-color: rgb(14, 71, 29);
        border-radius: 10px;
        margin: 0px auto;
    }
    .la{
        position: absolute;
        font-size: 15px;
        text-align: center;
        color: white;
        width: 100%;
        height: 100%;
        top: 12px;
    }
    .in{
        font-size: 30px;
        position: absolute;
        opacity: 0;
        background-color: rgb(248, 248, 255);
        width: 100%;
        height: 100%;
    }

:hover.fa{
    background-color: brown;
}
</style>
<form>
<div class=" mb-3">
<form action="">
        <div>
        &ensp;<label  class="form-label">Ảnh đại diện</label>
            <img style="text-align: center;"class=" rounded mx-auto d-block" src="" id="image" alt="" srcset="" width="300px" height="200px" >
        </div>
        <div class="fa mt-3">
            <label class="la" for="" for="'file">Choose Image</label>
            <input class="in" type="file" onchange="chooseFile(this)" name=""  accept="image/gif, image/jpeg, image/png"  >
        </div>

    </form>
</div>
    <div class="mb-3">
    &ensp;<label  class="form-label">Họ tên</label>
        <input type="text" class="form-control">
    </div>
    <div class="mb-3">
    &ensp;<label  class="form-label">Số điện thoại</label>
        <input type="text" class="form-control">
    </div>
    <div class="mb-3">
    &ensp; <label  class="form-label">Email</label>
        <input type="email"  placeholder="name@gmail.com" class="form-control">
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
    <div class="d-flex justify-content-center"><button type="button" class="btn btn-danger">Update</button></div>
</form>
@endsection