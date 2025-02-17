/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import BootstrapVue from 'bootstrap-vue' //Importing
import Vue from 'vue'
import {Tabs, Tab} from 'vue-tabs-component'

import {IconsPlugin,DropdownPlugin, TablePlugin } from 'bootstrap-vue'

// Vue.use(DropdownPlugin)
// Vue.use(TablePlugin)
// Install BootstrapVue


require('./bootstrap');

window.Vue = require('vue');

Vue.component('tabs', Tabs);
Vue.component('tab', Tab);

Vue.use(BootstrapVue) // Telling Vue to use this in whole application
// Optionally install the BootstrapVue icon components plugin
// Vue.use(IconsPlugin)
// Vue.use(DropdownPlugin)
// Vue.use(TablePlugin)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('favorite', require('./components/Favorite.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
