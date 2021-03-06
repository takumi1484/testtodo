import Vue from 'vue'
import router from './router'
import axios from 'axios'
// import axios from 'axios';

window.Vue = require('vue');
window.axios = require('axios');
// axios.defaults.baseURL = 'https://kuhblume.herokuapp.com';
// axios.defaults.xsrfHeaderName =  'X-CSRF-Token';
// axios.defaults.headers.common = {
//     'X-Requested-With': 'XMLHttpRequest'
// };

require('./bootstrap');

const app = new Vue({
    router,
    el: '#app',
    render: h => h(require('./app.vue')),
});
// const admin = new Vue({
//     router,
//     el: '#admin',
//     render: h => h(require('./components/Admin.vue')),
// })
// Vue.component('examp', require('./components/ExampleComponent.vue'));
// const exam = new Vue({
//     el: '#exam',
//     data: {
//         etext: 'TESTMESSAGE',//呼び出せてない
//     }
// });



axios.interceptors.request.use(config => {
    config.headers['X-CSRF-TOKEN']     = window.Laravel.csrfToken
    config.headers['X-Requested-With'] = 'XMLHttpRequest'
    return config
});


