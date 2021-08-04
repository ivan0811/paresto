<template>
    <v-main style="min-height: 100vh">
      <side-detail-transaksi @delete="deleteHandler" :detail="detail" @close="closeDetail" :drawer="detailTransaksi"></side-detail-transaksi>
      <v-container class="px-8">
      <v-row>
          <v-col cols="8">
               <v-row>
           <v-col
            cols="12"
          >
            <v-card v-bind="card">
                <div class="d-flex justify-space-between">
                    <v-subheader>
                        Total Penjualan
                    </v-subheader>
                    <div class="text-h6 mt-3 me-5">Rp 3.123.423.643</div>
                </div>
                <v-container fluid>
                    <v-sparkline
                    :fill="fill"
                    :gradient="selectedGradient"
                    :line-width="width"
                    :padding="padding"
                    :smooth="radius || false"
                    :value="value"
                    :stroke-linecap="lineCap"
                    auto-draw
                    ></v-sparkline>
                </v-container>
            </v-card>
          </v-col>

          <v-col
            cols="12"
          >
          <div class="d-flex justify-space-between">
              <div class="text-h6 mb-2">Riwayat</div>              
          </div>
          <v-row>
             <v-col cols="12" v-for="(item, i) in transaksi.filter((_, index) => index < 12)" :key="i">
                    <v-card elevation="0" v-bind="card" @click.native="showDialogDetail(item)">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">{{item.no_antrian}}</p>
                            <p class="font-weight-regular my-auto">Meja #{{addZero(item.no_meja)}}</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>
                            <p class="font-weight-regular my-auto">Rp {{getTotalHarga(item)}}</p>
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" :color="getAlertStatus(checkStatus(item))" text dense>{{checkStatus(item)}}</v-alert>
                            <v-btn @click="deleteHandler(item.id)" class="my-auto" x-small icon>
                              <span class="icon icon-bin icon-16 grey-dark"></span>
                            </v-btn>                             
                        </div>
                    </v-container>
                </v-card>
                </v-col>
              <v-col cols="12">
                    <v-card v-bind="card">
                        <div class="d-flex">

                        </div>
                    </v-card>
              </v-col>
          </v-row>
          </v-col>

        </v-row>
          </v-col>
          <v-col cols="4">
            <v-card v-bind="card">
                <v-container>
                    <v-list class="mb-8" two-line>
                        <v-list-item-content>
                            <v-list-item-title class="text-h5 text-center mb-3">
                                Menu Trending
                            </v-list-item-title>
                            <v-list-item-subtitle class="text-center">
                                Menu Paling Banyak terjual
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list>
                    <div class="d-flex justify-center">
                        <v-btn class="mx-2" :text="false" :color="'active'">Makanan</v-btn>
                        <v-btn class="mx-2" :text="true" :color="'secondary'">Minuman</v-btn>
                    </div>
                    <v-list>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Nasi Goreng
                                </v-list-item-title>
                            </v-list-item-content>
                            <v-list-item-content>
                                <v-list-item-title class="d-flex justify-end">
                                    240 <span class="ms-1 text--secondary">Porsi</span>
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import sideDetailTransaksi from "../../components/SideDetailTransaksi.vue";
 const gradients = [
    ['#5A95CC'],
    ['#74CEDD', '#FFFFFF']
  ]

export default {
     components: {
         'side-detail-transaksi' : sideDetailTransaksi
     },
     props: ['card'],
     data: () => ({
        detailTransaksi: false,
        fill: true,
        selectedGradient: gradients[1],
        gradients,
        padding: 8,
        radius: 0,
        value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0],
        width: 2,
        menu: 'Makanan',
        transaksi: [],
         alertStatus: {              
            lunas: 'success',              
            belumLunas: 'red'
        },
        updated: {},
        updatedTransaksi: {},
        detail : {}
    }),
    created(){
        transaksiRef.on('value', this.transaksiData, this.transaksiError)
        pesananRef.on('value', this.resultData, this.resultError)
    },
     async mounted() {            
      await this.loadTransaksi()      
      this.transaksi = this.getTransaksi                
    },
    methods:{
       ...mapActions([        
        'loadTransaksi',
        'updateRealTimeTransaksi',
        'deleteTransaksi'
      ]),
      showDialogDetail(item){
          this.detail = item
          this.detailTransaksi = true
      },
       transaksiData(items){
            this.updatedTransaksi = {                
                detail : items.val().detail,
                event : items.val().event,
                id: items.val().id,
                no_antrian : items.val().no_antrian,
                no_meja : items.val().no_meja,
                pegawai_id: items.val().pegawai_id,
                status : items.val().status,
                updated_at: items.val().updated_at,
                created_at: items.val().created_at,
                pegawai: items.val().pegawai,
                transaksi : items.val().transaksi            
            }
        },
        transaksiError(error){
            console.log(error)
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
                pegawai: items.val().pegawai,
                transaksi : []
            }
        },        
        resultError(error){
            console.log(error)
        },        
        closeDetail(){
            this.detailTransaksi = false            
        },
         addZero(no_meja){            
          return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
      },
      checkStatus(item){
          return item.transaksi.length > 0 ? 'Lunas' : 'Belum Lunas'
      },
      getAlertStatus(status){            
            return this.alertStatus[status == 'Belum Lunas' ? 'belumLunas' : 'lunas']
        },
      getTotalHarga(item){             
          let harga = item.detail_pesanan.map(val => {
              return val.menu.harga * val.jumlah
          })                        
              
          return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
      },
      async deleteHandler(id){
          const status = await this.deleteTransaksi(id)
          if(status){              
            let transaksi = this.transaksi.filter(item => item.id == id)
            console.log(transaksi)
            transaksi[0].event = 'deleted'                                
            this.updateRealTimeTransaksi(transaksi[0])
            this.transaksi = this.getTransaksi
            this.detailTransaksi = false
          }
      }
    },
    computed:{
        ...mapGetters([            
            'getTransaksi'
        ])
    },
    watch:{
        updated(item){
            if(item.event == 'updated'){                                
                if(this.transaksi.filter(val => val.id == item.id).length == 0 && item.status == 'selesai'){                    
                    this.transaksi.push({
                        detail_pesanan : item.detail,
                        event : item.event,
                        id: item.id,
                        no_antrian : item.no_antrian,
                        no_meja : item.no_meja,
                        pegawai_id: item.pegawai_id,
                        status : item.status,
                        updated_at: item.updated_at,
                        created_at: item.created_at,
                        pegawai: item.pegawai,
                        transaksi: item.transaksi
                    })                                        
                }                
            }

            // if(item.event == 'updated'){
            //     this.transaksi.filter(val => val.id == item.id).map(val => {
            //         val.detail_pesanan = item.detail,
            //         val.event = item.event,
            //         val.id = item.id,
            //         val.no_antrian = item.no_antrian,
            //         val.no_meja = item.no_meja,
            //         val.pegawai_id = item.pegawai_id,
            //         val.status = item.status,
            //         val.updated_at = item.updated_at,
            //         val.created_at = item.created_at,
            //         val.pegawai = item.pegawai
            //         val.trasanski = item.transaksi
            //     })
            // }

            if(item.event == 'deleted'){                
                this.transaksi = this.transaksi.filter(val => val.id != item.id)
            }            
        },
        updatedTransaksi(item){
            // if(item.event == 'created'){                                
            //     if(this.transaksi.filter(val => val.id == item.id).length == 0){                    
            //         this.transaksi.push({
            //             detail_pesanan : item.detail,
            //             event : item.event,
            //             id: item.id,
            //             no_antrian : item.no_antrian,
            //             no_meja : item.no_meja,
            //             pegawai_id: item.pegawai_id,
            //             status : item.status,
            //             updated_at: item.updated_at,
            //             created_at: item.created_at,
            //             pegawai: item.pegawai,
            //             transaksi: item.transaksi
            //         })                                        
            //     }                
            // }

            if(item.event == 'updated'){
                this.transaksi.filter(val => val.id == item.id).map(val => {
                    val.detail_pesanan = item.detail,
                    val.event = item.event,
                    val.id = item.id,
                    val.no_antrian = item.no_antrian,
                    val.no_meja = item.no_meja,
                    val.pegawai_id = item.pegawai_id,
                    val.status = item.status,
                    val.updated_at = item.updated_at,
                    val.created_at = item.created_at,                    
                    val.transaksi = item.transaksi
                })
            }

            if(item.event == 'deleted'){                
                this.transaksi = this.transaksi.filter(val => val.id != item.id)
            }            
        }
    }
}
</script>
