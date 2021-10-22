@extends('admin.layouts.master')

@section('page_title','Users')
@section('page_select','Users')
@section('user_select','active')
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
		<div class="mb-3">
			<a href="{{url('admin/user/add_user')}}">
				<button type="button" class="btn btn-success">
					Add User
				</button>
			</a>
		</div>
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Role</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$n = 1;
					@endphp
					@foreach($user as $list)
					<tr>
						<td>@php echo $n++; @endphp</td>
						<td>{{$list->name}}</td>
						<td>{{$list->role->name}}</td>
						<td>{{$list->mobile_number}}</td>
						<td>{{$list->email}}</td>
						<td><a href="{{ url('admin/user/delete/'.$list->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection