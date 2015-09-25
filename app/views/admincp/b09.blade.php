@extends('admincp.layouts_admincp.master')

@section('title')
	Cài đặt
@stop

@section('content')

	<div class="fluid">
		
		<div class="widget grid12">
			<div class="widget-header">
				<div class="widget-title">
					<i class="fa fa-pencil"></i> Cài đặt thông tin
				</div>
				<div class="widget-controls">
					{{-- <div class="badge msg-badge">34</div> --}}
				</div>
			</div> <!-- /widget-header -->
			
			<div class="widget-content pad20f">
			{{ Form::open(['id'=> 'form_e_settings']) }}
				<div class="row">
					<div class="col-md-6">
                		{{ Form::textField('logo', 'Hình Logo', null) }}
                		{{ Form::textField('company', 'Tên công ty', null) }}
	                    {{ Form::textField('sologan', 'Sologan', null) }}
	                    {{ Form::emailField('email', 'Email', null) }}
	                    {{ Form::textField('phone_number', 'Số điện thoại', null) }}
	                    
                	</div>
                	<div class="col-md-6">
                		{{ Form::textField('map_position', 'Địa chỉ map', null) }}
                	</div>
                	<div class="col-md-12" align="center">
                		<button class="btn btn-blue" type="submit">Cập nhật</button>
                	</div>
				</div>
			{{ Form::close() }}
			</div> <!-- /widget-content -->


		</div> <!-- /widget -->

		<div class="fluid">
			<div class="widget grid12">
				<div class="widget-header">
					<div class="widget-title">
						<i class="fa fa-check-circle"></i> Chỉnh sửa Slide
					</div>
					<div class="widget-controls">
						<input type="checkbox" id="switch-form" />
  						<label class="switch" for="switch-form"><i></i></label>
					</div>
				</div> <!-- /widget-header -->
				
				<div class="widget-content pad20 w-switches">
					{{ Form::open(['id'=> 'form_e_slides']) }}
					<div class="row">
						<div class="col-md-12">
	                		{{ Form::textField('slide_images', 'Slide', null) }}
	                	</div>

	                	<div class="col-md-12" align="center">
	                		<button class="btn btn-blue" type="submit">Cập nhật</button>
	                	</div>
					</div>
					{{ Form::close() }}
				</div> <!-- /widget-content -->

			</div> <!-- /widget -->
			
		</div> <!-- /fluid -->
	</div>
@stop

@section('scripts')
    <script type="text/javascript">

        var dataTable = $("#datatable");
        var form_a_item = $('#form_a_item');
        var form_e_item = $('#form_e_item');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_a_item = $('#modal_a_item');
        var modal_e_item = $('#modal_e_item');


        $(document).ready(function() {
            xhrUpdate_item( form_e_item, "{{ route('admincp.b09.update') }}" );
        });
    </script>

@stop