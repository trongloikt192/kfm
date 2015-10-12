@extends('...layouts.master')

@section('header-title')
    {{ $post->title }}
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">
		
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>{{ $post->title }}</h2>
					<p class="text-muted">
				        {{ $post->created_at->format('G:i A | d/m/Y') }}
				    </p>
				    {{ $post->content_vi }}
				</div>

				@if(count($ref_posts) > 0)
					<div class="panel-footer">
						<h3>
							Các tin khác
						</h3>

						<div>
						@foreach ($ref_posts as $post) 
							<div id="div-login-msg">
				                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
				                <span id="text-login-msg">
				                    {{ link_to('f02/' . $post->slug, $post->title) }} - {{ $post->created_at->format('d/m/Y | G:i A') }}
				                </span>
				            </div>
						@endforeach
						</div>
					</div>
				@endif
			</div>

			

			
		</div>
	</div>
@stop