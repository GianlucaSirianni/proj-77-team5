<template>
    <div>
      <h1>Questo e' Home</h1>

      <div v-for="elem in restaurants" :key="elem.id">
        <div class="text-white">{{elem.name}}</div>

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
