@extends('...layouts.master')

@section('header-title')
    Trang Kết quả tìm kiếm
@stop

@section('content-header')
    @include('layouts/content-header')
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Kết quả tìm kiếm</h3>
					<hr>

					<br/>

					<form class="form-inline">
						<h4>Nhập từ khóa</h4>
						<div class="form-group">
							<input type="text" class="form-control" id="search" name="search">
						</div>
						<button type="submit" class="btn btn-default">Tìm kiếm</button>
					</form>

					<br/>

					<div>
						Không có dữ liệu nào thỏa mãn điều kiện tìm kiếm của bạn.
					</div>

					<ol class="search-results node-results">
						<li class="search-result">
							<h5 class="title">
								<a href="https://daa.uit.edu.vn/thongbao/thong-bao-chuc-danh-gia-va-cap-chung-chi-tieng-anh-vnu-ept">THÔNG BÁO TỔ CHỨC ĐÁNH GIÁ VÀ CẤP CHỨNG CHỈ  TIẾNG ANH VNU-EPT</a>
							</h5>
							<div class="search-snippet-info">
								<p class="search-snippet">...  CHỨC ĐÁNH GIÁ VÀ CẤP CHỨNG CHỈ&nbsp; TIẾNG ANH <strong>VNU-EPT</strong>    
									Nhằm đánh giá trình độ tiếng Anh của sinh viên và ...  tổ chức đánh giá và cấp chứng chỉ tiếng Anh <strong>VNU-EPT</strong> như sau:  
									&nbsp;1.&nbsp; Chứng chỉ tiếng Anh <strong>VNU-EPT</strong>    
									- ...</p>
									<p class="search-info"><span class="username" xml:lang="" about="/users/duyenpt" typeof="sioc:UserAccount" property="foaf:name" datatype="">duyenpt</span> - 03/08/2015 - 16:02</p>
							</div>
						</li>
						<li class="search-result">
							<h5 class="title">
								<a href="https://daa.uit.edu.vn/content/ky-su-nganh-an-toan-thong-tin">Kỹ sư 	ngành An toàn thông tin</a>
							</h5>
								<div class="search-snippet-info">
									<p class="search-snippet">...  Anh văn đạt chuẩn chương trình hệ tài năng <strong>VNU-EPT</strong> cấp độ 10  


									Các chứng chỉ tiếng Anh trình độ ...  cBT 180)  




									TOEIC  


									600  




									<strong>VNU-EPT</strong>  


									330  




									3. Khối kiến thức ...</p>
									<p class="search-info"><span class="username" xml:lang="" about="/users/tuanpv" typeof="sioc:UserAccount" property="foaf:name" datatype="">tuanpv</span> - 17/08/2015 - 10:29</p>
								</div>
							</li>
						</ol>

					</div>
			</div>
			
		</div>
	</div>
@stop