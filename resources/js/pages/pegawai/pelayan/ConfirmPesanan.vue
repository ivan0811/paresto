<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="d-flex flex-column px-8" style="min-height: 100%">    
            <div class="mb-auto">
             <v-row class="">                                           
                <v-col cols="12">
                    <p class="text-h5">Meja #{{addZero(meja)}}</p>
                    <p class="text-subheader-1 greyDark--text">10 Agustus 2021</p>
                </v-col>                           
                <v-col cols="12" v-for="(item, i) in detail" :key="i">
                    <v-card v-bind="card">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyDark--text my-auto">{{item.nama}}</p>
                            <div class="d-flex justify-space-end">
                                <p class="font-weight-regular my-auto primary--text mx-5">Rp {{item.harga}}</p>
                                <div class="d-flex mx-5 my-auto">
                                    <v-btn @click="itemCounter(item.id, 'add')" elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-plus</v-icon></v-btn>            
                                    <p class="font-weihgt-regular my-auto mx-5">{{item.count}}</p>
                                    <v-btn @click="itemCounter(item.id, 'less')" elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                </div>                                
                                <v-btn elevation="0" class="pa-0 mx-5 my-auto" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                 <v-btn @click="removeItem(item.id)" icon>
                                     <span class="icon icon-bin icon-16 black"></span>
                                 </v-btn>
                            </div>                                                        
                        </div>
                    </v-container>
                </v-card>
                </v-col>
                <v-col cols="12">
                    <div class="text-h5 mb-3">Ringkasan</div>         
                    <div class="d-flex justify-space-between">
                        <p class="text-subtitle-2 text--secondary mb-2">Jumlah Item</p>
                        <p class="text-subtitle-2 mb-2">{{ringkasan.jumlah}}</p>
                    </div>            
                    <div class="d-flex justify-space-between">
                        <p class="text-subtitle-2 text--secondary mb-2">Pajak</p>
                        <p class="text-subtitle-2 mb-2">Rp {{ringkasan.pajak}}</p>
                    </div>            
                    <div class="d-flex justify-space-between">
                        <p class="text-subtitle-2 text--secondary mb-2">Total Harga</p>
                        <p class="text-subtitle-2 mb-2">Rp {{ringkasan.totalHarga}}</p>
                    </div>                         
                </v-col>                                                                        
            </v-row>          
            </div>                    
            <div class="mt-auto">                
                <div class="d-flex justify-end">
                    <v-btn large color="greyLight" elevation="0" class="me-4">
                        <v-icon>
                            mdi-chevron-left
                        </v-icon>
                    </v-btn>
                    <v-btn large color="primary" elevation="0" @click.stop="dialogConfirmPesanan = !dialogConfirmPesanan">
                        Lanjut
                    </v-btn>                
                </div>                
            </div>            
        </v-container>         
    </v-main>    
    <detail-pesanan @save="submitHandler" @close="closeConfirmPesanan" :dialog="dialogConfirmPesanan"></detail-pesanan>
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import DialogConfirmPesanan from '../../../components/DialogConfirmPesanan.vue'
export default {
    components: {
        'detail-pesanan' : DialogConfirmPesanan
    },
    props: ["card"],    
    data() {
        return{               
            dialogConfirmPesanan: false,
            meja: 0,
            detail: [],
            ringkasan: {
                jumlah: 0,
                pajak: 0,
                totalHarga: 0
            }
        }
    },    
    mounted(){
        this.loadPesananStorage()
        const pesanan = this.getPesananStorage
        this.meja = pesanan.no_meja
        this.detail = pesanan.detail
        this.detail.map(item => {
            item.harga *= item.count
        })
        this.setJumlah()  
        this.setTotalHarga()
    },
    methods: {
        ...mapActions([
            'loadPesananStorage',
            'removePesananStorage',
            'updateMeja',
            'postPesanan',
            'updatePesanan'   
        ]),
        closeConfirmPesanan(){                    
            this.dialogConfirmPesanan = false
        },
        addZero(no_meja){            
            return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
        },
        setTotalHarga(){
            this.ringkasan.totalHarga = this.detail.reduce((total, num) => { return total + num.harga}, 0)
        },
        setJumlah(){
            this.ringkasan.jumlah = this.detail.length  
        },
        itemCounter(id, count){                   
            this.detail.filter(item => item.id == id).map(item => {         
                count == 'add' ? (
                    item.count++,
                    item.harga *= item.count                
                    ) : (
                        item.count > 1 ? (
                            item.harga -= (item.harga / item.count),
                            item.count--
                        ) : false                            
                    )
            })
            this.setTotalHarga()
        },
        removeItem(id){
            const detail = this.detail
            detail.splice(detail.findIndex(item => item.id == id), 1)     
            this.setJumlah()
        },
        async submitHandler(){
            const meja = {
                no_meja: this.meja,
                status: 'dipakai'
            }           
            let statusMeja = false
            let statusPesanan = false
            if(this.$route.params.id == undefined){                
                statusMeja = await this.updateMeja(meja)
                statusPesanan = await this.postPesanan({
                    no_meja : this.meja,
                    pesanan: this.detail
                })            
            }else{
                statusMeja = true
                statusPesanan = await this.updatePesanan({
                    id: this.$route.params.id,
                    no_meja : this.meja,
                    pesanan: this.detail
                })            
            }            
            if(statusMeja && statusPesanan){
                this.$router.push({name: 'pesanan'})
                this.dialogConfirmPesanan = false
            }
        }        
    },
    computed: {
        ...mapGetters([
            'getPesananStorage'
        ])
    }  
}
</script>
<style>
.bottom-action{    
     clear: both;
    position: relative;
    height: 200px;
    margin-top: -200px;
}
</style>