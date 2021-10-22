@extends('pakistan.layouts.master')

@section('page_title','Transactions')
@section('page_select','Add Transaction')
@section('transaction_select','active')
@section('container')

<a href="{{url('pakistan/transaction')}}">
	<button type="button" class="btn btn-success">
		Back
	</button>
</a>
<div class="row m-t-30">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ url('pakistan/transaction/update_transaction') }}" method="post">
							@csrf
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label class="control-label mb-1">Client Number</label>
										<input value="0{{$transaction->mobile_number}}" type="text" class="form-control" aria-required="true" onkeypress="return IsNumeric(event);" aria-invalid="false" required readonly>
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Total Amount</label>
										<input value="{{$transaction->total}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off" readonly>
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Client Name</label>
										<input name="client_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Transation ID</label>
										<input name="transaction_id" type="text" onkeypress="return IsNumeric(event);" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
									</div>

								</div>
							</div>
							<input type="hidden" name="id" value="{{$transaction->id}}">
							<div>
								<button type="submit" class="btn btn-lg btn-info btn-block">
									Submit
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>        
	</div>
</div>

@endsection