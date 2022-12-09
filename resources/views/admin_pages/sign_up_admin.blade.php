@extends('main_admin')
@section('main_admin')
    <h3 class="text-center">Đăng ký - Admin</h3>
    <hr>
    <form action="{{ route('xl-dang-ky-admin') }}" method="post">
        @csrf
        <div class="m-2">
            &ensp;<label class="mb-1">Họ tên</label>
            @error('ho_ten')
                <span class="fst-italic text-danger">*</span>
            @enderror
            <div class=" mb-2">
                <input type="text" name="ho_ten" class="form-control" placeholder="Họ tên" style="background-color:#D6FFFF"
                    autocomplete="off">
                @error('ho_ten')
                    <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="m-2">
            &ensp;<label class="mb-1">Email</label>
            @error('email')
                <span class="fst-italic text-danger">*</span>
            @enderror
            <div class="mb-2">
                <input type="email" name="email" class="form-control" placeholder="Email"
                    style="background-color:#D6FFFF" autocomplete="off">
                @error('email')
                    <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="m-2">
            &ensp;<label class="mb-1">Mật khẩu</label>
            @error('password')
                <span class="fst-italic text-danger">*</span>
            @enderror
            <div class="mb-2">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                    style="background-color:#D6FFFF">
                @error('password')
                    <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="m-2">
            &ensp;<label class="mb-1">Xác nhận mật khẩu</label>
            @error('confirm_password')
                <span class="fst-italic text-danger">*</span>
            @enderror
            <div class="mb-2">
                <input type="password" name="confirm_password" class="form-control" placeholder="Mật khẩu"
                    style="background-color:#D6FFFF">
                @error('confirm_password')
                    <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="m-2">
            &ensp;<label class="mb-1">Giới tính</label>
            <div class="input-group mb-2">
                <select class="form-select" name="gioi_tinh" aria-label=".form-select-sm example"
                    style="background-color:#D6FFFF">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
        </div>
        <div class="m-2">
            <div class="d-flex flex-row">
                <div class="input-group mb-2 d-flex flex-column" style="margin-right: .5em">
                    <div class="mb-1">&ensp;Ngày</div>
                    <div>
                        <select class="form-select" name="ngay" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="input-group mb-2 d-flex flex-column" style="margin-right: .5em">
                    <div class="mb-1">&ensp;Tháng</div>
                    <div>
                        <select class="form-select" name="thang" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="input-group mb-2 d-flex flex-column">
                    <div class="mb-1">&ensp;Năm</div>
                    <div>
                        <select class="form-select" name="nam" aria-label="Default select example"
                            style="background-color:#D6FFFF">
                            @for ($i = 1960; $i <= 2010; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4"><button type="submit" class="btn btn-success">Đăng ký</button>
        </div>
    </form>
@endsection