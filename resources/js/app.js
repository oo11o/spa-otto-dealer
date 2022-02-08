require('./bootstrap');

import { createApp } from 'vue';

//import App from './components/App'
import App from './components/Login'
//import Index2 from './components/Index'

const app = createApp({
    components: {
       App
    }
})

app.mount('#app')
