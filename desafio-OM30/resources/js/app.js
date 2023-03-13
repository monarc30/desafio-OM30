require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

window.Vue = require("vue").default;

import App from './components/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes'; 

Vue.use(VueAxios, axios);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});