<template>
    <v-app color="background">
        <div v-once v-if="status == 200" >
            <navigation v-if="nav.includes(roles)" :roles="roles" :username="username"/>
            <Header :card="card" :roles="roles" :username="username"/>
        </div>
        <!-- <div v-once v-else>
            <Header/>
        </div> -->
        <router-view :card="card"></router-view>
        <Footer v-show="showFooter"/>
    </v-app>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import Navigation from '../components/Navigation.vue'
export default {
    components: {
        Header, Footer,
        'navigation' : Navigation
    },
    data(){
        return{
            status: 0,            
            nav: ['admin', 'pelayan', 'koki'],
            showFooter: true,
            card : {
                elevation : 0
            },
            roles: '',
            username: ''
        }
    },
    async created(){
        const role = await this.checkLogin()        
        this.roles = role.user.roles
        this.username = role.user.username        
        if(role.status == 200){
            this.status = 200            
            this.showFooter = false
        }else{
            this.status = 401
        }
    },    
    methods: {
        ...mapActions([
            'checkRoles',
            'checkLogin'
        ])
    },
    computed: {
        
    }
}
</script>
<style lang="scss">
    @import '../../sass/app.scss';
    html {
        height: 100%;
    }
    #app{
        height: 100%;
    }
</style>
