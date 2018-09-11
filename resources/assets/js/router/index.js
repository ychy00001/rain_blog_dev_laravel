import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            path: '/',
            redirect: '/index'
        },
        {
            name: 'index',
            path: '/index',
            component: resolve => void(require(['../components/IndexComponent.vue'], resolve))
            // component: () => import('../components/IndexComponent.vue')
        },
        {
            name: 'article',
            path: '/article/:id',
            component: resolve => void(require(['../components/ArticleComponent.vue'], resolve))
            // component: () => import('../components/ArticleComponent.vue')
        },
        {
            name: 'articleList',
            path: '/article-list/:page/:category',
            component: resolve => void(require(['../components/ArticleListComponent.vue'], resolve))
            // component: () => import('../components/ArticleComponent.vue')
        },
        {
            path: '/article-list',
            redirect: '/article-list/1',
            component: resolve => void(require(['../components/ArticleListComponent.vue'], resolve))
            // component: () => import('../components/ArticleComponent.vue')
        }
    ]
});