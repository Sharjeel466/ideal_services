@extends('admin.layouts.master')

@section('page_title','Add User')
@section('page_select','Add User')
@section('user_select','active')
@section('container')

<a href="{{url('admin/user')}}">
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
						<form action="{{ url('admin/user/create_user') }}" method="post">
							@csrf
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label class="control-label mb-1">Name</label>
										<input name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
									</div>

									<div class="col-md-4">
										<label class="control-label mb-1">Number</label>
										<input name="number" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
									</div>

									<div class="col-md-4">
										<label class="control-label mb-1">Email</label>
										<input name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
									</div>

									<div class="col-md-4">
										<label class="control-label mb-1">Role</label>
										<select name="role" class="form-control" required>
											<option value="0">Select Role</option>
											@foreach($role as $list)
											<option value="{{$list->id}}">{{$list->name}}</option>
											@endforeach
										</select>
									</div>

									<div class="col-md-4">
										<label class="control-label mb-1">Password</label>
										<input name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" required autocomplete="off">
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