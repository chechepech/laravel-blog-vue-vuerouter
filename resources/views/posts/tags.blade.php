<div class="tags container-flex">
	<!-- Many to Many Relation - Tags -->
	@foreach($post->tags as $tag)
		<span class="tag c-gray-1 text-capitalize"><a href="{{route('tags.show',$tag)}}" title="">#{{$tag->name}}</a></span>
	@endforeach
</div>