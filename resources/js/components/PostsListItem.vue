<template>
	<article class="post">
		<!-- @include($post->viewType('home')) -->
		<div class="content-post">
			<post-header :post="post"></post-header>
			<p v-text="post.excerpt"></p>
			<footer class="container-flex space-between">
				<div class="read-more">
					<post-link class="text-uppercase c-green" :post="post">Read More</post-link>
				</div>
				<!-- Posts tags-->
				<!-- @include('posts.tags') -->
				<div class="tags container-flex">
					<!-- Many to Many Relation - Tags  chapter 97 -->
					<!-- @foreach($post->tags as $tag)-->
						<span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
							<tag-link :tag="tag" />
							<!-- <router-link :to="{name:'tag_posts' , params:{tag: tag.url}}">#{{tag.name}}</router-link> -->
						</span>
					<!-- @endforeach -->
				</div>
			<!-- End Posts tags-->
			</footer>
		</div>
	</article>
</template>
<script type="text/javascript" charset="utf-8">export default{props:['post']}</script>