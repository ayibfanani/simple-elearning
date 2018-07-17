
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('login', require('./components/auth/Login.vue'));
Vue.component('register', require('./components/auth/Register.vue'));
Vue.component('navbar', require('./components/partials/Navbar.vue'));
Vue.component('sidebar', require('./components/partials/Sidebar.vue'));
Vue.component('home', require('./components/Home.vue'));
Vue.component('course-add', require('./components/courses/Add.vue'));
Vue.component('course-edit', require('./components/courses/Edit.vue'));
Vue.component('course-form', require('./components/courses/Form.vue'));

const app = new Vue({
    el: '#app'
});
