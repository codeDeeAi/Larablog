require('./bootstrap');

// Load Vue JS
window.Vue = require('vue');

// Import router JS for vue routes
import routes from './router'

// Import common JS for vue routes
import store from './store'

// Import common JS for vue routes
import common from './common'

// Use Common Js
Vue.mixin(routes)

// Use Common Js
Vue.mixin(common)

// Import vue components
Vue.component('main-app', require('./components/mainapp.vue').default);

const app = new Vue({
    el: '#app',
    routes,
    store
});