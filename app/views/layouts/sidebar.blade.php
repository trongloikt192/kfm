<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			Đăng nhập
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
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			Tin mới cập nhật
		</h3>
	</div>
	<div class="panel-body">
		@foreach ($top5posts as $post)
			<div class="media">
			  	<div class="media-left">
			    	<a href="{{ url('f02' . $post->id ) }}">
			      		<img class="media-object" src="{{ image_url('post', $post->image) }}" alt="{{ $post->title }}" style="max-width: 100px; max-height: 100px;">
			    	</a>
			  	</div>
			  	<div class="media-body">
			    	<h4 class="media-heading">{{ link_to( 'f02/' . $post->id, $post->title ) }}</h4>
			    	{{ $post->description }}
			  	</div>
			</div>
			<hr>
		@endforeach
		
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			Các câu hỏi thường gặp
		</h3>
	</div>
	<div class="panel-body">
		@foreach ($top5faqs as $faq)
			<div class="media">
			  	{{-- <div class="media-left">
			    	<a href="{{ url('f02' . $faq->id ) }}">
			      		<img class="media-object" src="http://lorempixel.com/90/70/" alt="{{ $faq->title }}">
			    	</a>
			  	</div> --}}
			  	<div class="media-body">
			    	<h4 class="media-heading">{{ link_to( 'f02/' . $faq->id, $faq->title ) }}</h4>
			    	{{ $faq->title }}
			  	</div>
			</div>
			<hr>
		@endforeach
	</div>
</div>