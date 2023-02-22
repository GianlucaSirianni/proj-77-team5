<template>
    <div>
      <h1>Questo e' Home</h1>

      <!-- <div>
        <label for="search">Ricerca per nome:</label>
        <input type="text" id="search" v-model="searchTerm" @input="searchRestaurants">
      </div> -->

      <input type="text" id="search" v-model="searchTerm">

      <div v-for="elem in restaurants" :key="elem.id">
        <div class="text-white">{{elem.name}}</div>
        <div class="text-white">{{elem.address}}</div>

      </div>

    </div>
</template>

<script>


    export default {
    name: 'HomePage',

    props: {

    },

    mounted(){

        this.getRestaurants();

    },

    components: {

    },
    data(){
        return{
          restaurants:[],
          searchTerm:'',
        }
    },
    methods: {

        getRestaurants(){
            axios.get('http://localhost:8000/api/restaurants').then(response => {
            console.log(response.data);
            this.restaurants = response.data

        });
        }

    },

    };

</script>

<style lang='scss' scoped>

</style>
