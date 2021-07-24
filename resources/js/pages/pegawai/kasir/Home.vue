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
               <v-col cols="12">
                    <v-card v-bind="card" @click.stop="detailTransaksi = !detailTransaksi">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">01</p>
                            <p class="font-weight-regular my-auto">Meja #34</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>                            
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" color="success" text dense>Lunas</v-alert>                            
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
                                    <p class="text-subtitle-1 text--secondary ma-0">Meja #34</p>                                
                                </div>                                
                                <v-alert class="py-1 px-4 rounded-pill my-auto text-caption mb-auto" color="error" text dense>Belum Lunas</v-alert>
                            </div>                                        
                        </v-sheet>
                        <v-sheet class="mb-auto" height="60vh">
                            <v-list class="overflow-y-auto" height="100%">
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                        <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.68.000</v-list-item-subtitle>
                                        </div>                        
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>                               
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
                                        </div>           
                                    </v-list-item-action>                                                                                          
                                </v-list-item>
                                <v-list-item two-line class="pa-0 pe-2">             
                                    <v-list-item-avatar rounded>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>
                                    <v-list-item-content>
                                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>                        
                                    </v-list-item-content>                                                 
                                    <v-list-item-action>                        
                                         <div class="d-flex">
                                            <v-list-item-title class="text-end">x4</v-list-item-title>                                             
                                            <v-list-item-subtitle class="text-end" style="width: 150px">Rp.168.000</v-list-item-subtitle>
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
                                        <p class="text-subtitle-2 mb-2">11</p>
                                    </div>            
                                    <div class="d-flex justify-space-between">
                                        <p class="text-subtitle-2 text--secondary mb-2">Pajak</p>
                                        <p class="text-subtitle-2 mb-2">Rp 26.700</p>
                                    </div>            
                                    <div class="d-flex justify-space-between">
                                        <p class="text-subtitle-2 text--secondary mb-2">Total Harga</p>
                                        <p class="text-subtitle-2 mb-2">Rp 293.700</p>
                                    </div>                         
                                </v-sheet>        
                                <div class="d-flex justify-end">
                                    <v-btn @click.stop="dialogPembayaran = !dialogPembayaran" color="primary" elevation="0" large>
                                        Bayar
                                    </v-btn>               
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
      <dialog-pembayaran @close="closePembayaran" :dialog="dialogPembayaran"></dialog-pembayaran>    
    </v-main>    
</template>

<script>
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
        dialogPembayaran: false
    }),
    methods:{
        closePembayaran(){
            this.dialogPembayaran = false            
        },        
    },
    computed:{

    }
}
</script>
