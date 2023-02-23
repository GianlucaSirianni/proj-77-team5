<template>
    <div>
        <HeaderComp @emitText="searchRestaurants"/>
        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view :filterRestaurants="filterRestaurants"></router-view>
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
           // this.getCategory();
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


        // getCategory(){

        // },



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
