<template>
    <v-app>
        <div v-once v-if="status == 200">
            <navigation-admin v-if="navAdmin"/>
        </div>
        <div v-once v-else>
            <Header/>
        </div>
        <router-view></router-view>
        <Footer v-show="showFooter"/>
    </v-app>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import NavigationAdmin from '../components/NavigationAdmin.vue'
export default {
    components: {
        Header, Footer,
        'navigation-admin' : NavigationAdmin
    },
    data(){
        return{
            status: 0,
            navAdmin : false,
            showFooter: true
        }
    },
    async created(){
        const role = await this.checkRoles()
        console.log(role)
        if(role.status == 200 && role.user.roles == 'admin'){
            this.status = 200
            this.navAdmin = true
            this.showFooter = false
        }else{
            this.status = 401
        }
    },
    methods: {
        ...mapActions([
            'checkRoles'
        ])
    },
    computed: {

    }
}
</script>
<style>
    html {
        height: 100%;
    }
    #app{
        height: 100%;
    }
</style>
