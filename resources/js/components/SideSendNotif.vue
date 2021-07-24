<template>  
    <v-navigation-drawer
      v-model="drawer"      
      fixed      
      right
      floating
      color="transparent"            
      style="width: 500px"      
      height="1000vh"
    >                
    <v-card elevation="1" class="rounded-r ms-3" style="height: 100%; width: 100%">
        <v-container class="d-flex flex-column" style="height: 100vh">
        <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2 me-auto" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>
        <v-sheet class="mx-2 my-8 mb-6">        
            <div class="d-flex justify-space-between">
                <p class="text-h6 mb-2">Beritahu Pelayan</p>
                <v-alert class="py-1 px-4 rounded-pill text-caption mb-auto" color="error" text dense>Stock Habis</v-alert>
            </div>            
            <div class="d-flex justify-space-between">
                <div>
                    <p class="text-subtitle-2 text--secondary ma-0">Ivan Faathirza</p>                    
                </div>                
                <p class="text-subtitle-2 text--secondary ma-0">Meja #34</p>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
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
                            <v-list-item-title class="me-2">x4</v-list-item-title>                                             
                            <v-checkbox                                                
                            ></v-checkbox>
                        </div>                        
                    </v-list-item-action>                                                                                          
                </v-list-item>
                
            </v-list>
        </v-sheet>             
        <div class="d-flex justify-end mx-2 mt-auto">
                <v-btn color="primary" elevation="0" large>
                    Kirim Ke Pelayan
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