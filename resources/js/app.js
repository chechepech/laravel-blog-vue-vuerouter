/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './routes.js';

//require('vue2-animate/dist/vue2-animate.min.css');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('post-header', require('./components/PostHeader.vue').default);
Vue.component('posts-list', require('./components/PostsList.vue').default);
Vue.component('posts-list-item', require('./components/PostsListItem.vue').default);
Vue.component('nav-bar', require('./components/NavBar.vue').default);
Vue.component('category-link', require('./components/CategoryLink.vue').default);
Vue.component('tag-link', require('./components/TagLink.vue').default);
Vue.component('post-link', require('./components/PostLink.vue').default);
Vue.component('disqus-comments', require('./components/DisqusComments.vue').default);
Vue.component('pagination-links', require('./components/PaginationLinks.vue').default);
Vue.component('paginator', require('./components/Paginator.vue').default);
Vue.component('social-links', require('./components/SocialLinks.vue').default);
Vue.component('contact-form', require('./components/ContactForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
