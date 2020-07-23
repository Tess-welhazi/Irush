
<template>
    <div class="favoriting">
        <label
                class="favorite__heart"
                v-bind:class="{'favorite__heart__selected': value, 'is-disabled': disabled}"
                v-on:click="favorite">
            <input
                    class="favorite__checkbox"
                    type="checkbox"
                    v-bind:name="name"
                    v-bind:value="value"
                    v-bind:required="required"
                    v-bind:disabled="disabled"
                    v-model="value">
            ❤
        </label>
    </div>
</template>


<script>
export default {
    props: {
        'name': {
            type: String,
            default: 'favorite'
        },
        'value': {
            type: Boolean,
            default: false
        },
        'disabled': {
            type: Boolean,
            default: false
        }
    },

    data: function() {
        return {

        };
    },


    methods: {
      favorite: function() {
          if (this.disabled==true) {
              return;
          }
          this.value = !this.value;
      }
    }
}

</script>
