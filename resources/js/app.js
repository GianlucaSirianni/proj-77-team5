require('./bootstrap');

window.Vue = require('vue');


import router from './routes.js';

import App from './views/App';

//! IMPORT FONTAWESOME

// import the fontawesome core
import { library } from '@fortawesome/fontawesome-svg-core';

// import font awesome icon component /
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

// import specific icons solid
import {faXmark} from '@fortawesome/free-solid-svg-icons';
import {faCircleInfo} from '@fortawesome/free-solid-svg-icons';
import {faCartShopping} from '@fortawesome/free-solid-svg-icons';
import {faCartPlus} from '@fortawesome/free-solid-svg-icons';


// import {faMoon} from '@fortawesome/free-solid-svg-icons';
// import {faSun} from '@fortawesome/free-solid-svg-icons';


// Import icone specific icons brands
import {} from '@fortawesome/free-brands-svg-icons'

// Import icone specific icons regular

 import {faMoon} from '@fortawesome/free-regular-svg-icons';
 import {faSun} from '@fortawesome/free-regular-svg-icons';
//libreria di tutte le icone
library.add(faXmark, faCircleInfo, faCartShopping,faMoon,faSun, faCartPlus)


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
};


