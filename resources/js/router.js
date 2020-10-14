import Vue from "vue";
import Router from "vue-router";

// Use Router
Vue.use(Router);

// Import components
import homepage from "./components/homepage.vue";
import blog from "./components/blog.vue";

const routes = [{
        path: "/",
        name: "home",
        component: homepage,
    },
    {
        path: '/blog',
        name: "blog",
        component: blog,
    },
]
export default new Router({
    mode: "history",
    routes
});