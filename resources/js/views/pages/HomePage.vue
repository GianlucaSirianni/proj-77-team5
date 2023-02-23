<template>
    <div>

        <h1>Homepage</h1>

        <div class="container pt-3 card-body" v-for="elem,index in filterRestaurants" :key="index">
            <router-link :to="`/restaurants/${elem.id}`">
                <div class="d-flex row-cols-2" style="height: 350px;">
                    <div class="pb-3 pe-3 overflow-auto">
                        <h5>Nome Ristorello</h5>
                        <div>immagine</div>
                        <p class="card-text">{{elem.name}}</p>
                        <div v-for="elem,ind in elem.category" :key='ind'>{{elem.name}}</div>
                    </div>
                </div>
            </router-link>
        </div>

        <!-- <div v-for='restaurant in filterRestaurants' :key='restaurant.id'>
            <router-link :to="{name: 'RestaurantsComp', params:{id:restaurant.id} }">{{restaurant.name}}</router-link>
        </div> -->


    </div>
</template>

<script>



export default {
    name: 'HomePage',



    components: {


    },

    props: {
        filterRestaurants: Array
    },



    mounted() {


    },


    data() {
        return {

        }

    },
    methods: {



    },

};
</script>

<style lang='scss' scoped>

</style>
