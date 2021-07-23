<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>        
        <v-container>
            <div class="d-flex justify-space-between">
            <v-card-title class="text-h6">
                Bentar Dulu
            </v-card-title>            
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>            
        </div>        

        <v-card-text>
            Apakah anda yakin pesanan sudah benar?
        </v-card-text>             

        <v-card-actions class="d-flex">
          <v-spacer></v-spacer>
            <v-btn  @click="$emit('close')" color="primary" outlined elevation="0" large>
                Batal
            </v-btn>               
            <v-btn color="primary" elevation="0" large>
                Simpan
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