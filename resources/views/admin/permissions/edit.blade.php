@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Permission</h3>
				</div>
				<div class="box-body">
					<!-- Messages Error -->
						@include('partials.error-messages')
					<!-- End Message Errors -->
					<form action="{{route('admin.permissions.update',$permission)}}" method="POST" accept-charset="utf-8">
						@csrf @method('PUT')
						<!-- Edit Form -->
							<div class="form-group">
								<label for="name">Identificator:</label>
								<input id="name" class="form-control" type="text" value="{{$permission->name}}" disabled="disabled">
							</div>
							<div class="form-group">
								<label for="display_name">Name:</label>
								<input id="display_name" class="form-control" type="text" name="display_name" value="{{old('display_name',$permission->display_name)}}" autofocus autocomplete>
							</div>
							{{-- @include('admin.permissions.form') --}}
						<!-- Edit Form -->
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Save&ensp;<i class="fa fa-save"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
<script>document.getElementById('name').addEventListener('mousedown', function(e){e.preventDefault();});</script>
@endpush