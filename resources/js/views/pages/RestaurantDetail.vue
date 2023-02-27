<template>
    <div class="container-md">

        <div class="img-container">
            <img :src="`../storage/${singleRestaurant.cover_restaurants}`" alt="img">

            <h1 class="text-primary text-center">
                {{singleRestaurant.name}}
            </h1>
        </div>

        <div class="row pt-3">
            <div v-for="dish in dishes" :key="dish.id" class="col-md-4">

                <div class="card border-warning mb-3">

                    <div class="ratio ratio-4x3">
                        <img :src="`../storage/${dish.cover_dish}`" class="card-img-top object-fit-cover"
                            alt="img">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title text-warning">{{ dish.name }}</h5>
                        <h5 class="card-title text-warning">{{ dish.description }}</h5>
                        <p>{{dish.price}}$</p>

                        <button class="btn btn-primary">
                            pocrocosdo
                        </button>

                    </div>
                </div>
            </div>

        </div>

        </div>

</template>

<script>
export default {

    // Definisci il nome del componente
    name: 'RestaurantDetail',

    // Definisci le proprietà che possono essere passate al componente
    props: {

    },

    // Definisci la funzione creata che viene eseguita quando il componente viene creato
    created(){

    },

    // Definisci la funzione mounted che viene eseguita quando il componente viene montato sulla pagina
    mounted(){
        // Chiama la funzione che recupera i dati del singolo ristorante
        this.getSingleRestaurant();

        // Chiama la funzione che recupera i dati dei piatti associati al ristorante
        this.getDishesByRestaurantId();
    },

    // Definisci i dati del componente
    data() {
        return {
            // Inizializza il dato singleRestaurant come una stringa vuota
            singleRestaurant : '',
            // Inizializza il dato dishes come un array vuoto
            dishes: []
        }
    },

    // Definisci i componenti figli del componente
    components: {

    },

    // Definisci le funzioni del componente
    methods: {
        // Funzione che recupera i dati del singolo ristorante
        getSingleRestaurant(){
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then( (res) => {
                // Assegna alla variabile singleRestaurant i dati del ristorante recuperati dall'API
                this.singleRestaurant = res.data;
            }).catch((err) =>{
                console.log(err);
            })
        },

        // Funzione che recupera i dati dei piatti associati al ristorante
        getDishesByRestaurantId(){
            axios.get('http://localhost:8000/api/dishes/' + this.$route.params.id).then((res) => {
                // Assegna all'array dishes i dati dei piatti recuperati dall'API
                this.dishes = res.data;
                // Stampa i dati dei piatti nella console
                console.log(this.dishes)
            }).catch((err) => {
                console.log(err);
            })
        }
    }
};
</script>

<style lang='scss' scoped>
.img-container {

    height: 400px;
    position: relative;
    img {
        width: 100%;
        height: 100%;
        object-position: center;
        object-fit: cover;
    }
    h1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    &::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Opacità del colore di sfondo */
    }
}
.dishes-container {
    margin-top: 50px;
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        li {
            margin-bottom: 20px;
            h3 {
                margin-bottom: 5px;
            }
        }
    }
}
</style>
