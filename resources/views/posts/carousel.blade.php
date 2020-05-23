{{-- <div class="gallery-photos masonry">
          <div class="gallery-photos" data-masonry='{"item:Selector": ".grid-item", "columnWidth": 464}'>
            @foreach($post->photos->take(4) as $photo)
              <!-- <figure class="gallery-image"> -->
              <figure class="grid-item grid-item--height2">
                @if($loop->iteration === 4)
                  <div class="overlay">{{$post->photos->count()}}&thinsp;Images</div>
                @endif
                <img src="{{url($photo->url)}}" class="img-responsive" alt="">
                <!-- chapter 29-->
              </figure>
            @endforeach
          </div>
--}}
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($post->photos as $photo)
      <li data-target="#carousel-example-generic"
      data-slide-to="{{$loop->index}}"
      class="{{$loop->first ? 'active' : ''}}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($post->photos as $photo)
      <div class="item {{$loop->first ? 'active' : ''}}">
        <img src="{{url('storage/'.$photo->url)}}" alt="{{$post->name}}" class="img-responsive">
          <div class="carousel-caption">
            {{$post->name}}
          </div>
      </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>