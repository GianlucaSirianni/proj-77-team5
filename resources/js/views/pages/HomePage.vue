<template>
    <div>
        <!-- JUMBOTRON -->
        <JumboComp />

        <div class="container-md categories-container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <!-- ciclo per le category -->
                <div class="d-flex m-auto justify-content-center py-3">
                    <div v-for="(elem, ind) in categories" :key="ind" class="button-checkbox me-2 mb-2">
                        <input v-model="categoryId" type="checkbox" :value="elem.id" :id="elem.name + ind">
                        <label :for="elem.name + ind">
                            <img :src="`/img/${elem.image}`" alt="Category image">
                            <div class="category-name">{{ elem.name }}</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-md pt-3" v-if="categoryId.length > 0">
            <form class="d-flex justify-content-center">
                <input class="form-control form-control-sm mx-auto" type="text" id="search" v-model="userInput"
                    @keyup="getRestaurants()" placeholder="Cerca un ristorante" aria-label="Search">
            </form>
        </div>

        <div class="container-md mt-5">
            <div class="row d-flex justify-content-center">
                <div v-for="elem, index in restaurants" :key="index" class="col-md-4">
                <div class="card border-warning mb-3">
                    <router-link :to="`/restaurants/${elem.id}`">
                        <div class="ratio ratio-4x3">
                            <img :src="`../storage/${elem.cover_restaurants}`" class="card-img-top object-fit-cover"
                                alt="img">
                        </div>
                    </router-link>
                    <div class="card-body sfondo">

                        <router-link class="text-decoration-none" :to="`/restaurants/${elem.id}`">
                            <h5 class="card-title text-dark fw-bold">{{ elem.name }}</h5>
                            <span class="badge rounded-pill text-bg-warning fw-bold" v-for="cat, categoryIndex in elem.category"
                                :key="categoryIndex"> {{ cat.name }} </span>
                        </router-link>

                    </div>
                </div>
            </div>
            </div>

        </div>
        <pagination class="d-flex justify-content-center" v-model="page" :per-page="6" :records="total"
            :options="paginationOptions" @paginate="getRestaurants" />
    </div>
</template>

<script>
import JumboComp from '../../components/JumboComp.vue';
import Pagination from '../../../../node_modules/vue-pagination-2';

export default {
    name: 'HomePage',



    components: {
        Pagination,
        JumboComp,
    },

    props: {

    },
    mounted() {


    },

    data() {
        return {
            page: 1,
            total: 0,
            restaurants: [],
            categories: [],
            categoryId: [],
            userInput: '',
            paginationOptions: {
                texts: {
                    count: ""
                }
            }
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
            if (this.userInput) {

                url += `&name=${this.userInput}`;
            }
            if (this.page) {

                url += `&page=${this.page}`;
            }
            axios.get(url)
                .then(response => {

                    this.restaurants = response.data.data;
                    this.page = response.data.current_page;
                    this.total = response.data.total;
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
    display: none;
    /* Nascondi la checkbox originale */
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
    filter: brightness(0.5);
    /* Applica un filtro scuro di default */
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

.button-checkbox input[type="checkbox"]:checked+label {
    filter: none;
    /* Rimuove il filtro scuro */
}

.button-checkbox input[type="checkbox"]:checked+label .category-name {
    text-shadow: none;
}

.button-checkbox input[type="checkbox"]:not(:checked)+label .category-name {
    color: white;
    /* colore del testo quando la checkbox non è selezionata */
}

.categories-container {
    overflow-x: auto;
    max-height: 300px;
}

.border-orange {

    border-color: orange !important;
}

.badge {
    padding: 5px 20px;
    border: none;
    margin-right: 20px;
}

.sfondo {
    background-color: #eeeeee;
}

.card {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px !important;
    border: none;
}

.ratio:hover {
    overflow: hidden;

    img {
        transition: 0.7s all ease-in-out;
        transform: scale(1.1);
    }
}

    .form-control:focus {
        outline: none;
        border-color: orange;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }
</style>
