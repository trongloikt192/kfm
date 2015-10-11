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
						{{ Form::hidden('id')}}
                		{{ Form::textField('logo', 'Hình Logo', null) }}
                		{{ Form::textField('company', 'Tên công ty', null) }}
	                    {{ Form::textField('sologan', 'Sologan', null) }}
	                    {{ Form::emailField('email', 'Email', null) }}
	                    {{ Form::textField('phone_number', 'Số điện thoại', null) }}
	                    {{ Form::textareaField('address', 'Địa chỉ', null) }}
	                    
                	</div>
                	<div class="col-md-6">
                		<div class="form-group ">
	                		<label class="control-label">Địa chỉ map</label>
	                		{{ Form::hidden('latitude', $map->latitude) }}
            				{{ Form::hidden('longitude', $map->longitude) }}
	                		<div>
	                			{{ HTML::image($staticmap_src, null, ['id'=>'map_position'])}}
	                		</div>
	                		{{ Form::button('<i class="fa fa-pencil"></i> Sửa vị trí', ['id'=>'btnEdit_map']) }}
	                	</div>
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
	                		<div class="form-group">
                                <label class='control-label' for='status'>Slide 1</label>
                                <div id="sizeBox">
	                                <img id="picBox_slide1" name="image" alt="slide 1" src="{{ image_url('setting', $slides->slide_1) }}" class="img-responsive img-thumbnail" style="max-width: 705px; max-height: 255px;" />
	                            </div>
                                <button id="btnUpload_slide1" type="button" class="btn btn-blue" data-id="">
                                    <i class='fa fa-upload'></i>
                                    Cập nhật slide 1
                                </button>
                                <div id="progressOuter_slide1" class="progress progress-striped active" style="display:none;">
                                    <div id="progressBar_slide1" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                                <p id="msgBox_slide1" class="help-block"></p>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class='control-label' for='status'>Slide 2</label>
                                <div id="sizeBox">
	                                <img id="picBox_slide2" name="image" alt="slide 2" src="{{ image_url('setting', $slides->slide_2) }}" class="img-responsive img-thumbnail" style="max-width: 705px; max-height: 255px;" />
	                            </div>
                                <button id="btnUpload_slide2" type="button" class="btn btn-blue" data-id="">
                                    <i class='fa fa-upload'></i>
                                    Cập nhật slide 2
                                </button>
                                <div id="progressOuter_slide2" class="progress progress-striped active" style="display:none;">
                                    <div id="progressBar_slide2" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                                <p id="msgBox_slide2" class="help-block"></p>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class='control-label' for='status'>Slide 3</label>
                                <div id="sizeBox">
	                                <img id="picBox_slide3" name="image" alt="slide 3" src="{{ image_url('setting', $slides->slide_3) }}" class="img-responsive img-thumbnail" style="max-width: 705px; max-height: 255px;" />
	                            </div>
                                <button id="btnUpload_slide3" type="button" class="btn btn-blue" data-id="">
                                    <i class='fa fa-upload'></i>
                                    Cập nhật slide 3
                                </button>
                                <div id="progressOuter_slide3" class="progress progress-striped active" style="display:none;">
                                    <div id="progressBar_slide3" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                                <p id="msgBox_slide3" class="help-block"></p>
                            </div>
                            <hr>

	                	</div>

	                	<div class="col-md-12" align="center">
	                		{{-- <button class="btn btn-blue" type="submit">Cập nhật</button> --}}
	                	</div>
					</div>
					{{ Form::close() }}
				</div> <!-- /widget-content -->

			</div> <!-- /widget -->
			
		</div> <!-- /fluid -->
	</div>

@stop

@section('modal')
    <div class="modal fade" id="modal_e_map">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Chỉnh sửa vị trí công ty trên bản đồ Gmap</h4>
                </div>

                {{ Form::open(['id'=> 'form_e_map']) }}
                <div class="modal-body">
                	{{ Form::hidden('latitude') }}
            		{{ Form::hidden('longitude') }}
            		<div id="map_container" style="height: 400px;"></div>
                </div>
                <div class="modal-footer">
                    {{ Form::btnSubmit('Đồng ý') }}
                    <button type="button" class="btn btn-red" data-dismiss="modal">Hủy</button>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div><!-- /modal add New -->


@stop

@section('scripts')
	{{ HTML::script('plugins/Simple-Ajax-Uploader/SimpleAjaxUploader.min.js') }}

    <script type="text/javascript">

        var form_e_settings = $('#form_e_settings');
        var form_e_map = $('#form_e_map');
        var btnEdit_map = $('#btnEdit_map');
        var modal_e_map = $('#modal_e_map');

	    var xhrGetOM_edit_map = function() {
	        // Get du lieu truoc khi Open Modal
	        var input_ulat = $('input[name=latitude]', form_e_map);
	        var input_ulong = $('input[name=longitude]', form_e_map);

	        ///////// MAP GOOGLE /////
	        google.maps.event.addDomListener(window, 'load', function() {
	            btnEdit_map.on("click", function(){
	                modal_e_map.modal("show");

	                var LAT = $('input[name=latitude]', form_e_settings).val();
	                var LNG = $('input[name=longitude]', form_e_settings).val();

	                input_ulat.val(LAT);
	                input_ulong.val(LNG);

	                setTimeout(function() {
	                	var user_position = new google.maps.LatLng(LAT, LNG);

		                var mapOptions = {
		                    zoom: 15,
		                    center: user_position
		                };

		                var map = new google.maps.Map(document.getElementById('map_container'), mapOptions);

		                var marker = new google.maps.Marker({
		                    map: map,
		                    draggable: true,
		                    animation: google.maps.Animation.DROP,
		                    position: user_position
		                    // icon: URL + "public/assets/img/map-marker.png"
		                });

		                google.maps.event.addListener(marker, 'dragend', function (event) {
		                    input_ulat.val( this.getPosition().lat() );
		                    input_ulong.val( this.getPosition().lng() );
		                });
		            
	                }, 1000);
	                
	                return false;
	            });

	        });

	    }


	    var updateMap = function() {
	    	form_e_map.on('submit', function(e) {
	    		e.preventDefault();

	    		var data = $(this).serializeJSON();

	    		var input_ulat = $('input[name=latitude]', form_e_settings);
	        	var input_ulong = $('input[name=longitude]', form_e_settings);

	        	input_ulat.val(data.latitude);
	        	input_ulong.val(data.longitude);

	        	var staticmap_str = '{{ $staticmap_str }}';
	        	var staticmap_src = staticmap_str.replace(":user_lat", data.latitude);
            	staticmap_src = staticmap_src.replace(":user_long", data.longitude);

	        	$('#map_position').prop('src', staticmap_src);

	        	modal_e_map.modal('hide');

	        	return false;
	    	});
	    }


	    var image_dir = '{{ image_url("setting") }}';
	    function xhrUploadImage1() {
            
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b09.uploadImage") }}';
            var _data = {
                '_token': _token, 
                'id': 0
            };
            
            var btnUpload = document.getElementById('btnUpload_slide1'),
                progressBar = document.getElementById('progressBar_slide1'),
                progressOuter = document.getElementById('progressOuter_slide1'),
                msgBox = document.getElementById('msgBox_slide1'),
                picBox = document.getElementById('picBox_slide1'),
                drgbox = document.getElementById('btnUpload_slide1');
            
            
            var uploader = new ss.SimpleUpload({
                dropzone: drgbox,
                button: btnUpload,
                url: _url,
                name: 'image',
                data: _data,
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                hoverClass: 'hover',
                focusClass: 'focus',
                maxSize: 5120, // kilobytes
                responseType: 'json',
                debug: true, // Debug
                onChange: function() {
                    _data.id = 'slide_1';
                },
                onSizeError: function( filename, fileSize ) {
                    msgBox.innerHTML = 'Kích thước file ('+(fileSize/1024).toFixed(2)+'MB) vượt quá dung lượng cho phép (5MB)';
                },
                onExtError: function() {
                    msgBox.innerHTML = 'Invalid file type. Please select a PNG, JPG, GIF image.';
                },
                startXHR: function() {
                    progressOuter.style.display = 'block'; // make progress bar visible
                    this.setProgressBar(progressBar);
                },
                onSubmit: function() {
                    msgBox.innerHTML = ''; // empty the message box
                },
                onComplete: function(filename, response) {
                    progressOuter.style.display = 'none'; // hide progress bar when upload is completed
            
                    if (!response) {
                        msgBox.innerHTML = 'Không thể tải hình';
                        return;
                    }
            
                    if (response.success === true) {
                        msgBox.innerHTML = '<strong>' + filename + '</strong>' + ' thay đổi thành công.';
                        $("#picBox_slide1").attr('src', image_dir + '/' + response.source);
                    }
                    else {
                        if (response.msg) {
                            msgBox.innerHTML = response.msg;
                        }
                        else {
                            msgBox.innerHTML = 'Có lỗi xảy ra trong quá trình tải hình';
                        }
                    }
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Không thể tải hình';
                }
            });
            
        }

        function xhrUploadImage2() {
            
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b09.uploadImage") }}';
            var _data = {
                '_token': _token, 
                'id': 0
            };
            
            var btnUpload = document.getElementById('btnUpload_slide2'),
                progressBar = document.getElementById('progressBar_slide2'),
                progressOuter = document.getElementById('progressOuter_slide2'),
                msgBox = document.getElementById('msgBox_slide2'),
                picBox = document.getElementById('picBox_slide2'),
                drgbox = document.getElementById('btnUpload_slide2');
            
            
            var uploader = new ss.SimpleUpload({
                dropzone: drgbox,
                button: btnUpload,
                url: _url,
                name: 'image',
                data: _data,
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                hoverClass: 'hover',
                focusClass: 'focus',
                maxSize: 5120, // kilobytes
                responseType: 'json',
                debug: true, // Debug
                onChange: function() {
                    _data.id = 'slide_2';
                },
                onSizeError: function( filename, fileSize ) {
                    msgBox.innerHTML = 'Kích thước file ('+(fileSize/1024).toFixed(2)+'MB) vượt quá dung lượng cho phép (5MB)';
                },
                onExtError: function() {
                    msgBox.innerHTML = 'Invalid file type. Please select a PNG, JPG, GIF image.';
                },
                startXHR: function() {
                    progressOuter.style.display = 'block'; // make progress bar visible
                    this.setProgressBar(progressBar);
                },
                onSubmit: function() {
                    msgBox.innerHTML = ''; // empty the message box
                },
                onComplete: function(filename, response) {
                    progressOuter.style.display = 'none'; // hide progress bar when upload is completed
            
                    if (!response) {
                        msgBox.innerHTML = 'Không thể tải hình';
                        return;
                    }
            
                    if (response.success === true) {
                        msgBox.innerHTML = '<strong>' + filename + '</strong>' + ' thay đổi thành công.';
                        $("#picBox_slide2").attr('src', image_dir + '/' + response.source);
                    }
                    else {
                        if (response.msg) {
                            msgBox.innerHTML = response.msg;
                        }
                        else {
                            msgBox.innerHTML = 'Có lỗi xảy ra trong quá trình tải hình';
                        }
                    }
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Không thể tải hình';
                }
            });
            
        }

        function xhrUploadImage3() {
            
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b09.uploadImage") }}';
            var _data = {
                '_token': _token, 
                'id': 0
            };
            
            var btnUpload = document.getElementById('btnUpload_slide3'),
                progressBar = document.getElementById('progressBar_slide3'),
                progressOuter = document.getElementById('progressOuter_slide3'),
                msgBox = document.getElementById('msgBox_slide3'),
                picBox = document.getElementById('picBox_slide3'),
                drgbox = document.getElementById('btnUpload_slide3');
            
            
            var uploader = new ss.SimpleUpload({
                dropzone: drgbox,
                button: btnUpload,
                url: _url,
                name: 'image',
                data: _data,
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                hoverClass: 'hover',
                focusClass: 'focus',
                maxSize: 5120, // kilobytes
                responseType: 'json',
                debug: true, // Debug
                onChange: function() {
                    _data.id = 'slide_3';
                },
                onSizeError: function( filename, fileSize ) {
                    msgBox.innerHTML = 'Kích thước file ('+(fileSize/1024).toFixed(2)+'MB) vượt quá dung lượng cho phép (5MB)';
                },
                onExtError: function() {
                    msgBox.innerHTML = 'Invalid file type. Please select a PNG, JPG, GIF image.';
                },
                startXHR: function() {
                    progressOuter.style.display = 'block'; // make progress bar visible
                    this.setProgressBar(progressBar);
                },
                onSubmit: function() {
                    msgBox.innerHTML = ''; // empty the message box
                },
                onComplete: function(filename, response) {
                    progressOuter.style.display = 'none'; // hide progress bar when upload is completed
            
                    if (!response) {
                        msgBox.innerHTML = 'Không thể tải hình';
                        return;
                    }
            
                    if (response.success === true) {
                        msgBox.innerHTML = '<strong>' + filename + '</strong>' + ' thay đổi thành công.';
                        $("#picBox_slide3").attr('src', image_dir + '/' + response.source);
                    }
                    else {
                        if (response.msg) {
                            msgBox.innerHTML = response.msg;
                        }
                        else {
                            msgBox.innerHTML = 'Có lỗi xảy ra trong quá trình tải hình';
                        }
                    }
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Không thể tải hình';
                }
            });
            
        }

        $(document).ready(function() {
            xhrUpdate_item( form_e_settings, "{{ route('admincp.b09.update') }}" );
            
            xhrGetOM_edit_map();
            updateMap();

            xhrUploadImage1();
            xhrUploadImage2();
            xhrUploadImage3();
        });
    </script>

@stop