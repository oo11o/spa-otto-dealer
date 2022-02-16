require('./bootstrap');

import { createApp } from 'vue';
import router from './routes/index';
import App from './components/App';


import { createRouter, createWebHistory } from 'vue-router';
// import Login from  './components/Login';
//
//
// const routes = [
//         {
//             path: '/login',
//             component: Login,
//             name: 'Test'
//         }
//     ];
//
//
// const router =  createRouter({
//     history: createWebHistory(),
//     routes
// })
//
//

const app = createApp({
    components: {
       App
    }
})


app.use(router);
app.mount('#app');
