@extends('...layouts.master')

@section('header-title')
    Tin tức & hoạt động
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Tin tức & hoạt động</h3>
					<hr>
					@foreach($posts as $post)
						<div class="media well">
							<div class="media-left">
								<a href="{{ url('f02/'.$post->slug) }}">
								<img class="media-object img-thumbnail img-responsive" src="{{ image_url('post', $post->image )}}" alt="{{ $post->title }}" style="width: 200px; max-width: 200px; max-height: 200px;">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">{{ $post->title }}</h4>
								{{ $post->description }}
							</div>
							<div>
								<p>
								<a type="button" class="btn btn-sm btn-primary pull-right" href="{{ url('f02/'.$post->slug) }}">Xem chi tiết</a>
								</p>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
			
		</div>
	</div>
@stop