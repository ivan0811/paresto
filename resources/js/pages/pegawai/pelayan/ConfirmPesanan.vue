<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="d-flex flex-column px-8" style="min-height: 100%">    
            <div class="mb-auto">
             <v-row class="">                                           
                <v-col cols="12">
                    <p class="text-h5">Meja #25</p>
                    <p class="text-subheader-1 greyDark--text">10 Agustus 2021</p>
                </v-col>                           
                <v-col cols="12">
                    <v-card v-bind="card">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyDark--text my-auto">Nasi Goreng</p>
                            <div class="d-flex justify-space-end">
                                <p class="font-weight-regular my-auto primary--text mx-5">Rp 200000</p>
                                <div class="d-flex mx-5 my-auto">
                                    <v-btn elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-plus</v-icon></v-btn>            
                                    <p class="font-weihgt-regular my-auto mx-5">1</p>
                                    <v-btn elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                </div>                                
                                <v-btn elevation="0" class="pa-0 mx-5 my-auto" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                 <v-btn icon>
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
    <detail-pesanan @close="closeConfirmPesanan" :dialog="dialogConfirmPesanan"></detail-pesanan>
    </div>    
</template>
<script>
import DialogConfirmPesanan from '../../../components/DialogConfirmPesanan.vue'
export default {
    components: {
        'detail-pesanan' : DialogConfirmPesanan
    },
    props: ["card"],
    
    data() {
        return{                       
          dialogConfirmPesanan: false
        }
    },    
    mounted(){
        
    },
    methods: {
      closeConfirmPesanan(){
          this.dialogConfirmPesanan = false
      },

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