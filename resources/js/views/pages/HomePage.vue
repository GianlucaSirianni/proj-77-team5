<template>
    <div class="container pt-5">
        <div>
            <form class="d-flex">
                <input class="form-control me-2" type="text" id="search" v-model="userInput" @keyup="getRestaurants()" placeholder="Cerca un ristorante" aria-label="Search">
            </form>
        </div>
        <!-- ciclo per le category -->
        <div class="d-flex flex-wrap m-auto justify-content-center py-3">
            <label v-for="elem, ind in categories" :key="ind" class="button-checkbox me-2 mb-2" :for="'category' + ind">
                <input v-model="categoryId" class="form-check-input" type="checkbox" :value="elem.id" :id="'category' + ind">
                <span class="button-label">{{ elem.name }}</span>
            </label>
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
export default {
    name: 'HomePage',



    components: {


    },

    props: {

    },
    created() {

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

    .button-checkbox input[type="checkbox"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .button-label {
        display: inline-block;
        padding: 6px 12px;
        width: 110px;
        text-align: center;
    }

    .button-checkbox input[type="checkbox"]:checked + .button-label {
        background-color: #007bff;
        color: #fff;
    }

    .button-checkbox input[type="checkbox"]:focus + .button-label {
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
    }

    .button-checkbox input[type="checkbox"]:active + .button-label {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .flex-center{
        display: flex;
        justify-content: center;
    }


</style>
