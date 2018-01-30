
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('amfe-flexible');
require('weui');

window.weui = require('weui.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('user-index', require('./pages/UserIndex.vue'));
Vue.component('poster-create', require('./pages/PosterCreate.vue'));
Vue.component('category-lettres', require('./pages/CategoryLettres.vue'));
Vue.component('lettre-index', require('./pages/LettreIndex.vue'));
Vue.component('search-bar', require('./components/SearchBar.vue'));

const app = new Vue({
    el: '#app'
});
