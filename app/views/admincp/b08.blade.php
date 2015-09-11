@extends('admincp.layouts_admincp.master')

@section('title')
	Liên hệ
@stop

@section('content')

	<!--<button href="#modal_a_item" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button>-->

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
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Công ty</th>
                            <th>Nội dung</th>
                            <th>Trại thái</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->full_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->company }}</td>
                                <td>{{ $contact->content }}</td>
                                <td>{{ $contact->status }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($contact->id) }}
                                    | 
                                    {{ Form::btnActionDelRecord($contact->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Công ty</th>
                            <th>Nội dung</th>
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
    <div class="modal fade" id="modal_e_item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cập nhật thông tin liên hệ</h4>
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
                    		{{ Form::textField('full_name', 'Họ và tên', null) }}
		                    {{ Form::textField('company', 'Công ty', null) }}
		                    {{ Form::textField('phone_number', 'Số điện thoại', null) }}
		                    
                    	</div>
                    	<div class="col-md-6">
                    	    {{ Form::emailField('email', 'Email', null) }}
                    		{{ Form::textField('status', 'Trạng thái', null) }}
                    	</div>
                    	<div class="col-md-12">
                    		{{ Form::textareaField('content', 'Nội dung liên hệ', null, '100%x5') }}
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
            installTable( dataTable );
            beforeGetOM();
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b08.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b08.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b08.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b08.destroy') }}" );
        });
    </script>

@stop