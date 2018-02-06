
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('amfe-flexible');
require('weui');

window.Cookies = require('js-cookie');

window.VueLazyLoad = require('vue-lazyload');
Vue.use(VueLazyLoad,{
    error:'./static/error.png',
    loading:'/images/loading.gif'
})

window.Cropper = require('cropperjs');

// Register a global custom directive called `v-focus`
Vue.directive('focus', {
   // When the bound element is inserted into the DOM...
    inserted: function (el) {
    // Focus the element
        el.focus()
    }
});

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

window.weui = require('weui.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('guest', require('./pages/Guest.vue'));
Vue.component('poster-create', require('./pages/PosterCreate.vue'));
Vue.component('category-lettres', require('./pages/CategoryLettres.vue'));
Vue.component('lettre-index', require('./pages/LettreIndex.vue'));
Vue.component('picture-index', require('./pages/PictureIndex.vue'));
Vue.component('category-pictures', require('./pages/CategoryPictures.vue'));
Vue.component('category-show', require('./pages/CategoryShow.vue'));

const app = new Vue({
    el: '#app'
});
