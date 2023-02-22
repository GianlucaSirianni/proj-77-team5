<template>
    <div>
        <HeaderComp />


        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view></router-view>

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
    methods: {

    },

    };

</script>

<style lang='scss' scoped>

</style>
