<template>
    <v-main style="min-height: 100vh">
      <v-container class="px-8" style="height: 100%">
      <v-row style="height: 100%">
          <v-col cols="7">
               <v-row>
                    <v-col cols="12">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
                </v-col>

          <v-col
            cols="12"
          >          
          <v-row>
               <v-col v-for="(item, i) in transaksi" :key="i" cols="12">
                    <v-card v-bind="card" @click.native="pembayaran(item)">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">{{item.no_antrian}}</p>
                            <p class="font-weight-regular my-auto">Meja #{{addZero(item.no_meja)}}</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>                            
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" :color="getAlertStatus(checkStatus(item))" text dense>{{checkStatus(item)}}</v-alert>                            
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
          <v-col cols="5">
            <v-card v-bind="card" height="100%">
                <v-container class="d-flex flex-column" style="height: 100%">                                                       
                    <div v-if="detailTransaksi" class="pa-5">                        
                         <v-sheet class="mb-0 mb-6">        
                            <div class="d-flex justify-space-between">
                                <div>
                                    <p class="text-h6 mb-2">Transaksi</p>
                                    <p class="text-subtitle-1 text--secondary ma-0">Meja #{{addZero(detail.no_meja)}}</p>
                                </div>                                
                                <v-alert class="py-1 px-4 rounded-pill my-auto text-caption mb-auto" :color="getAlertStatus(checkStatus(detail))" text dense>{{checkStatus(detail)}}</v-alert>
                            </div>                                        
                        </v-sheet>
                        <v-sheet class="mb-auto" height="60vh">
                            <v-list class="overflow-y-auto" height="100%">
                                <v-list-item v-for="(item, i) in detail.detail_pesanan" :key="i" two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src=""></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>{{item.menu.nama}}</v-list-item-title>
                                        <v-list-item-subtitle>Rp {{item.menu.harga}}</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                        <div class="d-flex">
                                            <v-list-item-title class="text-end">x{{item.jumlah}}</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp {{countHargaPesanan(item)}}</v-list-item-subtitle>
                                        </div>                        
                                    </v-list-item-action>                                                                                          
                                </v-list-item>                                
                            </v-list>
                        </v-sheet>             
                        <div class="d-flex flex-column mt-auto">
                                 <v-sheet class="mx-2 mt-8 mb-5">
                                    <div class="text-h5 mb-3">Ringkasan</div>         
                                    <div class="d-flex justify-space-between">
                                        <p class="text-subtitle-2 text--secondary mb-2">Jumlah Item</p>
                                        <p class="text-subtitle-2 mb-2">{{detail.detail_pesanan.length}}</p>
                                    </div>            
                                    <div class="d-flex justify-space-between">
                                        <p class="text-subtitle-2 text--secondary mb-2">Pajak</p>
                                        <p class="text-subtitle-2 mb-2">Rp 0</p>
                                    </div>            
                                    <div class="d-flex justify-space-between">
                                        <p class="text-subtitle-2 text--secondary mb-2">Total Harga</p>
                                        <p class="text-subtitle-2 mb-2">Rp {{getTotalHarga(detail)}}</p>
                                    </div>                         
                                </v-sheet>        
                                <div class="d-flex justify-end">                                                                        
                                    <v-btn v-if="detail.transaksi.length == 0" @click="dialogPembayaran = !dialogPembayaran" color="primary" elevation="0" large>
                                        Bayar
                                    </v-btn>               
                                    <div v-else>
                                        <v-btn @click="printStruk" color="primary" elevation="0" large>
                                            Cetak Struk
                                        </v-btn>                              
                                        <v-btn disabled color="primary" elevation="0" large>
                                            Bayar
                                        </v-btn>                                                   
                                    </div>                                    
                                </div>                                
                            </div>     
                    </div>
                    <v-layout v-else justify-center align-center style="height: 100%">
                        <div class="text-center">
                            <v-img src="../images/empty_state.svg" class="mx-auto" height="200" width="200"></v-img>                        
                            <p class="text-h6 mb-2">Belum ada Transaksi</p>
                            <p class="text-subheader-1 greyDark--text">Tunggu pelayan mengirim transaksi</p>
                        </div>
                    </v-layout>     
                </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <dialog-pembayaran @bayar="bayar" :detail="detail" @close="closePembayaran" :dialog="dialogPembayaran"></dialog-pembayaran>    
    </v-main>    
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import jsPDF from 'jspdf'
import Pembayaran from '../../../components/DialogPembayaran.vue'
 const gradients = [
    ['#5A95CC'],
    ['#74CEDD', '#FFFFFF']
  ]

export default {
     props: ['card'],
     components: {
         'dialog-pembayaran' : Pembayaran
     },
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
        dialogPembayaran: false,
        transaksi: [],
        detail: {},
        alertStatus: {              
            lunas: 'success',              
            belumLunas: 'red'
        },
        updated: {},
        updatedTransaksi: {}
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
            'postTransaksi',
            'updateRealTimeTransaksi'        
        ]),
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
        closePembayaran(){
            this.dialogPembayaran = !this.dialogPembayaran
        },     
         countHargaPesanan(item){
            return item.menu.harga * item.jumlah
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
        pembayaran(item){
            this.detailTransaksi = true
            this.detail = item
        },
        getTotalHarga(item){             
            let harga = item.detail_pesanan.map(val => {
                return val.menu.harga * val.jumlah
            })                        
                
            return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
        },        
        async bayar(total_bayar){                        
            const status = await this.postTransaksi({pesanan_id: this.detail.id, total_bayar})
            if(status){                
                await this.loadTransaksi()
                this.transaksi = this.getTransaksi                                           
                let transaksi = this.transaksi.filter(item => item.id == this.detail.id)                                
                transaksi[0].event = 'updated'                                
                this.updateRealTimeTransaksi(transaksi[0])                        
                this.closePembayaran()                            
                this.detail = {}
                this.detailTransaksi = false                           
            }
        },
        printStruk(){            
            var doc = new jsPDF();
            doc.text('Paresto', 50, 10);                        
            let index = 10;
            this.detail.detail_pesanan.forEach((item, i) => {                                                
                doc.text(item.menu.nama, 10, 10 * (i + 2));
                doc.text('x' + item.jumlah, 75, 10 * (i + 2));
                doc.text('Rp ' + item.menu.harga * item.jumlah, 90, 10 * (i + 2));        
                console.log(10 * (i+2))                   
            });            
            doc.text('Total Harga ', 10, 10 * (this.detail.detail_pesanan.length + 3));
            doc.text('Rp ' + this.getTotalHarga(this.detail), 90, 10 * (this.detail.detail_pesanan.length + 3));
            // doc.save(pdfName + '.pdf');
            doc.autoPrint()
            doc.output('dataurlnewwindow')                    
        }
    },
    computed:{
        ...mapGetters([
            'getTransaksi'
        ]),                     
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
            if(item.event == 'created'){                                
                if(this.transaksi.filter(val => val.id == item.id).length == 0){                    
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
                        transaksi: item.transaksi
                    })                                        
                }                
            }

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
