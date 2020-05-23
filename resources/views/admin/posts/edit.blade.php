@extends('admin.layout')
@section('header')
	<h1>
		All Posts
		<small>Optional description</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i>Posts</a></li>
		<li class="active">Edit</li>
	</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Edit Post</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{route('admin.posts.update',$post)}}">
					@csrf @method('PUT')
					<div class="form-group {{$errors->has('title') ? 'has-error':''}}">
						<label>Title:</label>
						<input type="text" name="title" class="form-control" value="{{old('title',$post->title)}}" placeholder="Type up a title" autofocus>
						{!! $errors->first('title', '<span class="help-block">:message</span>')!!}
					</div>
					<div class="form-group {{$errors->has('excerpt') ? 'has-error':''}}">
						<label>Excerpt:</label>
						<textarea name="excerpt" class="form-control" placeholder="Type up a excerpt">{{old('excerpt',$post->excerpt)}}</textarea>
						{!! $errors->first('excerpt', '<span class="help-block">:message</span>')!!}
					</div>
					<div class="form-group {{$errors->has('body') ? 'has-error':''}}">
						<label>Content:</label>
						<textarea id="editor" rows="10" name="body" class="form-control" placeholder="Type up a content">{{old('body',$post->body)}}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>')!!}
					</div>
					<!-- Iframe -->
					<div class="form-group {{$errors->has('iframe') ? 'has-error':''}}">
						<label>Embed Content (iframe):</label>
						<textarea rows="2" name="iframe" class="form-control" placeholder="Type up a embed content (iframe)">{{old('iframe',$post->iframe)}}</textarea>
						{!! $errors->first('iframe', '<span class="help-block">:message</span>')!!}
					</div>
					<!--End Iframe -->
					<div class="form-group {{$errors->has('category_id') ? 'has-error':''}}">
						<label>Categories:</label>
						<select name="category_id" class="form-control select2">
							<option value="">Select a Category</option>
							@foreach($categories as $category)
								<option {{old('category_id',$category->id) == $category->id ? 'selected':''}} value="{{$category->id}}">
									{{$category->name}}</option>
							@endforeach
						</select>
						{!! $errors->first('category_id', '<span class="help-block">:message</span>')!!}
					</div>
					<div class="form-group {{$errors->has('tags') ? 'has-error':''}}">
						<label>Tags:</label>
						<select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
							@foreach($tags as $tag)
								<option {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id)?'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
							@endforeach
						</select>
						{!! $errors->first('tags', '<span class="help-block">:message</span>')!!}
					</div>
					<div class="form-group">
		                <label>Date:</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" name="published_at" value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y'):NULL)}}" class="form-control pull-right" id="datepicker">
		                </div>
		                <!-- /.input group -->
		            </div>
		            <!-- DROPZONE -->
		            <div class="form-group">
						<div class="dropzone"></div>
		            </div>
		            <!-- END DROPZONE -->
		            <div class="form-group">
						<button class="btn btn-primary" type="submit">Save&thinsp;<i class="fa fa-save"></i></button>
		            </div>
				</form>
				<div class="row">
					@if($post->photos->count())
		            	@foreach($post->photos as $photo)
		            	<form method="POST" action="{{route('admin.photos.destroy',$photo)}}">
		            		@csrf @method('DELETE')

			            	<div class="col-md-2">
			            		<button class="btn btn-danger btn-xs" style="position: absolute;"><i class="fa fa-remove"></i></button>
			            		{{-- <img class ="img-responsive" src="{{url($photo->url)}}" alt="remove">--}}
			            		<img class ="img-responsive" src="{{url('storage/'.$photo->url)}}" alt="remove">
			            	</div>
		            	</form>
		            	@endforeach
	            	@endif
		       </div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
	<!-- Dropzone CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css">
	<!-- Select2 -->
 	<link rel="stylesheet" href="{{asset('adminLTE/bower_components/select2/dist/css/select2.min.css')}}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{asset('adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('scripts')
	<!-- Dropzone.js -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
	<!-- CK Editor -->
	<script src="{{asset('adminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{asset('adminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script type="text/javascript" charset="utf-8">
	//Initialize Select2 Elements
    $('.select2').select2({tags:true});
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');

    /* Dropzone */
    	var myDropzone = new Dropzone('.dropzone',{
    		url: '/admin/posts/{{$post->url}}/photos',
    		acceptedFiles: 'image/*',
    		paramName: 'photo' ,
    		maxFilesize: 2,
    		headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}
    	});
    	myDropzone.on('error', function(file, res){
    		var msg = res.photo[0];
    		$('.dz-error-message:last > span').text(msg);
    	});
    	Dropzone.autoDiscover = false;
    /*-- End Dropzone --*/
	</script>
@endpush
