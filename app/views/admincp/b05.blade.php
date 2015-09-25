@extends('admincp.layouts_admincp.master')

@section('title')
	Bài viết
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

                <table class="table" id="datatable">
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
                                    {{ Form::btnActionEditRecord($post->id) }}
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
    <div class="modal fade" id="modal_a_item">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm bài viết</h4>
                </div>

                {{ Form::open(['id'=> 'form_a_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>

                    {{ Form::errorField() }}
                    {{ Form::textField('title', 'Tiêu đề', null) }}
                    {{ Form::textField('slug', 'Slug', null) }}
                    {{ Form::textareaField('description', 'Mô tả', null, '100%x3') }}
                    {{ Form::textareaField('content_vi', 'Nội dung tiếng Việt', null) }}
                    {{ Form::textareaField('content_en', 'Nội dung tiếng Anh', null) }}
                    {{-- {{ Form::checkboxField('status', 'Public') }} --}}

                    <label class='control-label' for='status'>Đăng bài</label>
                    <div class="w-switches">
                        <input type="checkbox" id="switch-1" checked />
                        <label class="switch green" for="switch-1"><i></i></label>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sửa thông tin bài viết</h4>
                </div>

                {{ Form::open(['id'=> 'form_e_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>

                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                   	{{ Form::textField('title', 'Tiêu đề', null) }}
                    {{ Form::textField('slug', 'Slug', null) }}
                    {{ Form::textareaField('description', 'Mô tả', null, '100%x3') }}
                    {{ Form::textareaField('content_vi', 'Nội dung tiếng Việt', null) }}
                    {{ Form::textareaField('content_en', 'Nội dung tiếng Anh', null) }}
                    {{ Form::checkboxField('status', 'Public') }}

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
    <script type="text/javascript">

        var dataTable = $("#datatable");
        var form_a_item = $('#form_a_item');
        var form_e_item = $('#form_e_item');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_a_item = $('#modal_a_item');
        var modal_e_item = $('#modal_e_item');


        $(document).ready(function() {
            installTable( dataTable );
            beforeGetOM();
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b05.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b05.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b05.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b05.destroy') }}" );
        });
    </script>

@stop