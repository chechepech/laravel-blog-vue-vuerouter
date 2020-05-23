<div class="buttons-social-media-share">
	<ul class="share-buttons">
		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}&title={{$post->title}}" title="Share on Facebook" target="_blank">
			<img alt="Share on Facebook" src="{{asset('img/flat_web_icon_set/Facebook.png')}}"></a>
		</li>
		<li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="{{asset('img/flat_web_icon_set/Twitter.png')}}"></a></li>
		<li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="{{asset('img/flat_web_icon_set/Google+.png')}}"></a></li>
		<li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it"><img alt="Pin it" src="{{asset('img/flat_web_icon_set/Pinterest.png')}}"></a></li>
	</ul>
</div>