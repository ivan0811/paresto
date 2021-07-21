<template>
<div class="background-gray" style="min-height: 100vh">
    <v-container style="height: 100%" v-show="status">
        <v-row style="height: 100%">
            <v-col align-self="center">
                <v-card class="mx-auto my-auto" style="width: max-content">
                    <div class="mx-12">
                        <div class="py-12">
                        <v-row class="mb-12">
                            <v-col class="d-flex justify-center mb-0">
                                <v-img src="../storage/img/logo_paresto.svg" max-width="100"></v-img>
                            </v-col>
                        </v-row>
                        <div class="d-flex justify-center mb-5">
                            <v-form @submit.prevent="login">
                                <v-row>
                                    <v-col
                                    cols="12"
                                    >
                                    <div class="mb-3">
                                        <v-inputs>Username</v-inputs>
                                    </div>
                                    <v-text-field
                                        :label="autoFilled ? 'Username' : ''"
                                        flat
                                        solo
                                        background-color="grey lighten-4"
                                        v-model="formLogin.username"
                                    ></v-text-field>
                                    </v-col>
                                    <v-col
                                    cols="12"
                                    >
                                    <div class="mb-3">
                                        <v-inputs>Password</v-inputs>
                                    </div>
                                    <v-text-field
                                        :label="autoFilled ? 'Password' : ''"
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
                                        <v-btn depressed block type="submit" color="primary" large>
                                            Masuk
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </div>
                    </div>
                        </div>
                </v-card>
                </v-col>
        </v-row>
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
              status: false,
              autoFilled: false
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
          console.log(this.formLogin.username.length);
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
                    this.$router.go(0)     
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
      },
      watch:{
          'formLogin.password'(){
              this.autoFilled = true
          }
      }
  }
</script>
