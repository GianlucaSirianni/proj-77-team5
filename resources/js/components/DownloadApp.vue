<template>
   <div class="bg-download">
        <div class="container">
            <div class="row">
                <div class="col-md-6 cont-left d-flex align-items-center">
                <img src="/img/logo-deliveboo.png" alt="" class="img-fluid h-100 object-fit">
                </div>

                <div class="col-md-6 cont-right align-items-center justify-content-center">

                    <h2 class="text-center pt-5 fs-1">Scarica l'App!</h2>
                    <div class="d-flex align-items-center justify-content-center py-5">
                        <div class="pe-3">
                            <a href="https://www.apple.com/it/search/deliveboo?src=globalnav">
                                <img src="/img/app-store-button.svg" alt="">
                            </a>

                        </div>
                        <div>
                            <a href="https://play.google.com/store/search?q=deliveboo&c=apps&gl=IT">
                                <img src="/img/google-play-button.svg" alt="">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
  </div>
</template>

<script>
    export default {

        name: 'DownloadApp',

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

    .bg-download{

        background-color: #EFAD44;
    }


</style>
