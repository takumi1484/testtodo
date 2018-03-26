import Vue from 'vue'
import router from './router'

require('./bootstrap');

const app = new Vue({
    router,
    el: '#app',
    render: h => h(require('./app.vue')),
})
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

