<template>
    <v-main style="min-height: 100vh">
      <side-detail-transaksi  @close="closeDetail" :drawer="detailTransaksi"></side-detail-transaksi>
      <v-container class="px-8">
      <v-row>
          <v-col cols="8">
               <v-row>
           <v-col
            cols="12"
          >
            <v-card v-bind="card">
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
              <v-btn text color="primary">Selengkapnya</v-btn>
          </div>
          <v-row>
              <v-col cols="12">
                  <v-card v-bind="card" @click.stop="detailTransaksi = !detailTransaksi">
                    <v-container>
                        <div class="d-flex justify-space-between">
                            <p class="font-weight-regular ma-0" color="greyPrimary">01</p>
                            <p class="font-weight-regular ma-0">Meja#34</p>
                            <p class="font-weight-regular ma-0" color="greySecondary">24 April 2021 20.14 WIB</p>
                            <p class="font-weight-regular ma-0">Rp 460.000</p>
                            <v-alert class="py-1 px-4 my-auto rounded-pill text-caption mb-0" color="success" text dense>Lunas</v-alert>
                             <v-btn
                                icon
                                small
                                >
                                <v-icon>mdi-trash-can</v-icon>
                            </v-btn>
                        </div>
                    </v-container>
                </v-card>
              </v-col>
              <v-col cols="12">
                    <v-card v-bind="card">
                        <div class="d-flex">

                        </div>
                    </v-card>
              </v-col>
          </v-row>
          </v-col>

        </v-row>
          </v-col>
          <v-col cols="4">
            <v-card v-bind="card">
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
import sideDetailTransaksi from "../../components/SideDetailTransaksi.vue";
 const gradients = [
    ['#5A95CC'],
    ['#74CEDD', '#FFFFFF']
  ]

export default {
     components: {
         'side-detail-transaksi' : sideDetailTransaksi
     },
     props: ['card'],
     data: () => ({
        detailTransaksi: false,
        fill: true,
        selectedGradient: gradients[1],
        gradients,
        padding: 8,
        radius: 0,
        value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0],
        width: 2,
        menu: 'Makanan'
    }),
    methods:{
        closeDetail(){
            this.detailTransaksi = false            
        }
    },
    computed:{

    }
}
</script>
