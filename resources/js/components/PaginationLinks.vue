<template>
	<div class="pagination" v-if="pagination.last_page > 1">
		<ul class="list-unstyled container-flex space-center">
			<li v-for="page in pagination.last_page">
				<router-link :class="getActiveClass(page)" :to="{
					name: $route.name,
					query: {
						page: page
					}
				}">{{page}}</router-link>
			</li>
		</ul>
	</div>
</template>
<script type="text/javascript">
	export default{
		props: ['pagination'],
		methods:{
			getActiveClass(page){
				return [
					! this.$route.query.page && page == 1 ? 'active' : ''
				];
			}
		}
	}
</script>