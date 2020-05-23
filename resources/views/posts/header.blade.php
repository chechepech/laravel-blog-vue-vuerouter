<header class="container-flex space-between">
	<div class="date">
		<span class="c-gris">{{optional($post->published_at)->format('M d')}}&thinsp;/&thinsp;{{$post->owner->name}}</span>
	</div>
	@if($post->category)
		<div class="post-category">
			<!-- One to Many Relation - Category -->
			<!-- <span class="category text-capitalize">{{$post->category->name}}</span> -->
			<span class="category text-capitalize"><a href="{{route('categories.show',$post->category)}}" title="">{{$post->category->name}}</a></span>
		</div>
	@endif
</header>