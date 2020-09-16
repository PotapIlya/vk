/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./scripts');

window.Vue = require('vue');

import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('gallery-component', require('./components/user/gallery/GalleryComponent').default);
Vue.component('comment-component', require('./components/user/gallery/CommentComponent').default);
Vue.component('like-component', require('./components/user/gallery/LIkeComponent').default);


Vue.component('edit-component', require('./components/user/my/EditComponent').default);
Vue.component('image-component', require('./components/user/my/ImageComponent').default);
Vue.component('wall-component', require('./components/user/my/WallComponent').default);

Vue.component('add-button-component', require('./components/user/friends/AddButtonComponent').default);
Vue.component('accept-component', require('./components/user/friends/AcceptComponent').default);
Vue.component('friends-component', require('./components/user/friends/FriendsComponent').default);
Vue.component('subscribe-component', require('./components/user/friends/SubscribeComponent').default);



Vue.component('chat-component', require('./components/ChatComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
