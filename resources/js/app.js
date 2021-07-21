require('./bootstrap');

import Vue from 'vue';
import router from './router'
import vuetify from '../plugins/vuetify'
import store from './store'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-component', require('./pages/App.vue').default)


const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store
});

