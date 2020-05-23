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
					<form action="{{route('admin.users.update',$user)}}" method="POST" accept-charset="utf-8">

						@csrf @method('PUT')
						<div class="form-group">
							<label for="name">Name:</label>
							<input id="name" class="form-control" type="text" name="name" value="{{old('name', $user->name)}}" autofocus>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input id="email" class="form-control" type="email" name="email" value="{{old('email', $user->email)}}">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="Type up a password">
							<span class="help-block">Leave this field blank</span>
						</div>
						<div class="form-group">
							<label for="password_confirmed">Confirm Password:</label>
							<input id="password_confirmed" class="form-control" type="password" name="password_confirmed" placeholder="Re-type up password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&ensp;Save user</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<!-- Roles & Permissions -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Roles</h3>
				</div>
				<div class="box-body">
					@role('Admin')
						<form method="POST" action="{{route('admin.users.roles.update', $user)}}">
							@csrf @method('PUT')
							@include('admin.roles.checkboxes')
							<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-floppy-o"></i>&ensp;Save role</button>
						</form>
					@else
						<ul class="list-group">
							@forelse($user->roles as $role)
								<li class="list-group-item">{{$role->name}}</li>
							@empty
								<li class="list-group-item">No Roles</li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
			<!-- Roles & Permissions -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Permissions</h3>
				</div>
				<div class="box-body">
					@role('Admin')
						<form method="POST" action="{{route('admin.users.permissions.update', $user)}}">
							@csrf @method('PUT')
							@include('admin.permissions.checkboxes',['model'=>$user])
							<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-floppy-o"></i>&ensp;Save permissions</button>
						</form>
					@else
						<ul class="list-group">
							@forelse($user->permissions as $permission)
								<li class="list-group-item">{{$role->permission}}</li>
							@empty
								<li class="list-group-item">No Permissions</li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
		</div>
	</div>
@endsection