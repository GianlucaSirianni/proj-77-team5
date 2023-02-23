<template>
<div>
    <div class="container pt-3 card-body" v-for="elem,index in filterRestaurants" :key="index">
        <div class="d-flex row-cols-2" style="height: 350px;">
            <div class="pb-3 pe-3 overflow-auto">
                    <h5>Nome Ristorello</h5>
                    <p class="card-text">{{elem.name}}</p>
            </div>

            <router-link to="/menu">
                <button>Menu</button>
            </router-link>
        </div>
      </div>
</div>
</template>

<script>


export default {
name: '',

props: {

},

mounted(){

},

components: {

},
methods: {

},

};

</script>

<style lang='scss' scoped>

</style>
