@extends('...layouts.master-withoutsidebar')

@section('header-title')
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

							{{-- <img id="staticmap_img" alt="" src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=520x500&maptype=roadmap &markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318 &markers=color:red%7Clabel:C%7C40.718217,-73.998284"> --}}

							<img id="staticmap_img" alt="Đia chi cua KFM tren Google Map" src="{{ $staticmap_src }}">
						</div>

						<div class="col-md-6">
							<h3>Liên hệ</h3>
							<hr>

							<br/>

							{{ Form::open(['id'=>'contact_form', 'class'=>'form-horizontal'])}}
								<p>
									Xin quý khách vui lòng nhập thông tin dưới đây để liên hệ với chúng tôi
								</p>
								{{ Form::errorField() }}
								{{ Form::successField() }}
								<div class="form-group">
									<label for="fullname" class="col-sm-3 control-label">Họ tên*</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="full_name" name="full_name">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-3 control-label">Email*</label>
									<div class="col-sm-7">
										<input type="email" class="form-control" id="email" name="email">
									</div>
								</div>
								<div class="form-group">
									<label for="phonenumber" class="col-sm-3 control-label">Điện thoại*</label>
									<div class="col-sm-7">
										<input type="tel" class="form-control" id="phone_number" name="phone_number">
									</div>
								</div>

								<div class="form-group">
									<label for="company" class="col-sm-3 control-label">Công ty*</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="company" name="company">
									</div>
								</div>
								<div class="form-group">
									<label for="content" class="col-sm-3 control-label">Nội dung*</label>
									<div class="col-sm-7">
										<textarea class="form-control" id="content" name="content" rows="7"></textarea>
									</div>
								</div>
								{{-- <div class="form-group">
									<label for="capcha" class="col-sm-3 control-label">Mã bảo vệ*</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="capcha">
									</div>
								</div> --}}
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-12">
										<button type="submit" class="btn btn-primary">Gửi đi</button>
										<button type="reset" class="btn btn-default">Nhập lại</button>
									</div>
								</div>

							{{ Form::close() }}
						</div>
					</div>
					


					
				</div>
			</div>
			
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript">

		var contact_form = $('#contact_form');

		function xhrInsert_item( _formInsert, _url) {
		    _formInsert.submit(function(e) {
		        e.preventDefault();

		        var form = $(this);

		        var url = _url;
		        var method = 'POST';
		        var data = form.serializeArray();
		        
		        var isSuccess = false;
		        var loading = form.find('.loading');
		        var done = form.find('.done');
		        var errorField = form.find('.errors');
		        var successField = form.find('.success');
		        var btnSubmit = form.find('.btnSubmit');

		        $.ajax({
                    url : url,
                    type: method,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        loading.fadeIn();
                        done.hide();
                        btnSubmit.prop('disabled', true);
                        errorField.html('');
                        successField.html('');
                    },
                    success: function( json ) {

                        isSuccess = true;

						var successHtml = '<div class="alert alert-success">Chúng tôi đã nhận được thông tin liên hệ của bạn. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn!</div>';

                        successField.html( successHtml );

                        form[0].reset(); //clear form
                        
                    },
                    error :function( jqXhr ) {
                        //process validation errors here.
                        var errors = jqXhr.responseJSON; //this will get the errors response data.
                        //show them somewhere in the markup
                        //e.g
                        var errorsHtml = '<div class="alert alert-danger"><ul class="list-unstyled">';

                        $.each( errors , function( key, value ) {
                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.

                        });
                        errorsHtml += '</ul></div>';

                        errorField.html( errorsHtml );
                    },
                    complete: function() {
                        loading.hide();
                        done.show();
                        btnSubmit.prop('disabled', false); //enable button
                    }
                }); 
		                       
		    });
		}

		$(document).ready(function() {
			xhrInsert_item( contact_form, "{{ route('contact.store') }}" );
		});
	</script>
@stop