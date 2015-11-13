@extends('...layouts.master')

@section('header-title')
    Trang Lấy lại mật khẩu
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Quên mật khẩu</h2>

					<br/>


					<form class="form-horizontal">
						<p>
							Nhập email của bạn để lấy lại mật khẩu.
						</p>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email*</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Mã bảo vệ*</label>
							<div class="col-sm-2">
								<input type="password" class="form-control" id="inputPassword3">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Gửi</button>
								<button type="reset" class="btn btn-default">Nhập lại</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
@stop