@extends('index')
@section('body')
<div style="margin-top:10%">
    <div class="row g-2 d-flex justify-content-center align-items-center">
      <div class="col-6">
          <img src="{{ URL('images/default_images/timdothatlac.png') }}" style="width:38em">
          <p class="text-primary fw-bold pt-3 " style="padding-left: .4em">TimDoThatLac giúp bạn kết nối với mọi người để tìm & trả đồ thất lạc về đúng người.</p>
      </div>
      <div class="col-4 rounded-3 shadow-sm p-3" style="background-color: white">
        @yield('begin')
      </div>
    </div>
  </div>
@endsection