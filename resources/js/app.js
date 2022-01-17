require('./bootstrap');

import { createApp } from 'vue';

import App from './components/Index'


const app = createApp({
    components: {
       App
    }
})

app.mount('#app')
