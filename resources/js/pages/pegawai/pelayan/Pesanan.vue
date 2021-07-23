<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
             <v-row>
                <v-col cols="8">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
                </v-col>
                <v-col cols="4" class="d-flex justify-end">
                    <v-btn color="primary" :to="{name: 'tambahPesanan'}" x-large elevation="0">
                        <v-icon left>mdi-plus</v-icon>
                        Pesanan Baru
                    </v-btn>
                </v-col>               
                <v-col cols="12">
                    <v-card v-bind="card" @click.stop="dialogDetailPesanan = !dialogDetailPesanan">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">01</p>
                            <p class="font-weight-regular my-auto">Meja #34</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>
                            <p class="font-weight-regular my-auto">Rp 460.000</p>
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" color="success" text dense>Lunas</v-alert>
                             <v-menu offset-y>
                                     <template v-slot:activator="{ on, attrs }">
                                         <v-btn class="my-auto" x-small icon>
                                            <v-icon
                                                size="24"
                                                v-bind="attrs"
                                                v-on="on"
                                            >mdi-dots-vertical</v-icon>
                                        </v-btn>
                                    </template>
                                     <v-list>
                                        <v-list-item>
                                            <v-list-item-title>Edit</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item>
                                            <v-list-item-title>Delete</v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                    </v-menu>
                        </div>
                    </v-container>
                </v-card>
                </v-col>
            </v-row>
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
    methods: {
      closeDetailPesanan(){
          this.dialogDetailPesanan = false
      }
    }
}
</script>
