@extends('admincp.layouts_admincp.master')

@section('title')
	Bài viết
@stop


@section('styles')
    {{ HTML::style('plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}
@stop


@section('content')

	<button href="#modal_ae_post" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button>

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
                            <th>Tiêu đề</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                <td>{{ $post->status == 1 ? '<span class="label label-success">Public</span>' : '<span class="label label-danger">Unpublic</span>' }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($post->id, "Sửa", "btnEdit_item", "modal_ae_post") }}
                                    | 
                                    {{ Form::btnActionDelRecord($post->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div> <!-- /widget-content -->


            

        </div> <!-- /widget -->
    </div>
@stop


@section('modal')
    <div class="modal fade" id="modal_ae_post">
        <div class="modal-dialog" style="width: 1024px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Bài viết</h4>
                </div>

                {{ Form::open(['id'=> 'form_ae_post']) }}
                <div class="modal-body">

                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                    {{ Form::textField('title', 'Tiêu đề', null) }}
                    {{ Form::textField('slug', 'Slug', null) }}
                    {{ Form::textareaField('description', 'Mô tả', null, '100%x3') }}
                    {{ Form::textareaField('content_vi', 'Nội dung tiếng Việt', null) }}
                    {{ Form::textareaField('content_en', 'Nội dung tiếng Anh', null) }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            
                            <label class='control-label' for='category_id'>Danh mục</label>
                            <div class="form-group">
                                <select id="category_id" name="category_id" class="form-control">
                                    <!--<option value="0">Là mục chính</option>-->
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}"><strong>{{ $category->name }}</strong></option> 
                                        @if( $category->children )
                                            @foreach( $category->children as $children )
                                                <option value="{{ $children->id }}">-- {{ $children->name }}</option>
                                                @if( $children->children )
                                                    @foreach( $children->children as $sub_children )
                                                        <option value="{{ $sub_children->id }}">---- {{ $sub_children->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            {{ Form::checkboxField('status', 'Đăng bài') }}
                            
                            <div class="form-group">
                                <label class='control-label' for='status'>Tài liệu đính kèm</label>
                                </br>
                                <button id="btnUploadFiles" type="button" class="btn" data-id="">
                                    <i class='fa fa-upload'></i>
                                    Tải tài liệu
                                </button>
                                <p id="msgBoxFile" class="help-block"></p>
                                <div id="pic-progress-wrap" class="progress-wrap" style="margin-top:10px;margin-bottom:10px;"></div>
                                <ul id="documents">
                                    
                                </ul>
                            </div>
                            
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class='control-label' for='status'>Hình đại diện</label>
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
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="sizeBox">
                                <img id="picBox" name="image" src="" class="img-responsive img-thumbnail"/>
                            </div>
                        </div>
                    </div>
                    
                    

                </div>
                <div class="modal-footer">
                    {{ Form::btnSubmit('Đồng ý') }}
                    {{-- <button type="reset" class="btn btn-green">Làm mới</button> --}}
                    <button type="button" class="btn btn-red" data-dismiss="modal">Hủy</button>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div><!-- /modal add New -->


@stop


@section('scripts')
    {{ HTML::script('plugins/ckeditor/ckeditor.js') }}
    {{ HTML::script('plugins/ckeditor/config.js') }}
    
    {{ HTML::script('plugins/Simple-Ajax-Uploader/SimpleAjaxUploader.min.js') }}

    <script type="text/javascript">

        var dataTable = $("#datatable");
        var form_ae_post = $('#form_ae_post');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_ae_post = $('#modal_ae_post');
        var image_dir = '{{ image_url("post"); }}';
        var listDocuments = $("#documents");

        // Override
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
                        var data = json[0];
                        
                        var INPUT_SELECTOR = form_modal.find("input,select,textarea");
                        var IMG_SELECTOR = form_modal.find("img");

                        $.each(data, function(key, value) {
                            INPUT_SELECTOR.filter('[name='+ key +']:not([type=checkbox]):not([type=file])').val(value);
                            // Trường hợp image phải dùng thuộc tính SRC
                            IMG_SELECTOR.filter('[name='+ key +']').prop("src", image_dir + '/' + value);
                        });
                        
                        listDocuments.html('');
                        $.each(data['documents'], function(key, document) { 
                            listDocuments.append('<li>' + document['name'] + ' - <a href="javascript:void(0)" onClick="xhrDelete_document(this, '+ data['id'] +', '+ document['id'] +')">Xóa</a></li>');
                        });

                        CKEDITOR.instances.content_vi.setData( data["content_vi"], function() {
                            this.checkDirty();  // true
                        });
                        CKEDITOR.instances.content_en.setData( data["content_en"], function() {
                            this.checkDirty();  // true
                        });
                        
                        if( data["status"] == "1" ) {
                            $("#status").prop('checked', true);
                        } else {
                            $("#status").prop('checked', false);
                        }
                        
                        $("#btnUploadImage").attr('data-id', data['id']);
                        $("#btnUploadFiles").attr('data-id', data['id']);
                        
                        isSuccess = true;
                    },
                    complete: function() {
                        loading.hide();
                        done.show();
                        $(this).prop('disabled', false);

                        if(isSuccess) {
                            $("#btnSubmit").attr('data-action', 'update');
                            _modal.modal("show");
                        } else {
                            toastr.error( "Error" , "Notifications" );
                        }
                    }
                }); 
            });
        }
        
        // Override
        function xhrInsert_item( _formInsert, _url) {
            _formInsert.submit(function(e) {
                e.preventDefault();
        
                var form = $(this);
                var _modal = form.closest('.modal');
        
                // var url = form.attr('action');
                var url = _url;
                var method = 'POST';
                var data = form.serializeArray();
                // Custom data
                for(var i=0; i<data.length; i++) {
                    var name = data[i].name;
                    if( name == 'content_en' ){
                        data[i].value = CKEDITOR.instances.content_en.getData(); // content_en
                    }
                    
                    if( name == 'content_vi' ) {
                        data[i].value = CKEDITOR.instances.content_vi.getData(); // content_vi
                    }
                    
                    // Checkbox post 
                    if( form.find("#status").is(':checked') == true && name =='status' ) {
                        data[i].value = "1";
                    }
                }
                
                if( form.find("#status").is(':checked') == false ) {
                    data.push({'name':'status', 'value':'0'});
                }
                
                var isSuccess = false;
                var loading = form.find('.loading');
                var done = form.find('.done');
                var errorField = form.find('.errors');
                var btnSubmit = form.find('.btnSubmit');
                
                var isUpdate = btnSubmit.attr('data-action');
                if( isUpdate === 'update' ) {
                    return false;
                }
        
                $.confirm({
                    title: '',
                    content: 'Bạn đồng ý <b>thêm</b> thông tin này không ?',
                    keyboardEnabled: true,
                    columnClass: 'col-md-4 col-md-offset-4',
                    animationSpeed: 200, // 0.2 seconds
                    confirm: function(){
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
                            },
                            success: function( json ) {
        
                                isSuccess = true;
                                form[0].reset(); //clear form
                                
                            },
                            error :function( jqXhr ) {
                                if( jqXhr.status === 401 )  //redirect if not authenticated user.
                                    $( location ).prop( 'pathname', 'auth/login' );
                                else {
                                    //process validation errors here.
                                    var errors = jqXhr.responseJSON; //this will get the errors response data.
                                    //show them somewhere in the markup
                                    //e.g
                                    var errorsHtml = '<div class="alert alert-danger"><ul class="list-unstyled">';
        
                                    $.each( errors , function( key, value ) {
                                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
        
                                    });
                                    errorsHtml += '</ul></di>';
        
                                    errorField.html( errorsHtml );
                                }
                            },
                            complete: function() {
                                loading.hide();
                                done.show();
                                btnSubmit.prop('disabled', false); //enable button
        
                                if(isSuccess) {
                                	if(_modal.length > 0) {
                                		_modal.modal('hide');
                                	}
        
                                    toastr.success( "Success" , "Notifications" );
                                    xhrRefresh();
                                } else {
                                    toastr.error( "Error" , "Notifications" );
                                }
                            }
                        }); 
                    }
                });
                               
            });
        }
        
        // Override
        function xhrUpdate_item( _formEdit, _url ) {
            _formEdit.submit(function(e) {
                e.preventDefault();
        
                var form = $(this);
                var _modal = form.closest('.modal');
        
                // var url = form.attr('action');
                var url = _url;
                var method = 'PUT';
                var data = form.serializeArray();
                // Custom data
                for(var i=0; i<data.length; i++) {
                    var name = data[i].name;
                    if( name == 'content_en' ){
                        data[i].value = CKEDITOR.instances.content_en.getData(); // content_en
                    }
                    
                    if( name == 'content_vi' ) {
                        data[i].value = CKEDITOR.instances.content_vi.getData(); // content_vi
                    }
                    
                    // Checkbox post 
                    if( form.find("#status").is(':checked') == true && name =='status' ) {
                        data[i].value = "1";
                    }
                }
                
                if( form.find("#status").is(':checked') == false ) {
                    data.push({'name':'status', 'value':'0'});
                }
                
                var isSuccess = false;
                var loading = form.find('.loading');
                var done = form.find('.done');
                var errorField = form.find('.errors');
                var btnSubmit = form.find('.btnSubmit');
                
                var isUpdate = btnSubmit.attr('data-action');
                
                if( isUpdate !== 'update' ) {
                    return false;
                }
        
                $.confirm({
                    title: '',
                    content: 'Bạn đồng ý <b>sửa</b> thông tin này không ?',
                    keyboardEnabled: true,
                    columnClass: 'col-md-4 col-md-offset-4',
                    animationSpeed: 200, // 0.2 seconds
                    confirm: function(){
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
                            },
                            success: function( json ) {
        
                                isSuccess = true;
                                form[0].reset(); //clear form
                                
                            },
                            error :function( jqXhr ) {
                                if( jqXhr.status === 401 )  //redirect if not authenticated user.
                                    $( location ).prop( 'pathname', 'auth/login' );
                                else {
                                    //process validation errors here.
                                    var errors = jqXhr.responseJSON; //this will get the errors response data.
                                    //show them somewhere in the markup
                                    //e.g
                                    var errorsHtml = '<div class="alert alert-danger"><ul class="list-unstyled">';
        
                                    $.each( errors , function( key, value ) {
                                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
        
                                    });
                                    errorsHtml += '</ul></di>';
        
                                    errorField.html( errorsHtml );
                                }
                            },
                            complete: function() {
                                loading.hide();
                                done.show();
                                btnSubmit.prop('disabled', false); //enable button
        
                                if(isSuccess) {
                                	if(_modal.length > 0) {
                                		_modal.modal('hide');
                                	}
        
                                    toastr.success( "Success" , "Notifications" );
                                    xhrRefresh();
                                } else {
                                    toastr.error( "Error" , "Notifications" );
                                }
                            }
                        }); 
                    }
                });
                               
            });
        }

        // Override
        function afterCloseOM() {
            var modal = $('#modals > .modal');
        
            modal.on('hidden.bs.modal', function(e) {
            	var form = $(this).find('form');
                form[0].reset(); //clear form
                (form.find('.errors')).html('');
                $("#btnSubmit").attr('data-action', '');
                CKEDITOR.instances.content_vi.setData('');
                CKEDITOR.instances.content_en.setData('');
                $("#msgBoxImage").html('');
                $("#msgBoxFile").html('');
            });
        }

        // Upload hinh dai dien cho bai post
        function xhrUploadImage() {
            
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b05.uploadImage") }}';
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
                // debug: true, // Debug
                onChange: function() {
                    _data.id = $("#btnUploadImage").attr('data-id');
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
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Không thể tải hình';
                }
            });
            
        }

        // 
        function xhrUploadFile() {
            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b05.uploadFile") }}';
            var _data = {
                '_token': _token, 
                'id': 0
            };
            
            var btnUpload = document.getElementById('btnUploadFiles'),
                wrap = document.getElementById('msgBoxFile'),
                msgBox = document.getElementById('msgBoxFile'),
                drgbox = document.getElementById('btnUploadFiles');
                
            
            
            
            var uploader = new ss.SimpleUpload({
                dropzone: drgbox,
                button: btnUpload,
                url: _url,
                name: 'fileAttachs',
                data: _data,
                allowedExtensions: ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'txt'],
                hoverClass: 'hover',
                focusClass: 'focus',
                maxSize: 5120, // kilobytes
                multiple: true,
                multipart: true,
                maxUploads: 5,
                queue: false,
                responseType: 'json',
                debug: true, // Debug
                onChange: function() {
                    _data.id = $("#btnUploadFiles").attr('data-id');
                },
                onSizeError: function( filename, fileSize ) {
                    msgBox.innerHTML = 'Kích thước file ('+(fileSize/1024).toFixed(2)+'MB) vượt quá dung lượng cho phép (5MB)';
                },
                onExtError: function() {
                    msgBox.innerHTML = 'Kiểu tệp tin không phù hợp. Các kiểu được phép DOC, DOCX, XSL, XSLX, PPT, PPTX, PDF.';
                },
                onSubmit: function(filename, extension) {
                    var prog = document.createElement('div'),
                       outer = document.createElement('div'),
                       bar = document.createElement('div'),
                       size = document.createElement('div'),
                       self = this;     
            
                    prog.className = 'prog';
                    size.className = 'size';
                    outer.className = 'progress progress-striped';
                    bar.className = 'progress-bar progress-bar-success';
                    
                    outer.appendChild(bar);
                    prog.appendChild(size);
                    prog.appendChild(outer);
                    wrap.appendChild(prog); // 'wrap' is an element on the page
                    
                    self.setProgressBar(bar);
                    self.setProgressContainer(prog);
                    self.setFileSizeBox(size);                
                    
                    msgBox.innerHTML = '';
                },
                onComplete: function(filename, response) {
                    if (!response) {
                        msgBox.innerHTML = 'Không thể tải file';
                        return;
                    }
            
                    if (response.success === true) {
                        // msgBox.innerHTML = '<strong>' + filename + '</strong>' + ' thay đổi thành công.';
                        listDocuments.append('<li>' + response['source'] + ' - <a href="javascript:void(0)" onClick="xhrDelete_document(this, '+ response['post_id'] +', '+ response['document_id'] +')">Xóa</a></li>');
                    }
                    else {
                        if (response.msg) {
                            msgBox.innerHTML = response.msg;
                        }
                        else {
                            msgBox.innerHTML = 'Có lỗi xảy ra trong quá trình tải file';
                        }
                    }
                },
                onError: function() {
                    msgBox.innerHTML = 'Không thể tải file';
                }
            });
        }
        
        
        var xhrDelete_document = function(self, post_id, document_id) {

            var _token = '{{ csrf_token() }}';
            var _url = '{{ route("admincp.b05.deleteDocument") }}';
            var _data = {
                '_token': _token, 
                'post_id': post_id,
                'document_id': document_id
            };
            var isSuccess = false;
            
            $.confirm({
                title: '',
                content: 'Bạn đồng ý <b>xóa</b> tệp tin này không ?',
                keyboardEnabled: true,
                columnClass: 'col-md-4 col-md-offset-4',
                animationSpeed: 200, // 0.2 seconds
                confirm: function(){
                    $.ajax({
                        url : _url,
                        type: 'POST',
                        data: _data,
                        dataType: 'json',
                        success: function( json ) {
    
                            isSuccess = true;
                            
                        },
                        complete: function() {
                            if(isSuccess) {
                                $(self).parent().remove();
                                toastr.success( "Success" , "Notifications" );
                            } else {
                                toastr.error( "Error" , "Notifications" );
                            }
                        }
                    }); 
                }
            });
        }

        $(document).ready(function() {
            installTable( dataTable, {order : [[ 1, "desc" ]]} );
            beforeGetOM();
            afterCloseOM();

            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b05.edit') }}", modal_ae_post );
            xhrInsert_item( form_ae_post, "{{ route('admincp.b05.store') }}" );
            xhrUpdate_item( form_ae_post, "{{ route('admincp.b05.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b05.destroy') }}" );
    
            
            CKEDITOR.replace( 'content_vi', configCKE);
            configCKE['height'] = 100;     
            CKEDITOR.replace( 'content_en', configCKE);
            
            xhrUploadImage();
            xhrUploadFile();
        });
    </script>

@stop