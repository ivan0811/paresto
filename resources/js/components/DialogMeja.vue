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
                Meja #{{detail.no_meja}}
            </v-card-title>            
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>            
        </div>        

         <v-sheet class="pa-5">            
            <div class="mb-3">
                <div class="text-subheader-1 mb-2">Status Meja</div>
                 <v-select
                    dense
                    solo
                    flat
                    background-color="grey lighten-4"           
                    :items="['dipesan', 'dipakai', 'kosong']"
                    label="Pilih Status Meja"          
                    v-model="form.status"
                    ></v-select>         
            </div>
            <div v-if="form.status == 'dipesan'" class="mb-3">
                <div class="text-subheader-1 mb-2">Atas Nama</div>
                <v-text-field
                   dense
                    solo
                    flat
                    v-model="form.nama"
                    background-color="grey lighten-4"           
                    label="Nama Pelanggan"          
                ></v-text-field>                 
            </div>
        </v-sheet>            

        <v-card-actions class="d-flex">
          <v-spacer></v-spacer>
            <v-btn  @click="$emit('close')" color="primary" outlined elevation="0" large>
                Batal
            </v-btn>               
            <v-btn @click="$emit('save', form)" color="primary" elevation="0" large>
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
    props: ['dialog', 'detail'],    
    data(){
      return {
        form: {
          no_meja: '',
          status: '',
          nama: ''
        }        
      }
    },    
    watch:{
        detail(data){ 
            this.form.no_meja = data.no_meja         
            this.form.status = data.status
            this.form.nama = data.nama            
        }
    }
  }
</script>