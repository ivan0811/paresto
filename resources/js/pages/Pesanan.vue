<template>
    <div>
        <pesanan-pelayan :card="card" v-if="roles == 'pelayan'"></pesanan-pelayan>
        <pesanan-koki :card="card" v-else-if="roles == 'koki'"></pesanan-koki>
        <not-found v-else></not-found>
    </div>    
</template>
<script>
import PesananPelayan from '../pages/pegawai/pelayan/Pesanan.vue'
import PesananKoki from '../pages/pegawai/koki/Pesanan.vue'
import NotFound from '../pages/NotFound.vue'
export default {
    props: ["roles", "card"],
    components: {
        'pesanan-pelayan' : PesananPelayan,
        'pesanan-koki' : PesananKoki,
        'not-found' : NotFound
    }   
    // async mounted(){        
    //     console.log(this.roles)
    //     if(this.roles != 'pelayan' && this.roles != 'koki') this.$router.push({name: 'NotFound'})  
    // }
}
</script>