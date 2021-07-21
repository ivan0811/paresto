import Vue from 'vue';
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Menu from '../pages/Menu.vue'
import NotFound from '../pages/NotFound.vue'
import ExampleCompontent from '../components/ExampleComponent.vue'
import Transaksi from '../pages/admin/Transaksi.vue'
import Pegawai from '../pages/admin/Pegawai.vue'
import CreatePegawai from '../pages/admin/CreatePegawai.vue'
import Profile from '../pages/Profile.vue'

const routes = [
    {
        name: 'Home',
        path: '/',
        components: {
            default: Home
        }
    },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'Transaksi',
        path: '/transaksi',
        component: Transaksi
    },
    {
        name: 'Pegawai',
        path: '/pegawai',
        component: Pegawai
    },
    {
        name: 'tambahPegawai',
        path: '/pegawai/create',
        component: CreatePegawai
    },
    {
        name: 'Profile',
        path: '/profile/:username',
        component: Profile
    },
    {
        name: 'test',
        path: '/test',
        component: ExampleCompontent
    },
    {
        path: '*',
        component: NotFound
    },
    {
        name: 'NotFound',
        path: '/404',
        component: NotFound
    }
]

const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

router.beforeEach(async (to, from, next) => {
    const admin = ['Transaksi', 'Pegawai', 'test']
    const koki = []
    const pelayan = []
    const kasir = []

    const data = await store.dispatch('checkRoles')
    console.log(data.status)
    if(data.status == 401 && admin.concat(koki.concat(pelayan.concat(kasir))).includes(to.name)) next({name: 'NotFound'})
    else next()

    if(data.status == 200){
        let roles = data.user.roles
        if(admin.includes(to.name) && roles != "admin") next({name: 'NotFound'})
        else next()

        if(koki.includes(to.name) && roles != "koki") next({name: 'NotFound'})
        else next()

        if(pelayan.includes(to.name) && roles != "pelayan") next({name: 'NotFound'})
        else next()

        if(kasir.includes(to.name) && roles != "kasir") next({name: 'NotFound'})
        else next()
    }


})


export default router
