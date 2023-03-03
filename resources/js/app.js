require('./bootstrap');

window.Vue = require('vue');


import router from './routes.js';

import App from './views/App';



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
