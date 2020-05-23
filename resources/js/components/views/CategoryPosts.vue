<template>
    <paginator :url="`/api/categories/${this.category}`" component-name="posts-list"></paginator>
</template>
<script type="text/javascript" charset="utf-8">
	export default {
        props: ['category']/*,
        data(){
            return{
                posts: []
            }
        },
        mounted(){
            axios.get(`/api/categories/${this.category}`)
                .then(res => {
                    this.posts = res.data.data;
                })
                .catch(err=>{
                    console.log(err);
                });
        }*/
    }
</script>