@extends('...layouts.master')

@section('title')
    Đặt câu hỏi
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">
						<div class="col-md-12">
							<h3>Đặt Câu Hỏi</h3>
							<hr>

							<br/>

							{{ Form::open(['id'=>'faq_form'])}}
								<p>
									Xin vui lòng điền thông tin vào mẫu bên dưới để gửi những thông tin của bạn cho chúng tôi (*) là những thông tin bắt buộc.
								</p>
								{{ Form::errorField() }}
								{{ Form::successField() }}
								{{ Form::textField('title', 'Tiêu đề*', null) }}
								{{ Form::textField('full_name', 'Họ tên*', null) }}
								{{ Form::textField('address', 'Địa chỉ', null) }}
								{{ Form::textField('company', 'Công ty', null) }}
								{{ Form::textField('competence', 'Chức vụ', null) }}
								{{ Form::textField('phone_number', 'Số điện thoại', null) }}
								{{ Form::textField('email', 'Email ', null) }}
								{{ Form::textareaField('content', 'Câu hỏi*', null) }}
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Gửi đi</button>
									<button type="reset" class="btn btn-default">Nhập lại</button>
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

		var faq_form = $('#faq_form');

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

						var successHtml = '<div class="alert alert-success">Câu hỏi của bạn đã được ghi nhận</div>';

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
			xhrInsert_item( faq_form, "{{ route('f08.sendQuestion') }}" );
		});
	</script>
@stop