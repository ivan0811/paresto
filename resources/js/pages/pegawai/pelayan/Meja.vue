<template>
    <div>                
        <v-main style="min-height: 100vh">        
        <v-container class="px-8">
          <v-row>
              <v-col class="d-flex" cols="4">                  
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
              </v-col>      
              <v-col class="d-flex" cols="4">                  
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
              </v-col>      
              <v-col class="d-flex" cols="4">                  
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
              </v-col>              
              <v-col cols="12">
                  <v-row>
                      <v-col cols="2">
                          <v-card v-bind="table[6]">                              
                            <v-sheet class="d-flex justify-center align-center" height="100%">
                                <p class="ma-0">03</p>
                                <v-sheet class="sheet-table-person" width="36" height="21">                                    
                                    <div class="d-flex justify-end" style="width: 100%">
                                        <p class="white--text text-caption mb-0">6</p>                                        
                                        <span class="icon white icon-24 icon-group ms-1" style="width: 13px; margin-right: 1px; margin-top: 1px"></span>
                                    </div>                                    
                                </v-sheet>                                                                  
                            </v-sheet>                                        
                          </v-card>
                      </v-col>
                  </v-row>
              </v-col>
          </v-row>                           
        </v-container>
    </v-main>    
    </div>    
</template>
<script>

export default {
    props: ["card"],
    
    data() {
        return{                       
            table: {
                10:{                    

                },
                6:{
                    width: 90,
                    height: 65,
                    elevation: 0,                               
                },
                4: {

                },
                2: {

                }                
            }
        }
    },    
    methods: {
      
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
