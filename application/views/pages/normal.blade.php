@extends("index")
@section("css")
<link rel="stylesheet" href="theme/frontend/scss/style_danh_muc.css">
@stop
@section("content")

        <div class="col-12 col-sm-12 col-md-5 text-center pt-3" style="margin:0 auto;">
            <p class="fs-5">Quảng bá spa Việt Nam</p>
            <p class="fs-5">Địa chỉ: {[ADDRESS]}</p>
            <p class="fs-5">Tel:  {[TEL]}   Mobile: {[MOBILE]}</p>
            <p class="fs-5">Email: {[EMAIL]}</p>
            <p class="fs-5">Web khách sạn: {[WEB]}</p>
            <p class="fs-5">Web VietNam hotel: {[WEB]}</p>
            <p class="fs-5">Đối tác khách sạn</p>
        </div>
@stop