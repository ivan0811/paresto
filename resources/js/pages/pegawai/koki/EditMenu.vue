<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
           <v-card v-bind="card">
               <v-container class="pa-5">
                   <form @submit.prevent="submitHandler">
                   <v-row>
                       <v-col cols="6">
                         <!-- <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Upload Foto</v-input>
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
                           </div>           -->
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Jenis</v-input>
                            </div>
                                <v-select
                                dense
                                solo
                                flat
                                background-color="grey lighten-4"           
                                :items="kategori"
                                label="Pilih Jenis"
                                item-text="state"
                                item-value="id"
                                 v-model="handlerKategori"
                                return-object
                                ></v-select>
                           </div>                             
                       </v-col>
                       <v-col cols="6">
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Nama Menu</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Nama Menu"     
                                v-model="form.nama"            
                            ></v-text-field>
                           </div>                
                           <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Harga</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Harga"            
                                type="number"             
                                v-model="form.harga"                        
                            ></v-text-field>
                           </div>                                                                                                            
                           <!-- <div class="mb-3">
                               <div class="mb-3">
                                <v-input>Deskripsi</v-input>
                            </div>
                            <v-text-field                                
                                flat
                                solo
                                dense
                                background-color="grey lighten-4"                                
                                label="Deskripsi"
                            ></v-text-field>
                           </div>            -->
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
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ["card"],
    // components: {
    //     'vue-dropzone': vue2Dropzone
    // },
    data() {
        return{    
            handlerKategori: '',
            form: {
                id: '',
                kategori: '',                
                nama: '',
                harga: ''
            },
            rules: {
                required: value => !!value || 'Required.',
                counter: value => value.length <= 20 || 'Max 20 characters',                
            },
            kategori: []            
        }
    },    
    async mounted(){
        await this.loadKategori()        
        this.getKategori.forEach(item => {
            this.kategori.push({
                'state' : item.nama.replace(/\b\w/g, l => l.toUpperCase()),
                'id' : item.id
            })
        });    
        await this.editMenu(this.$route.params.id)                       
        const menu = this.getEditMenu
        this.form.id = menu.id
        this.handlerKategori = this.kategori.filter(k => k.id == menu.kategori_id)[0]                
        this.form.kategori = menu.kategori_id
        this.form.nama = menu.nama
        this.form.harga = menu.harga
    },
    methods: {
        ...mapActions([
            'loadKategori',
            'editMenu',
            'updateMenu'
        ]),
        closeProfile(){
            this.profile = false
        },
        async submitHandler(){
            const status = await this.updateMenu(this.form)
            if(status) this.$router.push({'name' : 'Menu'})
        }        
    },
    computed: {
        ...mapGetters([
            'getKategori',
            'getEditMenu'
        ])
    },
    watch: {
        handlerKategori(data){
            this.form.kategori = data.id
        }
    } 
}
</script>

