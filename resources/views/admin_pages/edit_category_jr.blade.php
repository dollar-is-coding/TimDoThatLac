@extends('main_admin')
@section('main_admin')
<div>
    <p class="fs-5 fw-semibold">Thể loại</p>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Loại</th>
            <th> </th>
            <th> </th>
        </tr>
        @foreach($theloai as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten}}</td>
            <td>{{$item->admin == 0 ? 'Người dùng' : 'Admin'}}</td>
            <td>
                <form class="" action="{{route('xl_sua_the_loai',['id'=>$item->id])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" rows="1" name="the_loai" contenteditable="true" style="background-color:#D6FFFF" value="{{$item->ten}}" autocomplete="off">
                        <button class="btn btn-warning" type="submit">Sửa</button>
                    </div>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <form action="{{route('them_the_loai')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input class="form-control" rows="1" name="the_loai" contenteditable="true" style="background-color:#D6FFFF" value="" autocomplete="off">
            <button class="btn btn-success" type="submit">Thêm thể loại</button>
        </div>
        <div class="flex-fill" style="margin-right:1em">
            <select class="form-select" name="loai" aria-label="Default select example" style="background-color:#D6FFFF">
                <option value="1">Admin</option>
                <option value="0">Người dùng</option>
            </select>
        </div>
        @error('the_loai')
        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
        @enderror
    </form>
</div>


@endsection