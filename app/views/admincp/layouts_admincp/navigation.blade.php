<div id="top">
                
    <div class="main-logo">
        <a href="{{ URL::to('f01') }}" target="_blank"><img src="{{asset('img/logo.png')}}"></a>
    </div>
    
    <div class="m-nav"><i class="fa fa-bars"></i></div>

    <div class="profile-nav">
        <ul>
            <li class="profile-user-info">
                <a href="#" onclick="return false;">
                    <img src="{{asset('img/user.jpg')}}" class="user-img">
                    <b>Welcome, </b><span>John Doe</span> <i class="fa fa-user"></i>
                </a>
            </li>
            <li>
                <a href="#" onclick="return false;">
                    <i class="fa fa-gear"></i> Settings
                </a>
            </li>
            <li>
                <a href="b01">
                    <i class="fa fa-times-circle"></i> Logout
                </a>
            </li>
        </ul>
    </div>

</div> <!-- /top -->