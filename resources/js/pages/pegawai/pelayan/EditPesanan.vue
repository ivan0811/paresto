<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="d-flex flex-column px-8" style="min-height: 100%">            
            <div class="mb-auto">
             <v-row>                            
                <v-col cols="12">
                    <div class="d-flex justify-start">                        
                        <v-card v-for="(tab, i) in tabs" :key="i" @click="tabsHandler(tab.title)" class="me-8 text-center" :color="tab.active ? 'active' : ''" outlined v-bind="card" width="90" height="90">
                            <v-badge class="custom-badge" color="brownDarker" :content="tab.count"></v-badge>
                            <v-container class="pt-0" style="margin-top: -5px">                                                                
                                <span class="icon icon-32" :class="tab.logo + ' ' + (tab.active ? 'white' : 'blue')"></span>
                                <p class="text-caption" :class="tab.active ? 'white--text' : ''">{{tab.title}}</p>                            
                            </v-container>                                
                        </v-card>                                                                                                       
                    </div>
                </v-col>  
                <v-col cols="12" v-for="(tab, i) in tabs" :key="i" v-show="tab.active">                    
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                solo
                                label="Search"
                                flat
                            ></v-text-field>
                        </v-col>                           
                        <v-col cols="12" v-for="(item, j) in tab.content" :key="j">
                            <v-card v-bind="card">
                            <v-container class="py-2 px-5">
                                <div class="d-flex justify-space-between">
                                    <p class="font-weight-regular greyDark--text my-auto">{{item.nama}}</p>
                                    <div class="d-flex justify-space-end">
                                        <p class="font-weight-regular my-auto primary--text mx-5">Rp {{item.harga}}</p>
                                        <div class="d-flex mx-5 my-auto">
                                            <v-btn @click="itemCounter(item.id, 'add')" elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-plus</v-icon></v-btn>            
                                            <p class="font-weihgt-regular my-auto mx-5">{{counter.filter(val => val.id == item.id)[0].count}}</p>
                                            <v-btn @click="itemCounter(item.id, 'less')" elevation="0" outlined class="pa-0" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                        </div>                                
                                        <v-btn elevation="0" class="pa-0 mx-5 my-auto" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-minus</v-icon></v-btn>            
                                        <v-checkbox
                                            class="mt-0 ms-5 custom-checkbox my-auto"                                                                        
                                            color="blue"
                                            v-model="detailPesanan"                                              
                                            :value="item.id"
                                        ></v-checkbox>
                                    </div>                                                        
                                </div>
                            </v-container>
                        </v-card>
                        </v-col>
                    </v-row>                                                
                </v-col>                
            </v-row>
            </div>
             <div class="mt-auto">                
                <div class="d-flex justify-end">
                    <v-btn large color="greyLight" elevation="0" class="me-4">
                        <v-icon>
                            mdi-chevron-left
                        </v-icon>
                    </v-btn>
                    <v-btn large color="primary" elevation="0" @click="submitHandler">
                        Lanjut
                    </v-btn>                
                </div>                
            </div>      
        </v-container>
    </v-main>        
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {    
    props: ["card"],    
    data() {
        return{                       
          dialogDetailPesanan: false,                               
          tabs: [
              {
                title: 'Makanan',
                logo: 'icon-dish',
                active: true,          
                count: 0,
                content: []         
              },
              {
                title: 'Minuman',
                logo: 'icon-cocktail',
                active: false,
                count: 0,
                content: []
              },
              {
                title: 'Cemilan',
                logo: 'icon-nuggets',
                active: false,
                count: 0,
                content: []
              }
             ],
             counter: [],
             detailPesanan: []                           
        }
    },    
    async mounted(){
        await this.loadMenu()        
        for (const item of this.tabs) {                                    
            item.content = this.getMenu.filter(m => m.kategori.nama == item.title.toLowerCase())            
            item.count = item.content.length || '0'        
            this.counter = this.getMenu.map(item => { return {id : item.id, count: 1}})
        }   
        await this.editPesanan(this.$route.params.id)                               
        const pesanan = this.getEditPesanan[0].detail_pesanan  
        console.log(pesanan)            
        this.detailPesanan = pesanan.map(item => item.menu.id)                        
        this.counter.map(item => {                
            let pesanan_count = pesanan.filter(val => val.menu.id == item.id)                               
            if(pesanan_count.length > 0) return item.count = pesanan_count[0].jumlah                                    
        })        
    },
    methods: {
        ...mapActions([
            'loadMenu',     
            'editPesanan',
            'setPesananStorage'
        ]),
        closeDetailPesanan(){
            this.dialogDetailPesanan = false
        },
        tabsHandler(title){
            this.tabs.map(item => {
                item.active = false
                if(item.title == title) item.active = true                 
            })            
        },
        itemCounter(id, count){                   
            this.counter.filter(item => item.id == id).map(item => {
                return count == 'add' ? item.count++ : item.count--
            })
        },
        submitHandler(){                        
            this.setPesananStorage({
            no_meja: this.getEditPesanan[0].no_meja, 
            detail : this.counter.filter(item => this.detailPesanan.includes(item.id)).map(item => {
                let menu = this.getMenu.filter(val => val.id == item.id)[0]
                return {id: item.id, count: item.count, nama: menu.nama, harga: menu.harga}
            })})
            this.$router.push({name: 'confirmEditPesanan', params: {id: this.getEditPesanan[0].id}})
        }
    },
    computed: {
        ...mapGetters([
            'getMenu',
            'getEditPesanan'            
        ])
    }
}
</script>
<style>
.custom-checkbox .v-input__control .v-messages{
    min-height: 0;
    min-width: 0;
}

.custom-checkbox .v-input__control .v-input__slot{
    margin: 0;
}

.custom-tabs .v-item-group .v-slide-group__wrapper .v-slide-group__content .v-tabs-slider-wrapper{
    width: 0;
    height: 0;
}

.custom-badge{
    position: absolute;
    right: -30px;
    top: 0px;     
}

.custom-badge .v-badge__wrapper .v-badge__badge{
    width: 30px;
    height: 30px;
    border-radius: 60px;
    font-size: 16px;    
    padding: 8px;
}

</style>