import Api from '../../services/Api'

export default {
    state: {
        profile: [],        
    },
    getters: {
        getProfile(state) {
            return state.profile
        }        
    },
    mutations: {
        setProfile(state, profile) {
            state.profile = profile
        }        
    },
    actions: {
        async loadProfile({ commit }) {
            await Api().get('profile').then(res => {                
                commit('setProfile', res.data)                
            }).catch(err => console.log(err))            
        },               
        async updateProfile({ }, form) {
            let status = false
            await Api().patch('profile', form).then(res => {                
                status = res.data.status                
            }).catch(err => console.log(err))
            return status
        }      
    }
}
