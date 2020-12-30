require('./bootstrap');

window.Vue = require('vue');
Vue.component('threads', require('./components/Threads.vue').default);
Vue.component('single-thread', require('./components/Thread.vue').default);

const app = new Vue({
    el: '#app',
});