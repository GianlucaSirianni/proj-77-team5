<template>
    <div>
        <RestaurantsComp/>



    </div>
</template>

<script>

import RestaurantsComp from '../../components/RestaurantsComp.vue'


    export default {
        name: 'HomePage',



        components: {
            RestaurantsComp,

        },

        props: {
            input: String
        },

        mounted(){


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

</style>
