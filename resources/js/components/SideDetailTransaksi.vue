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
                <v-alert class="py-1 px-4 rounded-pill text-caption mb-auto" color="success" text dense>Lunas</v-alert>
            </div>            
            <div class="d-flex justify-space-between">
                <div>
                    <p class="text-subtitle-2 text--secondary ma-0">24 April 2021</p>
                    <p class="text-subtitle-2 text--secondary ma-0">20:14 WIB</p>
                </div>                
                <p class="text-subtitle-2 text--secondary ma-0">Meja #34</p>
            </div>
        </v-sheet>
        <v-sheet class="mx-2 mb-3 overflow-y-auto" max-height="180">
            <v-list>
                <v-list-item two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-content class="ms-auto me-3">
                        <v-list-item-title>x4</v-list-item-title>                        
                    </v-list-item-content>                           
                    <v-list-item-content>                        
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                </v-list-item>
                <v-list-item two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-content class="ms-auto me-2">
                        <v-list-item-title>x4</v-list-item-title>                        
                    </v-list-item-content>                           
                    <v-list-item-content>                        
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                </v-list-item>
                <v-list-item two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-content class="ms-auto me-2">
                        <v-list-item-title>x4</v-list-item-title>                        
                    </v-list-item-content>                           
                    <v-list-item-content>                        
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                </v-list-item>
                <v-list-item two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-content class="ms-auto me-2">
                        <v-list-item-title>x4</v-list-item-title>                        
                    </v-list-item-content>                           
                    <v-list-item-content>                        
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                </v-list-item>
                <v-list-item two-line class="pa-0 d-flex justify-space-between">             
                    <v-list-item-avatar rounded>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                    <v-list-item-content class="ms-auto me-2">
                        <v-list-item-title>x4</v-list-item-title>                        
                    </v-list-item-content>                           
                    <v-list-item-content>                        
                        <v-list-item-subtitle>Rp 17000</v-list-item-subtitle>
                    </v-list-item-content>                          
                </v-list-item>
            </v-list>
        </v-sheet>
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
    props: ['drawer'],    
}
</script>