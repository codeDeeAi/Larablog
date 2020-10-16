<template>
     <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <article v-for="(blog , i) in blogs.blogs" :key="i" v-if="blogs.blogs.length" class="masonry__brick entry format-standard" data-aos="fade-up">
                        
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

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->

</template>
<script>
export default {
    data(){
        return{
            blogs:[],
        }
    },
    methods:{
        async fetchData(){
            const res = await this.callApi(
                'get',
                'app/get_home_blogs',
                this.blogs
            )
            if(res.status == 200){
                this.blogs = res.data;
                // console.log(this.blogs)
            }else{
                this.toast('Network Error .. Pls refresh page', 'error')
            }
        },
        
    },
    created(){
        this.fetchData()
    }
}
</script>
<style lang="scss" scoped>

</style>