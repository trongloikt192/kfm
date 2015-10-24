@extends('...layouts.master')

@section('header-title')
    Trang Kết quả tìm kiếm
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Kết quả tìm kiếm</h3>
					<hr>
					{{ Form::open(['id'=>'search_form', 'class'=>'form-inline'])}}
						<h4>Nhập từ khóa</h4>
						<div class="form-group">
							<input type="text" class="form-control" id="key_search" name="key_search">
						</div>
						<button type="submit" class="btn btn-default">Tìm kiếm</button>
					{{ Form::close() }}

					<br/>

					<div id="no_result" style="display: none;">
						Không có dữ liệu nào thỏa mãn điều kiện tìm kiếm của bạn.
					</div>

					<ol id="results" class="search-results node-results">
					</ol>

					</div>
			</div>
			
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript">

		var search_form = $('#search_form');

		function xhrGet_item( _formGet, _url) {
		    _formGet.submit(function(e) {
		        e.preventDefault();

		        var form = $(this);

		        var url = _url;
		        var method = 'POST';
		        var data = form.serializeArray();
		        
		        var isSuccess = false;
		        var loading = form.find('.loading');
		        var done = form.find('.done');
		        var btnSubmit = form.find('.btnSubmit');

		        var no_result = $('#no_result');
		        var results = $('#results');

		        $.ajax({
                    url : url,
                    type: method,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        loading.fadeIn();
                        done.hide();
                        btnSubmit.prop('disabled', true);

                        no_result.hide();
                        results.html('');
                    },
                    success: function( json ) {

                    	if(json.total == 0) {
                    		no_result.show();
                    		return;
                    	}

                    	for(var i=0; i < json.data.length; i++) {
                    		var post = json.data[i];
                    		var item = '<li class="search-result">';
	                    	item += '<h5 class="title">';
							item += '	<a href="{{url()}}/f02/'+post.slug+'">'+post.title+'</a> - '+post.created_at;
							item += '</h5>';
							item += '<div class="search-snippet-info">';
							item += '	<p class="search-snippet">'+post.description+'</p>';
							item += '</div>';
							item += '</li>';
							item += '</br>';

	                    	results.append(item);
                    	}
                    	

                        isSuccess = true;
                    },
                    complete: function() {
                        loading.hide();
                        done.show();
                        btnSubmit.prop('disabled', false); //enable button
                    }
                }); 
		                       
		    });
		}

		$(document).ready(function() {
			xhrGet_item( search_form, "{{ route('f06.searchAjax') }}" );
		});
	</script>
@stop