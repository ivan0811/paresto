<template>
    <v-navigation-drawer
      app
      permanent
      floating
    >
        <v-sheet class="pt-16 pb-8">
        <div
            class="pb-4 mx-auto"
            style="width: max-content"
        >
            <v-avatar
                color="grey"
                rounded
                >
            </v-avatar>
        </div>

        <div class="text-lg-h6 text-center">
            Paresto
        </div>
      </v-sheet>

      <v-list class="mx-8">
          <v-list-item-group color="primary">
              <v-list-item
          link
        >
            <v-list-item-icon>
            <v-icon></v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>
                    Dashboard
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item
          link
        >
            <v-list-item-icon>
            <v-icon></v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>
                    Transaksi
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>


      <v-list-item
          link
        >
            <v-list-item-icon>
            <v-icon></v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>
                    Pegawai
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
          </v-list-item-group>

      </v-list>


      <template v-slot:append>
         <v-list class="mx-8">
             <v-list-item
             link
            >
            <v-list-item-icon>
                <v-icon></v-icon>
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
                    <v-icon></v-icon>
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
      data(){
          return{

          }
      },
      mounted(){
          this.getLocalStorage()
      },
      methods:{
          ...mapActions([
              'removeLocalStorage',
              'getLocalStorage'
          ]),
          logout(){
              const access_token = this.getUser.bearer_token
              axios.post('/api/logout', {}, {
                 headers: {
                    'Authorization': `Bearer ${access_token}`
                }}).then((res) => {
                    console.log(res)
                    this.removeLocalStorage()
                    this.$router.go(0)
                }).catch((err) => {
                    console.error(err)
                });
          }
      },
      computed:{
          ...mapGetters([
              'getUser'
          ])
      }
  }
</script>
