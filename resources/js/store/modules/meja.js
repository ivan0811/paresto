import Api from '../../services/Api'

export default {
    state: {
        meja: [],        
    },
    getters: {
        getMeja(state) {
            return state.meja
        }        
    },
    mutations: {
        setMeja(state, meja) {
            state.meja = meja
        }        
    },
    actions: {
        async loadMeja({ commit }) {
            await Api().get('meja').then(res => {                
                commit('setMeja', res.data)
            }).catch(err => console.log(err))            
        },               
        async updateMeja({ }, form) {
            let status = false
            await Api().patch('meja/' + form.no_meja, form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        }      
    }
}
