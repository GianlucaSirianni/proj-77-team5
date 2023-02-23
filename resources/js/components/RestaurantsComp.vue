<template>
<div>
<h1>pagina Singolo Ristorante</h1>
<div>{{singleRestaurant.name}}</div>
<div>{{singleRestaurant.address}}</div>


</div>
</template>

<script>


export default {
name: 'RestaurantsComp',

props: {


},

created(){

},

mounted(){
this.getSingleRestaurant()
},

data() {
    return {
        singleRestaurant : '',
    }

},

components: {

},
methods: {

    getSingleRestaurant(){

            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.id).then( (res) => {

                console.log(res.data);

                this.singleRestaurant = res.data;



            }).catch((err) =>{

                console.log(err);

            })


        }

},

};

</script>

<style lang='scss' scoped>

</style>
