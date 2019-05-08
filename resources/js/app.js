
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import Vue from 'vue';
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
import Swal from 'sweetalert2'
window.Swal = Swal;

window.Fire = new Vue();

import Vuex from 'vuex'

Vue.use(Vuex)

const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

window.Toast = Toast;

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component(
    'not-found',
    require('./components/NotFound.vue')
);

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})
Vue.use(VueRouter)

let routes = [{
        path: '/dashboard',
        component: require('./components/dashboard.vue').default
    },
    {
        path: '/profile',
        component: require('./components/profile.vue').default
    },
    {
        path: '/users',
        component: require('./components/users.vue').default
    },
    {
        path: '/developer',
        component: require('./components/developer.vue').default
    },
    {
        path: '/eventviewer',
        component: require('./components/eventviewer.vue').default
    }
    // {
    //     path: '*',
    //     component: require('./components/NotFound.vue')
    // }
]

const router = new VueRouter({
    mode:'history',
    routes
})

Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function (created) {
    return moment(created).format('MMMM Do YYYY');
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
