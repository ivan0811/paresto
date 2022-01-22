<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <!-- <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="red lighten-2"
          dark
          v-bind="attrs"          
          v-on="on"
        >
          Click Me
        </v-btn>
      </template> -->

      <v-card>        
        <v-container>
            <div class="d-flex justify-space-between">
            <v-card-title class="text-h6">
                Detail Pesanan
            </v-card-title>            
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>            
        </div>        
         <v-sheet class="mx-2 mt-2 mb-5">        
            <div class="d-flex justify-space-between">
                <div class="d-flex">
                    <v-avatar rounded="" color="primary">
                        <p class="white--text mb-0">{{detail.no_antrian}}</p>
                    </v-avatar>
                    <div class="ms-3">
                        <p class="text-subtitle-1 ma-0">Meja #{{detail.no_meja}}</p>
                        <p class="text-caption greyDark--text ma-0">24 April 2021</p>
                    </div>                    
                </div>                
                <v-alert class="py-1 px-4 rounded-pill text-caption mb-auto" :color="getAlertStatus(detail.status)" text dense>{{detail.status}}</v-alert>
            </div>                      
        </v-sheet>
        <v-sheet class="mx-2 mb-3 overflow-y-auto" max-height="180">
            <v-list>
                <v-list-item v-for="(item, index) in detail.detail_pesanan" :key="index" two-line class="pa-0 d-flex justify-space-between">
                    <v-list-item-avatar rounded>
                        <v-img src=""></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>{{item.menu.nama}}</v-list-item-title>
                        <v-list-item-subtitle>Rp {{item.menu.harga}}</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-action class="ms-auto me-3">
                        <v-list-item-title>x{{item.jumlah}}</v-list-item-title>                        
                    </v-list-item-action>                           
                    <v-list-item-action>                        
                        <v-list-item-subtitle class="pr-3">Rp {{countHargaPesanan(item)}}</v-list-item-subtitle>
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
                <p class="text-subtitle-2 mb-2">Rp {{countTotalHarga}}</p>
            </div>                         
        </v-sheet>                 

        <v-card-actions class="d-flex">
          <v-spacer></v-spacer>
            <v-btn color="primary" outlined elevation="0" large>
                Edit
            </v-btn>               
            <v-btn color="primary" outlined elevation="0" large>
                Hapus
            </v-btn>           
        </v-card-actions>
        </v-container>        
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default {
    props: ['dialog', 'detail'],
    data(){
        return {
            alertStatus: {
              menunggu: 'blue',
              diproses: 'success',
              habis: 'red',
              selesai: 'orange'
          },
        }
    },
    methods: {
        getAlertStatus(status){
            return this.alertStatus[status]
        },
        countHargaPesanan(item){
            return item.menu.harga * item.jumlah
        },        
    },
    computed: {
        countTotalHarga(){             
            let harga = this.detail.detail_pesanan.map(val => {
                return val.menu.harga * val.jumlah
            })                        
                
            return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
        },
    },
    watch:{
        detail(e){
            console.log(e)
        }
    }    
  }
</script>