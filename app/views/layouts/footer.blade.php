<div class="row" style="padding: 10px;">
	<div class="col-md-9">
		<p><strong>Khách hàng</strong></p>
		<!-- Jssor Slider Begin -->
	    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
	    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 780px; height: 100px; overflow: hidden;">

	        <!-- Loading Screen -->
	        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
	            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
	                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
	            </div>
	            <div style="position: absolute; display: block; background: url('img/loading.gif') no-repeat center center;
	                top: 0px; left: 0px;width: 100%;height:100%;">
	            </div>
	        </div>

	        <!-- Slides Container -->
	        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 780px; height: 100px; overflow: hidden;">

	        	@foreach ($logo_customers as $customer)
	        		<div><img u="image" src="{{ image_url('customer', $customer->logo) }}" /></div>
				@endforeach
	        </div>
	        
	        <!--#region Bullet Navigator Skin Begin -->
	        <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
	        <style>
	            /* jssor slider bullet navigator skin 03 css */
	            /*
	            .jssorb03 div           (normal)
	            .jssorb03 div:hover     (normal mouseover)
	            .jssorb03 .av           (active)
	            .jssorb03 .av:hover     (active mouseover)
	            .jssorb03 .dn           (mousedown)
	            */
	            .jssorb03 {
	                position: absolute;
	            }
	            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
	                position: absolute;
	                /* size of bullet elment */
	                width: 21px;
	                height: 21px;
	                text-align: center;
	                line-height: 21px;
	                color: white;
	                font-size: 12px;
	                background: url(img/b03.png) no-repeat;
	                overflow: hidden;
	                cursor: pointer;
	            }
	            .jssorb03 div { background-position: -5px -4px; }
	            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
	            .jssorb03 .av { background-position: -65px -4px; }
	            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
	        </style>
	        <!-- bullet navigator container -->
	        <div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;">
	            <!-- bullet navigator item prototype -->
	            <div u="prototype"><div u="numbertemplate"></div></div>
	        </div>
	        <!--#endregion Bullet Navigator Skin End -->
	        
	        <!--#region Arrow Navigator Skin Begin -->
	        <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
	        <style>
	            /* jssor slider arrow navigator skin 03 css */
	            /*
	            .jssora03l                  (normal)
	            .jssora03r                  (normal)
	            .jssora03l:hover            (normal mouseover)
	            .jssora03r:hover            (normal mouseover)
	            .jssora03l.jssora03ldn      (mousedown)
	            .jssora03r.jssora03rdn      (mousedown)
	            */
	            .jssora03l, .jssora03r {
	                display: block;
	                position: absolute;
	                /* size of arrow element */
	                width: 55px;
	                height: 55px;
	                cursor: pointer;
	                background: url(img/a03.png) no-repeat;
	                overflow: hidden;
	            }
	            .jssora03l { background-position: -3px -33px; }
	            .jssora03r { background-position: -63px -33px; }
	            .jssora03l:hover { background-position: -123px -33px; }
	            .jssora03r:hover { background-position: -183px -33px; }
	            .jssora03l.jssora03ldn { background-position: -243px -33px; }
	            .jssora03r.jssora03rdn { background-position: -303px -33px; }
	        </style>
	        <!-- Arrow Left -->
	        <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;">
	        </span>
	        <!-- Arrow Right -->
	        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
	        </span>
	        <!--#endregion Arrow Navigator Skin End -->
	        <!--<a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>-->
	    </div>
	    <!-- Jssor Slider End -->
	</div>

	<div class="col-md-3">
		<div>
			{{ link_to('', 'Trang chủ') }} | {{ link_to('f05', 'Giới thiệu') }} | {{ link_to('f05', 'Liên hệ') }}
		</div>
		<address>
			 <strong>Kfm, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
		</address>
		Copyright © 2015 KMF
	</div>
</div>