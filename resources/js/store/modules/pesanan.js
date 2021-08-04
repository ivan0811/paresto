import Api from '../../services/Api'

export default {
    state: {
        pesanan: [],
        pesananStorage: {},
        editPesanan: {},
        eventUpdated: '',
        idUpdated: ''
    },
    getters: {
        getPesanan(state) {
            return state.pesanan
        },
        getPesananStorage(state) {
            return state.pesananStorage
        },
        getEditPesanan(state) {
            return state.editPesanan
        },
        getEventUpdated(state) {
            return state.eventUpdated
        },
        getIdUpdated(state) {
            return state.idUpdated
        }
    },
    mutations: {
        setPesanan(state, pesanan) {
            state.pesanan = pesanan
        },
        setPesananStorage(state, pesanan) {
            state.pesananStorage = pesanan
        },
        setEditPesanan(state, pesanan) {
            state.editPesanan = pesanan
        },
        setEventUpdated(state, event) {
            state.eventUpdated = event
        },
        setIdUpdated(state, id) {
            state.idUpdated = id
        }
    },
    actions: {
        async loadPesanan({ commit }) {            
            await Api().get('pesanan').then(res => {                
                commit('setPesanan', res.data)            
            }).catch(err => console.log(err))            
        },
        async postPesanan({ }, form) {
            let status = false
            await Api().post('pesanan', form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        async editPesanan({ commit }, id) {            
            await Api().get('pesanan/' + id).then(res => {                
                commit('setEditPesanan', res.data)                
            }).catch(err => console.log(err))            
        },
        async updatePesanan({ }, form) {
            let status = false
            await Api().patch('pesanan/' + form.id, form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        async deletePesanan({ dispatch }, id) {
            let status = false
            await Api().delete('pesanan/' + id).then(async res => {
                if (res.data.status) {
                    await dispatch('loadPesanan')                    
                    status = res.data.status
                }
            }).catch(err => console.log(err))
            return status
        },
        setPesananStorage({ dispatch }, pesanan) {
            dispatch('removePesananStorage')
            localStorage.setItem('pesanan', JSON.stringify(pesanan))
        },
        loadPesananStorage({ commit }) {
            const data = JSON.parse(localStorage.getItem('pesanan')) || {pesanan : []}
            commit('setPesananStorage', data)            
        },
        removePesananStorage() {
            localStorage.removeItem('pesanan')
        },
        async updateStatusPesanan({ }, form) {
            let status = false
            await Api().patch('pesanan/update-status/' + form.id, form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        async updateStatusPesananMenu({ }, form) {
            let status = false
            await Api().post('pesanan/update-status/menu', form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        setEventUpdated({ commit }, event) {
            commit('setEventUpdated', event)            
        },
        setIdUpdated({ commit }, id) {
            commit('setIdUpdated', id)  
        },
        updateRealTime({ getters }, form) {            
            pesananRef.set({
                event: getters.getEventUpdated,
                id: form.id,
                detail: form.detail,
                no_antrian: form.no_antrian,
                no_meja: form.no_meja,
                pegawai_id: form.pegawai_id,
                status: form.status,
                pegawai: form.pegawai                
            })           
        }
    }
}
