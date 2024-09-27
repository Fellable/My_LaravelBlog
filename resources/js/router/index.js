import {createRouter, createWebHistory} from 'vue-router'


const router = createRouter( {
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/posts/:id',
            component: () => import('../views/index.vue')
        },
    ]
})

export default router
