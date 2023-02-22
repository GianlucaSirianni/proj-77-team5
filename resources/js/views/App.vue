<template>
    <div>
        <HeaderComp />
            <h1>Questo e' Vue</h1>

        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view></router-view>
         <HomeComp/>
    </div>
</template>




<script>
 import HomeComp from './pages/HomeComp.vue'
 import HeaderComp from '../components/HeaderComp.vue'

    export default {
    name: 'App',


    props: {

    },

    mounted(){

    },

    components: {
        HomeComp,
        HeaderComp
        // HomeView
    },
    methods: {

    },

    };

</script>

<style lang='scss' scoped>

</style>
