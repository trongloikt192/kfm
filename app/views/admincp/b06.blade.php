@extends('admincp.layouts_admincp.master')

@section('title')
	Khách hàng
@stop

@section('content')

	<button href="javascript:;" class="btn btn-default"><i class="fa fa-plus"></i> Thêm mới</button>

	<div class="fluid">
		
		<div class="widget grid12">
			<div class="widget-header">
				<div class="widget-title">
					<i class="fa fa-pencil"></i> Simple Inputs
				</div>
				<div class="widget-controls">
					<div class="badge msg-badge">34</div>
				</div>
			</div> <!-- /widget-header -->
			
			<div class="widget-content pad20f">

				<table class="table" id="example1">
					<thead>
						<tr>
							<th>Rendering engine</th>
							<th>Browser</th>
							<th>Platform(s)</th>
							<th>Engine version</th>
							<th>CSS grade</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Trident</td>
							<td>Internet
								 Explorer 4.0</td>
							<td>Win 95+</td>
							<td class="center">4</td>
							<td class="center">X</td>
						</tr>
						<tr>
							<td>Trident</td>
							<td>Internet
								 Explorer 5.0</td>
							<td>Win 95+</td>
							<td class="center">5</td>
							<td class="center">C</td>
						</tr>
						<tr>
							<td>Trident</td>
							<td>Internet
								 Explorer 5.5</td>
							<td>Win 95+</td>
							<td class="center">5.5</td>
							<td class="center">A</td>
						</tr>
						<tr>
							<td>Trident</td>
							<td>Internet
								 Explorer 6</td>
							<td>Win 98+</td>
							<td class="center">6</td>
							<td class="center">A</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>Rendering engine</th>
							<th>Browser</th>
							<th>Platform(s)</th>
							<th>Engine version</th>
							<th>CSS grade</th>
						</tr>
					</tfoot>
				</table>
				
			</div> <!-- /widget-content -->

		</div> <!-- /widget -->
	</div>

</div>
@stop