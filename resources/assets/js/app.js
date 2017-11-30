
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
// window.Vue = require('vue');
// require('vue-datetime-picker');
require('./bootstrap');
require('datatables.net');
require('datatables.net-bs');
require('moment');


import {ServerTable, ClientTable, Event} from 'vue-tables-2';
Vue.use(ClientTable);
Vue.use(ServerTable);
Stripe.setPublishableKey(Laravel.stripeKey);

// Vue.use(require('vue-full-calendar'));


var init = function() {
	$('#toggle').click(function() {
       $(this).toggleClass('active');
       $('#overlay').toggleClass('open');
    });
};	
init();
