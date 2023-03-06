<template>
<div>
    <div class="container-md">

        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="text-success pt-5">Ordine effettuato con successo!</h1>
                <p>Stiamo arrivando! Inizia ad apparecchiare!</p>
                <br>
                <p>Grazie per l'acquisto, stai per essere reindirizzato alla home</p>
                <a href="/">
                    <span class="btn btn-success btn-orange">Torna alla <span class="txt-black">Home!</span></span>
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
        this.backToHome();
    },

    components: {

    },
    methods: {

        backToHome(){
            setTimeout(() => {
                this.$router.push({ name: 'home' })
            }, 7000);
        }

    },

};

</script>

<style lang='scss' scoped>

    .txt-black{

        color: black;
    }

    .btn-orange{
    background-color: #FFAF00;
    border: #FFAF00;
}

    .container-md{
        height: 60vh
    }

</style>
