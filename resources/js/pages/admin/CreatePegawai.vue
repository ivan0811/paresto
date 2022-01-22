<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
           <v-card v-bind="card">
               <v-container class="pa-5">
                   <form @submit.prevent="submitHandler" enctype="multipart/form-data">                   
                   <v-row>
                       <v-col cols="6">
                         <div class="mb-3">
                               <div class="mb-3">
                                <p class="mb-0">Upload Foto</p>
                            </div>         
                             <!-- <input type="file" v-on:change="uploadImage">                  -->
                            <vue-dropzone
                            ref="myVueDropzone"
                            :useCustomSlot="true"
                            :include-styling="false"
                            id="dropzone"
                            @vdropzone-upload-progress="uploadProgress"
                            :options="dropzoneOptions"
                            @vdropzone-file-added="fileAdded"
                            @vdropzone-sending-multiple="sendingFiles"
                            @vdropzone-success-multiple="success"                                            
                            >
                            <v-sheet color="text-center grey lighten-4 rounded-lg d-flex flex-column custom-border-dropzone" height="200px">                                
                                <div v-if="tempAttachments.length == 0" class="my-auto">
                                    <span class="mb-2 icon icon-coolicon blue" style="height: 40px"></span>
                                    <p class="mb-0 greyPrimary--text text-subtitle-2">Drag & Drop gambarnya disini</p>                                
                                    <p class="mb-0 greyPrimary--text text-subtitle-2">atau</p>
                                <p class="mb-0 greyPrimary--text text-subtitle-2">klik untuk upload</p>
                                </div>     
                                <div v-else class="my-auto">                                    
                                    <v-sheet v-if="tempAttachments.progress < 100" class="rounded-lg mx-auto text-center">
                                        <v-progress-circular
                                            :rotate="360"
                                            :size="100"
                                            :width="15"
                                            :value="tempAttachments.progress"
                                            color="blue"
                                            >
                                            {{tempAttachments.progress}}
                                            </v-progress-circular>
                                    </v-sheet>                                                                                                                           
                                    <v-card v-else class="mx-auto rounded-lg" width="150" color="transparent" elevation="0">                                                                  
                                        <v-btn @click="removeFile" color="blue" elevation="0" fab absolute right x-small top style="margin-right: -30px">
                                            <span class="icon icon-bin icon-16 white"></span>
                                        </v-btn>                        
                                            <v-avatar class="rounded-lg" width="150" height="150">
                                            <v-img :src="tempAttachments[0].thumb"></v-img>
                                        </v-avatar>                                                              
                                </v-card>                                                                    
                                </div>     
                            </v-sheet>                                
                            </vue-dropzone>
                           </div>          
                           <div class="mb-3">
                               <div class="mb-3">
                                <p class="mb-0">Roles</p>
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
                                <p class="mb-0">Username</p>
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
                                <p class="mb-0">Password</p>
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
                                <p class="mb-0">Nama Lengkap</p>
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
                                <p class="mb-0">Alamat</p>
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
                nama: '',
                jk: '',
                noTelp : '',
                email: '',
                alamat: '',
                roles: '',
                photo: {}
            },
           dropzoneOptions: {
                url: `https://httpbin.org/post`,
                addRemoveLinks: true,
                maxFiles: 1,
                includeStyling: false,
                previewsContainer: false,                                
            },
            tempAttachments: [],
            attachments: [],
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
        ...mapActions([
            'postPegawai'
        ]),
        closeProfile(){
            this.profile = false
        },
        uploadImage(e){
            this.form.photo = e.target.files[0]
        },
        async submitHandler(){     
            const formData = new FormData()
             formData.append("photo", this.form.photo);                   
             formData.append("username", this.form.username);                   
             formData.append("password", this.form.password);            
             formData.append("nama", this.form.nama);            
             formData.append("jk", this.form.jk);            
             formData.append("noTelp", this.form.noTelp);            
             formData.append("email", this.form.email);    
             formData.append("alamat", this.form.alamat);    
             formData.append("roles", this.form.roles);                 
            const pegawai = await this.postPegawai(formData)            
            if(pegawai){
                this.$router.push({
                    name: 'Pegawai'
                })
            }
            console.log(pegawai)            
        },
        uploadProgress(file, progress, bytesSent) {
            console.log("File Upload Progress", progress);
            this.tempAttachments.map(attachment => {
                if (attachment.title === file.name) {
                attachment.progress = `${Math.floor(progress)}`;
                }
            });
            this.tempAttachments[0].thumb = file['dataURL']                  
            this.form.photo = file              
        },
        sendingFiles(files, xhr, formData) {
            console.log(
                "if you want to change the upload time or add data to the formData you can do it here."
            );
            console.log("Files sending", files);
        },
         fileAdded(file) {
            console.log("File Dropped => ", file);                        
            // Construct your file object to render in the UI
            let attachment = {};
            attachment._id = file.upload.uuid;
            attachment.title = file.name;
            attachment.type = "file";
            attachment.extension = "." + file.type.split("/")[1];
            attachment.user = JSON.parse(localStorage.getItem("user"));
            attachment.content = "File Upload by Select or Drop";
            attachment.thumb = file.dataURL;
            attachment.thumb_list = file.dataURL;
            attachment.isLoading = true;
            attachment.progress = null;
            attachment.size = file.size;            
            this.tempAttachments = [...this.tempAttachments, attachment];
        },
        success(file, response) {
            console.log("File uploaded successfully");
            console.log("Response is ->", response);            
        },
        removeFile(){
            this.tempAttachments = []
            this.$ref["myVueDropzone"].classList.remove("dz-max-files-reached")
        }
    },
    computed: {
        ...mapGetters([
            
        ])
    }
}
</script>
<style >
    .v-application div.v-sheet.custom-border-dropzone{
        background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='8' ry='8' stroke='%235A95CCFF' stroke-width='4' stroke-dasharray='13%2c 16' stroke-dashoffset='7' stroke-linecap='square'/%3e%3c/svg%3e");
        border-radius: 8px;
    }    
        
</style>

