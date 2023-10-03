require("./bootstrap");
// import { vue } from "laravel-mix";
import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import VNepaliDatePicker from "v-nepalidatepicker";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = Vue; //this is important! Do not use require('vue') for livewire-vue

// Register Vue components
Vue.component("token-search", require("./components/TokenSearch.vue").default);
Vue.component("suchi-form", require("./components/SuchiForm.vue").default);
Vue.component("register-suchi-modal", require("./components/RegisterSuchiModal.vue").default);
Vue.component("qr-code", require("./components/QrCode.vue").default);
Vue.component("registered-suchi-list", require("./components/RegisteredSuchiList.vue").default);

Vue.use(VueRouter);
Vue.use(VNepaliDatePicker);
Vue.use(VueSweetalert2);

// Initialize Vue
const app = new Vue({
    el: "#app",
    router: new VueRouter(routes),
});
