require('./bootstrap');

window.Vue = require('vue');
Vue.component('thread', require('./components/Threads.vue').default);

const app = new Vue({
    el: '#app',
});