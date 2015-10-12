<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <div align="center">
            <h3>Trang đang được xây dựng. Quay lại trang chủ sau 5s nữa</h3>
            {{ HTML::image(url('img/websitebuilding.jpg')) }}
        </div>
        
    </body>
    
    <script type="text/javascript">
        setTimeout(function() {
            window.location.href = '{{ url() }}';
        }, 5000);
        
        
    </script>
</html>



