<template>
    <div>
        <video width="100%" height="400px" autoplay muted loop >
            <source src="/video/jumbotron_compresso.mp4" type="video/mp4">
        </video>
    </div>
</template>

<script>
    export default {
        name: 'JumboComp',

        props: {


        },

        created() {


        },

        mounted() {

        },


        data() {
            return{

            }
        },

        components: {

        },
        methods: {



        },

    }
</script>

<style lang='scss' scoped>

    video{

        object-fit: cover;
    }

</style>
