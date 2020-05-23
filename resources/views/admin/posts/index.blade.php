@extends('admin.layout')

@section('header')
	<h1>
		POSTS
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Posts</li>
	</ol>
@endsection
@section('content')
	<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Posts List - Datatable</h3>
					<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&thinsp;New Post</button>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="posts-table" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Excerpt</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
								<tr>
									<td>{{$post->id}}</td>
									<td>{{$post->title}}</td>
									<td>{{$post->excerpt}}</td>
									<td>
										<a href="{{route('posts.show',$post)}}" target="_blank" class="bnt btn-info btn-xs"><i class="fa fa-eye"></i></a>
										<a href="{{route('admin.posts.edit',$post)}}" class="bnt btn-default btn-xs"><i class="fa fa-pencil"></i></a>
										<form style="display: inline;" action="{{route('admin.posts.destroy',$post)}}" method="POST" accept-charset="utf-8">@csrf @method('DELETE')
											<button type="submit" class="bnt btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this post?');"><i class="fa fa-times"></i></button>
										</form>
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
				$('#posts-table').DataTable({
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