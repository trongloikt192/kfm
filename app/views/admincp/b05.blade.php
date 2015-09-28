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
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
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
                    {{ Form::textField('title', 'Tiêu đề', null) }}
                    {{ Form::textField('slug', 'Slug', null) }}
                    {{ Form::textareaField('description', 'Mô tả', null, '100%x3') }}
                    {{ Form::textareaField('content_vi', 'Nội dung tiếng Việt', null) }}
                    {{ Form::textareaField('content_en', 'Nội dung tiếng Anh', null) }}
                    {{-- {{ Form::checkboxField('status', 'Public') }} --}}

                    <label class='control-label' for='status'>Đăng bài</label>
                    <div class="w-switches">
                        <input name="status" type="checkbox" id="status" checked />
                        <label class="switch green" for="status"><i></i></label>
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

    <script type="text/javascript">

        var configCKE = {
            codeSnippet_theme: 'Monokai',
            // language: '',
            height: 400,
            // filebrowserBrowseUrl: '{{ url() }}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        var dataTable = $("#datatable");
        var form_ae_post = $('#form_ae_post');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_ae_post = $('#modal_ae_post');


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
                        
                        $.each(json, function(key, value) {
                            INPUT_SELECTOR
                                .filter('[name='+ key +']').val(value)
                                 // Trường hợp image phải dùng thuộc tính SRC
                                .filter('[type=image]').attr("src", value);
                        });

                        isSuccess = true;

                        CKEDITOR.instances.content_vi.setData( json["content_vi"], function() {
                            this.checkDirty();  // true
                        });
                        CKEDITOR.instances.content_en.setData( json["content_en"], function() {
                            this.checkDirty();  // true
                        });
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


        $(document).ready(function() {
            installTable( dataTable );
            beforeGetOM();
            afterCloseOM();

            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b05.edit') }}", modal_ae_post );
            xhrInsert_item( form_ae_post, "{{ route('admincp.b05.store') }}" );
            xhrUpdate_item( form_ae_post, "{{ route('admincp.b05.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b05.destroy') }}" );

            
            CKEDITOR.replace( 'content_vi', configCKE);
            configCKE['height'] = 100;     
            CKEDITOR.replace( 'content_en', configCKE);
        });
    </script>

@stop