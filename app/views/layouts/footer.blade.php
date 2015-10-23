
@section('styles')
    <style type="text/css">
		.bx-wrapper .bx-viewport {
			-webkit-box-shadow: none !important;
	    	box-shadow: none !important; 
    		border: 5px solid #e5e5e5 !important;
		}
	</style>
	
@stop

<div class="row" style="padding: 10px;">
	<div class="col-md-9">
		
		
		@if ( count($logo_customers) > 0 ) 
			<p><strong>Khách hàng</strong></p>
			
			<div id="logoCus_slider">
				@foreach ( $logo_customers as $customer )
					<div class="slide"><a href="#" taget=""><img src="{{ $customer->logo }}"></a></div>
				@endforeach
			  
			</div>
		@endif
		
	</div>

	<div class="col-md-3">
		<div>
			{{ link_to('', 'Trang chủ') }} | {{ link_to('f07/so-luoc-ve-cong-ty-kmf', 'Giới thiệu') }} | {{ link_to('f05', 'Liên hệ') }}
		</div>
		<address>
			 <strong>Kmf, Ltd</strong><br /> 12 Nguyễn Cảnh Chân, P.Nguyễn Cư Trinh<br /> Quận 1, Tp. HCM<br /> <abbr title="Phone">P:</abbr> 0972 331 505
		</address>
		Copyright © 2015 KMF
	</div>
</div>


@section('scripts')
	
	<script type="text/javascript">
		$(document).ready(function(){
		  $('#logoCus_slider').bxSlider({
		    slideWidth: 300,
		    minSlides: 5,
		    maxSlides: 10,
		    slideMargin: 10,
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