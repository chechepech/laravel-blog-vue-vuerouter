@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Personal Data</h3>
				</div>
				<div class="box-body">
					<!-- Messages Error -->
						@include('partials.error-messages')
					<!-- End Message Errors -->
					<form action="{{route('admin.users.store')}}" method="POST" accept-charset="utf-8">
						@csrf
						<div class="form-group">
							<label for="name">Name:</label>
							<input id="name" class="form-control" type="text" name="name" value="{{old('name')}}" autofocus>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input id="email" class="form-control" type="email" name="email" value="{{old('email')}}">
						</div>
						<div class="form-group col-sm-6">
							<label>Roles:</label>
							@include('admin.roles.checkboxes')
						</div>
						<div class="form-group col-sm-6">
							<label>Permissions:</label>
							@include('admin.permissions.checkboxes', ['model'=>$user])
						</div>
						<span class="help-block">Check inbox email</span>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&thinsp;Save user</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection