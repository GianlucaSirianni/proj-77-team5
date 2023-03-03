<template>
    <div class="sfondo">

        <HeaderComp/>
        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view></router-view>

        <!-- Qui andrà il footer -->

    </div>
</template>




<script>
 import HomePage from './pages/HomePage.vue'
 import HeaderComp from '../components/HeaderComp.vue'

    export default {
    name: 'App',


    props: {

    },

    mounted(){


    },

    components: {
        HomePage,
        HeaderComp
        // HomeView
    },
    data(){
            return{

            }
        },
    methods: {

    },

    };

</script>

<style lang='scss' scoped>
    .sfondo{

        ::-webkit-scrollbar {

            height: 8px;
        }

        /* Track */
       /*  ::-webkit-scrollbar-track {


        } */

        /* Handle */
        ::-webkit-scrollbar-thumb {

            background: #da972c;

            border-radius: 20px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {

            background: #EFAD44;
        }
    }

</style>
