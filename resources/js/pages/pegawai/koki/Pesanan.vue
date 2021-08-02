<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
             <v-row>
                <v-col cols="8" class="pb-0">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
                </v-col>                    
                <v-col class="d-flex pt-0 pb-5" cols="12">
                    <v-alert v-bind="attrs" v-on="on" :style="customStyleAlert" class="me-2 py-1 px-4 text-subheader-1 mb-auto" dense>                        
                            Total Pesanan {{pesanan.filter(item => item.status != 'selesai').length}}                                                                                                                                   
                    </v-alert>
                     <v-btn
                            text
                            color="primary"
                        >Semua Pesanan</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Menunggu diproses</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Diproses</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Stock habis</v-btn>                        
                </v-col>  
                <v-col cols="12">                          
                    <div class="d-flex overflow-x-auto" style="width: 100%">
                             <v-card v-for="(detail, i) in pesanan.filter(item => item.status != 'selesai')" :key="i" v-bind="card" width="max-content" class="me-8">                                      
                                <v-container class="pa-5" style="width: 320px">                                                                                               
                                         <div class="d-flex justify-space-between">
                                            <div class="d-flex">
                                                <v-avatar rounded="" color="primary">
                                                    <p class="white--text mb-0">{{detail.no_antrian}}</p>
                                                </v-avatar>
                                                <div class="ms-3">
                                                    <p class="text-subtitle-1 ma-0">Meja #{{detail.no_meja}}</p>
                                                    <p class="text-caption greyDark--text ma-0">Oleh {{detail.pegawai.user.username}}</p>
                                                </div>            
                                            </div>                
                                            <v-menu offset-y>                                            
                                                <template v-slot:activator="{on, attrs}">   
                                                    <v-alert v-bind="attrs" v-on="on" class="py-1 px-4 rounded-pill text-caption mb-auto" :color="getAlertStatus(detail.status)" text dense>                                                                                                                                                                                                    
                                                        <v-row>
                                                            <v-col>{{detail.status == 'habis' ? 'Stock Habis' : detail.status}}</v-col>
                                                            <v-col cols="2"></v-col>
                                                        </v-row>                                                       
                                                    </v-alert>
                                                </template>
                                                  <v-list>
                                                    <v-list-item @click="updateStatusPesananHandler(detail.id, 'diproses')">
                                                        <v-alert class="py-1 px-4 rounded-pill text-caption mb-0" color="success" text dense>                                                               
                                                            Diproses                                                                                  
                                                        </v-alert>
                                                    </v-list-item>
                                                    <v-list-item @click="stockHabis(detail)">
                                                        <v-alert class="py-1 px-4 rounded-pill text-caption mb-0" color="error" text dense>                                                               
                                                            Ditahan, Stock Habis                                                                     
                                                        </v-alert>
                                                    </v-list-item>
                                                </v-list>
                                            </v-menu>                                            
                                        </div>    
                                        <div class="overflow-y-auto my-8" style="height: 240px">                                            
                                            <div class="d-flex justify-space-between mb-5" v-for="(item, j) in detail.detail_pesanan" :key="j">
                                                <div>
                                                    <p class="text-subheader-1 mb-0">{{item.menu.nama}}</p>
                                                    <!-- <p class="text-caption greyDark--text mb-0">Tidak pakai sambel</p> -->
                                                </div>           
                                                <p class="my-auto text-subheader-1">x{{item.jumlah}}</p>
                                            </div>                                                                                                                                     
                                        </div>   
                                        <div class="d-flex">
                                            <v-spacer></v-spacer>
                                            <v-btn color="primary" @click="updateStatusPesananHandler(detail.id, 'selesai')" v-if="detail.status == 'diproses'" large>Tandai Selesai</v-btn>                                     
                                            <v-btn color="primary" v-else disabled large>Tandai Selesai</v-btn>                                     
                                        </div>                                        
                                </v-container>
                            </v-card>                            
                            </div>                                                                                                       
                </v-col>
            </v-row>
        </v-container>
    </v-main>        
    <send-notif @save="sendNotif" :detail="detail" @close="closeSideSendNotif" :drawer="sideSendNotif"></send-notif>
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import sideSendNotif from '../../../components/SideSendNotif.vue'
export default {    
    components: {
        'send-notif' : sideSendNotif        
    },
    props: ["card"],    
    data() {
        return{                                 
          sideSendNotif: false,
          customStyleAlert: {
              borderRadius: '8px',
              backgroundColor: 'transparent',
              border: '2px solid #CDC8C3'
          },
          pesanan: [],
          alertStatus: {
              menunggu: 'blue',
              diproses: 'success',
              habis: 'red',
              selesai: 'orange'
          },
          detail: {},
          sendNotifStock: []  
        }
    },    
    async mounted(){
        await this.setPesanan()                               
    },
    methods: {
        ...mapActions([
            'loadPesanan',
            'deletePesanan',
            'updateStatusPesanan',
            'updateStatusMenu',
            'updateStatusPesananMenu'            
        ]),    
        closeSideSendNotif(){
            this.sideSendNotif = false
        },
        async setPesanan(){
            await this.loadPesanan()
            this.pesanan = this.getPesanan 
        },
        getAlertStatus(status){
            return this.alertStatus[status]
        },
        stockHabis(pesanan){
            this.sideSendNotif = true
            this.detail = pesanan
        },
        async updateStatusPesananHandler(id, status){            
            const res = await this.updateStatusPesanan({id, status})            
            if(res) await this.setPesanan()
        },
        async sendNotif(menu_id){            
            let statusPesanan = await this.updateStatusPesananMenu({id: menu_id})            
            let statusMenu = await this.updateStatusMenu({id: menu_id})
            if(statusPesanan && statusMenu) {
                await this.setPesanan()
                this.closeSideSendNotif()
            }
        }
    },
    computed: {
        ...mapGetters([
            'getPesanan'
        ])
    }
}
</script>
<style>
.v-slide-group__wrapper {
  overflow-x: auto; /* Enables the horizontal scrollbar */
  /* Next lines hides scrollbar in different browsers for styling purposes */
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}
.v-slide-group__wrapper::-webkit-scrollbar {
  display: none; /* Chrome opera and Safary */
  width: 0px;
  background: transparent;
}
</style>