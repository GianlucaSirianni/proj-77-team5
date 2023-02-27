<template>
<div class="container">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">


            <h4 class="text-primary">
                    {{singleRestaurant.name}}
            </h4>


        </div>
        <div class="card-body">
            <div class="d-flex row-cols-2" style="height: 350px;">
                <div class="pb-3 pe-3 overflow-auto">
                    <h5>Indirizzo</h5>
                    <p class="card-text">{{singleRestaurant.address}}</p>
                    <h5>P.IVA</h5>
                    <p class="card-text">{{singleRestaurant.vat}}</p>
                    <h5>Categorie</h5>
                </div>

                <div>
                    <img :src="`../storage/${singleRestaurant.cover_restaurants}`" class="card-img-top object-fit-cover" alt="img">
                </div>

            </div>
        </div>
    </div>

    <div>
        <h1>menu</h1>
        <div v-for="elem, index in singleRestaurant.dishes" :key="index">

        <p>{{ elem.name }}</p>
        <p>{{ elem.price }}</p>
    <button @click="addToCart(elem.name, elem.price, singleRestaurant.id)"> ADD</button>
    </div>


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


</div>
</template>

<script>


export default {
name: 'RestaurantsComp',

props: {


},

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

mounted(){
    this.getSingleRestaurant()



},


data() {
    return {
        singleRestaurant : '',

        cart: [],



        totalPrice : 0,
    }

},

components: {

},
methods: {

    getSingleRestaurant(){

            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then( (res) => {

                this.singleRestaurant = res.data;
                console.log(this.singleRestaurant, 'qualcosa');





            }).catch((err) =>{



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

            removeFromCart(name, price, quantity){
            const existingItemIndex = this.cart.findIndex(item => item.name === name && item.quantity === quantity);
            if(existingItemIndex !== -1) {
                const existingItem = this.cart[existingItemIndex];
                if(existingItem.quantity > 1) {
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



        deleteCart(){

            localStorage.clear();

        }



},

}


</script>

<style lang='scss' scoped>



</style>
