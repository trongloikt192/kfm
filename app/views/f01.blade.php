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
                <img alt="" src="{{ image_url('setting', $layout_slides->slide_1) }}" />
                <div class="carousel-caption">
                    <h4>

                    </h4>
                    <p>

                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="Slide 2" src="{{ image_url('setting', $layout_slides->slide_2) }}" />
                <div class="carousel-caption">
                    <h4>
                        
                    </h4>
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="Side 3" src="{{ image_url('setting', $layout_slides->slide_3) }}" />
                <div class="carousel-caption">
                    <h4>
                    
                    </h4>
                    <p>

                    </p>
                </div>
            </div>
        </div> <a class="left carousel-control" href="#carousel-304998" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-304998" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
	<div class="page-header">
        <h1>
            Tin Tức <small>những tin tức & hoạt động mới nhất</small>
        </h1>
    </div>
    <div class="row">
        @for ($i = 0; $i < ( $news_len > 3 ? 3 : $news_len ); $i++)
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="{{$news[$i]->title}}" src="{{ image_url('post', $news[$i]->image) }}" />
                    <div class="caption">
                        <h3>
                            {{ link_to('/f02/' . $news[$i]->slug, $news[$i]->title) }}
                        </h3>
                        <p>
                            {{ str_limit($news[$i]->description, 200, "...") }}
                        </p>
                        <p>
                            <a class="btn btn-sm btn-primary" href="{{ url('/f02/' . $news[$i]->slug) }}">Xem tin tức</a>
                        </p>
                    </div>
                </div>
            </div>
        @endfor


        <div class="col-md-12">
            @for ($i = 3; $i < $news_len; $i++)
                <div id="div-login-msg">
                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                    <span id="text-login-msg">
                        {{ link_to('/f02/' . $news[$i]->slug, $news[$i]->title) }} - {{ $news[$i]->created_at->format('d/m/Y - g:ia') }}
                    </span>
                </div>
            @endfor
        </div>
    </div>


    <div class="page-header">
        <h1>
            Sản Phẩm <small>những sản phẩm & dịch vụ mới nhất</small>
        </h1>
    </div>
    <div class="row">
        @for ($i = 0; $i < ( $products_len > 3 ? 3 : $products_len ); $i++)
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="{{$products[$i]->title}}" src="{{ image_url('post', $products[$i]->image) }}" />
                    <div class="caption">
                        <h3>
                            {{ link_to('/f02/' . $products[$i]->slug, $products[$i]->title) }}
                        </h3>
                        <p>
                            {{ str_limit($products[$i]->description, 200, "...") }}
                        </p>
                        <p>
                            <a class="btn btn-sm btn-primary" href="{{ url('/f02/' . $products[$i]->slug) }}">Xem</a>
                        </p>
                    </div>
                </div>
            </div>
        @endfor

        <div class="col-md-12">
            @for ($i = 3; $i < $products_len; $i++)
                <div id="div-login-msg">
                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                    <span id="text-login-msg">
                        {{ link_to('/f02/' . $products[$i]->slug, $products[$i]->title) }} - {{ $products[$i]->created_at->format('d/m/Y - g:ia') }}
                    </span>
                </div>
            @endfor
        </div>
    </div>  
@stop