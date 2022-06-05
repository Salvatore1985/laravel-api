/* aggiungere un fale js per il frontend */
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.axios = require('axios'); //*importo axios da qui in modo goblale
window.Vue = require('vue');

/* Cambiare la predisposizione di Vue  */
import App from "./components/App.vue";

const app = new Vue({
    el: '#root',//-> nell'evento root ->
    render: h => h(App)//renderizza dalla funzione h che la tua home e App
})
//dopo di che si deve rannare npm run dev
