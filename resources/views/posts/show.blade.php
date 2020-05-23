@extends('layout')
@section('title',$post->title)
@section('meta-description',$post->excerpt)
@section('content')
<article class="post container">
		<article class="post">
			@include($post->viewType())
			{{-- @if($post->photos->count() === 1)
				@include('posts.photo')
			@elseif($post->photos->count() > 1)
				@include('posts.carousel-preview')
			@elseif($post->iframe)
				@include('posts.iframe')
			@endif --}}
		</article>
		<div class="content-post">
			<!-- Header-->
			@include('posts.header')
			<!-- End Header-->
			<h1>{{$post->title}}</h1>
				<div class="divider"></div>
				<div class="image-w-text">
					<figure class="block-left"><img src="{{asset('img/img-post-2.png')}}" alt=""></figure>
					<div>
						<p>{!! $post->body !!}</p>
						<span class="cite-2">Curabitur ut leo pulvinar, consectetur magna eu, feugiat purus. Morbi hendrerit lectus turpis, a porttitor velit imperdiet id.</span>
					</div>
				</div>
			<footer class="container-flex space-between">
					@include('partials.social-links',['description' => $post->title])
					@include('posts.tags')
					{{-- <div class="tags container-flex">
						@foreach($post->tags as $tag)
							<span class="tag c-gris">#{{$tag->name}}</span>
						@endforeach
					</div> --}}
			</footer>
			<div class="comments">
				<div class="divider"></div>
				<div id="disqus_thread"></div>
				@include('partials.disqus-script')
			</div><!-- .comments -->
		</div>
</article>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endpush
@push('scripts')
	<script type="text/javascript" id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
	<script type="text/javascript" src="{{asset('adminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
@endpush