@extends('admincp.layouts_admincp.master')

@section('title')
    Liên kết
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
                            <th>Tên liên kết</th>
                            <th>Địa chỉ</th>
                            <th>Mô tả</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>{{ $link->name }}</td>
                                <td>{{ $link->link }}</td>
                                <td>{{ $link->description }}</td>
                                <td class="center">
                                    {{ Form::btnActionEditRecord($link->id) }}
                                    | 
                                    {{ Form::btnActionDelRecord($link->id) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tên liên kết</th>
                            <th>Địa chỉ</th>
                            <th>Mô tả</th>
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
                    <h4 class="modal-title">Thêm liên kết</h4>
                </div>

                {{ Form::open(['route'=> ['admincp.b10.store'], 'id'=> 'form_a_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>

                    {{ Form::errorField() }}
                    {{ Form::textField('name', 'Tên liên kết', null) }}
                    {{ Form::textField('link', 'Địa chỉ', null) }}
                    {{ Form::textField('description', 'Mô tả', null) }}
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
                    <h4 class="modal-title">Sửa thông tin liên kết</h4>
                </div>

                {{ Form::open(['route'=> ['admincp.b10.update'], 'id'=> 'form_e_item']) }}
                <div class="modal-body">
                    <p>
                        Xin quý khách vui lòng nhập vào tên đăng nhập và địa chỉ email để lấy lại mật khẩu.
                    </p>

                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                    {{ Form::textField('name', 'Tên liên kết', null) }}
                    {{ Form::textField('link', 'Địa chỉ', null) }}
                    {{ Form::textField('description', 'Mô tả', null) }}
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
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b10.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b10.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b10.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b10.destroy') }}" );
        });
    </script>

@stop