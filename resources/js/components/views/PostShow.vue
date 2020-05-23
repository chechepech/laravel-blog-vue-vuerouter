<template>
<section class="post container">
		<article class="post">
			<!-- @include($post->viewType()) -->
		</article>
		<div class="content-post">
			<!-- Header-->
			<post-header :post="post"></post-header>
			<div class="image-w-text" v-html="post.body"><p></p></div>
			<footer class="container-flex space-between">
				<social-links :description="post.title"/>
					<!-- @include('partials.social-links',['description' => $post->title])-->
				<div class="tags container-flex">
					<!-- Many to Many Relation - Tags  chapter 97 -->
						<span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
							<tag-link :tag="tag" />
							<!-- <router-link :to="{name:'tag_posts' , params:{tag: tag.url}}">#{{tag.name}}</router-link> -->
						</span>
				</div>
			</footer>
			<div class="comments">
				<div class="divider"></div>
				<disqus-comments></disqus-comments>
			</div><!-- .comments -->
		</div>
</section>
</template>
<script type="text/javascript" charset="utf-8">
	export default{
		props: ['url'],
		data(){
			return {
				post: {
					owner: {},
					category: {}
				}
			}
		},
		mounted(){
			axios.get(`/api/blog/${this.url}`)
			.then(res =>{
				this.post = res.data;
			})
			.catch(err => {
				console.log(err.response.data);
			});
		}
	}
</script>