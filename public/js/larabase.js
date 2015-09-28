/*
 ***********************************
  Thêm, xóa, sửa, hiển thị trên bảng dữ liệu datatable
  @author: Lê Trọng Lợi - 2015/08/29
  @requires: 
  	bootstrap - ver 3.3.5
  	jquery.dataTables.min.js - ver 1.10.8
 	jquery-confirm.js - ver 1.7.5
 	toastr.min.js - ver 2.1.2
 	HTML:
	 	Table
	 	Button Edit
	 	Button Delete
	 	Modal Edit + Form edit
	 	Modal Add + Form add

  @functions:
  	installTable( _table );
  	beforeGetOM();
  	xhrGetOM_detail_item( _btnOM, _url, _modal );
  	xhrInsert_item( _formInsert, _url);
  	xhrUpdate_item( _formEdit, _url );
  	xhrDelete_item( _btnDel, _url );

 ***********************************
 */

/*
 Cài đặt dataTable
 @param: 
 	_table : Bảng cần cài đặt - example: $('#datatable')
 */
function installTable( _table ) {
    // Data Tables
    if( $.fn.dataTable ) {
        _table.dataTable({
            sPaginationType: "full_numbers",
            "language": {
                "url" : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });
    }
}


/*
 Mở Modal và Hiển thị chi tiết 1 record lên modal đó
 @param: 
 	_btnOM : Button để hiển thị modal - example: $('.btnEdit_item')
 	_url : Url để ajax lấy dữ liệu - example: "{{ route('admincp.b10.edit') }}"
 	_modal : Đổ dữ liệu vào Modal để hiển thị - example: $("#modal_e_item")
 */
function xhrGetOM_detail_item( _btnOM, _url, _modal, _callback ) {
    _btnOM.click(function(e) {
        e.preventDefault();

        var form_modal = _modal.find('form');
        var id = $(this).attr('data-id');

        // var url = "{{ route('admincp.b10.edit') }}";
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

                _callback();
            }
        }); 
    });
}


/*
 Thêm một item
 @param: 
 	_formInsert : Form thông tin insert - example: $('#form_a_item')
 	_url : Url để ajax thêm dữ liệu - example: "{{ route('admincp.b10.create') }}"
 */
function xhrInsert_item( _formInsert, _url) {
    _formInsert.submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var _modal = form.closest('.modal');

        // var url = form.attr('action');
        var url = _url;
        var method = 'POST';
        var data = form.serialize();
        var isSuccess = false;
        var loading = form.find('.loading');
        var done = form.find('.done');
        var errorField = form.find('.errors');
        var btnSubmit = form.find('.btnSubmit');

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


/*
 Sửa item
 @param: 
 	_formEdit : Form thông tin update - example: $('#form_e_item')
 	_url : Url để ajax thêm dữ liệu - example: "{{ route('admincp.b10.update') }}"
 */
function xhrUpdate_item( _formEdit, _url ) {
    _formEdit.submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var _modal = form.closest('.modal');

        // var url = form.attr('action');
        var url = _url;
        var method = 'PUT';
        var data = form.serialize();
        var isSuccess = false;
        var loading = form.find('.loading');
        var done = form.find('.done');
        var errorField = form.find('.errors');
        var btnSubmit = form.find('.btnSubmit');

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


/*
 Xóa item
 @param: 
 	_btnDel : Button xóa - example: $('.btnDel_item')
 	_url : Url để ajax xóa record đó - example: "{{ route('admincp.b10.destroy') }}"
 */
function xhrDelete_item( _btnDel, _url ) {
    _btnDel.click(function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var token = $(this).attr('data-token');
        // var url = "{{ route('admincp.b10.destroy') }}";
        var url = _url;
        var method = 'DELETE';
        var data = {'id': id, '_token': token};
        var isSuccess = false;
        var loading = $(this).find('.loading');
        var done = $(this).find('.done');

        $.confirm({
            title: '',
            content: 'Bạn có chắc là sẽ <b>xóa</b> thông tin này không ?',
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
                        $(this).prop('disabled', true);
                    },
                    success: function( json )
                    {       
                        isSuccess = true;
                    },
                    complete: function() {
                        loading.hide();
                        done.show();
                        $(this).prop('disabled', false); //enable button

                        if(isSuccess) {
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


/*
 Refresh lại page sau khi insert, update và delete thành công 
 */
function xhrRefresh() {
    setTimeout(function() {
        window.location.reload();
    }, 1000);
}


/*
 Clear errors message và focus vào input đầu tiên trước khi mở Modal
 */
function beforeGetOM() {
    var modal = $('#modals > .modal');

    modal.on('shown.bs.modal', function(e) {
    	var form = $(this).find('form');
        (form.find('input:visible:first')).focus();
    });
}
function afterCloseOM() {
    var modal = $('#modals > .modal');

    modal.on('hidden.bs.modal', function(e) {
    	var form = $(this).find('form');
        (form.find('.errors')).html('');
    });
}