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
    <button @click="addToCart(elem.name, elem.price)"> ADD</button>
    </div>


    <div>
        <h3>Carrello</h3>
        <p>Prezzo totale: {{ totalPrice }}€</p>
        <button @click="deleteCart()"> Svuota Carrello</button>
        <p>Hai Aggiunto:</p>

        <ul>
            <li v-for="(item, index) in cart" :key="index">
                {{ item }}
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

},

mounted(){
    this.getSingleRestaurant()

    localStorage.getItem('cart').split(',').forEach(element => {
        this.cart.push(element);

    });

    const priceCart = localStorage.getItem('priceCart');

    if (priceCart !== null) {
    this.totalPrice = parseFloat(priceCart);
  }


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





            }).catch((err) =>{

                // console.log(err);

            })


        },

        addToCart(name, price){
            this.cart.push(name);
            this.totalPrice += parseFloat(price);
            localStorage.setItem('cart', this.cart);
            localStorage.setItem('priceCart', this.totalPrice);

        },

        deleteCart(){

            this.cart = []
            this.totalPrice = 0
            localStorage.removeItem("cart");
            localStorage.removeItem("priceCart");

        }



},

}


</script>

<style lang='scss' scoped>



</style>
