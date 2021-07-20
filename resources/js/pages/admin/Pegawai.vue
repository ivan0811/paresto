<template>
    <div>        
        <side-profile @close="closeProfile" :drawer="profile"></side-profile>
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

                 <v-col cols="4">
                    <v-card v-bind="card">
                        <v-list two-line>
                            <v-list-item>
                                <v-list-item-avatar rounded color="blue">
                                    <v-img></v-img>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title v-html="'Argya Aulia'" class="mb-2"></v-list-item-title>
                                    <v-list-item-subtitle v-html="'Admin'"></v-list-item-subtitle>
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
                                        <v-list-item>
                                            <v-list-item-title>Edit</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item>
                                            <v-list-item-title>Delete</v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                    </v-menu>
                                </v-list-item-action>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-col>

                <v-col cols="4">
                    <v-card v-bind="card" @click.stop="profile = !profile">
                        <v-list two-line>
                            <v-list-item>
                                <v-list-item-avatar rounded color="blue">
                                    <v-img></v-img>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title v-html="'Argya Aulia'" class="mb-2"></v-list-item-title>
                                    <v-list-item-subtitle v-html="'Admin'"></v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-action class="mt-0">
                                    <v-btn icon>
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </v-list-item-action>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-col>

                <v-col cols="4">
                    <v-card v-bind="card">
                        <v-list two-line>
                            <v-list-item>
                                <v-list-item-avatar rounded color="blue">
                                    <v-img></v-img>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title v-html="'Argya Aulia'" class="mb-2"></v-list-item-title>
                                    <v-list-item-subtitle v-html="'Admin'"></v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-action class="mt-0">
                                    <v-btn icon>
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
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
export default {
    components: {'side-profile' : sideProfile},
    props: ["card"],
    data() {
        return{            
            profile: false
        }
    },    
    methods: {
        closeProfile(){
            this.profile = false
        }
    }
}
</script>

