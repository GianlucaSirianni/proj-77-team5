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
    <button> ADD</button>
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
},

data() {
    return {
        singleRestaurant : '',
    }

},

components: {

},
methods: {

    getSingleRestaurant(){

            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then( (res) => {

                this.singleRestaurant = res.data;

                console.log(this.singleRestaurant, 'QUi');



            }).catch((err) =>{

                console.log(err);

            })


        },

        addToCart(){
            console.log('ciao')
        }

},

};

</script>

<style lang='scss' scoped>



</style>
