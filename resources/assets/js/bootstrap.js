
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
Vue.mixin({
    data () {
        return {
            Laravel: Laravel,
            pageStarted: false
        };
    },

    computed: {
        isPatient () {
            return this.Laravel.userRole == 1
        },

        isProvider () {
            return this.Laravel.userRole == 2
        },

        signaturePath () {
            return this.Laravel.userSignature;
        },
    },

    mounted () {
        $('[data-toggle="tooltip"]').tooltip({
            container: "body"
        });
    },  
});
require('vue-resource');
/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    next();
});

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': Laravel.csrfToken }
});
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Pusher from "pusher-js"
import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: Laravel.pusher.key,
    cluster: Laravel.pusher.cluster,
    encrypted: true
});

String.prototype.kebab = function() {
    return this.replace(/([a-z])([A-Z])/g, "$1-$2")
            .replace(/\s+/g, '-')
            .toLowerCase();
};