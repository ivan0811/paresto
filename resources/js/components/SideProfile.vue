<template>  
    <v-navigation-drawer
      v-model="drawer"
      fixed      
      right
      floating
      color="transparent"            
      style="width: 300px"
    >                
    <v-card elevation="1" class="rounded-r ms-3" style="height: 100%; width: 100%">
        <v-container>
            <v-btn elevation="0" color="error" @click="$emit('close')" class="pa-0 mt-2 ml-2" style="min-width: max-content; height: max-content" small><v-icon class="pa-1" dense>mdi-close</v-icon></v-btn>
        <v-sheet class="pb-8">        
        <div
            class="pb-4 mx-auto"
            style="width: max-content"
        >
            <v-avatar rounded color="blue"></v-avatar>            
        </div>
        <p class="text-center text-h6">Argya Aulia</p>
        <p class="text-center text-subtitle-2 text--secondary mb-0">Bergabung sejak</p>
        <p class="text-center">30 Mei 2019</p>        
      </v-sheet>
      <v-list>
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle class="text-subtitle-2 mb-3">Roles</v-list-item-subtitle>
                    <v-list-item-title class="">Admin</v-list-item-title>                    
                </v-list-item-content>
            </v-list-item>
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle class="text-subtitle-2 mb-3">Roles</v-list-item-subtitle>
                    <v-list-item-title class="">Admin</v-list-item-title>        
                </v-list-item-content>
            </v-list-item>
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle class="text-subtitle-2 mb-3">Roles</v-list-item-subtitle>
                    <v-list-item-title class="">Admin</v-list-item-title>        
                </v-list-item-content>
            </v-list-item>
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle class="text-subtitle-2 mb-3">Roles</v-list-item-subtitle>
                    <v-list-item-title class="">Admin</v-list-item-title>        
                </v-list-item-content>
            </v-list-item>
        </v-list>    
        </v-container>             
    </v-card>    
    </v-navigation-drawer>  
</template>
<script>
export default {        
    props: ['drawer'],
    mounted(){
        console.log(this.drawer)
    },
    methods: {
        
    },
    watch:{
        drawer(e){
            console.log(e)
        }
    }
}
</script>