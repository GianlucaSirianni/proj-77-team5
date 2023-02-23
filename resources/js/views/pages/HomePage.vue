<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">

                <div>
                    <a class="navbar-brand" href="/">LOGO</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                    <div id="Separatore">

                    </div>

                    <div>
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" id="search" @keyup="searchRestaurants" v-model="userInput" placeholder="Cerca un ristorante" aria-label="Search">
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

        <!-- LA NAV BAR ANDRA' MESSA NEL COMP HEADER QUINDI TEORICAMENTE DOVREMMO SPOSTARE LI I DATI O NON LO SO DOMANI CAPIAMO?! -->

        <!-- NELLA HOME DI VUE SE CLICCHI REGISTRATI DOPO AVER LOGGATO NON TI PORTA ALLA REGISTRAZIONE MA ALLA DASHBOARD DELL'UTENTE

            YURI MI HA DETTO CHE E' COLPA DEL IP CHE FACENDO TUTTO DALLO STESSO PC SUCCEDE QUESTO SE UN UNTE ESTERNO PROVA A FARLO DAL SUO COMPUTER LO REINDIRIZZA SEMPLICEMENTE ALLA REGISTER-->

      <div class="container pt-3" v-for="elem,index in filterRestaurants" :key="index">
        <div class="text-white">{{elem.name}}</div>
        <div class="text-white">{{elem.address}}</div>

      </div>

    </div>
</template>

<script>


    export default {
        name: 'HomePage',

        props: {

        },

        mounted(){

            this.getRestaurants();
            this.searchRestaurants();
        },

        components: {

        },
        data(){
            return{

                filterRestaurants:[],
                restaurants:[],
                userInput:'',
            }
        },
        methods: {

            getRestaurants(){
                axios.get('http://localhost:8000/api/restaurants').then(response => {

                    console.log(response.data);
                    this.restaurants = response.data;
                    this.filterRestaurants = response.data;

                });
            },

            searchRestaurants(){

                if(this.userInput == ''){

                    this.filterRestaurants = this.restaurants
                }else{

                    this.filterRestaurants = this.restaurants.filter(restaurant => restaurant.name.toLowerCase().includes(this.userInput.toLowerCase()))

                }
            }

        },

    };

</script>

<style lang='scss' scoped>

</style>
