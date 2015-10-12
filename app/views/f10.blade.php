@extends('...layouts.master')

@section('header-title')
    Những câu hỏi thường gặp
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Hỏi đáp</h3>
					<hr>
					{{-- <button type="button" class="btn btn-default pull-right"><i class="fa fa-question-circle"></i> Đặt câu hỏi</button> --}}
					@foreach($faqs as $faq)
						<div class="well">
							<div class="pull-left"><i class="fa fa-3x fa-question-circle text-primary"></i></div>
							<div style="padding-left: 50px;">
								<p>{{ $faq->content }}</p>
								<div>
									<i class="fa fa-comments"></i> {{ link_to('f09/' . $faq->id, 'Trả lời') }}
								</div>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
			
		</div>
	</div>
@stop
