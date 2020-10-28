<template>
  <div>
      <!-- Loader -->
    <loader v-if="spin"></loader>

    <!-- Slider content -->
    <slider></slider>
    <!-- Slider content Ends-->

    <!-- Home content -->
    <homecontent></homecontent>
    <!-- Home content Ends -->

    <!-- popular content -->
    <popular></popular>
    <!-- popular content ends -->

    <!-- Footer -->
    <appfooter></appfooter>
    <!-- Footer Ends -->

  </div>
</template>
<script>
import loader from "./loader"
import slider from './parts/slider'
import homecontent from './parts/homecontent'
import popular from './parts/popular'
import appfooter from './parts/footer'

export default {
  components: {
    loader,
    slider,
    homecontent,
    popular,
    appfooter,
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