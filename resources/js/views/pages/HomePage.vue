<template>
    <div class="container pt-5">
        <div class="row">
            <div v-for="elem, index in restaurants" :key="index" class="col-4">
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

        <!-- ciclo per le category -->
        <div v-for="elem, ind in categories" :key="ind" class="form-check">
            <label class="form-check-label" for="flexCheckIndeterminate">
                <input v-model="categoryId" class="form-check-input" type="checkbox" :value="elem.id" id="flexCheckIndeterminate">
                {{ elem.name }}
            </label>
        </div>

    </div>
</template>

<script>
export default {
    name: 'HomePage',



    components: {


    },

    props: {
        filterRestaurants: Array,
    },
    created() {

    },
    mounted() {

        // this.filterByCategories()
    },

    data() {
        return {
            restaurants: [],
            categories: [],
            categoryId: [],
            // categoryId: '',
            // filterCategoryrestaurants: '',
            // categoryArray: [],
        }

    },
    watch: {
        categoryId(newCategoryId) {
            this.getRestaurants(newCategoryId);
            // filterRestaurants: {
            //     immediate: true, //chiama subito il watch quando il componente viene creato
            //     handler() {
            //         this.filterByCategories();
            //     }
            // }
        }
    },

    methods: {
        getRestaurants(categoryId) {
            let url = '/api/restaurants';
            if (categoryId) {
                url += `?category_id=${categoryId}`;
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

        // filterByCategories() {

        // }

    },
    created() {
        this.getCategories();
        this.getRestaurants();
    },

};
</script>

<style lang='scss' scoped></style>
