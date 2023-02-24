require('./bootstrap');

window.Vue = require('vue');

import router from './routes.js';
import store from '@/store'
import App from './views/App';

const app = new Vue({

    el: '#root',

    router,
    store,

    render: h => h(App)
});
