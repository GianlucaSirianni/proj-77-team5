<template>
    <div class="container-md">
<!-- Ristorante -->
        <div class="img-container">
            <img :src="`../storage/${singleRestaurant.cover_restaurants}`" alt="img">

            <h1 class="text-primary text-center">
                {{singleRestaurant.name}}
            </h1>
        </div>
<!-- menu -->
        <div class="row pt-3">
            <div v-for="dish in dishes" :key="dish.id" class="col-md-4">

                <div class="card border-warning mb-3">

                    <div class="ratio ratio-4x3">
                        <img :src="`../storage/${dish.cover_dish}`" class="card-img-top object-fit-cover"
                            alt="img">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title text-warning">{{ dish.name}}</h5>
                        <h5 class="card-title text-warning">{{ dish.description }}</h5>
                        <p>{{dish.price}}$</p>

                    <button class="btn btn-primary" @click="addToCart(dish.name, dish.price, singleRestaurant.id)"> ADD</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- codice da modificare -->
        <!-- <div>
            <h1>menu</h1>
            <div v-for="elem, index in singleRestaurant.dishes" :key="index">

                <p>{{ elem.name }}</p>
                <p>{{ elem.price }}</p>
                <button @click="addToCart(elem.name, elem.price, singleRestaurant.id)"> ADD</button>
            </div> -->

<!-- carrello -->
            <div>
                <h3>Carrello</h3>
                <p>Prezzo totale: {{ totalPrice }}€</p>
                <button @click="deleteCart()"> Svuota Carrello</button>
                <p>Hai Aggiunto:</p>

                <ul>
                    <li v-for="(item, index) in cart" :key="index">
                        <div>{{ item.name }} - x{{ item.quantity }}
                            <button><span @click="removeFromCart(item.name, item.price, item.quantity)">-</span></button>
                            <span><button @click="addToCart(item.name, item.price, singleRestaurant.id)">+</button></span>
                        </div>
                    </li>
                </ul>

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
         // Ripristina il carrello e il prezzo totale dal localStorage
        const cart = localStorage.getItem(`cart-${this.$route.params.id}`);
        const priceCart = localStorage.getItem(`priceCart-${this.$route.params.id}`);


        if (cart !== null) {
            this.cart = JSON.parse(cart);
        }

        if (priceCart !== null) {
            this.totalPrice = parseFloat(priceCart);
        }


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
            dishes: [],
            cart: [],
            totalPrice: 0,
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
            console.log('ciao')
            axios.get('http://localhost:8000/api/dishes/' + this.$route.params.id).then((res) => {
                // Assegna all'array dishes i dati dei piatti recuperati dall'API
                this.dishes = res.data;
                console.log(this.dishes, 'dishes');
                // Stampa i dati dei piatti nella console
                console.log(this.dishes)
            }).catch((err) => {
                console.log(err);
            })
        },

               addToCart(name, price, id) {
            const existingItem = this.cart.find(item => item.name === name);

            if (existingItem) {

                existingItem.quantity++;
            } else {
                this.cart.push({ name, price, quantity: 1 });
            }
            this.totalPrice += parseFloat(price);
            // localStorage.setItem('cart' + id, JSON.stringify(this.cart));
            // localStorage.setItem('priceCart' + id, this.totalPrice);
            localStorage.setItem(`cart-${id}`, JSON.stringify(this.cart));
            localStorage.setItem(`priceCart-${id}`, this.totalPrice);

        },
             removeFromCart(name, price, quantity) {
            const existingItemIndex = this.cart.findIndex(item => item.name === name && item.quantity === quantity);
            if (existingItemIndex !== -1) {
                const existingItem = this.cart[existingItemIndex];
                if (existingItem.quantity > 1) {
                    existingItem.quantity--;
                    this.totalPrice -= existingItem.price;
                } else {
                    this.cart.splice(existingItemIndex, 1);
                    this.totalPrice -= existingItem.price;
                }
                localStorage.setItem(`cart-${this.$route.params.id}`, JSON.stringify(this.cart));
                localStorage.setItem(`priceCart-${this.$route.params.id}`, this.totalPrice);

            }
        },

         deleteCart() {

            localStorage.clear();
            this.cart = [];
            this.totalPrice = 0;

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
