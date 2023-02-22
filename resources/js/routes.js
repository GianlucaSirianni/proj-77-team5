import Vue from 'vue'
 import VueRouter from 'vue-router'

 Vue.use(VueRouter)

//import dei componenti
import ExampleView from './views/pages/ExampleView.vue'
import HomePage from './views/pages/HomePage.vue'


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
            path:'/example',
            name:'example',
            component:ExampleView,
        },


    ]
});

export default router;
