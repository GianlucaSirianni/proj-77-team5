import Vue from 'vue'
 import VueRouter from 'vue-router'

 Vue.use(VueRouter)

//import dei componenti

import HomePage from './views/pages/HomePage.vue'
import RestaurantsComp from './components/RestaurantsComp.vue'


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
            name:'RestaurantsComp',
            component: RestaurantsComp,
        },
    ]
});

export default router;
