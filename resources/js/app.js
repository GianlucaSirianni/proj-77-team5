require('./bootstrap');

window.Vue = require('vue');


import router from './routes.js';

import App from './views/App';

//! IMPORT FONTAWESOME

// import the fontawesome core
import { library } from '@fortawesome/fontawesome-svg-core';

// import font awesome icon component /
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

// import specific icons /
import {faXmark} from '@fortawesome/free-solid-svg-icons';
import {faCartShopping} from '@fortawesome/free-solid-svg-icons';

import {} from '@fortawesome/free-brands-svg-icons'

// Import icone regular /
import {} from '@fortawesome/free-regular-svg-icons';

import {} from '@fortawesome/free-regular-svg-icons';

library.add(faXmark, faCartShopping)
//<font-awesome-icon icon="fa-solid fa-cart-shopping" />

//! add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon);


const app = new Vue({

    el: '#root',

    router,

    render: h => h(App)
});

/* DARKMODE */

let mode = document.querySelector('body');
const modeButton = document.querySelector('.js_darkmode');
modeButton.addEventListener('click', changeMode)

console.log(mode)

function changeMode(){


    if (mode.dataset.bsTheme === 'dark'){

        console.log(mode)
        mode.setAttribute('data-bs-theme','light')
    }else{

        console.log(mode);
        mode.setAttribute('data-bs-theme','dark')
    }
}
