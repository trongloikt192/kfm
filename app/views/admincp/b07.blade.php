@extends('admincp.layouts_admincp.master')

@section('title')
	Hỏi đáp
@stop

@section('content')

	{{-- <button href="#modal_a_item" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button> --}}

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
                            <th>Họ và tên</th>
                            <th>Câu hỏi</th>
                            <th>Công ty</th>
                            <th>Xác thực</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $faq->full_name }}</td>
                                <td>{{ $faq->title }}</td>
                                <td>{{ $faq->company }}</td>
                                <td>{{ $faq->status == 1 ? '<span class="label label-success">confirmed</span>' : '<span class="label label-danger">pending</span>' }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($faq->id, "Phản hồi") }}
                                    | 
                                    {{ Form::btnActionDelRecord($faq->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Câu hỏi</th>
                            <th>Công ty</th>
                            <th>Xác thực</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div> <!-- /widget-content -->


            

        </div> <!-- /widget -->
    </div>
@stop


@section('modal')
    <div class="modal fade" id="modal_e_item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Trả lời hỏi đáp</h4>
                </div>

                {{ Form::open(['id'=> 'form_e_item']) }}
                <div class="modal-body">
                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
					<div class="row">
						<div class="col-md-12">
							{{ Form::textField('title', 'Tiêu đề', null) }}
						</div>
                    	<div class="col-md-6">
                    		{{ Form::textField('full_name', 'Họ và tên', null) }}
		                    {{ Form::textField('company', 'Công ty', null) }}
		                    {{ Form::textField('competence', 'Chức vụ', null) }}
                    	</div>
                    	<div class="col-md-6">
                    		{{ Form::textField('phone_number', 'Số điện thoại', null) }}
		                    {{ Form::emailField('email', 'Email', null) }}
                    		{{ Form::checkboxField('status', 'Đăng lên trang chủ?') }}
                    	</div>
                    	<div class="col-md-12">
                    		{{ Form::textareaField('content', 'Nội dung câu hỏi', null, '100%x5') }}
                    	</div>
                    	<hr>
                    	<div class="col-md-12">
                    		{{ Form::textareaField('reply_content', 'Nội dung trả lời', null, '100%x10') }}
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
    <script type="text/javascript">

        var dataTable = $("#datatable");
        var form_a_item = $('#form_a_item');
        var form_e_item = $('#form_e_item');
        var btnEdit_item = $('.btnEdit_item');
        var btnDel_item = $('.btnDel_item');
        var modal_a_item = $('#modal_a_item');
        var modal_e_item = $('#modal_e_item');


        $(document).ready(function() {
            installTable( dataTable, {order : [[ 3, "asc" ]]} );
            beforeGetOM();
            afterCloseOM();
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b07.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b07.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b07.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b07.destroy') }}" );
        });
    </script>

@stop