import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user:{
            bearer_token: '',
            roles: '',
            username: ''
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
        logo: ''
     },
     getters: {
        getUser(state){
            return state.user
        },
        getStatusLogin(state){
            return state.login.status
        },
        getLogo(state){
            return state.login
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
        setLogo(state, logo){
            state.logo = logo
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
                    console.log(res.data.status)
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
        }        
     }
})
