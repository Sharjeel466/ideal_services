@extends('pakistan.layouts.master')

@section('page_title','Transactions')
@section('page_select','Transactions')
@section('transaction_select','active')
@section('container')

@if(session()->has('msg'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
	{{session('msg')}}  
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div> 
@endif
<div class="card">
	<div class="card-body">
		<div class="col-md-6">
			<label>Filter Data by Client Number/Name:</label>
			<input type="search" class="form-control" name="client" id="pakistan_client" placeholder="Enter Client Name/Number">
		</div>
	</div>
</div>
<div class="row my-2">
	<div class="col-md-12">
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Employee</th>
						<th>Client</th>
						<th>M-Number</th>
						<th>SAR</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Trans-ID</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="show_data_pakistan">
					@php
					$n = 1;
					@endphp
					@foreach($transactions as $list)
					<tr>
						<td>@php echo $n++; @endphp</td>
						<td>{{$list->user->name}}</td>
						<td>{{$list->customer}}</td>
						<td>{{$list->mobile_number}}</td>
						<td>{{$list->sar}}</td>
						<td>{{$list->rate}}</td>
						<td>{{$list->total}}</td>
						<td>{{$list->transaction_id}}</td>
						@if ($list->status == 0)
						<td>{{$list->status}}</td>
						@else
						<td><p class="btn btn-sm btn-success"><i class="fas fa-check"></i></p></td>
						@endif
						<td><a href="{{ url('pakistan/transaction/edit_transaction/'.$list->id) }}" class="btn btn-info btn-sm">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection