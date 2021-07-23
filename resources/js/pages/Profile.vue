<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
           <v-card v-bind="card">
               <v-container class="pa-8">
                   <v-row>
                       <v-col lg="6" md="12" sm="12">
                         <v-row>
                             <v-col xl="12" lg="12">
                                <div class="mb-3">              
                                <v-card class="mx-auto" width="200" color="transparent" elevation="0">                                                                  
                                        <v-btn color="primary" elevation="0" fab absolute right small top style="margin-right: -30px">
                                        </v-btn>                        
                                            <v-avatar rounded width="200" height="200">                                             
                                            <v-img src="https://picsum.photos/id/11/500/300"></v-img>
                                        </v-avatar>                                                              
                                </v-card>                                                             
                            </div>    
                             </v-col>
                             <v-col xl="12" lg="12">
                            <div class="mb-5">
                              <p class="text-h6 text-center">Argya</p>
                           </div>     
                           <div class="mb-5">
                               <p class="text-subtitle-2 text--secondary mb-2">Bergabung sejak</p>
                               <p class="ma-0">30 Mei 2019</p>
                           </div>     
                           <div class="mb-3">
                               <p class="text-subtitle-2 text--secondary mb-2">Role</p>
                               <p class="ma-0">Admin</p>
                           </div>   
                             </v-col>
                         </v-row>                           
                       </v-col>
                       <v-col lg="6" md="12" sm="12">              
                            <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>No Telp</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                type="number"
                                label="No Telp"
                            ></v-text-field>
                           </div>                
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Email</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                v-model="email"
                                :rules="[rules.required, rules.email]"
                                label="E-mail"
                            ></v-text-field>
                           </div>                  
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Jenis Kelamin</v-inputs>
                            </div>
                             <v-radio-group
                                v-model="jk"
                                row     
                                class="ma-0"                                     
                                >
                                <v-radio
                                    label="Laki-laki"
                                    value="L"
                                    color="secondary"                                    
                                ></v-radio>
                                <v-radio
                                    label="Perempuan"
                                    value="P"
                                    color="secondary"                                                                        
                                ></v-radio>
                                </v-radio-group>
                           </div>                                                
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Alamat</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Alamat"
                            ></v-text-field>
                           </div>           
                       </v-col>
                   </v-row>       
                   <div class="d-flex justify-end">
                       <div class="mx-2">
                           <v-btn outlined color="primary" large>
                                Batalkan
                            </v-btn>
                       </div>          
                        <div class="mx-2">
                           <v-btn color="primary" large>
                               <v-icon>
                                   mdi-save
                               </v-icon>
                                Simpan
                            </v-btn>
                       </div>          
                   </div>             
               </v-container>               
           </v-card>
        </v-container>
    </v-main>    
    </div>    
</template>
<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ["card"],
    components: {
        'vue-dropzone': vue2Dropzone
    },
    data() {
        return{                       
            form: {
                username: '',
                password: '',
                foto: '',
                nama: '',
                jk: '',
                noTelp : '',
                email: '',
                alamat: ''
            },
            rules: {
                required: value => !!value || 'Required.',
                counter: value => value.length <= 20 || 'Max 20 characters',
                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                },
            }
        }
    },    
    methods: {
        closeProfile(){
            this.profile = false
        }
    }
}
</script>

