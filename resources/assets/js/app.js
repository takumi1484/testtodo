import Vue from 'vue'
import router from './router'

require('./bootstrap');

const app = new Vue({
    router,
    el: '#app',
    render: h => h(require('./app.vue')),
})


Vue.component('examp', require('./components/ExampleComponent.vue'));
const exam = new Vue({
    el: '#exam'
});

Vue.component('examp1', require('./components/Test1.vue'));
const exam1 = new Vue({
    el: '#exam1'
});