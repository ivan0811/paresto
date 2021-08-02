import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'
import pegawai from './modules/pegawai.js'
import menu from './modules/menu.js'
import meja from './modules/meja.js'
import pesanan from './modules/pesanan.js'
import transaksi from './modules/transaksi.js'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user:{
            bearer_token: '',
            roles: '',
            username: ''
        },
        listNav: [],
        header: {
            title: '',
            subtitle: ''
        },
        navigation: {
            admin: [
                {
                    title: 'Dashboard',
                    name: 'Home',
                    sub: [],
                    path: '/',
                    icon: 'icon-dashboard'
                },
                {
                    title: 'Transkasi',
                    name: 'Transaksi',
                    sub: [],
                    path: '/transaksi',
                    icon: 'icon-area-chart'
                },
                {
                    title: 'Pegawai',                      
                    name: 'Pegawai',
                    sub: ['tambahPegawai', 'editPegawai'],
                    path: '/pegawai',
                    icon: 'icon-users'
                },
            ],
            pelayan: [                
                {
                    title: 'Meja',
                    name: 'Meja',
                    sub: [],
                    path: '/meja',
                    icon: 'icon-pin'
                },
                {
                    title: 'Pesanan',
                    name: 'Pesanan',
                    sub: ['selectMeja','tambahPesanan', 'editPesanan', 'confirmPesanan', 'confirmEditPesanan'],
                    path: '/pesanan',
                    icon: 'icon-receipt'
                }            
            ],
            koki: [
                {
                    title: 'Pesanan',
                    name: 'Pesanan',
                    sub: [],
                    path: '/pesanan',
                    icon: 'icon-text-document-alt'
                },
                {
                    title: 'Menu',
                    name: 'Menu',
                    sub: ['tambahMenu', 'editMenu'],
                    path: '/menu',
                    icon: 'icon-clipboard'
                }      
            ]
        },
        listHeader: {
            admin: {
                Home : {
                    title: '',
                    subtitle : ''
                },
                Transaksi : {
                    title: '',
                    subtitle : 'Kelola Riwayat Transaksi'
                },
                Pegawai: {
                    title: '',
                    subtitle : 'Kelola Pegawai Paresto'
                },
                tambahPegawai: {
                    title: 'Tambahkan Pegawai Baru',
                    subtitle : ''
                },
                editPegawai: {
                    title: 'Edit Pegawai',
                    subtitle : ''
                }
            },            
            pelayan: {
                Meja : {
                    title: 'Status Meja',
                    subtitle : ''
                },
                Pesanan : {
                    title: 'Pesanan',
                    subtitle : ''
                }                
            },
            koki: {
                Pesanan: {
                    title: '',
                    subtitle: 'List Pesanan'
                },
                Menu: {
                    title: '',
                    subtitle: ''
                },
                tambahMenu: {
                    title: 'Tambahkan Menu Baru',
                    subtitle: ''
                },
                editMenu: {
                    title: 'Edit Menu',
                    subtitle: ''
                }
            },
            kasir: {
                Home: {
                    title: '',
                    subtitle: ''
                }
            }            
        },
        login:{
            status: false
        },
        page:{
            showHeader: false,
            showFooter: false,
            showRoutes: false,
            showNotFound: false
        },        
     },
     getters: {
        getUser(state){
            return state.user
        },
        getStatusLogin(state){
            return state.login.status
        },
         getListNav(state) {
            return state.listNav
         },
         getNav(state) {
            return state.navigation 
         },
         getListHeader(state) {
             return state.listHeader
         },
         getHeader(state) {
             return state.header
         }
     },

     mutations: {
        setBearer(state, bearer){
            state.user.bearer_token = bearer
        },
        setRoles(state, roles){
            state.user.roles = roles
         },
         setUsername(state, username) {
            state.user.username = username  
        },
        setStatus(state, status){
            state.login.status = status
        },
        setPages(state, header, footer, route, notFound){
            state.page.showHeader = header
            state.page.showFooter = footer
            state.page.showRoutes = route
            state.page.showNotFound = notFound
        },        
         setListNav(state, listNav) {
            state.listNav = listNav
         },
         setHeader(state, header) {             
             state.header.title = header.title
             state.header.subtitle = header.subtitle
         }
     },

     actions: {
        setBearer({commit}, bearer){
            commit('setBearer', bearer)
        },
        setRoles({commit}, roles){
            commit('setRoles', roles)
        },
        setLocalStorage({getters}){
            localStorage.setItem('user', JSON.stringify(getters.getUser))
        },
        getLocalStorage({commit}){
            const data = JSON.parse(localStorage.getItem('user')) || {bearer_token: '', roles: ''}
            commit("setBearer", data.bearer_token)
            commit("setRoles", data.roles)
        },
        removeLocalStorage(){
            localStorage.removeItem('user')
        },
        async checkLogin({commit, getters, dispatch}){
            dispatch('getLocalStorage')
            const access_token = getters.getUser.bearer_token
            await axios.get('/api/check-status', {
            headers: {
                'Authorization': `Bearer ${access_token}`
            }}).then((res) => {
                if(res.data.status){                    
                    commit('setStatus', res.data.status)
                    status = 200
                } else {
                    status = 401
                }
            }).catch((error) => {
                console.error(error)
            })
            return {status, user : getters.getStatusLogin}
        },
        async checkRoles({dispatch, commit, getters}){
            dispatch('getLocalStorage')
            const access_token = getters.getUser.bearer_token
            let status = 0;
            await axios.get('/api/check-roles', {
            headers: {
                'Authorization': `Bearer ${access_token}`
            }}).then((res) => {
                commit('setRoles', res.data.roles)                                
                status = 200
            }).catch((error) => {
                console.error(error)
                status = 401
            })
            dispatch('setLocalStorage')
            return {status, user : getters.getUser}
         },
         setListNav({ commit, getters }, role) {            
             commit('setListNav', getters.getNav[role])
         },
         setHeader({ commit, getters }, header) {
             let listHeader = header.role == 'pelayan' && getters.getNav[header.role][2].sub.includes(header.page) ?
                 getters.getListHeader[header.role]['Pesanan']
                 : getters.getListHeader[header.role][header.page]             
             commit('setHeader', listHeader)
             console.log(getters.getHeader)
         },         
    },
    modules: {
        pegawai,
        menu,
        meja,
        pesanan,
        transaksi
    }
})
