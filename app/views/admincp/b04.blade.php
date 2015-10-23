@extends('admincp.layouts_admincp.master')

@section('title')
	Danh mục
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
                
                <ul>
                @foreach( $categories as $category )
                    <li class="well">
                        <strong>{{ $category->name }}</strong> - {{ Form::btnActionEditRecord($category->id) }} | {{ Form::btnActionDelRecord($category->id) }}
                        
                        @if( $category->children ) 
                            <ul>
                            @foreach( $category->children as $children )
                                <li>
                                    {{ $children->name }} - {{ Form::btnActionEditRecord($children->id) }} | {{ Form::btnActionDelRecord($children->id) }}
                                    @if( $children->children )
                                        <ul>
                                        @foreach( $children->children as $sub_children )
                                            <li>{{ $sub_children->name }} - {{ Form::btnActionEditRecord($sub_children->id) }} | {{ Form::btnActionDelRecord($sub_children->id) }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                </ul>
                
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
                    <h4 class="modal-title">Thêm danh mục</h4>
                </div>

                {{ Form::open(['id'=> 'form_a_item']) }}
                <div class="modal-body">
                    {{ Form::errorField() }}
                    {{ Form::textField('name', 'Tên danh mục', null) }}
                    
                    <label class='control-label' for='url'>Đường dẫn</label>
                   	<div class="form-group">
                   	    <span>{{ url() . '/' }}</span>
                   	    <input type="text" name="url" id="url"/>
                    </div>
                    
                    <label class='control-label' for='parent_id'>Thuộc danh mục</label>
                    <div class="form-group">
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">Là mục chính</option>
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
                    <h4 class="modal-title">Sửa thông tin danh mục</h4>
                </div>

                {{ Form::open(['id'=> 'form_e_item']) }}
                <div class="modal-body">

                    {{ Form::errorField() }}
                    {{ Form::hidden('id') }}
                   	{{ Form::textField('name', 'Tên danh mục', null) }}
                   	
                   	<label class='control-label' for='url'>Đường dẫn</label>
                   	<div class="form-group">
                   	    <span>{{ url() . '/' }}</span>
                   	    <input type="text" name="url" id="url"/>
                    </div>
                    
                    <label class='control-label' for='parent_id'>Thuộc danh mục</label>
                    <div class="form-group">
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">Là mục chính</option>
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
            afterCloseOM();
            xhrGetOM_detail_item( btnEdit_item, "{{ route('admincp.b04.edit') }}", modal_e_item);
            xhrInsert_item( form_a_item, "{{ route('admincp.b04.store') }}" );
            xhrUpdate_item( form_e_item, "{{ route('admincp.b04.update') }}" );
            xhrDelete_item( btnDel_item, "{{ route('admincp.b04.destroy') }}" );
        });
    </script>

@stop