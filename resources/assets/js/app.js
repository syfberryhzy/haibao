
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('amfe-flexible');
require('weui');

<<<<<<< HEAD
=======
window.VueLazyLoad = require('vue-lazyload');
Vue.use(VueLazyLoad,{
    error:'./static/error.png',
    loading:'/images/loading.gif'
})

let VConsole = require('vconsole');
let vConsole = new VConsole();

window.wx = require('weixin-js-sdk');

wx.config(JSON.parse(App.wxconfig));
wx.ready(function(){
    wx.onMenuShareTimeline({
        title: '海报制作',  
        link: 'http://haibao.mandokg.com/guest',
        imgUrl: 'http://lorempixel.com/200/200/?47750',
    });
    wx.onMenuShareAppMessage({
        title: '海报制作',
        desc: '海报制作',
        link: 'http://haibao.mandokg.com/guest',
        imgUrl: 'http://lorempixel.com/200/200/?47750',
    });
});

>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049
window.weui = require('weui.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

<<<<<<< HEAD
Vue.component('user-index', require('./pages/UserIndex.vue'));
Vue.component('poster-create', require('./pages/PosterCreate.vue'));
Vue.component('category-lettres', require('./pages/CategoryLettres.vue'));
Vue.component('lettre-index', require('./pages/LettreIndex.vue'));
Vue.component('search-bar', require('./components/SearchBar.vue'));
=======
Vue.component('guest', require('./pages/Guest.vue'));
Vue.component('user-index', require('./pages/UserIndex.vue'));
Vue.component('poster-create', require('./pages/PosterCreate.vue'));
Vue.component('poster-index', require('./pages/PosterIndex.vue'));
Vue.component('poster-show', require('./pages/PosterShow.vue'));
Vue.component('category-lettres', require('./pages/CategoryLettres.vue'));
Vue.component('lettre-index', require('./pages/LettreIndex.vue'));
Vue.component('picture-index', require('./pages/PictureIndex.vue'));
Vue.component('category-pictures', require('./pages/CategoryPictures.vue'));
Vue.component('category-show', require('./pages/CategoryShow.vue'));
>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049

const app = new Vue({
    el: '#app'
});
