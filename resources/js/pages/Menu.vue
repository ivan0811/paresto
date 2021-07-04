<template>
    <div>

    </div>
</template>

<script>
export default {
    data(){

    },
    mounted(){
        axios.post('/api/check-users').then((res) => {
            console.log(res)
        }).catch((err) => {

        });
    },
    methods:{

    }
}
</script>
