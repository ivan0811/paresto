import Vue from 'vue';
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import NotFound from '../pages/NotFound.vue'
import ExampleCompontent from '../components/ExampleComponent.vue'
import Transaksi from '../pages/admin/Transaksi.vue'
import Pegawai from '../pages/admin/Pegawai.vue'
import CreatePegawai from '../pages/admin/CreatePegawai.vue'
import EditPegawai from '../pages/admin/EditPegawai.vue'
import Profile from '../pages/Profile.vue'
import Meja from '../pages/pegawai/pelayan/Meja.vue'
import Pesanan from '../pages/Pesanan.vue';
import CreatePesanan from '../pages/pegawai/pelayan/CreatePesanan.vue'
import EditPesanan from '../pages/pegawai/pelayan/EditPesanan.vue'
import ConfirmPesanan from '../pages/pegawai/pelayan/ConfirmPesanan.vue'
import Menu from '../pages/pegawai/koki/Menu.vue'
import CreateMenu from '../pages/pegawai/koki/CreateMenu.vue'
import EditMenu from '../pages/pegawai/koki/EditMenu.vue'
import SelectMeja from '../pages/pegawai/pelayan/SelectMeja.vue'

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
        name: 'editPegawai',
        path: '/pegawai/edit/:id',
        component: EditPegawai
    },    
    {
        name: 'Meja',
        path: '/meja',
        component: Meja
    },
    {
        name: 'Pesanan',
        path: '/pesanan',
        component: Pesanan
    },
    {
        name: 'Menu',
        path: '/menu',
        component: Menu
    },
    {
        name: 'tambahMenu',
        path: '/menu/create',
        component: CreateMenu
    },
    {
        name: 'editMenu',
        path: '/menu/edit/:id',
        component: EditMenu
    },
    {
        name: 'selectMeja',
        path: '/pesanan/select-meja',
        component: SelectMeja
    },
    {
        name: 'tambahPesanan',
        path: '/pesanan/create',
        component: CreatePesanan
    },
    {
        name: 'editPesanan',
        path: '/pesanan/edit/:id',
        component: EditPesanan
    },
    {
        name: 'confirmPesanan',
        path: '/pesanan/confirm',
        component: ConfirmPesanan
    },
    {
        name: 'confirmEditPesanan',
        path: '/pesanan/confirm/:id',
        component: ConfirmPesanan
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
    const koki = ['Menu']
    const pelayan = ['Meja']
    const kasir = []
        

    const data = await store.dispatch('checkRoles')    
    if(data.status == 401 && admin.concat(koki.concat(pelayan.concat(kasir))).includes(to.name)) next({name: 'NotFound'})
    else next()
        

    if(data.status == 200){
        let roles = data.user.roles
        console.log(koki.includes(to.name))
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
