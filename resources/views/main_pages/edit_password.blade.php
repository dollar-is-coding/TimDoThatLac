@extends('main')
@section('main')
    <div style="padding-left:30em;padding-right:30em" class="mb-4">
        <div class="rounded p-5 pt-3 pb-3 shadow-sm mt-3" style="background-color: white">
            <h3 class="text-center">Thay Đổi Mật Khẩu</h3>
            <hr>
            <form action="{{ route('xu-ly-thay-doi-mat-khau') }}" method="post">
                @csrf
                <div class="m-3">
                    &ensp;<label class="mb-1">Mật khẩu mới</label>
                    @error('new_password')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <div class="mb-2">
                        <input type="password" name="new_password" class="form-control" placeholder="Mật khẩu mới"
                            style="background-color:#D6FFFF" autocomplete="off">
                        @error('new_password')
                            <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="m-3">
                    &ensp;<label class="mb-1">Xác nhận mật khẩu mới</label>
                    @error('confirm_new_password')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <div class="mb-2">
                        <input type="password" name="confirm_new_password" class="form-control"
                            placeholder="Xác nhận mật khẩu mới" style="background-color:#D6FFFF" autocomplete="off">
                        @error('confirm_new_password')
                            <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="m-3">
                    &ensp;<label class="mb-1">Mật khẩu cũ</label>
                    @error('old_password')
                        <span class="fst-italic text-danger">*</span>
                    @enderror
                    <div class=" mb-2">
                        <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu cũ"
                            style="background-color:#D6FFFF" autocomplete="off">
                        @error('old_password')
                            <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if (session('error'))
                    <div class="text-center text-danger fst-italic">{{ session('error') }}</div>
                @endif
                <div class="d-flex justify-content-center mt-4 mb-4"><button type="submit" class="btn btn-success">Thay đổi
                        mật
                        khẩu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
