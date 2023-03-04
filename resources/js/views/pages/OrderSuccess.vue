<template>
<div>
    <div class="container-md">

        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="text-success pt-5">Ordine effettuato con successo!</h1>
                <p>Stiamo arrivando! Inizia ad apparecchiare!</p>
                <a href="/">
                    <span class="btn btn-success">Torna alla <span class="txt-orange">Home!</span></span>
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center pt-5">
                <div>
                    <img class="img-fluid" src="/img/logo-deliveboo.png" alt="logo">
                </div>
            </div>
        </div>

    </div>
</div>
</template>

<script>


export default {

    name: 'OrderSuccess',

    props: {

    },

    mounted(){

    },

    components: {

    },
    methods: {

    },

};

</script>

<style lang='scss' scoped>

    .txt-orange{

        color: #EFAD44;
    }
</style>
