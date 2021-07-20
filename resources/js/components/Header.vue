<template>
<div>
    <v-main app v-if="roles == 'admin'">
          <v-container class="mx-5 mt-5" style="height: 100%">      
              <div class="d-flex" style="height: max-content">
                  <div class="me-2">
                    <v-toolbar-title class="mt-auto mb-3" :class="$route.name == 'Home' ? 'text-h4' : 'text-h5'" >{{header == '' ? ($route.name == 'Home' ? 'Dashboard' : $route.name) : header}}</v-toolbar-title>
                    <v-subheader class="pa-0" style="height: 0" v-if="$route.name != 'Home'" v-text="subheader"></v-subheader>              
                  </div>                  
                  <div class="ms-2 mt-3" v-if="$route.name == 'Transaksi'">
                    <v-select solo dense class="align-self-end">
                    <template v-slot:item="{ item, attrs, on }">
                    <v-list-item
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-list-item-title
                        :id="attrs['aria-labelledby']"
                        v-text="item"
                        ></v-list-item-title>
                    </v-list-item>
                    </template>
                </v-select>
                </div>     
                <div class="ml-auto mr-8">
                    <v-card>
                        <v-container>
                            <div class="d-flex justify-space-between">
                                <div class="d-flex">
                                    <v-avatar rounded color="blue" class="me-3">
                                    </v-avatar>
                                    <div>
                                        <p class="text-subtitle-2 text--secondary ma-0">Saya Admin</p>
                                        <p class="text-subtitle-1 ma-0">Argya</p>
                                    </div>                                    
                                </div>    
                                <div>
                                    <v-icon>
                                        
                                    </v-icon>
                                </div>                            
                            </div>                            
                        </v-container>                        
                    </v-card>
                </div>
              </div>                                                  
      </v-container>
    </v-main>    
      <!-- <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon> -->    
</div>
</template>
<script>
export default {
    props: ['roles'],
    data(){
        return{
            header : '',
            subheader: ''            
        }
    },   
    mounted(){
        this.setSubHeader(this.$route.name)
    },
    methods: {
        setSubHeader(name){            
            this.subheader = name == 'Transaksi' ? 
                 'Kelola Riwayat Transaksi'
                 : name == 'Pegawai' ? 'Kelola Pegawai Paresto' 
                 : name == 'Profile' ? 'Kelola data diri anda'
                 : ''
            this.header = name == 'tambahPegawai' ? 
            'Tambahkan Pegawai Baru' 
            : ''        
        }
    },   
    watch: {
        $route(to, from){
            this.setSubHeader(to.name)      
        }
    }
}
</script>
