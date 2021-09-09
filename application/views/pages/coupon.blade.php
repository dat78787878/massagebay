@extends("index")
@section("css")
<link rel="stylesheet" href="theme/frontend/scss/style_danh_muc.css">
@stop
@section("content")

    <div class="container pt-3">
        <div class="col-11 content_comment_right">
            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Nhập coupon">
        </div>
        <button type="button" class="btn btn-danger mt-2 ml-1">Xấc nhận</button>
    </div>


     <div class="row">
				<div class="col-lg-7 col-12">
					<div class="wrap-content h-100 wow fadeInUp">
						<p class="color-blues robo-b title_notes text-uppercase">Thông tin liên hệ</p>
						<form action="gui-thanh-toan" method="post" class="no-br order-form-final  wow fadeInUp" accept-charset="utf8">
							<input type="hidden" name="cus_time">
							<div class="row">
								<div class="col-sm-6 col-6  wow fadeInUp position-relative">
									<input type="text" class="form-control w-100" name="name">
									<span class="plhorder">Nhập họ tên</span>
								</div>
								<div class="col-sm-6 col-6  wow fadeInUp">
									<input type="text" class="form-control w-100" name="phone">
									<span class="plhorder">Số điện thoại liên hệ</span>
								</div>
								<div class="col-sm-6 col-6  wow fadeInUp">
									<input type="text" class="form-control w-100" name="email">
									<span class="plhorder">Email xác nhận</span>
								</div>
								<div class="col-12 mt-lg-3 mt-2">
									<div class="wrap-textarea mb30">
										<textarea name="note" class="w-100" placeholder="Yêu cầu thêm..."></textarea>
									</div>
								</div>
							</div>
							<div class="group_button_order">
								<button type="submit" class="smooth btn-main fs-14 mr-2  wow fadeInUp">Hoàn thành</button>
								<a href="thanh-toan" class="smooth btn-main fs-14 white  wow fadeInUp">Đặt lại</a>
							</div>
						</form>
					</div>
				</div>
	</div> 
@stop