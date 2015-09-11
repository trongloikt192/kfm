@extends('admincp.layouts_admincp.master')

@section('title')
	Tài khoản
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
                            <th>Tài khoản</th>
                            <th>Email</th>
                            <th>Họ tên</th>
                            <th>Điện thoại</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($user->id) }}
                                    | 
                                    {{ Form::btnActionDelRecord($user->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tài khoản</th>
                            <th>Email</th>
                            <th>Họ tên</th>
                            <th>Điện thoại</th>
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
                    <h4 class="modal-title">Thêm tài khoản</h4>
                </div>

                {{ Form::open(['id'=> 'form_a_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>

                    {{ Form::errorField() }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::textField('username', 'Tài khoản', null) }}
                            {{ Form::passwordField('password', 'Mật khẩu', null) }}
                            {{ Form::emailField('email', 'Email', null) }}
                            {{ Form::textField('address', 'Địa chỉ', null) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::textField('first_name', 'Họ', null) }}
                            {{ Form::textField('last_name', 'Tên', null) }}
                            {{ Form::textField('phone_number', 'Số điện thoại', null) }}
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
                    <h4 class="modal-title">Sửa thông tin tài khoản</h4>
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
                            {{ Form::textField('username', 'Tài khoản', null) }}
                            {{ Form::passwordField('password', 'Mật khẩu', null) }}
                            {{ Form::emailField('email', 'Email', null) }}
                            {{ Form::textField('address', 'Địa chỉ', null) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::textField('first_name', 'Họ', null) }}
                            {{ Form::textField('last_name', 'Tên', null) }}
                            {{ Form::textField('phone_number', 'Số điện thoại', null) }}
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
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b03.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b03.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b03.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b03.destroy') }}" );
        });
    </script>

@stop