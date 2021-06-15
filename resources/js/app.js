require('./globalMixins');


import Vue          from 'vue';
import Axios        from 'axios';
import App          from './views/App';
import {router}     from './router';
import {store}      from './store';
import {request}    from './services';
import {http}       from './services';
// import {moment}     from 'moment';



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

window.request  = request;
window.http     = http;
window.axios    = Axios;

// window.moment   = moment;


const app = new Vue({
    el: '#app',
    components: {App},
    store,
    router
});
