<template>
    <div>
        <HeaderComp @emitText="searchRestaurants"/>
        <!-- <a href="/admin">Vai alla pagina di amministrazione</a> -->
         <router-view :filterRestaurants="filterRestaurants"  :categoryApp="categories"></router-view>
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
                categories:[],
            }
        },
    methods: {


        getCategory(){
            axios.get('http://localhost:8000/api/categories').then(response => {
                //console.log(response.data)
                this.categories = response.data
            })

        },



        getRestaurants(){
                axios.get('http://localhost:8000/api/restaurants').then(response => {

                    console.log(response.data)
                    this.restaurants = response.data;
                    this.filterRestaurants = response.data;


                    this.getCategory();

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
