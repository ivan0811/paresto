<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
           <v-card v-bind="card">
               <v-container class="pa-5">
                   <form @submit.prevent="submitHandler">                   
                   <v-row>
                       <v-col cols="6">
                         <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Upload Foto</v-input>
                            </div>
                            <!-- <vue-dropzone
                            ref="myVueDropzone"
                            :useCustomSlot="true"
                            id="dropzone"
                            @vdropzone-upload-progress="uploadProgress"
                            :options="dropzoneOptions"
                            @vdropzone-file-added="fileAdded"
                            @vdropzone-sending-multiple="sendingFiles"
                            @vdropzone-success-multiple="success"
                            ></vue-dropzone> -->
                           </div>          
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Roles</v-input>
                            </div>
                                <v-select
                                dense
                                solo
                                flat
                                background-color="grey lighten-4"           
                                :items="['Admin', 'Pelayan', 'Kasir', 'Koki']"
                                label="Pilih Roles"
                                v-model="form.roles"                                                                                                                    
                                ></v-select>
                           </div>     
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Username</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                                                
                                label="Username"
                                v-model="form.username"
                            ></v-text-field>                            
                           </div>     
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Password</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"      
                                type="password"
                                label="Password"     
                                v-model="form.password"                     
                            ></v-text-field>
                           </div>     
                       </v-col>
                       <v-col cols="6">
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Nama Lengkap</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Nama Lengkap"                 
                                v-model="form.nama"
                            ></v-text-field>
                           </div>                
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Jenis Kelamin</v-input>
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
                                <v-input>No Telp</v-input>
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
                                <v-input>Email</v-input>
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
                                <v-input>Alamat</v-input>
                            </div>                         
                            <v-textarea                                                            
                                flat
                                solo
                                dense
                                label="Alamat"
                                background-color="grey lighten-4"
                                v-model="form.alamat"                                
                            ></v-textarea>
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
                           <v-btn color="primary" type="submit" large>
                               <v-icon>
                                   mdi-save
                               </v-icon>
                                Simpan
                            </v-btn>
                       </div>          
                   </div>    
                   </form>         
               </v-container>               
           </v-card>
        </v-container>
    </v-main>    
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
// import vue2Dropzone from 'vue2-dropzone'
// import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ["card"],
    // components: {
    //     'vue-dropzone': vue2Dropzone
    // },        
    data() {
        return{                          
            form: {
                id : '',
                username: '',
                password: '',                
                nama: '',
                jk: '',
                noTelp : '',
                email: '',
                alamat: '',
                roles: ''
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
        await this.editPegawai(this.$route.params.id)                
        const pegawai = this.getEditPegawai.pegawai[0]
        const user = this.getEditPegawai.user
        this.form.username = user.username
        this.form.nama = user.nama
        this.form.jk = pegawai.jk
        this.form.noTelp = pegawai.no_telp
        this.form.email = user.email
        this.form.alamat = pegawai.alamat
        this.form.roles = user.roles.replace(/\b\w/g, l => l.toUpperCase())
        this.form.id = this.$route.params.id
    },
    methods: {
        ...mapActions([
            'editPegawai',
            'updatePegawai'
        ]),
        closeProfile(){
            this.profile = false
        },
        async submitHandler(){            
            const pegawai = await this.updatePegawai(this.form)            
            if(pegawai){
                this.$router.push({
                    name: 'Pegawai'
                })
            }            
        }
    },
    computed: {
        ...mapGetters([
            'getEditPegawai'
        ])
    }
}
</script>

