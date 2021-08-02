import Api from '../../services/Api'

export default {
    state: {
        dataMenu: [],
        editMenu: {},
        kategori: []
    },
    getters: {
        getMenu(state) {
            return state.dataMenu
        },
        getEditMenu(state) {
            return state.editMenu
        },
        getKategori(state) {
            return state.kategori
        }
    },
    mutations: {
        setMenu(state, dataMenu) {
            state.dataMenu = dataMenu
        },
        setEditMenu(state, editMenu) {
            state.editMenu = editMenu
        },
        setKategori(state, kategori) {
            state.kategori = kategori
        }
    },
    actions: {
        async loadKategori({ commit }) {
            await Api().get('kategori').then(res => {                
                commit('setKategori', res.data)                
            }).catch(err => console.log(err))            
        },
        async loadMenu({ commit }) {            
            await Api().get('menu').then(res => {                
                commit('setMenu', res.data)            
            }).catch(err => console.log(err))            
        },
        async postMenu({ }, form) {
            let status = false
            await Api().post('menu', form).then(res => {                
                status = res.data.status
            }).catch(err => console.log(err))
            return status
        },
        async editMenu({ commit }, id) {            
            await Api().get('menu/' + id).then(res => {                
                commit('setEditMenu', res.data)                
            }).catch(err => console.log(err))            
        },
        async updateMenu({ }, form) {
            let status = false
            await Api().patch('menu/' + form.id, form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        async deleteMenu({ dispatch }, id) {
            let status = false
            await Api().delete('menu/' + id).then(async res => {
                if (res.data.status) {
                    await dispatch('loadMenu')                    
                    status = res.data.status
                }
            }).catch(err => console.log(err))
            return status
        },
        async updateStatusMenu({ }, form) {
            let status = false
            await Api().post('menu/update-status', form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        }
    }
}
