<template>
<div>
	<component :is="componentName" :items="items"></component>
	<pagination-links :pagination="pagination"></pagination-links>
</div>
</template>
<script type="text/javascript">
	export default{
		props: ['url', 'componentName'],
		data(){
			return{
				//object empty
				pagination: {},
				//array empty
				items: []
			}
		},
		mounted(){
			/* axios.get('/api/posts')*/
			axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
				.then(res => {
					this.pagination = res.data;
					this.items = res.data.data;
					delete this.pagination.data;
				})
				.catch(err=>{
					console.log(err);
				});
		}
	}
</script>
<style lang="scss">
	.pagination{
		a.active{
			background-color: #C069DA;
			color: #ffffff;
		}
	}
</style>