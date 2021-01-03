require('./bootstrap');

window.Vue = require('vue');
Vue.component('single-thread', require('./components/Thread.vue').default);
Vue.component('threads', require('./components/Threads.vue').default);
Vue.component('comments', require('./components/Comments.vue').default);


const app = new Vue({
    el: '#app',
});