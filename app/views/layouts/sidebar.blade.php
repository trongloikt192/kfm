
<!--
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Đăng nhập</strong>
		</h3>
	</div>
	<div class="panel-body">
		<form>
			<p class="loading"></p>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="email_or_username" placeholder="Email or Username">
			</div>
			<span class="help-block"></span>
								
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input  type="password" class="form-control" name="password" placeholder="Password">
			</div>
            <span class="help-block hidden">Sai tài khoản hoặc mật khẩu</span>

			<div style="form-group">
				<div>
					<label><input type="checkbox" /> Ghi nhớ mật khẩu</label>
					<a href="{{ URL::to('f03') }}" class="pull-right">Quên mật khẩu?</a>
				</div>
				
				<button type="submit" class="btn btn-md btn-primary">Đăng nhập</button>

				<a type="button" href="{{ URL::to('f04') }}" class="btn btn-md btn-default pull-right">Đăng ký</a>

			</div>
		</form>
		
	</div>
</div>
-->


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Tin mới cập nhật</strong>
		</h3>
	</div>
	<div class="panel-body">
		@foreach ($top5posts as $post)
			<div class="media">
			  	<div class="media-left">
			    	<a href="{{ url('post/' . $post->slug ) }}">
			      		<img class="media-object" src="{{ image_url('post', $post->image) }}" alt="{{ $post->title }}" style="max-width: 100px; max-height: 100px;">
			    	</a>
			  	</div>
			  	<div class="media-body">
			    	<h4 class="media-heading">{{ link_to('post/' . $post->slug, $post->title) }}</h4>
			  	</div>
			</div>
			<hr>
		@endforeach
		<a class="pull-right" href="{{ url('posts') }}">Xem tất cả</a>
	</div>
</div>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Liên hệ</strong>
		</h3>
	</div>
	<div class="panel-body">
		<div class="media">
		  	<div class="media-left">
		    	<img src="{{ asset('img/phone-icon.png') }}" align="middle">
		  	</div>
		  	<div class="media-body">
		    	<p class="hotline">
					Hotline: 
					<br/>{{ $info->hotline_1 }}

					@if($info->hotline_2)
					<br/>{{ $info->hotline_2 }}
					@endif
				</p>
		  	</div>
		</div>
		<div class="media">
		  	<div class="media-left">
		    	<img src="{{ asset('img/email-2-icon.png') }}" align="middle">
		  	</div>
		  	<div class="media-body">
		    	<p class="hotline">
					Email: 
					<br/>{{ $info->email_2 }}
				</p>
		  	</div>
		</div>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Các câu hỏi thường gặp</strong>
		</h3>
	</div>
	<div class="panel-body">
		@foreach ($top5faqs as $faq)
			<div class="media">
			  	<div class="media-left">
			    	<i class="fa fa-4x fa-question-circle text-primary"></i>
			  	</div>
			  	<div class="media-body">
			    	<h4 class="media-heading">{{ link_to('hoi-dap/' . $faq->id, $faq->title) }}</h4>
			    	{{ str_limit($faq->content, 100, "...") }}
			  	</div>
			</div>
			<hr>
		@endforeach
		@if ( count($top5faqs) > 0 )
			<a class="pull-right" href="{{ url('hoi-dap') }}">Xem tất cả</a>
		@endif
	</div>
</div>