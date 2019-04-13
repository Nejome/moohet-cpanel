import VueRouter from 'vue-router';

import home from './views/home';
import orders from './views/orders';
import products from './views/products';
import pocket from './views/pocket';
import information from './views/information';

let routes = [

    {
        path: '/',
        component: home,
    },

    {
        path: '/orders',
        component: orders,
    },

    {
        path: '/products',
        component: products,
    },

    {
        path: '/pocket',
        component: pocket,
    },

    {
        path: '/information',
        component: information,
    },

];

export default new VueRouter({

    routes,
    linkActiveClass: 'active'

});
