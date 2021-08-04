<template>
    <v-main style="min-height: 100vh">
      <v-container
      class="px-8"
      >
      <v-row>
          <v-col cols="8">
               <v-row>
          <v-col
            cols="6"
          >
            <v-card elevation="0" class="rounded-card">
              <v-subheader class="pt-5" style="width: 70px"><span class="icon icon-trend-up icon-32 blue"></span></v-subheader>

              <v-list two-line>
                <template>
                  <v-list-item
                  >
                    <v-list-item-content>
                        <v-list-item-subtitle>
                            Total Penjualan 1 bulan terakhir
                        </v-list-item-subtitle>
                      <v-list-item-title>
                          Rp. 301.999.999
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </template>
              </v-list>
            </v-card>
          </v-col>
          <v-col
            cols="3"
          >

            <v-card elevation="0" class="rounded-card">
              <v-subheader class="pt-5" style="width: 70px"><span class="icon icon-users icon-32 blue"></span></v-subheader>

              <v-list two-line>
                <template >
                  <v-list-item
                  >
                    <v-list-item-content>
                      <v-list-item-subtitle>
                           Total Pegawai
                        </v-list-item-subtitle>
                      <v-list-item-title>
                          {{pegawai}}
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </template>
              </v-list>
            </v-card>
          </v-col>
          <v-col
            cols="3"
          >
            <v-card elevation="0" class="rounded-card">
              <v-subheader class="pt-5" style="width: 70px"><span class="icon icon-clipboard icon-32 blue"></span></v-subheader>

              <v-list two-line>
                <template>
                  <v-list-item
                  >
                     <v-list-item-content>
                      <v-list-item-subtitle>
                           Total Menu
                        </v-list-item-subtitle>
                      <v-list-item-title>
                          {{menu}}
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </template>
              </v-list>
            </v-card>
          </v-col>
           <v-col
            cols="12"
          >
          <div class="text-h6 mb-2">Transaksi</div>
            <v-card elevation="0" class="rounded-card">
                <div class="d-flex justify-space-between">
                    <v-subheader>
                        Total Penjualan
                    </v-subheader>
                    <div class="text-h6 mt-3 me-5">Rp 3.123.423.643</div>
                </div>
                <v-container fluid>
                    <v-sparkline
                    :fill="fill"
                    :gradient="selectedGradient"
                    :line-width="width"
                    :padding="padding"
                    :smooth="radius || false"
                    :value="value"
                    :stroke-linecap="lineCap"
                    auto-draw
                    ></v-sparkline>
                </v-container>
            </v-card>
          </v-col>

          <v-col
            cols="12"
          >
          <div class="d-flex justify-space-between">
              <div class="text-h6 mb-2">Riwayat</div>
              <v-btn to="/transaksi" text color="primary">Selengkapnya</v-btn>
          </div>
          <v-row>
               <v-col cols="12" v-for="(item, i) in transaksi.filter((_, index) => index < 12)" :key="i">
                    <v-card elevation="0" v-bind="card" @click.native="showDialogDetail(item)">
                    <v-container class="py-2 px-5">
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular greyPrimary--text my-auto">{{item.no_antrian}}</p>
                            <p class="font-weight-regular my-auto">Meja #{{addZero(item.no_meja)}}</p>
                            <p class="text-caption greyDark--text my-auto">24 April 2021 20.14 WIB</p>
                            <p class="font-weight-regular my-auto">Rp {{getTotalHarga(item)}}</p>
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" :color="getAlertStatus(checkStatus(item))" text dense>{{checkStatus(item)}}</v-alert>
                            <v-btn class="my-auto" x-small icon>
                              <span class="icon icon-bin icon-16 grey-dark"></span>
                            </v-btn>                             
                        </div>
                    </v-container>
                </v-card>
                </v-col>
              <v-col cols="12">
                    <v-card elevation="0" class="rounded-card">
                        <div class="d-flex">

                        </div>
                    </v-card>
              </v-col>
          </v-row>
          </v-col>

        </v-row>
          </v-col>
          <v-col cols="4">
            <v-card elevation="0" class="rounded-card">
                <v-container>
                    <v-list class="mb-8" two-line>
                        <v-list-item-content>
                            <v-list-item-title class="text-h5 text-center mb-3">
                                Menu Trending
                            </v-list-item-title>
                            <v-list-item-subtitle class="text-center">
                                Menu Paling Banyak terjual
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list>
                    <div class="d-flex justify-center">
                        <v-btn class="mx-2" :text="false" :color="'active'">Makanan</v-btn>
                        <v-btn class="mx-2" :text="true" :color="'secondary'">Minuman</v-btn>
                    </div>
                    <v-list>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Nasi Goreng
                                </v-list-item-title>
                            </v-list-item-content>
                            <v-list-item-content>
                                <v-list-item-title class="d-flex justify-end">
                                    240 <span class="ms-1 text--secondary">Porsi</span>
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
 const gradients = [
    ['#5A95CC'],
    ['#74CEDD', '#FFFFFF']
  ]

export default {
    props: ['card'],
     data: () => ({
        fill: true,
        selectedGradient: gradients[1],
        gradients,
        padding: 8,
        radius: 0,
        value: [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        width: 2,
        menu: 'Makanan',
        transaksi: [],
        pegawai: 0,
        menu: 0,
        alertStatus: {              
            lunas: 'success',              
            belumLunas: 'red'
        },
    }),
    async mounted() {
      await this.loadPegawai()
      await this.loadMenu()
      await this.loadTransaksi()
      this.pegawai = this.getPegawai.length
      this.menu = this.getMenu.length
      this.transaksi = this.getTransaksi                
    },
    methods:{
      ...mapActions([
        'loadPegawai',
        'loadMenu',
        'loadTransaksi'
      ]),      
      addZero(no_meja){            
          return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
      },
      checkStatus(item){
          return item.transaksi.length > 0 ? 'Lunas' : 'Belum Lunas'
      },
      getAlertStatus(status){            
            return this.alertStatus[status == 'Belum Lunas' ? 'belumLunas' : 'lunas']
        },
      getTotalHarga(item){             
          let harga = item.detail_pesanan.map(val => {
              return val.menu.harga * val.jumlah
          })                        
              
          return harga.length > 0 ? harga.reduce((total, num) => total + num) : 0
      }
    },
    computed:{
      ...mapGetters([
        'getPegawai',
        'getMenu',
        'getTransaksi'
      ])
    }
}
</script>
<style lang="scss">
    .select-riwayat:hover{
        cursor:pointer;
    }
</style>
