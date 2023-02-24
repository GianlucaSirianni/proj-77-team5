<template>
    <div class="container pt-5">
        <div class="row">
            <div v-for="elem,index in filterRestaurants" :key="index" class="col-4">
                <div class="card border-warning mb-3">
                    <router-link :to="`/restaurants/${elem.id}`">
                        <div class="ratio ratio-4x3">
                            <img :src="`../storage/${elem.cover_restaurants}`" class="card-img-top object-fit-cover" alt="img">
                        </div>
                    </router-link>
                    <div class="card-body">

                        <router-link class="text-decoration-none" :to="`/restaurants/${elem.id}`">
                            <h5 class="card-title text-warning">{{elem.name}}</h5>
                        </router-link>

                    </div>
                </div>
            </div>

        </div>

        <!-- ciclo per le category -->
        <!-- <label for="">Seleziona la categoria</label>
        <select v-model="categoryId" name="" id="">
        <option v-for="elem,ind in categoryApp" :key='ind'   :value="elem.id">{{elem.name}}</option>
        </select> -->
        <!-- ciclo per i ristoranti -->
       <!--  <div class="container pt-3 card-body" v-for="elem,index in filterRestaurants" :key="index">
            <router-link :to="`/restaurants/${elem.id}`">
                <div class="d-flex row-cols-2" style="height: 350px;">
                    <div class="pb-3 pe-3 overflow-auto">
                        <h5>{{elem.name}}</h5>
                        <div>immagine</div>
                        <p class="card-text">{{elem.address}}</p>
                        <div v-for="elem,ind in elem.category" :key='ind'>{{elem.name}}</div>
                    </div>
                </div>
            </router-link>
        </div> -->


    </div>
</template>

<script>
export default {
    name: 'HomePage',



    components: {


    },

    props: {
        filterRestaurants: Array,
        categoryApp: Array
    },
    created() {

    },
    mounted() {

        this.filterByCategories()
    },

    data() {
        return {
            categoryId: '',
            filterCategoryrestaurants: '',
            categoryArray:[],
        }

    },
       watch: {
        filterRestaurants: {
            immediate: true, // chiama subito il watch quando il componente viene creato
            handler() {
                this.filterByCategories();
            }
        }
    },

    methods: {

        filterByCategories(){
            //
        }









    },

};
</script>

<style lang='scss' scoped>

</style>
