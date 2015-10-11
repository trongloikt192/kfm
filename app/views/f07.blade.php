@extends('...layouts.master')

@section('header-title')
    {{ $page->title }}
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h2 style="font-weight: 700; color: rgb(3, 78, 136);">{{ $page->title }}</h2>
					{{-- <p class="text-muted">
				        {{ $page->created_at->format('G:i A | d/m/Y') }}
				    </p> --}}
				    {{ $page->content }}
				</div>

			</div>

			

			
		</div>
	</div>
@stop