import Vue from "vue";
import Router from "vue-router";

// Use Router
Vue.use(Router);

// Import components
import homepage from "./components/homepage.vue";
import blog from "./components/blog.vue";
import allblogs from "./components/allblogs.vue";
import category from "./components/category.vue";
// Route::get('/category/{categoryName}/{id}', 'BlogController@categoryIndex');
const routes = [{
        path: "/",
        name: "home",
        component: homepage,
    },
    {
        path: "/blogs",
        name: "allblogs",
        component: allblogs,
    },
    {
        path: '/category/:categoryName/:id',
        name: "category",
        component: category,
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