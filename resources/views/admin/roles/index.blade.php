@extends('admin.layout')

@section('header')
	<h1>
		ROLES
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Roles</li>
	</ol>
@endsection
@section('content')
	<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Roles List - Datatable</h3>
					@can('create', $roles->first())
						<a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i>&thinsp;New Role</a>
					@endcan
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="roles-table" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID</th>
							<th>Identificator</th>
							<th>Name</th>
							<th>Permissions</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
								<tr>
									<td>{{$role->id}}</td>
									<td>{{$role->name}}</td>
									<td>{{$role->display_name}}</td>
									<td>{{$role->permissions->pluck('display_name')->implode(', ')}}</td>
									<td>
									@can('update', $role)
										<a href="{{route('admin.roles.edit',$role)}}" class="bnt btn-info btn-sm"><i class="fa fa-pencil"></i></a>
									@endcan
									@can('delete', $role)
										@if($role->id !== 1)
											<form style="display: inline;" action="{{route('admin.roles.destroy',$role)}}" method="POST" accept-charset="utf-8">@csrf @method('DELETE')
												<button type="submit" class="bnt btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this role?');"><i class="fa fa-times"></i></button>
											</form>
										@endif
									@endcan
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Rendering engine</th>
								<th>Browser</th>
								<th>Platform(s)</th>
								<th>Engine version</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
		</div>
@endsection
@push('styles')
	<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@push('scripts')
	<!-- DataTables -->
	<script src="{{asset('adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript" charset="utf-8">
			$(function() {
				$('#roles-table').DataTable({
					'paging'      : true,
					'lengthChange': true,
					'searching'   : true,
					'ordering'    : true,
					'info'        : true,
					'autoWidth'   : true
				});
	});
	</script>
@endpush