@extends('admin.layouts.master')

@section('page_title','Rate')
@section('page_select','Rate')
@section('rate_select','active')
@section('container')

@if(session()->has('msg'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
	{{session('msg')}}  
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div> 
@endif

<div class="row my-2">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="card">
			<div class="card-body">
				<div class="col-md-8">
					Current Rate: <strong>{{$rate['rate']}} </strong>SAR
				</div>
				<hr>
				<div class="col-md-8">
					<form action="{{ url('admin/rate_change') }}" method="post">
						@csrf	
						<label>Change Rate:</label>
						<input type="number" name="rate" class="form-control">
						<input type="submit" class="btn btn-sm btn-info">
					</form>
				</div>
			</div>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection