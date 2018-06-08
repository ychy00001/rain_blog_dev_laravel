import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            name: 'index',
            path: '/',
            component: resolve => void(require(['../components/IndexComponent.vue'], resolve))
        },
        {
            name: 'index',
            path: '/index',
            component: resolve => void(require(['../components/IndexComponent.vue'], resolve))
        }
    ]
});