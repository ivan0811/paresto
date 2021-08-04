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
                    <v-alert :style="customStyleAlert" class="me-2 py-1 px-4 text-subheader-1 mb-auto" dense>                        
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
                             <v-card v-for="(detail, i) in pesanan" :key="i" v-bind="card" width="max-content" class="me-8">                                      
                                <v-container class="pa-5" style="width: 320px">                                                                                               
                                         <div class="d-flex justify-space-between">
                                            <div class="d-flex">
                                                <v-avatar rounded="" color="primary">
                                                    <p class="white--text mb-0">{{detail.no_antrian}}</p>
                                                </v-avatar>
                                                <div class="ms-3">
                                                    <p class="text-subtitle-1 ma-0">Meja #{{addZero(detail.no_meja)}}</p>
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
          sendNotifStock: [],
          updated: {}          
        }
    },    
    created(){
        pesananRef.on('value', this.resultData, this.resultError)
    },
    async mounted(){        
        await this.setPesanan()
        this.filterSelesai()
    },
    methods: {
        ...mapActions([
            'loadPesanan',
            'deletePesanan',
            'updateStatusPesanan',
            'updateStatusMenu',
            'updateStatusPesananMenu',
            'updateRealTime',
            'setEventUpdated'              
        ]),    
        setUpdateRealTime(form){
            this.updateRealTime({
                id: form.id,
                detail: form.detail_pesanan,
                no_antrian: form.no_antrian,
                no_meja: form.no_meja,
                pegawai_id: form.pegawai_id,
                status: form.status,
                updated_at: form.updated_at,
                created_at: form.created_at,
                pegawai: form.pegawai
            })
        },
        resultData(items){            
            this.updated = {
                detail : items.val().detail,
                event : items.val().event,
                id: items.val().id,
                no_antrian : items.val().no_antrian,
                no_meja : items.val().no_meja,
                pegawai_id: items.val().pegawai_id,
                status : items.val().status,
                updated_at: items.val().updated_at,
                created_at: items.val().created_at,
                pegawai: items.val().pegawai
            }
        },
        resultError(error){
            console.log(error)
        },
        closeSideSendNotif(){
            this.sideSendNotif = false
        },
        async setPesanan(){
            await this.loadPesanan()            
            this.pesanan = this.getPesanan                         
        },
        filterSelesai(){
            this.pesanan = this.pesanan.filter(item => item.status != 'selesai')
        },
        getAlertStatus(status){
            return this.alertStatus[status]
        },
        stockHabis(pesanan){
            this.sideSendNotif = true
            this.detail = pesanan
        },
        addZero(no_meja){            
            return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
        },
        async updateStatusPesananHandler(id, status){            
            const res = await this.updateStatusPesanan({id, status})            
            if(res) {                 
                await this.setPesanan()    
                this.setEventUpdated('updated')                   
                this.setUpdateRealTime(this.pesanan.filter(item => item.id == id)[0])                     
                this.filterSelesai()
            } 
        },
        async sendNotif(menu_id){            
            let statusPesanan = await this.updateStatusPesananMenu({id: menu_id})            
            let statusMenu = await this.updateStatusMenu({id: menu_id})
            if(statusPesanan && statusMenu) {                
                await this.setPesanan()
                this.closeSideSendNotif()
                notifRef.set({
                    refresh: true
                })
                this.filterSelesai()
            }
        }
    },
    computed: {
        ...mapGetters([
            'getPesanan',
            'getEventUpdated',
            'getIdUpdated'
        ])
    },
    watch:{
        updated(item){
            if(item.event == 'created'){                                
                if(this.pesanan.filter(val => val.id == item.id).length == 0){                    
                    this.pesanan.push({
                        detail_pesanan : item.detail,
                        event : item.event,
                        id: item.id,
                        no_antrian : item.no_antrian,
                        no_meja : item.no_meja,
                        pegawai_id: item.pegawai_id,
                        status : item.status,
                        updated_at: item.updated_at,
                        created_at: item.created_at,
                        pegawai: item.pegawai
                    })                                        
                }                
            }

            if(item.event == 'updated'){
                this.pesanan.filter(val => val.id == item.id).map(val => {
                    val.detail_pesanan = item.detail,
                    val.event = item.event,
                    val.id = item.id,
                    val.no_antrian = item.no_antrian,
                    val.no_meja = item.no_meja,
                    val.pegawai_id = item.pegawai_id,
                    val.status = item.status,
                    val.updated_at = item.updated_at,
                    val.created_at = item.created_at,
                    val.pegawai = item.pegawai
                })
            }

            if(item.event == 'deleted'){                
                this.pesanan = this.pesanan.filter(val => val.id != item.id)
            }            
        }
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