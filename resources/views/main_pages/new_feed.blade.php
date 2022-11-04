@extends('main')
@section('main')
{{-- <a href="{{route('dang-xuat')}}" class="btn btn-danger">Đăng Xuất</a> --}}

<div class="bg-light p-4 mt-3 mb-3 rounded-2">
    <form class="row d-flex justify-content-center" >
        <div class="col-auto" style="width:17%">
            <select class="form-select" aria-label="Default select example" aria-placeholder="Danh mục">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-auto" style="width:17%">
            <select class="form-select" aria-label="Default select example">
                <option selected>Thể Loại</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-auto" style="width:17%">
            <select class="form-select" aria-label="Default select example">
                <option selected>Khu vực</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-auto" style="width:35%">
                    <input type="text" placeholder="Từ khoá" class="form-control">
                </div>
        <div class="col-auto">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
          </div>
    </form>
</div>
<div>

    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="row">
                    <div class="col">
                        <div class="row">
                        <div class="col-1"><img src="https://img.freepik.com/premium-vector/man-profile-cartoon_18591-58482.jpg?w=360  "  alt="img" width="55px" height="55px" class="rounded-circle mr-3"></div>
                        <div class="col ">
                        <div class="col"><a href="">Dinh Đầu Moi</a></div>
                        <p>5 min</p>
                        </div>
                        </div>
                    </div>
                    <div class="col" style="  text-align: right;">
                        <div class="dropdown">
                            <button class=" btn btn-white dropdown rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:bold">...
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Follow</a></li>
                                <li><a class="dropdown-item" href="#">Report</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="media-body">

                    <p class="card-text text-justify">Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <hr>
                    <div class="row no-gutters mb-3 ">
                        <div class="text-center">
                            <img src="https://png.pngtree.com/png-clipart/20190520/original/pngtree-cartoon-hand-painted-cartoon-backpack-hand-painted-backpack-png-image_3896897.jpg" width="100%" height="100%" alt="" class="img-fluid mb-2">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection