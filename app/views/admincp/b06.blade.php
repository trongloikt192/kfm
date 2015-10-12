@extends('admincp.layouts_admincp.master')

@section('title')
	Khách hàng
@stop

@section('content')

	<button href="#modal_a_item" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button>

    <div class="fluid">
        
        <div class="widget grid12">
            <div class="widget-header">
                <div class="widget-title">
                    {{-- <i class="fa fa-pencil"></i> Simple Inputs --}}
                </div>
                <div class="widget-controls">
                    {{-- <div class="badge msg-badge">34</div> --}}
                </div>
            </div> <!-- /widget-header -->
            
            <div class="widget-content pad20f">

                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Tên công ty</th>
                            <th>Lĩnh vực</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->domain }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone_number }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($customer->id) }}
                                    | 
                                    {{ Form::btnActionDelRecord($customer->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tên công ty</th>
                            <th>Lĩnh vực</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div> <!-- /widget-content -->


            

        </div> <!-- /widget -->
    </div>
@stop


@section('modal')
    <div class="modal fade" id="modal_a_item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm khách hàng</h4>
                </div>

                {{ Form::open(['id'=> 'form_a_item']) }}
                <div class="modal-body">
					{{ Form::errorField() }}
                    <div class="row">
                    	<div class="col-md-6">
                    		{{ Form::textField('name', 'Tên công ty', null) }}
		                    {{ Form::textField('business_scope', 'Lĩnh vực', null) }}
		                    {{ Form::textField('delegate', 'Người đại diện', null) }}
		                    
		                    {{ Form::emailField('email', 'Email', null) }}
                    	</div>
                    	<div class="col-md-6">
                    		{{ Form::textField('phone_number', 'Số điện thoại', null) }}
                    		{{ Form::textField('domain', 'Website', null) }}
                    		{{ Form::textareaField('address', 'Địa chỉ', null, '100%x3') }}
                    		
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::btnSubmit('Thêm') }}
                    <button type="reset" class="btn btn-green">Làm mới</button>
                    <button type="button" class="btn btn-red" data-dismiss="modal">Hủy</button>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div><!-- /modal add New -->

    <div class="modal fade" id="modal_e_item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sửa thông tin khách hàng</h4>
                </div>

                {{ Form::open(['id'=> 'form_e_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>
                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                    <div class="row">
                    	<div class="col-md-6">
                    		{{ Form::textField('name', 'Tên công ty', null) }}
		                    {{ Form::textField('business_scope', 'Lĩnh vực', null) }}
		                    {{ Form::textField('delegate', 'Người đại diện', null) }}
		                    {{ Form::textareaField('address', 'Địa chỉ', null, '100%x3') }}
		                    {{ Form::emailField('email', 'Email', null) }}
                    	</div>
                    	<div class="col-md-6">
                    		{{ Form::textField('phone_number', 'Số điện thoại', null) }}
                    		{{ Form::textField('domain', 'Website', null) }}
                    		<div class="form-group">
                                <label class='control-label' for='status'>Hình logo</label>
                                </br>
                                <button id="btnUploadImage" type="button" class="btn btn-blue" data-id="">
                                    <i class='fa fa-upload'></i>
                                    Tải hình
                                </button>
                                <div id="progressOuterImage" class="progress progress-striped active" style="display:none;">
                                    <div id="progressBarImage" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                                <p id="msgBoxImage" class="help-block"></p>
                                <img id="picBox" name="logo" src="" class="img-responsive img-thumbnail"/>
                            </div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::btnSubmit('Cập nhật') }}
                    <button type="button" class="btn btn-red" data-dismiss="modal">Hủy</button>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div><!-- /modal Edit -->

@stop


@section('scripts')
    {{ HTML::script('plugins/Simple-Ajax-Uploader/SimpleAjaxUploader.min.js') }}
    
    <script type="text/javascript">

        var dataTable = $("#datatable");
        var form_a_item = $('#form_a_item');
        var form_e_item = $('#form_e_item');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_a_item = $('#modal_a_item');
        var modal_e_item = $('#modal_e_item');
        var image_dir = '{{ image_url("customer") }}';
        
        // @Override
        function xhrGetOM_detail_item( _btnOM, _url, _modal ) {
            _btnOM.click(function(e) {
                e.preventDefault();
        
                var form_modal = _modal.find('form');
                var id = $(this).attr('data-id');
        
                var url = _url;
                var method = 'GET';
                var data = {'id' : id};
                var isSuccess = false;
                var loading = $(this).find('.loading');
                var done = $(this).find('.done');
        
                $.ajax({
                    url : url,
                    type: method,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        loading.fadeIn();
                        done.hide();
                        $(this).prop('disabled', true);
                    },
                    success: function( json ) {
                        var INPUT_SELECTOR = form_modal.find("input:not([type=checkbox]),select,textarea");
                        var IMG_SELECTOR = form_modal.find("img");
                        var CKBOX_SELECTOR = form_modal.find('input:checkbox');
                        
                        $.each(json, function(key, value) {
                            INPUT_SELECTOR.filter('[name='+ key +']').val(value);
                            
                            // Trường hợp image phải dùng thuộc tính SRC
                            IMG_SELECTOR.filter('[name='+ key +']').prop("src", image_dir +'/'+  value);
                            
                            /* Checkbox true/false 
                             * Y/c thuộc tính của field: $table->boolean('status')->default(false);
                             */
                            CKBOX_SELECTOR.filter('[name='+ key +']').prop('checked', value);
                        });
        
                        isSuccess = true;
                    },
                    complete: function() {
                        loading.hide();
                        done.show();
                        $(this).prop('disabled', false);
        
                        if(isSuccess) {
                            _modal.modal("show");
                        } else {
                            toastr.error( "Error" , "Notifications" );
                        }
                    }
                }); 
            });
        }
    
        function xhrUploadImage() {
            
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b06.uploadImage") }}';
            var _data = {
                '_token': _token, 
                'id': 0
            };
            
            var btnUpload = document.getElementById('btnUploadImage'),
                progressBar = document.getElementById('progressBarImage'),
                progressOuter = document.getElementById('progressOuterImage'),
                msgBox = document.getElementById('msgBoxImage'),
                picBox = document.getElementById('picBox'),
                drgbox = document.getElementById('btnUploadImage');
            
            
            
            var uploader = new ss.SimpleUpload({
                dropzone: drgbox,
                button: btnUpload,
                url: _url,
                name: 'image',
                data: _data,
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                hoverClass: 'hover',
                focusClass: 'focus',
                maxSize: 1024, // kilobytes
                responseType: 'json',
                debug: true, // Debug
                onChange: function() {
                    _data.id = form_e_item.find('input[name=id]').val();
                },
                onSizeError: function( filename, fileSize ) {
                    msgBox.innerHTML = 'Kích thước file ('+(fileSize/1024).toFixed(2)+'MB) vượt quá dung lượng cho phép (1MB)';
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
                        $("#picBox").attr('src', image_dir + '/' + response.source);
                    }
                    else {
                        if (response.msg) {
                            msgBox.innerHTML = response.msg;
                        }
                        else {
                            msgBox.innerHTML = 'Có lỗi xảy ra trong quá trình tải hình';
                        }
                    }
                    
                    setTimeout(function() {
                        msgBox.innerHTML = '';
                    }, 2000);
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Không thể tải hình';
                }
            });
            
        }

        $(document).ready(function() {
            installTable( dataTable );
            beforeGetOM();
            afterCloseOM();
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b06.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b06.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b06.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b06.destroy') }}" );
            
            xhrUploadImage();
        });
    </script>

@stop