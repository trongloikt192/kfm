
@section('styles')
    <style type="text/css">
		.bx-wrapper .bx-viewport {
			-webkit-box-shadow: none !important;
	    	box-shadow: none !important; 
    		border: 5px solid #e5e5e5 !important;
		}
	</style>
	
@stop

<footer>
	<div class="container">
		<div class="row">
			<!--
				<div class="col-md-12">

					@if ( count($logo_customers) > 0 ) 
						<p><strong>Khách hàng</strong></p>
						
						<div id="logoCus_slider">
							@foreach ( $logo_customers as $customer )
								<div class="slide"><a href="#" taget=""><img src="{{ $customer->logo }}"></a></div>
							@endforeach
						  
						</div>
					@endif
					
				</div>
			-->
			<div class="col-md-12">

			<div class="row">
				<address class="col-md-8">
					<strong>{{ $info->company }}</strong>
					<br />Địa chỉ: {{ $info->address }}
					<br /><abbr title="Phone">Điện thoại:</abbr> <strong>{{ $info->phone_number_1 }}</strong>
					@if($info->phone_number_2)
						hoặc <strong>{{ $info->phone_number_2 }}</strong>
					@endif
					@if($info->email_1)
						<br />
						Email: <a href="mailto:{{ $info->email_1 }}">{{ $info->email_1 }}</a>
					@endif

				</address>
				<div class="col-md-4 menu-mini">
					{{ link_to('', 'Trang chủ') }} | {{ link_to('f07/so-luoc-ve-cong-ty-kmf', 'Giới thiệu') }} | {{ link_to('f05', 'Liên hệ') }}
					<br />
					Copyright © 2015 KMF
				</div>

			</div>
			
			
		</div>
		</div>
	</div>

</footer>


@section('scripts')
	
	<script type="text/javascript">
		$(document).ready(function(){
		  $('#logoCus_slider').bxSlider({
		    slideWidth: 300,
		    minSlides: 5,
		    maxSlides: 10,
		    slideMargin: 30,
		    auto: true,
		    autoHover: true,
		    speed: 1000,
		    pager: false,
		    controls: false,
		    pause: 1500,
		    moveSlides: 1
		  });
		});
	</script>
	
@stop