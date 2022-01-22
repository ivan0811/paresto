<template>  
    <v-navigation-drawer
      v-model="drawer"      
      fixed      
      right
      floating
      color="transparent"            
      style="width: 500px"      
    >                
    <v-card elevation="1" class="rounded-r ms-3" style="height: 100%; width: 100%">
        <v-container>
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>
        <v-sheet class="mx-2 my-8 mb-2">        
            <div class="d-flex justify-space-between">
                <p class="text-h5">Detail Transaksi</p>
                <v-alert class="py-1 px-4 rounded-pill text-caption mb-auto" :color="getAlertStatus(checkStatus(detail))" text dense>{{checkStatus(detail)}}</v-alert>
            </div>            
            <div class="d-flex justify-space-between">
                <div>
                    <p class="text-subtitle-2 text--secondary ma-0">24 April 2021</p>
                    <p class="text-subtitle-2 text--secondary ma-0">20:14 WIB</p>
                </div>                
                <p class="text-subtitle-2 text--secondary ma-0">Meja #{{addZero(detail.no_meja)}}</p>
            </div>
        </v-sheet>
        <v-sheet class="mx-2 mb-3 overflow-y-auto" max-height="180">
            <v-list>
                <v-list-item v-for="(item, i) in detail.detail_pesanan" :key="i" two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src=""></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>{{item.menu.nama}}</v-list-item-title>
                        <v-list-item-subtitle>Rp {{item.menu.harga}}</v-list-item-subtitle>
                    </v-list-item-content>            
                    <v-list-item-action>                        
                        <v-list-item-title>x{{item.jumlah}}</v-list-item-title>                                                                                                    
                    </v-list-item-action>     
                    <v-list-item-action class="pl-3">
                        <v-list-item-subtitle>Rp {{countHargaPesanan(item)}}</v-list-item-subtitle>
                    </v-list-item-action>                                                               
                </v-list-item>               
            </v-list>
        </v-sheet>
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
                <p class="text-subtitle-2 mb-2">Rp {{total_harga}}</p>
            </div>                         
        </v-sheet>         
        <div class="d-flex justify-end mx-2">
                <v-btn color="primary" outlined elevation="0" large>
                    Hapus
                </v-btn>               
            </div>                
        </v-container>             
    </v-card>    
    </v-navigation-drawer>  
</template>
<script>
export default {        
    props: ['drawer', 'detail'],
    data(){
        return{
            alertStatus: {              
                lunas: 'success',              
                belumLunas: 'red'
            },
            total_harga: 0
        }
    },
    methods: {
         addZero(no_meja){            
            return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
        },
        checkStatus(item){
          return item.transaksi.length > 0 ? 'Lunas' : 'Belum Lunas'
        },
        getAlertStatus(status){            
            return this.alertStatus[status == 'Belum Lunas' ? 'belumLunas' : 'lunas']
        },
        countHargaPesanan(item){
            return item.menu.harga * item.jumlah
        },  
        countTotalHarga(detail){             
            let harga = detail.detail_pesanan.map(val => {
                return val.menu.harga * val.jumlah
            })                        
                
            return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
        },
    },    
    watch:{
      detail(item){
        this.total_harga = this.countTotalHarga(item)        
      }      
    } 
}
</script>