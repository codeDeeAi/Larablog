<template>
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article v-for="(blog, i) in blogs.blogs" :key="i" class="col-block popular__post">
                        <a :href="'/blog/'+ blog.id + '/'+ blog.slug" class="popular__thumb">
                            <img src="images/thumbs/small/wheel-150.jpg" alt="">
                        </a>
                        <h5><a :href="'/blog/'+ blog.id + '/'+ blog.slug">{{blog.title}}</a></h5>
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
                    LaraBlog is a blog webapp developed by Bada Adeola with Laravel and  Vue JS, it is a modern blog which implements smooth customizable user interface
                    , fast load time, improved user experience, security, user roles and permissions which are set by the blog owner. These rules makes the webapp easily customizable
                    by the blog owner making it a state of the art blog app. 
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
                    <a  v-for="(tag, ti) in tags.tags" :key="ti" :href="'/tag/' + tag.name + '/' + tag.id">{{tag.name}}</a>                    
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