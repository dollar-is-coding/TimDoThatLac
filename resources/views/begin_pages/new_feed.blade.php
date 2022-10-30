@extends('index')
@section('body')
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="row mb-3">
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
                            <button class="btn btn-white dropdown rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:bold">...
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