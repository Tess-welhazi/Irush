<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(video)">
            <i  class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(video)">
            <i  class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['video', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
            console.log('mounted');
        },

        computed: {
            isFavorite() {
              console.log('isFavorited()');
                return this.favorited;
            },
        },

        methods: {
            favorite(video) {
                axios.get('/favorite/'+video)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log('favorite() error:',response.data));
            },

            unFavorite(video) {
                axios.post('/unfavorite/'+video)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log('unfavorite() error:',response.data));
            }
        }
    }
</script>
