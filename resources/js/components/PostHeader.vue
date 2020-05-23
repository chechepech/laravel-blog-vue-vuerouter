<template>
<div>
	 <header class="container-flex space-between">
        <div class="date">
           <span class="c-gris">
            {{post.published_date}}&thinsp;/&thinsp;{{post.owner.name}}
           </span>
        </div>
        <!-- @if($post->category) -->
        <div class="post-category">
            <!-- One to Many Relation - Category -->
            <span class="category text-capitalize">
                <category-link :category="post.category"></category-link>
            </span>
        </div><!-- @endif -->
    </header>
    <h1 v-text="post.title"></h1>
    <div class="divider"></div>
</div>
</template>
<script type="text/javascript" charset="utf-8">
	export default{
		props: ['post']
	}
</script>