@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">New Role</h3>
				</div>
				<div class="box-body">
					<!-- Messages Error -->
						@include('partials.error-messages')
					<!-- End Message Errors -->
					<form action="{{route('admin.roles.store')}}" method="POST" accept-charset="utf-8">
						@csrf
						@include('admin.roles.form')
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Save&ensp;<i class="fa fa-save"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection