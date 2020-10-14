<template>
    <div>
        <app-header></app-header>
        hello this is the homepage
    </div>
</template>
<script>
import header from './navbar'
import footer from './footer'
export default {
    components:{
        'header': 'app-header',
        'footer': 'app-footer'
    },
    data(){
        return{

        }
    }
    
}
</script>
<style lang="scss" scoped>

</style>