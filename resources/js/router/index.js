import {createRouter, createWebHistory} from 'vue-router'
import IndexView from '../views/main/Index.vue'
import ListView from '../views/product/List.vue'
import ShowView from '../views/product/Show.vue'
import CartView from '../views/cart/Cart.vue'
import LoginView from '../views/user/Login.vue'
import RegistrationView from '../views/user/Resgistration.vue'
import PersonalView from '../views/user/Personal.vue'
import ContactView from '../views/contacts/Index.vue'
import AboutView from '../views/about/Index.vue'
import AdminIndexView from '../views/admin/index.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'index',
            component: IndexView,
        },
        {
            path: '/list',
            name: 'list',
            component: ListView,
        },
        {
            path: '/show/:id',
            name: 'show',
            component: ShowView,
        },
        {
            path: '/about',
            name: 'about',
            component: AboutView,
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactView,
        },
        {
            path: '/cart',
            name: 'cart',
            component: CartView,
        },
        {
            path: '/loginn',
            name: 'login',
            component: LoginView,
        },
        {
            path: '/registrationn',
            name: 'registration',
            component: RegistrationView,
        },
        {
            path: '/personal',
            name: 'personal',
            component: PersonalView,
        },
        {
            path: '/test',
            name: 'admin',
            component: AdminIndexView,
        },
        {
            path: '/:catchAll(.*)',
            name: '404',
            component: IndexView,
        },
    ],
})

router.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem('access_token')

    if (to.name === 'cart') {
        if (!accessToken) {
            return next({
                name: 'login'
            })
        }
    }
    if (to.name === 'login') {
        if (accessToken) {
            return next({
                name: 'personal'
            })
        }
    }
    if (to.name === 'registration') {
        if (accessToken) {
            return next({
                name: 'personal'
            })
        }
    }

    next();
})
export default router
