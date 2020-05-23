<template>
	<router-link :to="{
		name: 'category_posts',
		params:{
			category: category.url
		}
		}" >{{category.name}}
	</router-link>
</template>
<script type="text/javascript">export default { props: ['category']}</script>