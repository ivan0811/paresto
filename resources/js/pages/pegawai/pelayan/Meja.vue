<template>
    <div>                
        <v-main style="min-height: 100vh">                    
        <v-container class="px-8">
            <v-row class="mx-auto" justify="center">
                <v-col class="d-flex justify-space-between" cols="12">                    
                     <div class="d-flex mx-3" cols="4">                  
                            <v-sheet
                                width="30"
                                elevation="0"
                                color="tableInOrder"
                                height="30"
                                rounded=""
                                class="me-1"
                            >
                            </v-sheet>
                            <p class="ms-1 my-auto text-subheader-1">
                                Sudah dipesan
                            </p>                
                    </div>      
                    <div class="d-flex" cols="4">                  
                            <v-sheet
                                width="30"
                                elevation="0"
                                color="tableActive"
                                height="30"
                                rounded=""
                                class="me-1"
                            >
                            </v-sheet>
                            <p class="ms-1 my-auto text-subheader-1">
                                Meja dipakai
                            </p>                
                    </div>      
                    <div class="d-flex" cols="4">                  
                            <v-sheet
                                class="me-1 outline-green"        
                                width="30"
                                elevation="0"                        
                                height="30"
                                rounded=""                                        
                            >
                            </v-sheet>
                            <p class="ms-1 my-auto text-subheader-1">
                                Meja kosong
                            </p>                
                    </div>         
                </v-col>
                <v-col cols="12" class="mt-8">
                    <v-row>
                        <v-col md="8" cols="12">
                            <v-row>
                                <v-col class="mr-auto" style="width: max-content" cols="2" v-for="(item, index) in meja[1]" :key="index">
                                    <v-card class="mx-3" @click.stop="handlerDialog(1, index, item.no_meja)" v-bind="table[6]">                              
                                        <v-sheet v-bind="setStatusStyle(item.status)" class="d-flex justify-center align-center" height="100%">
                                            <p class="ma-0">{{addZero(item.no_meja)}}</p>
                                            <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                                <div class="d-flex justify-end" style="width: 100%">
                                                    <p class="white--text text-caption mb-0">{{item.jumlah}}</p>                                        
                                                    <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                                </div>                                    
                                            </v-sheet>                                                                  
                                        </v-sheet>                                        
                                    </v-card>  
                                </v-col>    
                            </v-row>                                                        
                        </v-col>
                        <v-col cols="10" md="6">
                            <v-row>
                                <v-col cols="12">
                                     <v-row class="my-3">
                                        <v-col cols="2" v-for="(item, index) in meja[3].filter((_, index) => index < 12)" :key="index">
                                            <v-card v-bind="table[item.jumlah]" @click.stop="handlerDialog(3, index, item.no_meja)">                              
                                                <v-sheet v-bind="setStatusStyle(item.status)" class="d-flex justify-center align-center" height="100%">
                                                    <p class="ma-0">{{addZero(item.no_meja)}}</p>
                                                    <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                                        <div class="d-flex justify-end" style="width: 100%">
                                                            <p class="white--text text-caption mb-0">{{item.jumlah}}</p>                                        
                                                            <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                                        </div>                                    
                                                    </v-sheet>                                                                  
                                                </v-sheet>                                        
                                            </v-card>  
                                        </v-col>
                                    </v-row>                            
                                </v-col>
                                <v-col cols="12">
                                    <v-row>
                                        <v-col cols="2" v-for="(item, index) in meja[3].filter((_, index) => index >= 12)" :key="index">                                          
                                            <v-card v-bind="table[item.jumlah]" @click.stop="handlerDialog(3, index, item.no_meja)">                              
                                                <v-sheet v-bind="setStatusStyle(item.status)" class="d-flex justify-center align-center" height="100%">
                                                    <p class="ma-0">{{addZero(item.no_meja)}}</p>
                                                    <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                                        <div class="d-flex justify-end" style="width: 100%">
                                                            <p class="white--text text-caption mb-0">{{item.jumlah}}</p>                                        
                                                            <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                                        </div>                                    
                                                    </v-sheet>                                                                  
                                                </v-sheet>                                        
                                            </v-card>
                                        </v-col>
                                    </v-row>  
                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col cols="2" md="2">
                              <v-row class="ml-auto my-3" style="width: min-content"> 
                                    <v-col cols="12" v-for="(item, index) in meja[2]" :key="index">
                                        <v-card v-bind="table[6]" @click.stop="handlerDialog(2, index, item.no_meja)">                              
                                            <v-sheet v-bind="setStatusStyle(item.status)" class="d-flex justify-center align-center" height="100%">
                                                <p class="ma-0">{{addZero(item.no_meja)}}</p>
                                                <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                                    <div class="d-flex justify-end" style="width: 100%">
                                                        <p class="white--text text-caption mb-0">{{item.jumlah}}</p>                                        
                                                        <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                                    </div>                                    
                                                </v-sheet>                                                                  
                                            </v-sheet>                                        
                                        </v-card>
                                    </v-col>                          
                                </v-row> 
                        </v-col>
                        <v-col cols="12" md="8">
                            <v-row> 
                                <v-spacer></v-spacer>
                                <v-col cols="2" v-for="(item, index) in meja[0]" :key="index">
                                    <v-card v-bind="table[6]" @click.stop="handlerDialog(0, index, item.no_meja)">                              
                                        <v-sheet v-bind="setStatusStyle(item.status)" class="d-flex justify-center align-center" height="100%">
                                            <p class="ma-0">{{addZero(item.no_meja)}}</p>
                                            <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                                <div class="d-flex justify-end" style="width: 100%">
                                                    <p class="white--text text-caption mb-0">{{item.jumlah}}</p>                                        
                                                    <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                                </div>                                    
                                            </v-sheet>                                                                  
                                        </v-sheet>                                        
                                    </v-card>
                                </v-col>                          
                        </v-row>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>                                
        </v-container>
    </v-main>    
    <dialog-meja @save="submitStatus" @close="closeDialog" :detail="detail" :dialog="dialog"></dialog-meja>
    </div>    
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import dialogMeja from '../../../components/DialogMeja.vue'
export default {
    props: ["card"],
    components: {
        'dialog-meja' : dialogMeja
    }, 
    data() {
        return{     
            meja: [],
            detail: {},
            dialog: false,                  
            table: {
                10:{                    
                    width: 90,
                    height: 65,
                    elevation: 0,  
                },
                6:{
                    width: 90,
                    height: 65,
                    elevation: 0,                               
                },
                4: {
                    width: 65,
                    height: 90,
                    elevation: 0, 
                },
                2: {
                    width: 90,
                    height: 65,
                    elevation: 0,  
                }                
            },
            status: {
                dipesan : {
                    color: 'tableInOrder',
                    class: 'white--text'                    
                },
                dipakai: {
                    color: 'tableActive',
                    class: 'white--text'
                },
                kosong: {
                    class: 'outline-green'
                }                
            },
            dialogActive: {
                index1: 0,
                index2: 0
            },
            update: {
                index1: 0,
                index2: 0,
                status: ''
            }  
        }
    },    
    async mounted(){                        
        mejaRef.on('value', this.resultData, this.errorData)
        this.reloadMeja()
    },
    methods: {
        ...mapActions([
            'loadMeja',
            'updateMeja'
        ]),
        closeDialog(){
            this.dialog = false
        },
        errorData(error){
            console.log(error)
        },
        async reloadMeja(){
            await this.loadMeja()    
            const meja = this.getMeja              
            let jumlah = []
            for (const item of meja) {
                if(jumlah.length == 0 || !jumlah.includes(item.jumlah)){                
                    jumlah.push(item.jumlah)                            
                    this.meja.push(meja.filter(m => m.jumlah == item.jumlah))
                }
            }                
        },
        resultData(items){            
            this.update = {
                index1 : items.val().index1,
                index2 : items.val().index2,
                status : items.val().status
            }
        },
        handlerDialog(index1, index2, no_meja){
            this.dialog = !this.dialog            
            this.detail = this.meja[index1].filter(m => m.no_meja == no_meja)[0]   
            this.dialogActive.index1 = index1                     
            this.dialogActive.index2 = index2
        },
        addZero(no_meja){            
            return no_meja.toString().length == 1 ? '0' + no_meja : no_meja
        },
        setStatusStyle(status){
            return this.status[status]
        },
        async submitStatus(form){                               
            const status = await this.updateMeja(form)                    
            if(status) {   
                const index = this.dialogActive                                         
                this.meja[index.index1][index.index2].status = form.status
                this.dialog = false                      
                mejaRef.set({
                    index1 : index.index1,
                    index2 : index.index2,
                    status: form.status
                })
            }
        }
    },
    computed: {
        ...mapGetters([
            'getMeja'
        ])        
    },
    watch: {
        update(item){
            console.log(item)
            this.meja[item.index1][item.index2].status = item.status
        }
    }
}
</script>
<style scoped>
.theme--light.v-sheet.outline-green{
    border: solid #6BC899 2px;
}
.theme--light.v-sheet.sheet-table-person{    
    background-color: #48332E;
    border-bottom-right-radius: 12px;
    border-top-left-radius: 12px;
    position: absolute;    
    right: 0;
    bottom: 0;
}
</style>
