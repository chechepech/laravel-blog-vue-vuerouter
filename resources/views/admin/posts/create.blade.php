<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">New Post</h4>
				</div>
				<form method="post" action="{{route('admin.posts.store', '#create')}}">
				@csrf
					<div class="modal-body">
						<div class="form-group {{$errors->has('title') ? 'has-error':''}}">
							<label>Title:</label>
							<input id="title" type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Type up a title" autofocus>
							{!! $errors->first('title', '<span class="help-block">:message</span>')!!}
						</div>
						<div class="form-group {{$errors->has('excerpt') ? 'has-error':''}}">
							<label>Excerpt:</label>
							<textarea name="excerpt" class="form-control" placeholder="Type up a excerpt">{{old('excerpt')}}</textarea>
							{!! $errors->first('excerpt', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&thinsp;Close</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&thinsp;Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- END Modal -->
@push('scripts')
	<script>
		if(window.location.hash === '#create'){
			$('#myModal').modal('show');
		}
		$('#myModal').on('hide.bs.modal', function(){
			window.location.hash = '';
		});
		$('#myModal').on('shown.bs.modal', function(){
			$('title').focus();
			window.location.hash = '#create';
		});
	</script>
@endpush