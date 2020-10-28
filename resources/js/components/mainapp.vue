<template>
  <div class="main-view">
    <appheader></appheader>
      <router-view></router-view>      
  </div>
  
</template>
<script>
import appheader from './parts/header'
export default {
  components:{
    appheader,
  },
  data() {
    return {
      data: {
        
      },
    };
  },
  methods: {
   

  },
  created() {

  },
  mounted() {

  },
};
</script>
<style scoped>

</style>
