<template>
     <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div v-for="(b, bi) in blogs.blogOne" :key="bi" v-if="blogs.blogOne" class="entry" style="background-image:url('images/thumbs/featured/featured-guitarman.jpg');">
                            
                            <div class="entry__content">
                                <span class="entry__category">
                                    <span  v-for="(bc, bci) in b.cat" :key="bci">
                                        <a href="#0">{{bc.categoryName}}</a>                                        
                                    </span>
                                </span>

                                <h1><a href="#0" title="">{{b.title}}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li>
                                            <a href="#0">
                                                {{b.user.lastName}} {{b.user.firstName}}
                                            </a>
                                        </li>
                                        <li>{{b.date}}</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div  class="featured__column featured__column--small">

                        <div v-for="(blog, i) in blogs.blogs" :key="i" v-if="blogs.blogs.length" class="entry" style="background-image:url('images/thumbs/featured/featured-watch.jpg');">
                            
                            <div  class="entry__content">
                                <span class="entry__category" >
                                    <span  v-for="(c, ci) in blog.cat" :key="ci">
                                        <a href="#0">{{c.categoryName}}</a>                                        
                                    </span>
                                </span>

                                <h1><a href="#0" title="">{{blog.title}}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li>
                                            <a href="#0">{{blog.user.lastName}} {{blog.user.firstName}}</a>
                                        </li>
                                        <li>{{blog.date}}</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                          
                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->
</template>
<script>
export default {
    data(){
        return{
            blogs:[],
            images:{
                'src':'',
                'src':'',
                'src':'',
            }
        }
    },
    methods:{
        async fetchData(){
            const res = await this.callApi(
                'get',
                'app/get_slider_blogs',
                this.blogs
            )
            if(res.status == 200){
                this.blogs = res.data;
                console.log(this.blogs)
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