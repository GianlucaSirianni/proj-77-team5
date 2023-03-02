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
        background-color: #eeeeee;
    }
</style>
