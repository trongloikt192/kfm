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
					<h3>
						@if($cat_title)
							{{ $cat_title }}
						@else
							Bài viết
						@endif
					</h3>
					<hr>
					
					@foreach($posts as $post)
						<div class="media well">
							<div class="media-left">
								<a href="{{ url('post/'.$post->slug) }}">
									<img class="media-object img-thumbnail img-responsive" src="{{ image_url('post', $post->image )}}" alt="{{ $post->title }}" style="width: 200px; max-width: 200px; max-height: 200px;">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">{{ link_to('post/' . $post->slug, $post->title) }}</h4>
								{{ str_limit($post->description, 290, "...") }}
							</div>
							<div>
								<p>
									<a type="button" class="btn btn-sm btn-primary pull-right" href="{{ url('post/'.$post->slug) }}">Xem chi tiết</a>
								</p>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
			
		</div>
	</div>
@stop
