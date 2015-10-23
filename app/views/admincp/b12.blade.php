@extends('admincp.layouts_admincp.master')

@section('title')
	Trang
@stop


@section('styles')
    {{ HTML::style('plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}
@stop


@section('content')

	<button href="#modal_ae_page" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button>

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
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($page->id, "Sửa", "btnEdit_item", "modal_ae_page") }}
                                    | 
                                    {{ Form::btnActionDelRecord($page->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div> <!-- /widget-content -->


            

        </div> <!-- /widget -->
    </div>
@stop


@section('modal')
    <div class="modal fade" id="modal_ae_page">
        <div class="modal-dialog" style="width: 1024px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Trang</h4>
                </div>

                {{ Form::open(['id'=> 'form_ae_page']) }}
                <div class="modal-body">

                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                    {{ Form::textField('title', 'Tiêu đề', null) }}
                    {{ Form::textField('slug', 'Slug', null) }}
                    {{ Form::textareaField('content', 'Nội dung trang', null) }}
                    
                    <label class='control-label' for='category_id'>Danh mục</label>
                        <div class="form-group">
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option> 
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
        var form_ae_page = $('#form_ae_page');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_ae_page = $('#modal_ae_page');
        var image_dir = '{{ postImage_url(); }}';

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
                        var INPUT_SELECTOR = form_modal.find("input,select,textarea");
                        var IMG_SELECTOR = form_modal.find("img");

                        $.each(json, function(key, value) {
                            INPUT_SELECTOR.filter('[name='+ key +']:not([type=checkbox]):not([type=file])').val(value);
                            // Trường hợp image phải dùng thuộc tính SRC
                            IMG_SELECTOR.filter('[name='+ key +']').prop("src", image_dir + '/' + value);
                        });

                        CKEDITOR.instances.content.setData( json["content"], function() {
                            this.checkDirty();  // true
                        });

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
                    if( name == 'content' ){
                        data[i].value = CKEDITOR.instances.content.getData(); // content_en
                    }
                    
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
                    if( name == 'content' ){
                        data[i].value = CKEDITOR.instances.content.getData(); // content_en
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
                CKEDITOR.instances.content.setData('');
            });
        }


        $(document).ready(function() {

            CKEDITOR.replace( 'content', configCKE);

            installTable( dataTable );
            beforeGetOM();
            afterCloseOM();

            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b12.edit') }}", modal_ae_page );
            xhrInsert_item( form_ae_page, "{{ route('admincp.b12.store') }}" );
            xhrUpdate_item( form_ae_page, "{{ route('admincp.b12.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b12.destroy') }}" );
        
            
        });
    </script>

@stop