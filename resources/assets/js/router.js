import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',//問題ありそうな場所
    routes: [
        { path: '/Top', component: require('./components/Top.vue') },
        { path: '/Room', component: require('./components/Room.vue') },
        { path: '/', component: require('./components/Top.vue') },
        { path: '/adadadAdmin' , component:require('./components/Admin.vue')},
        { path: '/admin' , component:require('./components/damy.vue')},
    ],
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    },
})