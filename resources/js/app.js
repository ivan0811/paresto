require('./bootstrap');

import Vue from 'vue';
import router from './router'
import vuetify from '../plugins/vuetify'
import store from './store'

import firebase from 'firebase/app';
import 'firebase/database'

var firebaseConfig = {
    apiKey: "AIzaSyCfaRU9SqYYsdstkscfwl-xyu6DWJhadqM",
    authDomain: "paresto-6c9f0.firebaseapp.com",
    databaseURL: "https://paresto-6c9f0-default-rtdb.asia-southeast1.firebasedatabase.app/",
    projectId: "paresto-6c9f0",
    storageBucket: "paresto-6c9f0.appspot.com",
    messagingSenderId: "960900178418",
    appId: "1:960900178418:web:f1e5e19e4866956ed2cb6b"
  };
  // Initialize Firebase
firebase.initializeApp(firebaseConfig);

var db = firebase.database()
window.mejaRef = db.ref('meja')
window.pesananRef = db.ref('pesanan')
window.transaksiRef = db.ref('transaksi')
window.notifRef = db.ref('notification')

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-component', require('./pages/App.vue').default)


const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store
});

