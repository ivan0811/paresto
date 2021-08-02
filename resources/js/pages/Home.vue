<template>
    <div>
        <div v-once v-if="status == 200">
            <menu-admin v-if="menu == 'admin'"></menu-admin>
            <menu-kasir v-else-if="menu == 'kasir'"></menu-kasir>
            <menu-koki v-else-if="menu == 'koki'"></menu-koki>            
        </div>
        <div v-once v-else-if="status == 401">
            <div>Home</div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import HomeAdmin from './admin/Home.vue'
import HomeKasir from './pegawai/kasir/Home.vue'
export default {
    components: {
        'menu-admin': HomeAdmin,
        'menu-kasir': HomeKasir        
    },
    data(){
        return {
            status: 0,
            menu: ''
        }
    },
    async created(){
        const data = await this.checkRoles()
        console.log(data)
        if(data.status == 200){
            this.menu = data.user.roles
            this.status = 200
            if(this.menu == 'koki'){
                this.$router.push({
                    name: 'Pesanan'
                })
            }
            if(this.menu == 'pelayan'){
                this.$router.push({
                    name: 'Pesanan'
                })
            }
        }else{
            this.status = 401
            this.$router.push({
                name: 'Login'
            })
        }
    },    
    methods:{
        ...mapActions([
            'checkRoles'
        ]),
    },
    computed:{
        ...mapGetters([
            'getUser'
        ])
    }
}
</script>
