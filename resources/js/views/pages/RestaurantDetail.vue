<template>
    <div class="position-relative">
        <div class="container-md ">
            <div v-if="order_processing">
                <div class="order_processing">
                    <!-- gattino-loading -->
                    <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center align-items-center">
                        <iframe src="https://giphy.com/embed/11JTxkrmq4bGE0" width="480" height="369" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                        <p><a href="https://giphy.com/gifs/cat-computer-working-11JTxkrmq4bGE0"></a></p>
                    </div>
                </div>
            </div>

            <!-- Ristorante -->
            <div class="img-container">
                <!-- <img :src="`../storage/${singleRestaurant.cover_restaurants}`" alt="img"> -->

                <h1 class="text-primary text-center">
                    {{singleRestaurant.name}}
                </h1>
            </div>
            <!-- menu -->
            <div class="row pt-3">
                <div v-for="dish in dishes" :key="dish.id" class="col-md-4">
                    <!-- card-1 -->
                    <!-- <div class="card border-warning mb-3">

                                <div class="ratio ratio-4x3">
                                    <img :src="`../storage/${dish.cover_dish}`" class="card-img-top object-fit-cover" alt="img">
                                </div>

                                <div class="card-body">

                                    <h5 class="card-title text-warning">{{ dish.name}}</h5>
                                    <h5 class="card-title text-warning">{{ dish.description }}</h5>
                                    <p>{{dish.price}}$</p>

                                    <button class="btn btn-primary" @click="addToCart( dish.price, singleRestaurant.id, dish.id)"> ADD</button>

                                </div>
                            </div> -->

                    <!-- card-2 -->
                    <div class="card text-bg-dark mt-2">
                        <img :src="`../storage/${dish.cover_dish}`" style=" height:200px" class=" object-fit-cover card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ dish.name}}</h5>
                            <h5 class="card-title">{{ dish.price}}€</h5>
                            <p class="card-text">{{ dish.description }}</p>
                            <p class="card-text"><small>{{dish.ingredients}}</small></p>
                            <button class="btn btn-primary" @click="addToCart( dish.price, singleRestaurant.id, dish.id)">+</button>
                            <i class="bi bi-cart-plus"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- carrello-card -->
            <div id='cart' class=" card border-secondary mb-3" style="max-width: 20rem;">
                <div class="card-header">
                    <h4>Carrello </h4>
                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Prezzo totale: {{ totalPrice }}€</h5>
                    <p>Hai Aggiunto:</p>
                    <ul>
                        <li v-for="(item, index) in cart" :key="index">
                            <div>{{ item.chiave.name }} - x{{ item.quantity }}</div>
                             <button id="liveToastBtn" class="btn btn-outline-primary" @click="removeFromCart(item.chiave.name, item.quantity)">-</button>
                            <button id="liveToastBtn" class=" btn btn-outline-primary" @click="addToCart(item.chiave.price, singleRestaurant.id, item.chiave.id)">+</button>
                        </li>
                    </ul>
                                      <div class="d-flex justify-content-around">
                           <button class="btn btn-danger" @click="deleteCart()"> Svuota Carrello</button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Vai al Checkout</button>
                        </div>
                </div>
            </div>

<!-- carrello -->
            <!-- <div>
                <h3>Carrello <i class="bi bi-cart-plus"></i></h3>
                <p>Prezzo totale: {{ totalPrice }}€</p>
                <button class="btn btn-danger" @click="deleteCart()"> Svuota Carrello</button>
                <p>Hai Aggiunto:</p>

                <ul>
                    <li v-for="(item, index) in cart" :key="index">
                        <div>{{ item.chiave.name }} - x{{ item.quantity }}
                            <span><button id="liveToastBtn" class="btn btn-outline-primary" @click="removeFromCart(item.chiave.name, item.quantity)">-</button></span>
                            <span><button id="liveToastBtn" class=" btn btn-outline-primary" @click="addToCart(item.chiave.price, singleRestaurant.id, item.chiave.id)">+</button></span>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Vai al Checkout</button>
            </div> -->
            <!-- offcanva -->


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Inserisci i tuoi dati:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <h5>Checkout</h5>
                    <div>Tutti i campi contrassegnati con * sono obbligatori</div>
                    <!-- manda ordine-->
                    <form @submit.prevent="sendOrder" id="myForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome *</label>
                            <input type="text" class="form-control" id="name" pattern="[a-zA-Z]+" required autofocus v-model="customerName">
                            <span id="invalid-name" class="invalid-feedback" role="alert">
                                        <strong>{{ 'Campo obbligatorio' }}</strong>
                                    </span>
                        </div>
                        <!-- input hidden del payload -->
                        <input type="hidden" name="my-nonce-input" id="my-nonce-input" v-model="payload" />
                        <div class="mb-3">
                            <label for="surname" class="form-label">Cognome *</label>
                            <input type="text" class="form-control" id="surname" v-model="customerSurname" required autocomplete="surname" pattern="[a-zA-Z]+" autofocus>
                            <span id="invalid-surname" class="invalid-feedback" role="alert">
                                        <strong>{{ 'Campo obbligatorio' }}</strong>
                                    </span>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Indirizzo *</label>
                            <input type="text" class="form-control" id="address" v-model="customerAddress" required>
                            <span id="invalid-address" class="invalid-feedback" role="alert">
                                        <strong>{{ 'Campo obbligatorio' }}</strong>
                                    </span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefono *</label>
                            <input type="text" class="form-control" id="phone" v-model="phoneNumber" min="0" maxlength="10" minlength="10" pattern="[0-9]{10}" required>
                            <span id="invalid-phone" class="invalid-feedback" role="alert">
                                        <strong>{{ 'il numero di cellulare deve essere composto da 10 numeri' }}</strong>
                                    </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" v-model="email" required>
                            <span id="invalid-email" class="invalid-feedback" role="alert">
                                        <strong>{{ 'Campo obbligatorio' }}</strong>
                                    </span>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Note *</label>
                            <textarea class="form-control" id="note" rows="3" v-model="orderNote"></textarea>
                        </div>

                        <div id="dropin-wrapper">
                            <div id="checkout-message"></div>
                            <div id="dropin-container"></div>
                            <!-- <button id="submit-button">Submit payment</button> -->
                            <button id='sub' class="">

                                            --> Conferma
                                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    name: 'RestaurantDetail',

    props: {

    },

    // Definisci la funzione creata che viene eseguita quando il componente viene creato
    created() {
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
    mounted() {

        // Chiama la funzione che recupera i dati del singolo ristorante
        this.getSingleRestaurant();

        // Chiama la funzione che recupera i dati dei piatti associati al ristorante
        this.getDishesByRestaurantId();
        // BRAINTREE
        const button = document.getElementById('sub')
        braintree.dropin.create({
                authorization: "sandbox_38t2rkrh_pqqgjbypzgsnnfbm",
                selector: "#dropin-container",
            },
            function(err, instance) {
                var form = document.querySelector("#myForm");
                var hiddenNonceInput = document.querySelector("#my-nonce-input");

                form.addEventListener("submit", function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('entrati in errore')
                            hiddenNonceInput.value = '';
                            // console.log(hiddenNonceInput.value)
                            return;
                        }
                        hiddenNonceInput.value = payload.nonce;
                        console.log(hiddenNonceInput.value)
                    });
                });
            }
        );

    },




    data() {
        return {
            // Inizializza il dato singleRestaurant come una stringa vuota
            singleRestaurant: '',
            // Inizializza il dato dishes come un array vuoto
            dishes: [],
            cart: [],
            totalPrice: 0,
            //dati utente
            customerName: '',
            customerSurname: '',
            customerAddress: '',
            phoneNumber: '',
            email: '',
            orderNote: '',
            payload: '',
            errorMessage: '',
            order_processing: false
        }
    },

    components: {

    },
    methods: {
        // Funzione che recupera i dati del singolo ristorante
        getSingleRestaurant() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then((res) => {
                // Assegna alla variabile singleRestaurant i dati del ristorante recuperati dall'API
                this.singleRestaurant = res.data;
            }).catch((err) => {
                console.log(err);
            })
        },

        // Funzione che recupera i dati dei piatti associati al ristorante
        getDishesByRestaurantId() {

            axios.get('http://localhost:8000/api/dishes/' + this.$route.params.id).then((res) => {
                // Assegna all'array dishes i dati dei piatti recuperati dall'API
                this.dishes = res.data;

                // Stampa i dati dei piatti nella console

            }).catch((err) => {
                console.log(err);
            })
        },

        updateTotalPrice() {
            this.totalPrice = this.cart.reduce((total, item) => {
                return total + item.chiave.price * item.quantity;
            }, 0);
        },

        addToCart(price, id, dish_id) {
            const existingItem = this.cart.find(item => item.chiave.id === dish_id);

            if (existingItem) {

                existingItem.quantity++;
            } else {
                // this.cart.push({ name, price, quantity: 1 });
                const user_dish = this.dishes.filter(elem => elem.id == dish_id)
                const dish = {
                    chiave: user_dish[0],
                    quantity: 1

                }
                this.cart.push(dish);

            }
            // this.totalPrice += parseFloat(price);
            this.updateTotalPrice();

            localStorage.setItem(`cart-${id}`, JSON.stringify(this.cart));
            localStorage.setItem(`priceCart-${id}`, this.totalPrice);

            //animazione cart
              const cartDiv = document.querySelector('#cart');
              cartDiv.classList.remove('hide');
              cartDiv.classList.add('show');
              console.log(cartDiv)


        },

        removeFromCart(name, quantity) {
            const existingItemIndex = this.cart.findIndex(item => item.chiave.name === name && item.quantity === quantity);
            // console.log(existingItemIndex, 'existing');
            if (existingItemIndex !== -1) {
                const existingItem = this.cart[existingItemIndex];
                // console.log(existingItem, 'existing primo if');
                if (existingItem.quantity > 1) {
                    existingItem.quantity--;
                    // console.log(existingItem.quantity, 'existing secondo if');
                    this.updateTotalPrice();
                } else {
                    this.cart.splice(existingItemIndex, 1);

                    this.updateTotalPrice();
                }
                localStorage.setItem(`cart-${this.$route.params.id}`, JSON.stringify(this.cart));
                localStorage.setItem(`priceCart-${this.$route.params.id}`, this.totalPrice);


            }
        },


        // CHIUDI OFFCANVAS


        deleteCart() {

            localStorage.clear();
            this.cart = [];
            this.totalPrice = 0;
            //animazione cart
               const cartDiv = document.querySelector('#cart');
               cartDiv.classList.remove('show');
               cartDiv.classList.add('hide');
               console.log(cartDiv)

        },


        resetForm() {

            this.customerName = '',
                this.customerSurname = '',
                this.customerAddress = '',
                this.phoneNumber = '',
                this.email = '',
                this.orderNote = ''
        },

        sendOrder() {

            this.order_processing = true;
            console.log(this.order_processing, 'GUARDA QUI');


            // CODICE DA TENERE QUI SOTTO 4263 9826 4026 9299

            setTimeout(() => {

                this.order_processing = false;

                const payload = document.querySelector("#my-nonce-input");
                // const payload = this.payload;

                // debugger
                console.log(payload, 'questo e payload')
                const order = {
                    customer_name: this.customerName,
                    customer_surname: this.customerSurname,
                    customer_address: this.customerAddress,
                    phone_number: this.phoneNumber,
                    email: this.email,
                    order_note: this.orderNote,
                    total_price: this.totalPrice,
                    restaurant_id: this.singleRestaurant.id,
                    cart: this.cart
                };
                if (payload.value !== "") {

                    // debugger
                    axios.post('http://localhost:8000/api/orders/', order)
                        .then(response => {
                            console.log('Ordine salvato con successo:', response.data);
                            // Redirect alla pagina di conferma dell'ordine o allo storico ordini
                            this.resetForm();

                            this.deleteCart();

                            this.$router.push({ name: 'OrderSuccess' })

                            // this.hideCanvas();


                        })
                        .catch(error => {
                            console.error('Errore durante il salvataggio dell\'ordine:', error);
                            this.$router.push({ name: 'RestaurantDetail' })
                            this.errorMessage = "Si e' verificato un errore con il pagamento, la preghiamo di riprovare"
                            // Mostra un messaggio di errore all'utente
                        });
                };
            }, 3000);










        }
    }
}
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
        background-color: rgba(0, 0, 0, 0.5);
        /* Opacità del colore di sfondo */
    }
}

//animazione carrello
#cart {
  position: fixed;
  top: 30%;
  right: 0%;
  //transform: translateY(-50%) translateX(-100%);
  //background-color: #fff;
  //width: 300px;
  //padding: 20px;
  //border: 1px solid #ccc;
  display: none;
  animation: slideInRight 0.5s ease-in-out;
}
#cart.show {
  display: block;
}
#cart.hide {
  display: none;
}

@keyframes slideInRight {
  0% {
    transform:  translateX(-100%);
  }
     50% {
     transform:  translateX(100px);
   }
  100% {
    transform:  translateX(0);
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

.order_processing {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    background: #6A1B9A;
    opacity: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
