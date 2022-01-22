<template>
    <v-navigation-drawer
      app
      permanent
      floating
      color="white"            
      :mini-variant.sync="mini"
    >
    <v-sheet v-if="roles == 'pelayan'" :class="mini ? 'mx-auto' : 'ml-auto mr-5'" class="mt-5 " width="max-content">
        <v-btn @click="mini = !mini" icon>
            <span class="icon icon-menu icon-24 black"></span>
        </v-btn>
    </v-sheet>    
        <v-sheet class="pt-16 pb-8" v-if="!mini">
        <div
            class="pb-4 mx-auto"
            style="width: max-content"
        >
            <v-img src="../storage/img/logo_paresto.svg" max-width="59"></v-img>
        </div>
      </v-sheet>

      <v-list :class="mini ? 'mt-5' : ''" flat class="mx-auto" width="200">
          <v-list-item-group color="primary">
              <v-list-item link class="pe-0" :to="nav.path" v-for="(nav, i) in listNav" :key="i">
            <v-list-item-icon class="me-5">
                <span class="icon icon-24" :class="nav.icon + ' ' + ($route.name == nav.name || nav.sub.includes($route.name) ? 'active' : 'grey-dark')"></span>
            </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>
                    {{nav.title}}
            </v-list-item-title>
          </v-list-item-content>

          <v-list-item-icon class="mx-0" v-show="$route.name == nav.name || nav.sub.includes($route.name)">
                <span class="icon icon-24 icon-chevron-right active"></span>
            </v-list-item-icon>
        </v-list-item>

          </v-list-item-group>

      </v-list>


      <template v-slot:append>
         <v-list class="mx-auto" width="200">
             <v-list-item
             link
             :to="'profile/'+username"
            >
            <v-list-item-icon>
                <span class="icon icon-24 icon-user" :class="$route.name == 'Profile' ? 'active' : 'grey-dark'"></span>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Profil</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item
                link
                @click.prevent="logout()"
            >
                <v-list-item-icon>
                    <span class="icon icon-24 icon-logout" :class="$route.name == 'profile' ? 'logout' : 'grey-dark'"></span>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Keluar</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
      </v-list>
      </template>
    </v-navigation-drawer>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
  export default {
      props: ['roles', 'username'],
      data(){
          return{
              listNav: [],
              mini: this.roles == 'pelayan'
          }
      },
      mounted(){
          this.getLocalStorage()          
          this.setListNav(this.roles)        
          this.listNav = this.getListNav               
      },
      methods:{
          ...mapActions([
              'removeLocalStorage',
              'getLocalStorage',
              'setListNav'
          ]),
          logout(){
              const access_token = this.getUser.bearer_token
              axios.post('/api/logout', {}, {
                 headers: {
                    'Authorization': `Bearer ${access_token}`
                }}).then((res) => {                    
                    this.removeLocalStorage()
                    this.$router.push({
                        name: 'Login'
                    })  
                    this.$router.go(0)
                }).catch((err) => {
                    console.error(err)
                });
          }
      },
      computed:{
          ...mapGetters([
              'getUser',           
              'getListNav'   
          ])
      }
  }
</script>
