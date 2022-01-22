<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
             <v-row>
                <v-col cols="8">
                    <v-text-field
                        solo
                        v-model="search"                        
                        label="Cari"
                        flat
                    ></v-text-field>
                </v-col>
                <v-col cols="4" class="d-flex justify-end">
                    <v-btn color="primary" :to="{name: 'selectMeja'}" x-large elevation="0">
                        <v-icon left>mdi-plus</v-icon>
                        Pesanan Baru
                    </v-btn>
                </v-col>               
                <v-col v-show="search == ''" cols="12" v-for="(item, i) in pesanan" :key="i">
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
                <v-col v-show="search != ''" cols="12" v-for="(item, i) in pesananSearch" :key="i">
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
          detail: [],
          updated: {},
          notif: false,
          search: '',
          pesananSearch : []
        }
    },   
    created(){
        pesananRef.on('value', this.resultData, this.resultError)
        notifRef.on('value', this.notifData, this.notifError)
    },
    async mounted(){        
        await this.loadPesanan()
        this.pesanan = this.getPesanan              
        // this.countHargaPesanan()            
        if(this.getEventUpdated == "created"){            
           this.setUpdateRealTime(this.pesanan.sort((itemA, itemB) => itemB.id-itemA.id)[0])
        }       

        if(this.getEventUpdated == "updated"){                                    
            this.setUpdateRealTime(this.pesanan.filter(item => item.id == this.getIdUpdated)[0])
        }              
    },
    methods: {        
        ...mapActions([
            'loadPesanan',
            'deletePesanan',
            'updateRealTime',
            'setEventUpdated'            
        ]),   
        notifData(item){
            this.notif = item.val().refresh
        },
        notifError(error){
            console.log(error)
        },
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
                updated_at: items.val().updated_at
            }
        },
        resultError(error){
            console.log(error)
        },
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
            const status = await this.deletePesanan(id)                            
            if(status){
                this.setEventUpdated('deleted')                                   
                this.setUpdateRealTime(this.pesanan.filter(item => item.id == id)[0])
                this.pesanan = this.getPesanan                            
            }            
        },
        showDialogDetail(item){
            this.dialogDetailPesanan = !this.dialogDetailPesanan
            this.detail = item
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
                        updated_at: item.updated_at
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
                    val.updated_at = item.updated_at
                })
            }

            if(item.event == 'deleted'){                
                this.pesanan = this.pesanan.filter(val => val.id != item.id)
            }            
        },
        search(keyword){
            let patt = new RegExp(keyword)
            this.pesananSearch = this.pesanan.filter(val => patt.test(this.getTotalHarga(val)) || patt.test(val.status));
        },
        async notif(item){
            if(item){
                await this.loadPesanan()
                this.pesanan = this.getPesanan   
            }
        }        
    }
}
</script>
