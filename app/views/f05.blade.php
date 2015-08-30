@extends('...layouts.master-withoutsidebar')

@section('title')
    Trang Liên hệ
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">
						<div class="col-md-6">
							<h3>Bản đồ</h3>
							<hr>

							<br/>

							<img id="staticmap_img" alt="" src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=520x500&maptype=roadmap &markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318 &markers=color:red%7Clabel:C%7C40.718217,-73.998284">
						</div>

						<div class="col-md-6">
							<h3>Liên hệ</h3>
							<hr>

							<br/>

							<form class="form-horizontal">
								<p>
									Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
								</p>
								<div class="form-group">
									<label for="fullname" class="col-sm-3 control-label">Họ tên*</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="firstname">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-3 control-label">Email*</label>
									<div class="col-sm-7">
										<input type="email" class="form-control" id="email">
									</div>
								</div>
								<div class="form-group">
									<label for="phonenumber" class="col-sm-3 control-label">Điện thoại*</label>
									<div class="col-sm-7">
										<input type="tel" class="form-control" id="phonenumber">
									</div>
								</div>

								<div class="form-group">
									<label for="company" class="col-sm-3 control-label">Công ty</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="company">
									</div>
								</div>
								<div class="form-group">
									<label for="content" class="col-sm-3 control-label">Nội dung</label>
									<div class="col-sm-7">
										<textarea class="form-control" id="content" rows="7"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="capcha" class="col-sm-3 control-label">Mã bảo vệ*</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="capcha">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-12">
										<button type="submit" class="btn btn-primary">Gửi đi</button>
										<button type="reset" class="btn btn-default">Nhập lại</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					


					
				</div>
			</div>
			
		</div>
	</div>
@stop