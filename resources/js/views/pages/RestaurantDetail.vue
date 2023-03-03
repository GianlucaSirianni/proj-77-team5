<template>
    <div class="">
        <div class="container-md ">
            <div v-if="order_processing">
                <div class="order_processing">
                    <!-- gattino-loading -->
                    <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center align-items-center">
                        <iframe src="https://giphy.com/embed/5UG0A0ZV8APqnWYU0t" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/time-pizza-search-5UG0A0ZV8APqnWYU0t"></a></p>
                    </div>
                </div>
            </div>

            <!-- Ristorante -->
            <div class="img-container">
                <img :src="`../storage/${singleRestaurant.cover_restaurants}`" alt="img" class="bossImg">

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
                    <!-- <div class="card text-bg-dark mt-2">
                        <img :src="`../storage/${dish.cover_dish}`" style=" height:200px" class=" object-fit-cover card-img img-fluid" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="badge rounded-pill pills-bg-orange fw-bold">{{ dish.name}}</h5>
                            <h5 class="badge rounded-pill pills-bg-orange fw-bold">{{ dish.price}}€</h5>
                            <p class="badge rounded-pill pills-bg-orange fw-bold">{{ dish.description }}</p>
                            <p class="badge rounded-pill pills-bg-orange fw-bold"><small>{{dish.ingredients}}</small></p>
                            <button class="btn btn-primary" @click="addToCart( dish.price, singleRestaurant.id, dish.id)">+</button>
                            <i class="bi bi-cart-plus"></i>
                        </div>
                    </div> -->


                    <!-- !!PROVE CARD -->

                    <div class="card position-relative myShadow" style="width: 18rem;">
                        <img :src="`../storage/${dish.cover_dish}`" class="card-img-top" alt="si">
                        <div class="card-body myColor orange-border d-flex justify-content-between">
                            <div>
                                <p class="card-title fw-bold">{{ dish.name}}</p>
                                <p class="card-text">{{ dish.price}}€</p>
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><font-awesome-icon icon="fa-solid fa-circle-info" /></button>
                                <button class="btn btn-danger" @click="addToCart( dish.price, singleRestaurant.id, dish.id)">Add</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tutto cio' che devi sapere su: {{ dish.name}}</h1>
                        </div>
                        <div class="modal-body">
                            <h3>Descrizione</h3>
                            <p>{{ dish.description }}</p>
                            <h3>Ingredienti</h3>
                            <p>{{dish.ingredients}}</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- !FINE PROVE CARD -->







                </div>
            </div>

            <!--! carrello-card -->
            <div id='cart' class=" card border-secondary mb-3" style="max-width: 20rem;">
                <div class="card-header">

                    <h4>Carrello</h4>

                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title text-black">Prezzo totale: {{ totalPrice }}€</h5>
                    <p class="text-black">Hai Aggiunto:</p>
                    <ul>
                        <li v-for="(item, index) in cart" :key="index">
                            <div><p class="text-black fw-bolder">{{ item.chiave.name }} - x{{ item.quantity }}</p></div>

                                <button id="liveToastBtn" class="btn btn-outline-primary" @click="removeFromCart(item.chiave.name, item.quantity)">-</button>
                                <button id="liveToastBtn" class=" btn btn-outline-primary" @click="addToCart(item.chiave.price, singleRestaurant.id, item.chiave.id)">+</button>


                        </li>
                    </ul>
                        <div class="d-flex justify-content-between">
                           <button class="btn btn-danger" @click="deleteCart()"> Svuota Carrello</button>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Vai al Checkout</button>
                        </div>
                </div>
            </div>

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
    <!-- bottone-carrello -->
    <div @click="showCart()" class="cart-preview" >
            <div class="position-relative"><font-awesome-icon icon="fa-solid fa-cart-shopping" />
                <div class="red-increment d-flex justify-content-center align-items-center">
                    <span>{{numero}}</span>
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
        const numero = localStorage.getItem(`numero-${this.$route.params.id}`);

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
                          //  console.log('entrati in errore')
                            hiddenNonceInput.value = '';
                            // console.log(hiddenNonceInput.value)
                            return;
                        }
                        hiddenNonceInput.value = payload.nonce;
                       // console.log(hiddenNonceInput.value)
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
            order_processing: false,
            numero: localStorage.getItem(`numero-${this.$route.params.id}`),

        }
    },

    components: {

    },
    methods: {
        //fuzione show del carrello

        showCart(){

          const cartDiv = document.querySelector('#cart');
          cartDiv.classList.toggle('show');


        },



        // Funzione che recupera i dati del singolo ristorante
        getSingleRestaurant() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then((res) => {
                // Assegna alla variabile singleRestaurant i dati del ristorante recuperati dall'API
                this.singleRestaurant = res.data;
            }).catch((err) => {
               // console.log(err);
            })
        },

        // Funzione che recupera i dati dei piatti associati al ristorante
        getDishesByRestaurantId() {

            axios.get('http://localhost:8000/api/dishes/' + this.$route.params.id).then((res) => {
                // Assegna all'array dishes i dati dei piatti recuperati dall'API
                this.dishes = res.data;

                // Stampa i dati dei piatti nella console

            }).catch((err) => {
               // console.log(err);
            })
        },

        updateTotalPrice() {
            this.totalPrice = this.cart.reduce((total, item) => {
                return total + item.chiave.price * item.quantity;
            }, 0);
        },

        addToCart(price, id, dish_id,) {
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
            this.numero++
            localStorage.setItem(`cart-${id}`, JSON.stringify(this.cart));
            localStorage.setItem(`priceCart-${id}`, this.totalPrice);
            localStorage.setItem(`numero-${this.$route.params.id}`, this.numero);

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
                this.numero--
                localStorage.setItem(`cart-${this.$route.params.id}`, JSON.stringify(this.cart));
                localStorage.setItem(`priceCart-${this.$route.params.id}`, this.totalPrice);
                localStorage.setItem(`numero-${this.$route.params.id}`, this.numero)
               ;
            }
        },


        // CHIUDI OFFCANVAS


        deleteCart() {

            localStorage.clear();
            this.cart = [];
            this.totalPrice = 0;
            //animazione cart
            this.numero = 0
            const cartDiv = document.querySelector('#cart');
            cartDiv.classList.remove('show');

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
            //console.log(this.order_processing, 'GUARDA QUI');


            // CODICE DA TENERE QUI SOTTO 4263 9826 4026 9299

            setTimeout(() => {

                this.order_processing = false;

                const payload = document.querySelector("#my-nonce-input");
                // const payload = this.payload;

                // debugger
                //console.log(payload, 'questo e payload')
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
                          //  console.log('Ordine salvato con successo:', response.data);
                            // Redirect alla pagina di conferma dell'ordine o allo storico ordini
                            this.resetForm();

                            this.deleteCart();

                            this.$router.push({ name: 'OrderSuccess' })

                            // this.hideCanvas();


                        })
                        .catch(error => {
                           // console.error('Errore durante il salvataggio dell\'ordine:', error);
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
    width: 100%;
    // height: 400px;
    position: relative;
    img {
        max-width: 100%;
        max-height: 100%;
        object-position: center;
        // object-fit: contain;
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
//carrello preview
.cart-preview{
    display: flex;
    justify-content:flex-end;
    align-items:flex-end;
    padding: 1rem;



}
.red-increment{
    color: white;
    position:absolute;
    top:-7%;
    width:2rem;
    height: 2rem;
    background-color: red;
    border-radius:50%;
}

.fa-cart-shopping{
        background-color: rgb(11, 94, 215);
        border-radius: 50%;
        padding: 2rem;
        color: white;
        box-shadow: rgba(0, 0, 0, 0.45) 1.95px 1.95px 4px;
}
#cart {
  position: fixed;
//   min-height: 300px;
  z-index: 2;
  top: 30%;
  right: 0%;
  display: none;
  animation: slideInRight 0.7s ease-in-out;
  background-color: rgba(248, 195, 80, 0.6);
  background-image: url('/img/logo-deliveboo.png');

//   background-size: contain;
  background-repeat: no-repeat;
  background-position-y: bottom;
  background-size: cover;


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
    background: #212529;
    opacity: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.myColor{
    // color: #FFAF00;
    color: black;
    background-color: #FFE3B7;
}

.orange-border{
    border: 5px solid #FFAF00;
}

// .border-orange {

// border-color: orange !important;
// }

// .pills-bg-orange{

// background: orange;
// }

// .badge {
// display: block;
// width: fit-content;
// padding: 5px 20px;
// border: none;
// margin-right: 20px;
// }

// .myPic{
//     max-width:100%;
// max-height:100%;
// }

.myShadow{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    // -webkit-box-reflect: below 5px
	// 	linear-gradient(transparent, transparent, rgba(0, 0, 0, 0.2));
}



</style>
