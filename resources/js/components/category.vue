<template>
    <div>
        <!-- App loader -->
        <loader v-if="!spin"></loader>
        <!-- App loader ends -->
         <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <article v-for="(blog , i) in blogs" :key="i" v-if="blogs.length" class="masonry__brick entry format-standard" data-aos="fade-up">
                        
                    <!-- <div class="entry__thumb">
                        <a :href="'/blog/'+ blog.id" class="entry__thumb-link">
                            <img src="images/thumbs/masonry/lamp-400.jpg" 
                                    srcset="images/thumbs/masonry/lamp-400.jpg 1x, images/thumbs/masonry/lamp-800.jpg 2x" alt="">
                        </a>
                    </div> -->
    
                    <div class="entry__text">
                        <div class="entry__header">
                            
                            <div class="entry__date">
                                <a :href="'/blog/'+ blog.id + '/'+ blog.slug">{{blog.date}}</a>
                            </div>
                            <h1 class="entry__title"><a :href="'/blog/'+ blog.id + '/'+ blog.slug">{{blog.title}}</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            <p>
                                {{blog.post_except}}
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a  v-for="(c, ci) in blog.cat" :key="ci"  href="#!" >{{c.categoryName}}</a> 
                            </span>
                        </div>
                    </div>
    
                </article> <!-- end article -->


            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->


    </section> <!-- s-content -->

    <!-- Footer -->
    <appfooter></appfooter>
    <!-- Footer Ends -->
    </div>
</template>
<script>
import loader from './parts/loader'
import appfooter from './parts/footer'
export default {
    components:{
        loader,
        appfooter,
    },
    data(){
        return{
            blogs:[],
            spin: false,
            rel:{                
                id:this.$route.params.id,
                categoryName:this.$route.params.categoryName,
            }
        }
    },
    methods:{
        async fetchData(){
            const res = await this.callApi(
                'post',
                'app/related_cats' + '/' + this.rel.id,
                this.rel
            )
            if(res.status == 200){
                this.blogs = res.data;
                // this.spin = true;
                // console.log(this.blogs)
            }else{
                this.toast('Network Error .. Pls refresh page', 'error')
            }
        },
        
    },
    created(){
        this.fetchData()
        this.spin = true;
    }
}
</script>
<style  scoped>

</style>