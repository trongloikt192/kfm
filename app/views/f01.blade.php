@extends('...layouts.master')

@section('header-title')
    Trang chủ
@stop

@section('content-header')
{{-- <div class="row">
    

    <div class="col-md-4">
        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /><img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" />
    </div>
</div> --}}
@stop

@section('content')
    {{-- height: 258px --}}
    <div class="carousel slide" id="carousel-304998">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-304998">
            </li>
            <li data-slide-to="1" data-target="#carousel-304998">
            </li>
            <li data-slide-to="2" data-target="#carousel-304998">
            </li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg" />
                <div class="carousel-caption">
                    <h4>
                        First Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg" />
                <div class="carousel-caption">
                    <h4>
                        Second Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg" />
                <div class="carousel-caption">
                    <h4>
                        Third Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
        </div> <a class="left carousel-control" href="#carousel-304998" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-304998" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
	<div class="page-header">
        <h1>
            Tin Tức <small>những tin tức mới nhất</small>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail First" src="{{ $posts[0]->image }}" />
                <div class="caption">
                    <h3>
                        {{ $posts[0]->title }}
                    </h3>
                    <p>
                        {{ $posts[0]->description }}
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Xem</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail Second" src="{{ $posts[1]->image }}" />
                <div class="caption">
                    <h3>
                        {{ $posts[1]->title }}
                    </h3>
                    <p>
                        {{ $posts[1]->description }}
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Xem</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail Third" src="{{ $posts[2]->image }}" />
                <div class="caption">
                    <h3>
                        {{ $posts[2]->title }}
                    </h3>
                    <p>
                        {{ $posts[2]->description }}
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Xem</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @for ($i = 3; $i < count($posts); $i++)
                <div id="div-login-msg">
                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                    <span id="text-login-msg">
                        <a href="">{{ $posts[$i]->title }}</a> - {{ $posts[$i]->created_at->format('d/m/Y - g:ia') }}
                    </span>
                </div>
            @endfor
        </div>
    </div>


    <div class="page-header">
        <h1>
            Sản phẩm! <small>Interface Builder for Bootstrap</small>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
                <div class="caption">
                    <h3>
                        Thumbnail label
                    </h3>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                <div class="caption">
                    <h3>
                        Thumbnail label
                    </h3>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                <div class="caption">
                    <h3>
                        Thumbnail label
                    </h3>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                    <p>
                        <a class="btn btn-sm btn-primary" href="#">Xem</a> <a class="btn" href="#">Action</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
            <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">
                    <a href="">Type your username and password.</a> - 27/07/2015 - 10:52 
                </span>
            </div>
        </div>
    </div>  
@stop