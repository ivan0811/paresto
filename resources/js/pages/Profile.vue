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
                                            <v-img :src="'storage/foto/'+getProfile.foto"></v-img>
                                        </v-avatar>                                                              
                                </v-card>                                                             
                            </div>    
                             </v-col>
                             <v-col xl="12" lg="12">
                            <div class="mb-5">
                              <p class="text-h6 text-center">{{getProfile.nama}}</p>
                           </div>     
                           <div class="mb-5">
                               <p class="text-subtitle-2 text--secondary mb-2">Bergabung sejak</p>
                               <p class="ma-0">30 Mei 2019</p>
                           </div>     
                           <div class="mb-3">
                               <p class="text-subtitle-2 text--secondary mb-2">Role</p>
                               <p class="ma-0">{{getProfile.roles}}</p>
                           </div>   
                             </v-col>
                         </v-row>                           
                       </v-col>
                       <v-col lg="6" md="12" sm="12">              
                            <div class="mb-3">
                               <div class="mb-3">
                                   <p class="mb-0">No Telp</p>                                    
                                </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                type="number"
                                label="No Telp"
                                v-model="form.noTelp"
                            ></v-text-field>
                           </div>                
                           <div class="mb-3">
                               <div class="mb-3">
                                   <p class="mb-0">Email</p>                                        
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                v-model="form.email"
                                :rules="[rules.required, rules.email]"
                                label="E-mail"
                            ></v-text-field>
                           </div>                  
                           <div class="mb-3">
                               <div class="mb-3">
                                   <p class="mb-0">Jenis Kelamin</p>
                            </div>
                             <v-radio-group
                                v-model="form.jk"
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
                                    <p class="mb-0">Alamat</p>                                
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Alamat"
                                v-model="form.alamat"
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
                           <v-btn color="primary" @click="saveHandler" large>
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
import { mapGetters, mapActions } from 'vuex'
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
                foto: '',                
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
    async mounted(){
        await this.loadProfile()
        let profile = this.getProfile
        this.form.noTelp = profile.pegawai[0].no_telp
        this.form.email = profile.email
        this.form.jk = profile.pegawai[0].jk
        this.form.alamat = profile.pegawai[0].alamat
    },
    methods: {
        ...mapActions([
            'loadProfile',
            'updateProfile'
        ]),
        closeProfile(){
            this.profile = false
        },
        async saveHandler(){
            await this.updateProfile(this.form)            
        }
    },
    computed: {
        ...mapGetters([
            'getProfile'
        ])
    }
}
</script>

