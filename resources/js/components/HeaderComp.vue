<template>
    <header class="bg-hed">
        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container d-flex align-items-center">

                <!-- Logo visibile solo da tablet in giù -->
                <div class="logo-cont d-lg-block d-sm-block">
                    <a href="/">
                        <img src="/img/logo-deliveboo-nav.png" alt="logo">
                    </a>
                </div>

                <div class="d-none d-lg-block ">
                    <a href="/" class="navbar-brand ps-2 fs-4 text-orange fw-bold">
                        DeliveBoo
                    </a>
                </div>

                <div @click='toggleIcon()' id='dark_toggle' class="js_darkmode pe-3">
                    <div class="icons_cnt d-flex align-items-center justify-content-center c-pointer">
                        <font-awesome-icon v-if="showMoon" icon="fa-regular fa-moon"></font-awesome-icon>
                        <font-awesome-icon v-if="!showMoon" icon="fa-regular fa-sun"></font-awesome-icon>
                    </div>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                    <!-- Scritta visibile solo da tablet in su -->


                    <div id="Separatore"></div>

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

    props: {},

    mounted() {

    },

    components: {},

    data() {
        return {
            userInput: '',
            showMoon: true,
        };
    },

    methods: {

        toggleIcon() {
            this.showMoon = !this.showMoon;
        },
    },
};
</script>

<style lang='scss' scoped>
.logo-cont {
    width: 65px;

    img {
        width: 100%;
        object-fit: cover;
    }
}

li a:hover {
    color: #efad44;
}

.text-orange {
    color: #efad44;
}
.icons_cnt{
    width:30px;
    height:30px;
}

.fa-moon:hover {

    padding: 4px 6px;
    background-color: rgba(33, 37, 41, 0.1);
    border-radius: 50%;
}

.icons_cnt:hover {
    background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
}

.icons_cnt:active {

    transform: scale(0.9);
}

.c-pointer{

    cursor: pointer;
}
</style>
