<template>
<<<<<<< HEAD
    <div class="container pt-5">
        <div>
            <form class="d-flex">
                <input class="form-control me-2" type="text" id="search" v-model="userInput" @keyup="getRestaurants()"
                    placeholder="Cerca un ristorante" aria-label="Search">
            </form>
        </div>
        <!-- ciclo per le category -->
        <div class="d-flex flex-wrap m-auto justify-content-center py-3">
            <label v-for="elem, ind in categories" :key="ind" class="button-checkbox me-2 mb-2" :for="'category' + ind">
                <input v-model="categoryId" class="form-check-input" type="checkbox" :value="elem.id"
                    :id="'category' + ind">
                <span class="button-label">{{ elem.name }}</span>
            </label>
=======
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
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02
        </div>

        <div class="row">

            <!-- Questo dovrà diventare un componente -->
<<<<<<< HEAD

            <div v-for="elem, index in restaurants" :key="index" class="col-md-3">
=======
            <div v-for="elem, index in restaurants" :key="index" class="col-md-4">
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02
                <div class="card border-warning mb-3">
                    <router-link :to="`/restaurants/${elem.id}`">
                        <div class="ratio ratio-4x3">
                            <img :src="`../storage/${elem.cover_restaurants}`" class="card-img-top object-fit-cover"
                                alt="img">
                        </div>
                    </router-link>
                    <div class="card-body sfondo">

                        <router-link class="text-decoration-none" :to="`/restaurants/${elem.id}`">
                            <h5 class="card-title text-warning">{{ elem.name }}</h5>
                            <div>
                                <span class="badge rounded-pill text-bg-warning me-4" v-for="categ, CategoryIndex in elem.category" :key="CategoryIndex">{{categ.name  }}</span>
                            </div>
                        </router-link>

                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
<<<<<<< HEAD
export default {
    name: 'HomePage',
    name: 'restaur',
=======
    import JumboComp from '../../components/JumboComp.vue';

    export default {
        name: 'HomePage',
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02



        components: {

<<<<<<< HEAD

    },

    props: {

    },
    created() {

    },
    mounted() {
        this.list()

    },

    data() {
        return {
            page: 1,
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
            if (this.userInput) {

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
=======
            JumboComp,
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02
        },
        async list(page = 1) {
            await axios.get(`/api/restaur?page=${page}`).then(({ data }) => {
                this.restaur = data
            }).catch(({ response }) => {
                console.error(response)
            })
        }

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
.button-checkbox {
    display: inline-block;
    position: relative;
    padding: 0;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 30px;
    overflow: hidden;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

<<<<<<< HEAD
<<<<<<< HEAD
.button-checkbox input[type="checkbox"] {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}
=======
    .button-checkbox {
        display: inline-block;
        position: relative;
        padding: 0;
        cursor: pointer;
        background-color: rgb(255, 175, 0) ;
        color: black;
        border-radius: 30px;
        overflow: hidden;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02

.button-label {
    display: inline-block;
    padding: 6px 12px;
    width: 110px;
    text-align: center;
}

.button-checkbox input[type="checkbox"]:checked+.button-label {
    background-color: #007bff;
    color: #fff;
}

<<<<<<< HEAD
.button-checkbox input[type="checkbox"]:focus+.button-label {
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
}
=======
    .button-checkbox input[type="checkbox"]:checked + .button-label {
        background-color: rgb(132, 4, 4);
        color: #fff;
    }
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02

.button-checkbox input[type="checkbox"]:active+.button-label {
    background-color: #0069d9;
    border-color: #0062cc;
}

<<<<<<< HEAD
.flex-center {
    display: flex;
    justify-content: center;
}

span {
    padding: 5px 20px;
    border: none;
    background-color: rgb(255, 175, 0);
}

span:hover {
    background-color: rgb(132, 4, 4);
}
=======
    .button-checkbox input[type="checkbox"]:active + .button-label {
        background-color: rgb(132, 4, 4);
        border-color: rgb(132, 4, 4);
        color: #fff;
    }
=======
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
>>>>>>> 010873c8530a4e68f09a9ac1e767c7e68ac99ff8

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
>>>>>>> 1abaa30d69c02c3e1f6ace685b68e44062dffc02

.sfondo {
    background-color: #eeeeee;
}

.pagination {
    margin-bottom: 0;
}
</style>
