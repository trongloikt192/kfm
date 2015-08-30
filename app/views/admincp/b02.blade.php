@extends('admincp.layouts_admincp.master')

@section('title')
	Dashboard
@stop

@section('content')
    <div class="fluid">

        <div class="widget grid6">
            <div class="widget-header">
                <div class="widget-title">
                    <i class="fa fa-comments"></i> Recent Questions
                </div>
                <div class="widget-controls">
                    <div class="badge msg-badge">34</div>
                </div>
            </div> <!-- /widget-header -->

            <div class="comment">
                <div class="img-comment vignette">
                    <img src="{{asset('img/comment-1.jpg')}}">
                </div>
                <div class="comment-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                    <br>
                    <div class="comment-info">
                        User: <span>Kyle</span> on IP: <span>172.10.56.3</span>
                    </div>
                    <div class="comment-controls">
                        <button class="btn btn-mini btn-blue">Edit</button>
                        <button class="btn btn-mini btn-green">Approve</button>
                        <button class="btn btn-mini btn-black">Delete</button>
                    </div>
                </div>
            </div> <!-- /comment -->

            <hr>

            <div class="comment">
                <div class="img-comment vignette">
                    <img src="{{asset('img/comment-2.jpg')}}">
                </div>
                <div class="comment-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                    <br>
                    <div class="comment-info">
                        User: <span>John</span> on IP: <span>172.10.56.3</span>
                    </div>
                    <div class="comment-controls">
                        <button class="btn btn-mini btn-blue">Edit</button>
                        <button class="btn btn-mini btn-green">Approve</button>
                        <button class="btn btn-mini btn-black">Delete</button>
                    </div>
                </div>
            </div> <!-- /comment -->

            <hr>

            <div class="pag pag-mini">
              <ul class="pagination">
                <li class="disabled"><a href="#" onclick="return false;"><i class="fa fa-caret-left"></i></a></li>
                <li class="active"><a href="#" onclick="return false;">1</a></li>
                <li><a href="#" onclick="return false;">2</a></li>
                <li><a href="#" onclick="return false;">3</a></li>
                <li><a href="#" onclick="return false;">4</a></li>
                <li><a href="#" onclick="return false;">5</a></li>
                <li class="disabled period"><a href="#" onclick="return false;">...</a></li>
                <li><a href="#" onclick="return false;">25</a></li>
                <li><a href="#" onclick="return false;"><i class="fa fa-caret-right"></i></a></li>
              </ul>
              <button class="btn btn-blue">View All</button>
            </div>

        </div> <!-- /widget -->

        <div class="widget grid6">
            <div class="widget-header">
                <div class="widget-title">
                    <i class="fa fa-pencil"></i> Contact
                </div>
                <div class="widget-controls">
                    <input type="checkbox" id="switch-form" />
                </div>
            </div> <!-- /widget-header -->
            
            <div class="widget-content clearauto">
                <input type="text" placeholder="Email title">
                <textarea placeholder="Content" ></textarea>
                <button class="btn btn-blue pull-right" type="submit">Sent</button>
            </div>

        </div> <!-- /widget -->

    </div> <!-- /fluid -->


@stop