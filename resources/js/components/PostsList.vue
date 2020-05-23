<template>
	<section class="posts container">
		<!-- @if(isset($title))
			<h2>{{$title}}</h2>
		@endif -->
		<!-- Chapter 41 eliminar posts -->
		<!-- @forelse($posts as $post) -->
		<posts-list-item v-for="post in items" v-bind:key="post.id" :post="post"></posts-list-item>
		<!-- @empty -->
			<article class="post" v-if="! items.length">
				<div class="content-post">
					<h1>No Posts!</h1>
				</div>
			</article>
		<!-- @endforelse -->
	</section><!-- fin del div.posts.container -->
		<!-- {{ $posts->appends(request()->all())->links() }} -->
</template>
<script type="text/javascript" charset="utf-8">
	export default {
		props: ['items']
	}
</script>