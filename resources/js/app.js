
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');
require('./bootstrap');

/**
 * Import all contacts components
 *  @dir /components/contacts
 */
const files = require.context('./components/contacts/', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 *  Inject Vue Instance in div with id 'app'
 */
const app = new Vue({
    el: '#app'
});
