
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

Vue.component('inicio', require('./components/inicio.vue'));
Vue.component('registrarse', require('./components/registrarse.vue'));
Vue.component('informacion-empresa', require('./components/informacion_empresa.vue'));
Vue.component('informacion-freelance', require('./components/informacion_freelance.vue'));
Vue.component('proyectos-empresa', require('./components/proyectos_empresa.vue'));
Vue.component('proyectos-freelance', require('./components/proyectos_freelance.vue'));
Vue.component('proyectos2', require('./components/proyectos2.vue'));

const app = new Vue({
    el: '#app',
    data:{
    	menu: 'inicio'
    }
});
