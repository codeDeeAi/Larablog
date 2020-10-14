<template>
  <div>
      <!-- Loader -->
    <loader v-if="spin"></loader>

    <!-- Slider content -->
    <slider></slider>
    <!-- Slider content Ends-->
  </div>
</template>
<script>
import loader from "./loader"
import slider from './parts/slider'
export default {
  components: {
    loader,
    slider,
  },
  data() {
    return {
      spin: false,
    };
  },
  created() {
    this.spin = true;
  },
};
</script>
<style lang="scss" scoped>
</style>