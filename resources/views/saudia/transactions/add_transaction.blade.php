@extends('saudia.layouts.master')

@section('page_title','Transactions')
@section('page_select','Add Transaction')
@section('transaction_select','active')
@section('container')

<a href="{{url('saudia/transaction')}}">
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
						<form action="{{ url('saudia/transaction/create_transaction') }}" method="post">
							@csrf
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label class="control-label mb-1">Phone Number</label>
										<input name="number" type="text" onkeypress="return IsNumeric(event);" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Amount in SAR</label>
										<input name="sar" id="sar" type="text" class="form-control" aria-required="true" onkeypress="return IsNumeric(event);" aria-invalid="false" required>
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Rate</label>
										<input name="rate" id="rate" value="{{$rate->rate}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off" readonly>
									</div>

									<div class="col-md-3">
										<label class="control-label mb-1">Total</label>
										<input name="total_amount" id="total" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off" readonly>
									</div>

								</div>
							</div>
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