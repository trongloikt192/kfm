

<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
         
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button> 
        {{-- <a class="navbar-brand" href="{{ url() }}">KMF</a> --}}
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @foreach ( $menu as $item )
                <li>
                    @if ( count($item->children) > 0 || count($item->pages) > 0 )
                        @if ( empty($item->url) )
                            <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown">{{ $item->name }}<strong class="caret"></strong></a>
                        @else
                            <a href="{{ url($item->url) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $item->name }}<strong class="caret"></strong></a>
                        @endif
                        
                        <ul class="dropdown-menu">
                            @foreach ( $item->children as $children )
                                <li role="separator" class="divider"></li>
                                @if ( empty($children->url) )
                                    <li>
                                        <a href="#" onclick="return false;">{{ $children->name }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url($children->url) }}">{{ $children->name }}</a>
                                    </li>
                                @endif
                                <!--<li role="separator" class="divider"></li>-->
                            @endforeach
                            
                            @foreach ( $item->pages as $page )
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ url('f07/' . $page->slug) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        
                    @else
                        @if ( empty($item->url) )
                            <a href="#" onclick="return false;">{{ $item->name }}</a>
                        @else
                            <a href="{{ url($item->url) }}">{{ $item->name }}</a>
                        @endif
                    @endif
                    
                </li>
            @endforeach
            
        </ul>

        <ul class="nav navbar-right">
            <li style="padding-right: 10px;">
                <i id="btn_search" class="fa fa-3x fa-search"></i>
            </li>
        </ul>

        {{ Form::open(['route'=>'f06.search', 'class'=>'navbar-form navbar-right', 'role'=>'search'])}}
            <input id="textbox-search" name="key_search" class="input-sm" type="text" placeHolder="Tìm kiếm" />   
        {{ Form::close() }}
    </div>
    
</nav>