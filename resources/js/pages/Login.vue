<template>
<div>
    <v-container v-show="status">
        <v-row class="mb-6 mt-12">
            <v-col class="d-flex justify-center mb-0">
                <v-avatar
                color="grey"
                rounded
                >
            </v-avatar>
            </v-col>
            <v-col cols="12" class="d-flex justify-center mb-6 mt-0">
                <div class="text-lg-h6">
                    Paresto
                </div>
            </v-col>
        </v-row>
        <div class="d-flex justify-center">
            <v-form @submit.prevent="login">
                <v-row>
                    <v-col
                    cols="12"
                    >
                    <v-text-field
                        :label="formLogin.username ? '' : 'Username'"
                        dense
                        flat
                        solo
                        background-color="grey lighten-4"
                        v-model="formLogin.username"
                    ></v-text-field>
                    </v-col>
                    <v-col
                    cols="12"
                    >
                    <v-text-field
                        :label="formLogin.password ? '' : 'Password'"
                        dense
                        flat
                        solo
                        background-color="grey lighten-4"
                        type="password"
                        v-model="formLogin.password"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-btn plain small>
                    Lupa Password?
                </v-btn>
                <v-row class="mt-2">
                    <v-col cols="12">
                        <v-btn depressed block type="submit" color="secondary">
                            Masuk
                        </v-btn>
                    </v-col>
                </v-row>
            </v-form>
        </div>
    </v-container>
</div>
</template>
<script>
import { mapGetters, mapActions} from 'vuex'
  export default {
      data(){
          return{
              formLogin: {
                username: '',
                password: ''
              },
              status: false
          }
      },
      async mounted(){
          await this.checkLogin()
          if(this.getUser.bearer_token != "" && this.getStatusLogin){
              this.$router.push({
                name: 'Home'
              })
          }else{
              this.removeLocalStorage()
              this.status = true
          }
      },
      methods:{
          ...mapActions([
              "getLocalStorage",
              "setBearer",
              "setRoles",
              "setLocalStorage",
              "checkLogin",
              "removeLocalStorage"
          ]),
          login(){
              axios.post('/api/login', this.formLogin).then((res) => {
                    this.setBearer(res.data.token)
                    this.setRoles(res.data.user.roles)
                    this.setLocalStorage()
                    this.$router.push({
                        name: 'Home'
                    })
              }).catch((err) => {
                console.log(err)
              });
          }
      },
      computed: {
          ...mapGetters([
              "getUser",
              "getStatusLogin"
          ])
      }
  }
</script>
