<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
             <v-row>
                <v-col cols="8">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
                </v-col>
                <v-col cols="4" class="d-flex justify-end">
                    <v-btn color="primary" :to="{name: 'selectMeja'}" x-large elevation="0">
                        <v-icon left>mdi-plus</v-icon>
                        Pesanan Baru
                    </v-btn>
                </v-col>               
                <v-col cols="12" v-for="(item, i) in pesanan" :key="i">
                    <v-card v-bind="card" @click.native="showDialogDetail(item)">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">{{item.no_antrian}}</p>
                            <p class="font-weight-regular my-auto">Meja #{{addZero(item.no_meja)}}</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>
                            <p class="font-weight-regular my-auto">Rp {{getTotalHarga(item)}}</p>
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" :color="getAlertStatus(item.status)" text dense>{{item.status}}</v-alert>
                             <v-menu offset-y>
                                     <template v-slot:activator="{ on, attrs }">
                                         <v-btn class="my-auto" x-small icon>
                                            <v-icon
                                                size="24"
                                                v-bind="attrs"
                                                v-on="on"
                                            >mdi-dots-vertical</v-icon>
                                        </v-btn>
                                    </template>
                                     <v-list>
                                        <v-list-item :to="{name: 'editPesanan', params: {id : item.id}}">
                                            <v-list-item-title>Edit</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item @click="deleteHandler(item.id)">
                                            <v-list-item-title>Delete</v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                    </v-menu>
                        </div>
                    </v-container>
                </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>    
    <detail-pesanan :detail="detail" @close="closeDetailPesanan" :dialog="dialogDetailPesanan"></detail-pesanan>
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import DialogDetailPesanan from '../../../components/DialogDetailPesanan.vue'
export default {
    components: {
        'detail-pesanan' : DialogDetailPesanan
    },
    props: ["card"],    
    data() {
        return{                       
          dialogDetailPesanan: false,
          pesanan : [],
          alertStatus: {
              menunggu: 'blue',
              diproses: 'success',
              habis: 'red',
              selesai: 'orange'
          },
          detail: []
        }
    },   
    async mounted(){
        await this.loadPesanan()
        this.pesanan = this.getPesanan      
        // this.countHargaPesanan()          
    },
    methods: {        
        ...mapActions([
            'loadPesanan',
            'deletePesanan'
        ]),      
        countHargaPesanan(item){
            return item.menu.harga * item.jumlah
        },        
        closeDetailPesanan(){
            this.dialogDetailPesanan = false
        },
        getTotalHarga(item){             
            let harga = item.detail_pesanan.map(val => {
                return val.menu.harga * val.jumlah
            })                        
                
            return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
        },
        addZero(no_meja){            
            return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
        },
        getAlertStatus(status){
            return this.alertStatus[status]
        },
        async deleteHandler(id){
            await this.deletePesanan(id)                
            this.pesanan = this.getPesanan      
            // this.countHargaPesanan()      
        },
        showDialogDetail(item){
            this.dialogDetailPesanan = !this.dialogDetailPesanan
            this.detail = item
        }
    },
    computed: {
        ...mapGetters([
            'getPesanan'
        ])
    }
}
</script>
