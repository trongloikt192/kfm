<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KFM Admin Control Panel ! Login</title>
	
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	{{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css') }}
    {{-- {{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css') }} --}}
    {{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css') }}
    {{ HTML::style('css/admincp/style.css') }}
</head>
<body>

	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>


		<div id="layout_content" class="c-login clearfix">

			<div class="header">
				<img src="{{asset('img/KMF_Logo_Blue.png')}}">
				CONTROL PANEL
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-key"></i> Login
			</div>

			
			<div class="widget-content">
				{{ Form::open(['route'=>'admincp.login']) }}
				<input type="text" name="email_or_username" placeholder="Email / username">
				<input type="password" name="password" placeholder="Password">
				<button class="btn btn-blue pull-right" type="submit">Login</button>
				{{ Form::close() }}
			</div>
			

			

		</div> <!-- /content -->
		
		@include('admincp.layouts_admincp.footer')

	</div> <!-- /wrapper -->

	{{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js') }} --}}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js') }} --}}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js') }}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/excanvas.min.js') }} --}}

    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.categories.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.fillbetween.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.stack.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.crosshair.min.js') }} --}}

    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-hashchange/v1.3/jquery.ba-hashchange.min.js') }} --}}
    {{-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.easytabs/3.2.0/jquery.easytabs.min.js') }} --}}

	<script type="text/javascript">

		$(window).load(function(){
			$('#loading').fadeOut(1000);

		}) // Ready.
	</script>
</body>
</html>