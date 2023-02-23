import Vue from 'vue'
 import VueRouter from 'vue-router'

 Vue.use(VueRouter)

//import dei componenti
import DishesMenu from './views/pages/DishesMenu.vue'
import HomePage from './views/pages/HomePage.vue'


const router = new VueRouter({
    //path delle pagine
    mode:'history',
    routes:[
        {
            path:'/',
            name:'home',
            component:HomePage,
            props: {input: 'userInput'}
        },
        {
            path:'/menu',
            name:'menu',
            component:DishesMenu,
        },


    ]
});

export default router;
