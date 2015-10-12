

<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
         
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button> 
        <a class="navbar-brand" href="{{ url() }}">KFM</a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="#">Giới thiệu</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm & Dịch Vụ <strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">Dịch vụ kiểm toán Báo cáo tài chính</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">Dịch vụ Thẩm định kiểm toán đầu tư và xây dựng cơ bản</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">Dịch vụ Quản lý dự án</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">Dịch vụ tư vấn</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">Dịch vụ kế toán</a>
                    </li>
                </ul>
            </li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hỗ Trợ Khách Hàng <strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('f10') }}">Các câu hỏi thường gặp</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ url('f08/ask-question') }}">Đặt câu hỏi</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ url('page-building') }}">Văn phòng và chi nhánh</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('page-building') }}">Văn Bản Pháp Quy</a>
            </li>
            <li>
                <a href="{{ url('f11') }}">Tin Tức & Hoạt Động</a>
            </li>
            <li>
                <a href="{{ url('page-building') }}">Tuyển Dụng</a>
            </li>
            
        </ul>

        <ul class="nav navbar-right">
            <li style="padding-right: 10px;">
                <i class="fa fa-3x fa-search btn_search"></i>
            </li>
        </ul>

        {{-- <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input class="form-control input-sm" type="text" placeHolder="Tìm kiếm" />
            </div>
        </form> --}}
    </div>
    
</nav>