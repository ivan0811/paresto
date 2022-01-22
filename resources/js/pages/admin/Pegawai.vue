<template>
    <div>        
        <side-profile @close="closeProfile" :detail="detail" :drawer="profile"></side-profile>
        <v-main style="min-height: 100vh">        
        <v-container class="pa-8">
            <v-row>
                <v-col cols="8">
                    <v-text-field
                        solo
                        label="Search"
                        flat
                    ></v-text-field>
                </v-col>
                <v-col cols="4" class="d-flex justify-end">
                    <v-btn color="primary" :to="{name: 'tambahPegawai'}" x-large elevation="0">
                        <v-icon left>mdi-plus</v-icon>
                        Pegawai Baru
                    </v-btn>
                </v-col>
                <v-col cols="12">
                    <div class="d-flex">
                        <v-btn
                            text
                            color="primary"
                        >Semua Role</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Admin</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Koki</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Kasir</v-btn>
                        <v-btn
                            text
                            color="secondary"
                        >Pelayan</v-btn>
                    </div>
                </v-col>

                 <v-col cols="4" v-for="(item, index) in pegawai" :key="index">
                    <v-card v-bind="card" @click.stop="setDetail(item)">
                        <v-list two-line>
                            <v-list-item>
                                <v-list-item-avatar rounded>
                                    <v-img :src="'storage/photo/'+item.user.foto"></v-img>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title v-html="item.user.nama" class="mb-2"></v-list-item-title>
                                    <v-list-item-subtitle v-html="item.user.roles"></v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-action class="mt-0">
                                    <v-menu offset-y>
                                     <template v-slot:activator="{ on, attrs }">
                                         <v-btn icon>
                                            <v-icon
                                                v-bind="attrs"
                                                v-on="on"
                                            >mdi-dots-vertical</v-icon>
                                        </v-btn>
                                    </template>
                                     <v-list>
                                        <v-list-item :to="{name: 'editPegawai', params: {id : item.user.id}}">
                                            <v-list-item-title>Edit</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item @click="handleDelete(item.user.id)">
                                            <v-list-item-title>Delete</v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                    </v-menu>
                                </v-list-item-action>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-col>             
            </v-row>
        </v-container>
    </v-main>    
    </div>    
</template>
<script>
import sideProfile from '../../components/SideProfile.vue';
import { mapGetters, mapActions } from "vuex";
export default {
    components: {'side-profile' : sideProfile},
    props: ["card"],
    data() {
        return{            
            profile: false,
            pegawai: [],
            detail: {}            
        }
    },    
    async mounted() {
        await this.loadPegawai()              
        this.pegawai = this.getPegawai        
        console.log(this.pegawai)
    },
    methods: {
        ...mapActions([
            'loadPegawai',
            'deletePegawai'            
        ]),
        closeProfile(){
            this.profile = false
        },
        setDetail(item){            
            this.profile = !this.profile
            const user = item.user            
            this.detail = {
                'nama' : user.nama,
                'role' : user.roles,
                'no_telp' : item.no_telp,
                'jk' : item.jk == 'L' ? 'Laki-laki' : 'Perempuan',
                'alamat' : item.alamat
            }
        },
        async handleDelete(id){
            const pegawai = await this.deletePegawai(id)            
            if(pegawai){
                this.pegawai = this.getPegawai
            }
            console.log(pegawai)
        }                 
    },
    computed: {
        ...mapGetters([
            'getPegawai'
        ])
    }
}
</script>

