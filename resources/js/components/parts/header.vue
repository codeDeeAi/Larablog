<template>
     <div>        

        <section id="top" class=" s-pageheader ">

            <header class="header fixed-top">
                <div class="header__content row">

                    <div class="header__logo">
                        <a class="logo" href="index.html">
                            <!-- {{-- <img src="images/logo.svg" alt="Homepage"> --}} -->
                        </a>
                    </div> <!-- end header__logo -->

                    <ul class="header__social">
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

                    <a class="header__search-trigger" href="#0"></a>

                    <div class="header__search">

                        <form role="search" method="POST" class="header__search-form" action="/search" >
                            <label>
                                <span class="hide-content">Search for:</span>
                                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="str" title="Search for:" autocomplete="off">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
            
                        <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                    </div>  <!-- end header__search -->


                    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                    <nav class="header__nav-wrap">

                        <h2 class="header__nav-heading h6">LaraBlog</h2>

                        <ul class="header__nav">
                            <li class=""><a href="/" title="">Home</a></li>
                            <li><router-link to="/blogs"> Blogs</router-link></li>
                            <li class="has-children">
                                <a href="#0" title="">Categories</a>
                                <ul class="sub-menu">                                    
                                    <li v-for="(category, ci) in categories" :key="ci" v-if="categories.length">
                                        <router-link :to="'/category/' + category.categoryName+ '/' + category.id">press</router-link>
                                        <!-- <a href="/category/{{$category->categoryName}}/{{$category->id}}">{{$category->categoryName}}</a> -->
                                        <a href="#!">{{category.categoryName}}</a>
                                    </li>  
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#0" title="">Tags</a>
                                <ul class="sub-menu">
                                    <li v-for="(tag, ti) in tags" :key="ti" v-if="tags.length">
                                        <!-- <li><a href="/tag/{{$tag->name}}/{{$tag->id}}">{{$tag->name}}</a> -->
                                        <a href="#!">{{tag.name}}</a>
                                    </li>                             
                                </ul>
                            </li>
                            <li><a href="/about-us" title="">About</a></li>
                            <li><a href="/contact-us" title="">Contact</a></li>                    
                            <li>
                                <a href="/login">Login</a>
                            </li>
                        </ul> <!-- end header__nav -->

                        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                    </nav> <!-- end header__nav-wrap -->

                </div> <!-- header-content -->
            </header> <!-- header -->  
 
        </section>
     </div>
</template>
<script>
export default {
    data(){
        return{
            tags:[],
            categories:[],
        }
    },
    methods:{
        async fetchTags(){
            const res = await this.callApi(
                'get',
                'app/get_tags',
                this.data
            )  
            if(res.status = 200){
                this.tags = res.data
            } else{
                console.log('Error fetching data')
            }             
        },
        async fetchCats(){
            const res = await this.callApi(
                'get',
                'app/get_cats',
                this.data
            )
            if(res.status = 200){
                this.categories = res.data
            } else{
                console.log('Error fetching data')
            } 
        },
    },
    created(){
       this.fetchTags()
       this.fetchCats()
    }
}
</script>
<style  scoped>
nav  a:active{
    color: #f4f4f4 !important;
}
</style>