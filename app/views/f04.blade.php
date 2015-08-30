@extends('...layouts.master')

@section('header-title')
    Trang Đăng ký
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Đăng ký</h2>
					<hr>
					<br/>


					<form class="form-horizontal">
						<p>
							Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
						</p>
						<div class="form-group">
							<label for="firstname" class="col-sm-3 control-label">Họ*</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="firstname">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">Tên*</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="lastname">
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="col-sm-3 control-label">Tên đăng nhập*</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="username">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Mật khẩu*</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="password">
							</div>
						</div>
						<div class="form-group">
							<label for="re-password" class="col-sm-3 control-label">Xác nhận mật khẩu*</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="re-password">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email*</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="email">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-3 control-label">Địa chỉ*</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="address">
							</div>
						</div>
						<div class="form-group">
							<label for="phonenumber" class="col-sm-3 control-label">Điện thoại*</label>
							<div class="col-sm-6">
								<input type="tel" class="form-control" id="phonenumber">
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
								<button type="submit" class="btn btn-primary">Đăng ký</button>
								<button type="reset" class="btn btn-default">Nhập lại</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
@stop