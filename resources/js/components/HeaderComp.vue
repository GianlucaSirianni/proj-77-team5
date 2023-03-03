<template>
        <header class="bg-hed" >
            <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container d-flex align-items-center">

                <div class="logo-cont">
                    <a href="">
                        <img src="/img/logo-deliveboo.png" alt="logo">
                    </a>
                </div>

                <button class="js_darkmode">darkmode</button>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                    <div id="Separatore">

                    </div>

                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/login">Accedi</a>
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
        console.log(this.mode);
    },

    components: {

    },

    data(){
        return{
            userInput: '',

        }
    },

    methods: {


    },

    };

</script>

<style lang='scss' scoped>

    /* .bg-hed{

         ;
    } */
    .logo-cont{

        width: 110px;

        img{

            width: 100%;
            object-fit: cover;
        }
    }

    li a:hover{

        color: #EFAD44;
    }


</style>
