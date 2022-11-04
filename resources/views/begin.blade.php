@extends('index')
@section('body')
<div style="margin-top:10%">
    <div class="row g-2 d-flex justify-content-center align-items-center">
      <div class="col-6">
          <img src="{{ URL('images/timdothatlac.png') }}" style="width:35em">
          <p class="text-primary fw-bold pt-3">TimDoThatLac giúp bạn kết nối với mọi người để tìm & trả đồ thất lạc về đúng người.</p>
      </div>
      <div class="col-4 bg-light rounded shadow p-3">
        @yield('begin')
      </div>
    </div>
  </div>
@endsection