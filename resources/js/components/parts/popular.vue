<template>
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article v-for="(blog, i) in blogs.blogs" :key="i" class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/wheel-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">{{blog.title}}</a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0">{{blog.user.lastName}} {{blog.user.firstName}}</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">{{blog.date}}</time></span>
                        </section>
                    </article>
                   
                   
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <h3>About LaraBlog</h3>

                <p>
                Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p>

                <ul class="about__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    <a  v-for="(tag, ti) in tags.tags" :key="ti" href="#0">{{tag.name}}</a>                    
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->
</template>
<script>
export default {
    data(){
        return{
            blogs:[],
            tags:[],
        }
    },
     methods:{
        async fetchData(){
            const res = await this.callApi(
                'get',
                'app/get_popular_blogs',
                this.blogs
            )
            if(res.status == 200){
                this.blogs = res.data;
                // console.log(this.blogs)
            }else{
                this.toast('Network Error .. Pls refresh page', 'error')
            }
        },
        async fetchDataTags(){
            const res = await this.callApi(
                'get',
                'app/get_tags',
                this.tags
            )
            if(res.status == 200){
                this.tags = res.data;
                // console.log(this.tags)
            }else{
                this.toast('Network Error .. Pls refresh page', 'error')
            }
        },
        
    },
    created(){
        this.fetchData()
        this.fetchDataTags()
    }
}
</script>
<style lang="scss" scoped>

</style>