<template>
    <div>
        <HeaderComp @emitText="searchRestaurants"/>


        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view></router-view>

         <div class="container pt-3 card-body" v-for="elem,index in filterRestaurants" :key="index">
        <div class="d-flex row-cols-2" style="height: 350px;">
            <div class="pb-3 pe-3 overflow-auto">
                    <h5>Nome Ristorello</h5>
                    <p class="card-text">{{elem.name}}</p>
            </div>

            <router-link to="/menu">
                <button>Menu</button>
            </router-link>
        </div>
      </div>

    </div>
</template>




<script>
 import HomePage from './pages/HomePage.vue'
 import HeaderComp from '../components/HeaderComp.vue'

    export default {
    name: 'App',


    props: {

    },

    mounted(){
            this.getRestaurants();
            this.searchRestaurants();
    },

    components: {
        HomePage,
        HeaderComp
        // HomeView
    },
    data(){
            return{


                filterRestaurants:[],
                restaurants:[],
                input:'',
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

            searchRestaurants(userInput){
                this.input = userInput;

                if(this.input == ''){

                    this.filterRestaurants = this.restaurants
                }else{

                    this.filterRestaurants = this.restaurants.filter(restaurant => restaurant.name.toLowerCase().includes(this.input.toLowerCase()))

                }
            }

    },

    };

</script>

<style lang='scss' scoped>

</style>
