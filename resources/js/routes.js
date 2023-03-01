import Vue from 'vue'
 import VueRouter from 'vue-router'

 Vue.use(VueRouter)

//import dei componenti

import HomePage from './views/pages/HomePage.vue'
import RestaurantDetail from './views/pages/RestaurantDetail.vue'
import OrderConfirmed from './views/pages/OrderConfirmed.vue'
import OrderSuccess from './views/pages/OrderSuccess.vue'


const router = new VueRouter({
    //path delle pagine
    mode:'history',
    routes:[
        {
            path:'/',
            name:'home',
            component:HomePage,
        },
        {
            path: "/restaurants/:id",
            name:'RestaurantDetail',
            component: RestaurantDetail,
        },
        {
            path: "/payment",
            name:'OrderConfirmed',
            component: OrderConfirmed,
        },
        {
            path: "/success",
            name:'OrderSuccess',
            component: OrderSuccess,
        },
    ]
});

export default router;
