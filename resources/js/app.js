require('./bootstrap');

// Load Vue JS
window.Vue = require('vue');

// Import router JS for vue routes
import router from './router'

// Import common JS for vue routes
import store from './store'

// Import common JS for vue routes
import common from './common'

// Load Vue Toasts
import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
//import 'vue-toast-notification/dist/theme-sugar.css';


Vue.use(VueToast, {
    // One of the options
    position: 'top-right',
    duration: 5000,
    pauseOnHover: true,
})

// Use Common Js
Vue.mixin(router)

// Use Common Js
Vue.mixin(common)

// Import vue components
Vue.component('main-app', require('./components/mainapp.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});