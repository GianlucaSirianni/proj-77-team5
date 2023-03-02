<template>
    <div>
        <!-- JUMBOTRON -->
        <JumboComp/>

        <div class="container-md">
            <div class="pb-5 d-flex flex-column align-items-center justify-content-center">
                <!-- ciclo per le category -->
                <div class="d-flex flex-wrap m-auto justify-content-center py-3">
                    <div v-for="(elem, ind) in categories" :key="ind" class="button-checkbox me-2 mb-2">
                        <input v-model="categoryId" type="checkbox" :value="elem.id" :id="elem.name + ind">
                        <label :for="elem.name + ind">
                        <img :src="`/img/${elem.image}`" alt="Category image">
                        <div class="category-name">{{ elem.name }}</div>
                        </label>
                    </div>
                </div>

                <div v-if="categoryId.length > 0">
                    <form class="d-flex">
                    <input class="form-control col col-lg-8 " type="text" id="search" v-model="userInput" @keyup="getRestaurants()" placeholder="Cerca un ristorante" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Questo dovrà diventare un componente -->
            <div v-for="elem, index in restaurants" :key="index" class="col-md-4">
                <div class="card border-warning mb-3">
                    <router-link :to="`/restaurants/${elem.id}`">
                        <div class="ratio ratio-4x3">
                            <img :src="`../storage/${elem.cover_restaurants}`" class="card-img-top object-fit-cover"
                                alt="img">
                        </div>
                    </router-link>
                    <div class="card-body">

                        <router-link class="text-decoration-none" :to="`/restaurants/${elem.id}`">
                            <h5 class="card-title text-warning">{{ elem.name }}</h5>
                        </router-link>

                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    import JumboComp from '../../components/JumboComp.vue';

    export default {
        name: 'HomePage',



        components: {

            JumboComp,
        },

        props: {

        },
        mounted() {


        },

        data() {
            return {

                restaurants: [],
                categories: [],
                categoryId: [],
                userInput: '',
            }

        },
        watch: {
            categoryId(newCategoryId) {
                this.getRestaurants(newCategoryId);

            }
        },
        methods: {

            getRestaurants() {

                let url = '/api/restaurants';
                if (this.categoryId) {

                    url += `?category_id=${this.categoryId}`;
                }
                if(this.userInput){

                    url += `&name=${this.userInput}`;
                }
                axios.get(url)
                .then(response => {

                    this.restaurants = response.data;
                })
                .catch(error => {

                    console.log(error);
                });
            },
            getRestaurantsByName() {

                let url = '/api/restaurants';
                if (this.userInput) {

                    url += `?name=${this.userInput}`;
                }
                axios.get(url)
                .then(response => {

                    this.restaurants = response.data;
                })
                .catch(error => {

                    console.log(error);
                });
            },
            getCategories() {

                axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },

        },
        created() {
            this.getCategories();
            this.getRestaurants();
        },

    };
    </script>

<style lang='scss' scoped>

.button-checkbox input[type="checkbox"] {
  display: none; /* Nascondi la checkbox originale */
}

.button-checkbox label {
  display: block;
  position: relative;
  width: 200px;
  height: 200px;
  border-radius: 10px;
  overflow: hidden;
  background-color: #f5f5f5;
  cursor: pointer;
  filter: brightness(0.5); /* Applica un filtro scuro di default */
}

.button-checkbox label:hover {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.button-checkbox label img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.button-checkbox label .category-name {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  font-weight: bold;
  color: #fff;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  text-transform: uppercase;
}

.button-checkbox input[type="checkbox"]:checked + label {
  filter: none; /* Rimuove il filtro scuro */
}

.button-checkbox input[type="checkbox"]:checked + label .category-name {
  text-shadow: none;
}

.button-checkbox input[type="checkbox"]:not(:checked) + label .category-name {
  color: white; /* colore del testo quando la checkbox non è selezionata */
}

    /////

    /* .searchcomp-height{

        min-height: 300px;
    }
 */

    .border-orange {

        border-color: orange !important;
    }

</style>
