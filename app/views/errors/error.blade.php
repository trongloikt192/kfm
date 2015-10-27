<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KMF - CONG TY TNHH KIEM TOAN VA TU VAN</title>

    <meta name="description" content="KMF cong ty kiem toan & tu van">
    <meta name="author" content="KMF cong ty kiem toan & tu van">

    {{ HTML::style('css/simplex_cus.min.css') }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
  </head>
<body>
    <div class="jumbotron" style="margin-top: 20px" align="center">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>Whoops! <small>{{ $code }} error</small></h1>
                <br>
                <h3 class="text-muted">Looks like something went wrong</h3>
                @if($code == '500')
                    <h3 class="text-muted">The resource you're looking for does not exist</h3>
                @else
                    <h3 class="text-muted">The page you're looking for does not exist</h3>
                @endif
                <h4>
                    {{ link_to('home', 'Quay về trang chủ') }}
                </h4>
            </div>
            <div class="col-md-6 text-center">
                <h1><i class="fa fa-frown-o fa-4x"></i></h1>
            </div>
        </div>
    </div>
    
</body>
</html>