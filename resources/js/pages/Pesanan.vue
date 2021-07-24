<template>
    <div>
        <pesanan-pelayan :card="card" v-if="roles == 'pelayan'"></pesanan-pelayan>
        <pesanan-koki :card="card" v-else-if="roles == 'koki'"></pesanan-koki>
    </div>    
</template>
<script>
import PesananPelayan from '../pages/pegawai/pelayan/Pesanan.vue'
import PesananKoki from '../pages/pegawai/koki/Pesanan.vue'
export default {
    props: ["roles", "card"],
    components: {
        'pesanan-pelayan' : PesananPelayan,
        'pesanan-koki' : PesananKoki
    },    
    mounted(){
        console.log(this.roles)
        if(roles != 'pelayan' && roles != 'koki') this.$router.push({name: 'NotFound'})  
    }
}
</script>