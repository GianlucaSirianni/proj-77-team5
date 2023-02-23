<template>
<div>
<h1>pagina Singolo Ristorante</h1>

<!-- <h3>{{restaurant.name}}</h3>
<h3>{{restaurant.address}}</h3> -->

</div>
</template>

<script>


export default {
name: 'RestaurantsComp',

props: {


},

created(){
//const id = this.$route.params.id;
//this.restaurant = { name: 'merda ' + id, address: 'Address of Restaurant ' + id };
},

mounted(){

},

data() {
    return {
        restaurant:{},
    }

},

components: {

},
methods: {

},

};

</script>

<style lang='scss' scoped>

</style>
