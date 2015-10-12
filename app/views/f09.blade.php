@extends('...layouts.master')

@section('header-title')
    Câu hỏi về kiểm toán
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Trả lời câu hỏi</h3>
					<hr>

					<h4>Chủ đề: {{ $faq->title }}</h4>
					</br>
					<div>
						<strong>Câu hỏi:</strong>
						<p> {{ $faq->content }}</p>
					</div>
					<div class="well well-sm">
						<strong>Câu trả lời:</strong>
						<p> {{ $faq->reply_content }}</p>
					</div>

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
							item += '	<a href="../public/f02/'+post.id+'">'+post.title+'</a> - '+post.created_at;
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