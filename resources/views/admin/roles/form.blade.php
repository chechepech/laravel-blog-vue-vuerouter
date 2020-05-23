@csrf
<div class="form-group">
	<label for="name">ID:</label>
	@if($role->exists)
		<input class="form-control" type="text" value="{{$role->name}}" readonly disabled>
	@else
		<input id="name" name="name" class="form-control" type="text" value="{{old('name',$role->name)}}">
	@endif
</div>
<div class="form-group">
	<label for="display_name">Name:</label>
	<input id="display_name" class="form-control" type="text" name="display_name" value="{{old('display_name',$role->display_name)}}" autofocus>
</div>
{{-- <div class="form-group">
	<label for="guard_name">Guard:</label>
	<select name="guard_name" class="form-control">
		@foreach(config('auth.guards') as $key => $guard)
			<option {{old('guard_name',$role->guard_name)=== $key?'selected':''}} value="{{$key}}">{{$key}}</option>
		@endforeach
	</select>
</div>
<div class="form-group col-sm-6">
	<label>Roles:</label>
	@include('admin.roles.checkboxes')
</div>
<span class="help-block">Check inbox email</span>
--}}
<div class="form-group">
	<label>Permissions:</label>
	@include('admin.permissions.checkboxes',['model' => $role])
</div>