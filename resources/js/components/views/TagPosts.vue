<template>
    <paginator :url="`/api/tags/${this.tag}`" component-name="posts-list"></paginator>
</template>
<script type="text/javascript" charset="utf-8">
	export default {
        props: ['tag']
        /*,
        data(){
            return{
                posts: []
            }
        },
        mounted(){
            //axios.get(`/api/tags/${this.$route.params.tag}`)this.getPosts();
            axios.get(`/api/tags/${this.tag}`)
                .then(res => {
                    this.posts = res.data.data;
                })
                .catch(err=>{
                    console.log(err);
                });
        },
        beforeRouteUpdate(to, from, next){
            this.tag = to.params.tag;
            this.getPosts();
            next();
        },
        methods:{
            getPosts(){
                return axios.get(`/api/tags/${this.tag}`)
                .then(res => {
                    this.posts = res.data.data;
                })
                .catch(err=>{
                    console.log(err);
                });
            }
        },
        watch:{
            tag(){
                this.getPosts();
            }
        }*/
    }
</script>