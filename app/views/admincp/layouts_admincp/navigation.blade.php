<div id="top">
                
    <div class="main-logo">
        <a href="{{ URL::to('') }}" target="_blank"><img src="{{asset('img/KMF_Logo_Blue.png')}}"></a>
        CONTROL PANEL
    </div>
    
    <div class="m-nav"><i class="fa fa-bars"></i></div>

    <div class="profile-nav">
        <ul>
            <li class="profile-user-info">
                <a href="#" onclick="return false;">
                    {{-- <img src="{{asset('img/user.jpg')}}" class="user-img"> --}}
                    @if($user = Auth::user()) 
                    <b>Xin chào, </b><span>{{ $user->fullname }}</span> <i class="fa fa-user"></i>
                    @endif
                </a>
            </li>
            <li>
                <a href="#" onClick="return false;">
                    <i class="fa fa-gear"></i> Settings
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admincp/logout') }}">
                    <i class="fa fa-times-circle"></i> Logout
                </a>
            </li>
        </ul>
    </div>

</div> <!-- /top -->