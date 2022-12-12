@extends('main_admin')
@section('main_admin')
<div>
    <p class="fs-5 fw-semibold">Danh mục</p>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th> </th>
            <th> </th>
        </tr>
        @foreach($danhmuc as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten}}</td>
            <td>
                <form class="" action="{{route('xl_sua_danh_muc',['id'=>$item->id])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" rows="1" name="danh_muc" contenteditable="true" style="background-color:#D6FFFF" value="{{$item->ten}}">
                        <button class="btn btn-warning" type="submit">Sửa</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <form action="{{route('them_danh_muc')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input class="form-control" rows="1" name="danh_muc" contenteditable="true" style="background-color:#D6FFFF" value="">
            <button class="btn btn-success" type="submit">Thêm danh mục</button>
        </div>
        @error('danh_muc')
        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
        @enderror
    </form>
</div>
@endsection