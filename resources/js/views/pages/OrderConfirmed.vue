<template>
    <div>
        <h1>paga!</h1>

        <!-- <div id="dropin-container"></div>
     <button id="submit-button" class="button button--small button--green">Purchase</button> -->
        <form id="my-form" @submit.prevent="send">
            <input
            type="hidden"
            name="my-nonce-input"
            id="my-nonce-input"
            v-model="payload"
          />
            <div id="dropin-wrapper">
                <div id="checkout-message"></div>
                <div id="dropin-container"></div>
                <button id="submit-button">Submit payment</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'OrderConfirmed',

    props: {

    },

    mounted() {
        braintree.dropin.create({
                authorization: "sandbox_38t2rkrh_pqqgjbypzgsnnfbm",
                selector: "#dropin-container",
            },
            function(err, instance) {
                var form = document.querySelector("#my-form");
                var hiddenNonceInput = document.querySelector("#my-nonce-input");

                form.addEventListener("submit", function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            hiddenNonceInput.value = '';
                            return;
                        }
                        hiddenNonceInput.value = payload.nonce;
                    });
                });
            }
        );

    },
    data() {
        return {
            payload: "",
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
