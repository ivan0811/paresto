<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="d-flex flex-column px-8" style="min-height: 100%">            
            <div class="mb-auto">
             <v-row>                            
                <v-col cols="12">
                    <div class="d-flex justify-start">                        
                        <v-card class="me-8 text-center" color="active" outlined v-bind="card" width="90" height="90">                                                                                                
                            <v-badge class="custom-badge" color="brownDarker" content="6"></v-badge>
                            <v-container class="pt-0" style="margin-top: -5px">                                                                
                                <span class="icon white icon-cocktail icon-32"></span>                                                                    
                                <p class="text-caption white--text">Makanan</p>                            
                            </v-container>                                
                        </v-card>                     
                        
                        <v-card class="me-8 text-center" outlined v-bind="card" width="90" height="90">                                                                    
                            <v-badge class="custom-badge" color="brownDarker" content="6"></v-badge>
                            <v-container class="pt-0" style="margin-top: -5px">
                                <span class="icon blue icon-cocktail icon-32"></span>                                                                    
                                <p class="text-caption">Minuman</p>                            
                            </v-container>                                
                        </v-card>      

                        <v-card class="me-8 text-center" outlined v-bind="card" width="90" height="90">                                                                    
                            <v-badge class="custom-badge" color="brownDarker" content="1"></v-badge>
                            <v-container class="pt-0"  style="margin-top: -5px">
                                <span class="icon blue icon-nuggets icon-32"></span>                                                                    
                                <p class="text-caption">Cemilan</p>                            
                            </v-container>                                
                        </v-card>                                                       
                    </div>
                </v-col>  
                <v-col cols="12">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
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
                                 <v-checkbox
                                    class="mt-0 ms-5 custom-checkbox my-auto"                                                                        
                                    color="blue"
                                    v-model="checkbox"                                                                                               
                                ></v-checkbox>
                            </div>                                                        
                        </div>
                    </v-container>
                </v-card>
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
    <detail-pesanan @close="closeDetailPesanan" :dialog="dialogDetailPesanan"></detail-pesanan>
    </div>    
</template>
<script>
import DialogDetailPesanan from '../../../components/DialogDetailPesanan.vue'
export default {
    components: {
        'detail-pesanan' : DialogDetailPesanan
    },
    props: ["card"],
    
    data() {
        return{                       
          dialogDetailPesanan: false
        }
    },    
    mounted(){
        
    },
    methods: {
      closeDetailPesanan(){
          this.dialogDetailPesanan = false
      },

    }
}
</script>
<style>
.custom-checkbox .v-input__control .v-messages{
    min-height: 0;
    min-width: 0;
}

.custom-checkbox .v-input__control .v-input__slot{
    margin: 0;
}

.custom-tabs .v-item-group .v-slide-group__wrapper .v-slide-group__content .v-tabs-slider-wrapper{
    width: 0;
    height: 0;
}

.custom-badge{
    position: absolute;
    right: -30px;
    top: 0px;     
}

.custom-badge .v-badge__wrapper .v-badge__badge{
    width: 30px;
    height: 30px;
    border-radius: 60px;
    font-size: 16px;    
    padding: 8px;
}

</style>