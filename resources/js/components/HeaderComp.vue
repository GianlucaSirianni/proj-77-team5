<template>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">

                <div>
                    <a class="navbar-brand text-danger" href="/">DeliveBoo</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                    <div id="Separatore">

                    </div>

                    <div>
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" id="search" v-model="userInput"  @keyup="$emit('emitText',userInput)" placeholder="Cerca un ristorante" aria-label="Search">
                        </form>
                    </div>

                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Accedi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Registrati</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
        </header>
</template>




<script>


    export default {
    name: 'HeaderComp',

    props: {

    },

    mounted(){

    },

    components: {

    },

    data(){
        return{
            userInput: ''
        }
    },

    methods: {

    },

    };

</script>

<style lang='scss' scoped>

</style>
