@extends('admin.layout')

@section('header')
	<h1>
		USERS
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Users</li>
	</ol>
@endsection
@section('content')
	<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Users List - Datatable</h3>
					@can('create', $users->first())
						<a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i>&thinsp;New User</a>
					@endcan
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="users-table" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Roles</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								{{-- @can('view', $user) --}}
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->getRoleNames()->implode(', ')}}</td>
									<td>
										@can('view', $user)
											<a href="{{route('admin.users.show',$user)}}" target="_blank" class="bnt btn-info btn-xs"><i class="fa fa-eye"></i></a>
										@endcan
										@can('update',$user)
											<a href="{{route('admin.users.edit',$user)}}" class="bnt btn-default btn-xs"><i class="fa fa-pencil"></i></a>
										@endcan
										@can('delete', $user)
											<form style="display: inline;" action="{{route('admin.users.destroy',$user)}}" method="POST" accept-charset="utf-8">@csrf @method('DELETE')
											<button type="submit" class="bnt btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-times"></i></button>
											</form>
										@endcan
									</td>
								</tr>
								{{-- @endcan --}}
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
				$('#users-table').DataTable({
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