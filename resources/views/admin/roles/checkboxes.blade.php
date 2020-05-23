{{-- @foreach($roles as $id => $name) --}}
@foreach($roles as $role)
	<div class="checkbox">
		<label>
			<input name="roles[]" type="checkbox" value="{{$role->name}}" {{$user->roles->contains($role->id)?'checked':''}}>
			{{$role->name}}<br/>
			<small class="text-muted">{{$role->permissions->pluck('name')->implode(', ')}}</small>
		</label>
	</div>
@endforeach