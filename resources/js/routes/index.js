import { createRouter, createWebHistory } from 'vue-router'

import Login from  '../components/Login';
import Index from  '../components/Index';

const routes = [
    {
        path: '/index',
        component: Index,
        name: 'Index',
        //meta: {canEnter: false}
    },
    {
        path: '/',
        component: Login,
        alies: '/test',
        //meta: {isAuth: true}
    }
]



const router = createRouter({
    history: createWebHistory(),
    routes,
})


router.beforeEach((to,from,next) => {
    if(to.meta.canEnter === false){
        next('/')
    }else{
        next()
    }
})

export default router
