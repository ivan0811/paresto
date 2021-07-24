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
                Pembayaran
            </v-card-title>            
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>            
        </div>                         
        <v-sheet class="mb-5 pa-5">
            <div class="text-subheader-1 greyDark--text mb-2">Jumlah harga yang harus dibayar</div>         
            <div class="text-h6 mb-4">Rp 426.000</div>                                 
            <div class="mb-3">
                <v-inputs>Nominal</v-inputs>
            </div>
            <v-text-field                                
                flat
                solo
                dense
                background-color="grey lighten-4"                                                                
                label="Masukkan Nominal"
            ></v-text-field>                                        
        </v-sheet>  

        <v-card-actions class="d-flex">
          <v-spacer></v-spacer>
            <v-btn color="primary" outlined elevation="0" large>
                Batal
            </v-btn>               
            <v-btn color="primary" elevation="0" large>
                Bayar
            </v-btn>           
        </v-card-actions>
        </v-container>        
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default {
    props: ['dialog']    
  }
</script>