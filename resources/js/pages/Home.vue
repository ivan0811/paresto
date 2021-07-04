<template>
    <div>
        <div v-once v-if="status == 200">
            <menu-admin v-if="menu == 'admin'"></menu-admin>
            <menu-kasir v-else-if="menu == 'kasir'"></menu-kasir>
            <menu-koki v-else-if="menu == 'koki'"></menu-koki>
            <menu-pelayan v-else-if="menu == 'pelayan'"></menu-pelayan>
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
import HomeKoki from './pegawai/koki/Home.vue'
import HomePelayan from './pegawai/pelayan/Home.vue'
export default {
    components: {
        'menu-admin': HomeAdmin,
        'menu-kasir': HomeKasir,
        'menu-koki': HomeKoki,
        'menu-pelayan': HomePelayan
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
        }else{
            this.status = 401
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
