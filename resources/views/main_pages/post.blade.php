@extends('index')
@section('body')
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
<form action="">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="row mb-3">
                &ensp;<label class="form-label">Chọn loại</label>
                <div class="col">
                    <select class="form-select" style="width:150px" aria-label="Default select example">
                        <option selected>Danh mục</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select" style="width:150px" aria-label="Default select example">
                        <option selected>Thể Loại</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

            </div>

        </div>
    </nav>
    <div class="mb-3">
        &ensp;<label class="form-label">Nội dung</label>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
    <div class="mb-3">
        &ensp;<label class="form-label">Địa chỉ</label>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
    <div class="mb-3">
        &ensp;<label class="form-label">Khu vực</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Chọn khu vực</option>
            <option value="1">Bến Tre</option>
            <option value="2">An Giang</option>
            <option value="3">Bình Thuận</option>
        </select>
    </div>
    <div class=" mb-3">
<form action="">
        <div>
        &ensp;<label  class="form-label">Ảnh liên quan</label>
            <img style="text-align: center;"class=" rounded mx-auto d-block" src="" id="image" alt="" srcset="" width="300px" height="200px" >
        </div>
        <div class="fa mt-3">
            <label class="la" for="" for="'file">Choose Image</label>
            <input class="in" type="file" onchange="chooseFile(this)" name=""  accept="image/gif, image/jpeg, image/png"  >
        </div>

    </form>
</div>
    <div class="d-flex justify-content-center"><button type="button" class="btn btn-primary">Post</button></div>
</form>
@endsection