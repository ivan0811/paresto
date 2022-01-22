import axios from 'axios'
import Api from '../../services/Api'

export default {
    state: {
        dataPegawai: [],
        editPegawai: {}
    },
    getters: {
        getPegawai(state) {
            return state.dataPegawai
        },
        getEditPegawai(state) {
            return state.editPegawai
        }
    },
    mutations: {
        setPegawai(state, dataPegawai) {
            state.dataPegawai = dataPegawai
        },
        setEditPegawai(state, editPegawai) {
            state.editPegawai = editPegawai
        }
    },
    actions: {
        async loadPegawai({ commit, getters }) {            
            await Api().get('pegawai').then(res => {                
                commit('setPegawai', res.data)                
            }).catch(err => console.log(err))            
        },
        async postPegawai({ commit }, form) {
            let status = false
            const token = JSON.parse(localStorage.getItem('user')).bearer_token
            await axios.post('/api/pegawai', form, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': `Bearer ${token}`   
                }
            }).then(res => {
                const data = res.data
                if (data.status) {
                    commit('setPegawai', data.user)                    
                    status = data.status                    
                }
            }).catch(err => console.log(err))            
            return status
        },
        async editPegawai({ commit }, id) {            
            await Api().get('pegawai/' + id).then(res => {                
                commit('setEditPegawai', res.data)                
            }).catch(err => console.log(err))            
        },
        async updatePegawai({ commit }, form) {
            let status = false
            await Api().patch('pegawai/' + form.id, form).then(res => {
                const data = res.data
                if (data.status) {
                    commit('setPegawai', data.status)
                    status = data.status
                }
            }).catch(err => console.log(err))
            return status
        },
        async deletePegawai({ commit }, id) {
            let status = false
            await Api().delete('pegawai/' + id).then(res => {
                if (res.data.status) {
                    commit('setPegawai', res.data.user)
                    console.log(res.data.status)
                    status = res.data.status
                }
            }).catch(err => console.log(err))
            return status
        }
    }
}
