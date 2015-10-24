<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KMF - @yield('header-title')</title>

    <meta name="description" content="KMF cong ty kiem toan & tu van">
    <meta name="author" content="KMF cong ty kiem toan & tu van">

    {{ HTML::style('css/simplex_cus.min.css') }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
    {{ HTML::script('plugins/jquery.bxslider/jquery.bxslider.min.js') }}
    
    {{ HTML::style('css/style.css') }}
    
    @yield('styles')
  </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @include('layouts/header')
                @include('layouts/navigation')
                @include('layouts/notifications')
                @yield('ajax-notifications')
                
                @yield('content-header')

                <div class="row">
                    <div class="col-md-12">
                        @yield('content')

                    </div>
                    {{-- <div class="col-md-4">
                        @include('layouts/sidebar')
                    </div> --}}
                </div>
                
            </div>
        </div>
    </div>
    @include('layouts/footer')
    
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js') }}
    {{ HTML::script('plugins/jquery.bxslider/jquery.bxslider.min.js') }}
    
    {{ HTML::script('js/scripts.js') }}

    @yield('scripts')


</body>
</html>
