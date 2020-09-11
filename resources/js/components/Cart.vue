<template>
    <span>
        <a href="#" v-if="isCarted" @click.prevent="unCart(video)">
          <i  class="fa fa-shopping-cart"></i>
        </a>

        <a href="#" v-else @click.prevent="cart(video)">

            <i class="fa fa-cart-plus"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['video', 'carted'],

        data: function() {
            return {
                isCarted: '',
            }
        },

        mounted() {
            this.isCarted = this.isCart ? true : false;
            console.log('mounted');
        },

        computed: {
            isCart() {
              console.log('isCarted()');
                return this.carted;
            },
        },

        methods: {
            cart(video) {
              console.log("add video:", video);

                axios.get('/vueAdd/'+video)
                    .then(response => this.isCarted = true)
                    .catch(response => console.log('favorite() error:',response.data));
            },

            unCart(video) {

              console.log("remove video");
                axios.post('/vueRemove/'+video)
                    .then(response => this.isCarted = false)
                    .catch(response => console.log('remove() error:',response.data));
            }
        }
    }
</script>
