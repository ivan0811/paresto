<template>
<div>
    <v-main app v-if="roles != ''">
          <v-container class="mx-5 mt-2 mb-5" style="height: 100%">      
              <div class="d-flex" style="height: max-content">
                  <div class="me-2" v-if="includesRoles.includes(roles)">
                    <v-toolbar-title class="mt-auto mb-3" :class="$route.name == 'Home' ? 'text-h4' : 'text-h5'" >{{header == '' ? ($route.name == 'Home' ? 'Dashboard' : $route.name) : header}}</v-toolbar-title>
                    <v-subheader class="pa-0" style="height: 0" v-if="roles != 'kasir'" v-text="subheader"></v-subheader>              
                  </div>                  
                  <div v-else>
                      <v-img src="../images/logo_paresto_horizontal.svg" width="130"></v-img>
                  </div>
                  <div class="ms-2 mt-3" v-if="$route.name == 'Transaksi'">
                    <v-select solo dense class="align-self-end">
                    <template v-slot:item="{ item, attrs, on }">
                    <v-list-item
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-list-item-title
                        :id="attrs['aria-labelledby']"
                        v-text="item"                                            
                        ></v-list-item-title>
                    </v-list-item>
                    </template>
                </v-select>
                </div>     
                <div class="ml-auto mr-8" :class="roles == 'kasir' ? 'd-flex justify-space-between' : ''">                    
                    <v-card v-bind="card">                        
                        <v-container>
                            <div class="d-flex justify-space-between" style="width: 185px">
                                <div class="d-flex">
                                    <v-avatar rounded class="me-3" size="36">
                                        <v-img :src="'storage/photo/'+foto"></v-img>
                                    </v-avatar>
                                    <div>
                                        <p style="font-size: 12px" class="text--secondary ma-0">Saya {{roles}}</p>
                                        <p style="font-size: 15px" class=" ma-0">{{username}}</p>
                                    </div>                                    
                                </div>    
                                <div class="my-auto">
                                    <v-menu offset-y>
                                     <template v-slot:activator="{ on, attrs }">
                                         <v-btn v-bind="attrs" v-on="on" class="my-auto" small icon>
                                            <span style="height: 25px" class="icon icon-notification black"></span>
                                        </v-btn>
                                    </template>
                                     <v-list width="372">
                                        <v-list-item>                                            
                                            <v-list-item-content>
                                                <v-list-item-title class="text-h6">Notifikasi</v-list-item-title>
                                            </v-list-item-content>                                            
                                        </v-list-item>
                                       <!--  <v-list-item three-line>
                                              <v-list-item-avatar rounded="">
                                                    <v-img src=""></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title>Edit</v-list-item-title>
                                                    <v-list-item-subtitle>Edit</v-list-item-subtitle>
                                                </v-list-item-content>                                            
                                        </v-list-item>
                                        <v-list-item>
                                            <v-list-item-title>Delete</v-list-item-title>
                                        </v-list-item> -->
                                    </v-list>
                                    </v-menu>
                                </div>                            
                            </div>                            
                        </v-container>                        
                    </v-card>
                    <div class="ms-8" v-if="roles == 'kasir'">
                        <v-btn @click="logout" outlined x-large color="primary">Logout</v-btn>
                    </div>                    
                </div>
              </div>                                                  
      </v-container>
    </v-main>    
      <!-- <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon> -->    
</div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    props: ['roles', 'card', 'username', 'foto'],
    data(){
        return{
            includesRoles: ['admin', 'pelayan', 'koki'],
            header : '',
            subheader: ''            
        }
    },   
    mounted(){
        this.getLocalStorage()         
        this.setSubHeader(this.$route.name)                        
    },
    methods: {
        ...mapActions([
            'removeLocalStorage',
            'setHeader',
            'getLocalStorage',
        ]),
        setSubHeader(name){                               
            this.setHeader({
                role : this.roles,
                page : name
            })                        
            this.header = this.getHeader.title                        

            this.subheader = name == 'Profile' 
                 ? 'Kelola data diri anda'
                 : this.getHeader.subtitle
        },
         logout(){
              const access_token = this.getUser.bearer_token
              axios.post('/api/logout', {}, {
                 headers: {
                    'Authorization': `Bearer ${access_token}`
                }}).then((res) => {                    
                    this.removeLocalStorage()
                    this.$router.push({
                        name: 'Home'
                    })  
                    this.$router.go(0)
                }).catch((err) => {
                    console.error(err)
                });
          }
    },   
    computed: {
        ...mapGetters([
            'getHeader',
            'getUser'
        ])
    },
    watch: {
        $route(to, from){
            this.setSubHeader(to.name)      
        }
    }
}
</script>
