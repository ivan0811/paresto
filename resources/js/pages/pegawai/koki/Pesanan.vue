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
                    <v-alert v-bind="attrs" v-on="on" :style="customStyleAlert" class="me-2 py-1 px-4 text-subheader-1 mb-auto" dense>                        
                            Total Pesanan 4                                                                                                                                   
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
                             <v-card v-bind="card" width="max-content" class="me-8">                                      
                                <v-container class="pa-5" style="width: 300px">                                                                                               
                                         <div class="d-flex justify-space-between">
                                            <div class="d-flex">
                                                <v-avatar rounded="" color="primary"></v-avatar>
                                                <div class="ms-3">
                                                    <p class="text-subtitle-1 ma-0">Meja #34</p>
                                                    <p class="text-caption greyDark--text ma-0">Oleh Ivan</p>
                                                </div>            
                                                                                                
                                            </div>                
                                            <v-menu offset-y>                                            
                                                <template v-slot:activator="{on, attrs}">   
                                                    <v-alert v-bind="attrs" v-on="on" class="py-1 px-4 rounded-pill text-caption mb-auto" color="success" text dense>
                                                        <v-row>
                                                            <v-col>Diproses</v-col>
                                                            <v-col></v-col>
                                                        </v-row>                                                                                     
                                                    </v-alert>
                                                </template>
                                                  <v-list>
                                                    <v-list-item>
                                                        <v-alert class="py-1 px-4 rounded-pill text-caption mb-0" color="success" text dense>                                                               
                                                            Diproses                                                                                  
                                                        </v-alert>
                                                    </v-list-item>
                                                    <v-list-item @click="stockHabis()">
                                                        <v-alert class="py-1 px-4 rounded-pill text-caption mb-0" color="error" text dense>                                                               
                                                            Ditahan, Stock Habis                                                                     
                                                        </v-alert>
                                                    </v-list-item>
                                                </v-list>
                                            </v-menu>                                            
                                        </div>    
                                        <div class="overflow-y-auto my-8" style="height: 240px">                                            
                                            <div class="d-flex justify-space-between">
                                                <div>
                                                    <p class="text-subheader-1 mb-0">Nasi Goreng Spesial</p>
                                                    <p class="text-caption greyDark--text mb-0">Tidak pakai sambel</p>
                                                </div>           
                                                <p class="my-auto text-subheader-1">x4</p>
                                            </div>
                                        </div>   
                                        <div class="d-flex">
                                            <v-spacer></v-spacer>
                                            <v-btn color="primary" large>Tandai Selesai</v-btn>                                     
                                        </div>                                        
                                </v-container>
                            </v-card>
                            <v-card v-bind="card" width="max-content" class="me-8">                            
                                <v-container class="py-2 px-5">                       
                                    <v-list>
                                        <v-list>
                                            <v-list-item two-line>
                                                <v-list-item-content>
                                                    <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>                                           
                                                    <v-list-item-subtitle>Tidak pakai sambel</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>
                                    </v-list>                        
                                </v-container>
                            </v-card>
                            <v-card v-bind="card" width="max-content" class="me-8">                            
                                <v-container class="py-2 px-5">                       
                                    <v-list>
                                        <v-list>
                                            <v-list-item two-line>
                                                <v-list-item-content>
                                                    <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>                                           
                                                    <v-list-item-subtitle>Tidak pakai sambel</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>
                                    </v-list>                        
                                </v-container>
                            </v-card>
                            <v-card v-bind="card" width="max-content" class="me-8">                            
                                <v-container class="py-2 px-5">                       
                                    <v-list>
                                        <v-list>
                                            <v-list-item two-line>
                                                <v-list-item-content>
                                                    <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>                                           
                                                    <v-list-item-subtitle>Tidak pakai sambel</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>
                                    </v-list>                        
                                </v-container>
                            </v-card>
                            <v-card v-bind="card" width="max-content" class="me-8">                            
                                <v-container class="py-2 px-5">                       
                                    <v-list>
                                        <v-list>
                                            <v-list-item two-line>
                                                <v-list-item-content>
                                                    <v-list-item-title>Nasi Goreng Spesial</v-list-item-title>                                           
                                                    <v-list-item-subtitle>Tidak pakai sambel</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>
                                    </v-list>                        
                                </v-container>
                            </v-card>           
                            </div>                                                                                                       
                </v-col>
            </v-row>
        </v-container>
    </v-main>        
    <send-notif @close="closeSideSendNotif" :drawer="sideSendNotif"></send-notif>
    </div>    
</template>
<script>
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
          }
        }
    },    
    methods: {
      closeSideSendNotif(){
          this.sideSendNotif = false
      },
      stockHabis(){
          this.sideSendNotif = true
      }
    }
}
</script>
<style scoped>
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