<div class="gallery-photos" data-masonry='{"item:Selector": ".grid-item", "columnWidth": 464}'>
	@foreach($post->photos->take(4) as $photo)
		<!-- <figure class="gallery-image"> -->
		<figure class="grid-item grid-item--height2">
			@if($loop->iteration === 4)
				<div class="overlay">{{$post->photos->count()}}&thinsp;Images</div>
			@endif
			<img src="{{url('storage/'.$photo->url)}}" class="img-responsive" alt="">
			<!-- chapter 29-->
		</figure>
	@endforeach
</div>