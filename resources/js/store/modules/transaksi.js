import Api from '../../services/Api'

export default {
    state: {
        transaksi: {}        
    },
    getters: {
        getTransaksi(state) {
            return state.transaksi
        }
    },
    mutations: {
        setTransaksi(state, data) {
            state.transaksi = data
        }        
    },
    actions: {
        async loadTransaksi({ commit }) {            
            await Api().get('transaksi').then(res => {                
                commit('setTransaksi', res.data)            
            }).catch(err => console.log(err))            
        },
        async postTransaksi({ }, form) {
            let status = false
            await Api().post('transaksi', form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        },
        updateRealTimeTransaksi({  }, form) {            
            transaksiRef.set({
                event: form.event,
                id: form.id,
                detail: form.detail_pesanan,
                no_antrian: form.no_antrian,
                no_meja: form.no_meja,
                pegawai_id: form.pegawai_id,
                status: form.status,                
                transaksi: form.transaksi
            })           
        },
        // async editPesanan({ commit }, id) {            
        //     await Api().get('pesanan/' + id).then(res => {                
        //         commit('setEditPesanan', res.data)                
        //     }).catch(err => console.log(err))            
        // },
        // async updatePesanan({ }, form) {
        //     let status = false
        //     await Api().patch('pesanan/' + form.id, form).then(res => {                
        //         status = res.data.status                
        //     }).catch(err => console.log(err))
        //     return status
        // },
        async deleteTransaksi({ dispatch }, id) {
            let status = false
            await Api().delete('transaksi/' + id).then(async res => {
                if (res.data.status) {
                    await dispatch('loadTransaksi')                    
                    status = res.data.status
                }
            }).catch(err => console.log(err))
            return status
        }
    }
}
