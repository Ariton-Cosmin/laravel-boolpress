window.Vue = require('vue');

import Vue from 'vue';
import App from './App.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});