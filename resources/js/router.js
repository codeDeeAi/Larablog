import Vue from "vue";
import Router from "vue-router";

// Use Router
Vue.use(Router);

// Import components
import homepage from "./components/homepage.vue";


const routes = [{
    path: "/",
    name: "home",
    component: homepage,
    children: []
}, ]
export default new Router({
    mode: "history",
    routes
});