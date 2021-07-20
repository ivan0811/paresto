<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
           <v-card v-bind="card">
               <v-container class="pa-5">
                   <v-row>
                       <v-col cols="6">
                         <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Upload Foto</v-inputs>
                            </div>
                            <vue-dropzone
                            ref="myVueDropzone"
                            :useCustomSlot="true"
                            id="dropzone"
                            @vdropzone-upload-progress="uploadProgress"
                            :options="dropzoneOptions"
                            @vdropzone-file-added="fileAdded"
                            @vdropzone-sending-multiple="sendingFiles"
                            @vdropzone-success-multiple="success"
                            ></vue-dropzone>
                           </div>          
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Roles</v-inputs>
                            </div>
                                <v-select
                                dense
                                solo
                                flat
                                background-color="grey lighten-4"           
                                :items="['Admin', 'Pelayan', 'Kasir', 'Koki']"
                                label="Pilih Roles"
                                ></v-select>
                           </div>     
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Username</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                                                
                                label="Username"
                            ></v-text-field>                            
                           </div>     
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Password</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"      
                                type="password"
                                label="Password"                          
                            ></v-text-field>
                           </div>     
                       </v-col>
                       <v-col cols="6">
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-inputs>Nama Lengkap</v-inputs>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Nama Lengkap"                 
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

