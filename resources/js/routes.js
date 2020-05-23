window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);
//chapter 8
export default new VueRouter({
	routes: [
		{
			path: '/',
			name: 'home',
			component: require('./components/views/Home.vue').default
		},
		{
			path: '/about',
			name: 'about',
			component: require('./components/views/About.vue').default
		},
		{
			path: '/archive',
			name: 'archive',
			component: require('./components/views/Archive.vue').default
		},
		{
			path: '/contact',
			name: 'contact',
			component: require('./components/views/Contact.vue').default
		},
		{
			path: '/blog/:url',
			name: 'posts_show',
			component: require('./components/views/PostShow.vue').default,
			props: true
		},
		{
			path: '/categories/:category',
			name: 'category_posts',
			component: require('./components/views/CategoryPosts.vue').default,
			props: true
		},
		{
			path: '/tags/:tag',
			name: 'tag_posts',
			component: require('./components/views/TagPosts.vue').default,
			props: true
		},
		{
			path: '*',
			component: require('./components/views/404.vue').default
		}
	],
	linkExactActiveClass: 'active',
	mode: 'history',
	scrollBehavior(){
		return {x:0, y:0};
	}
});