

<section id="top" class=" s-pageheader--home">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="index.html">
                    {{-- <img src="images/logo.svg" alt="Homepage"> --}}
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
                    {{csrf_field()}}
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
                    <li class="current"><a href="/" title="">Home</a></li>
                    <li><a href="/allblogs" title="">Blogs</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">

                            @foreach ($categories as $category )
                            <li><a href="/category/{{$category->categoryName}}/{{$category->id}}">{{$category->categoryName}}</a></li>
                            @endforeach
                       
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Tags</a>
                        <ul class="sub-menu">

                            @foreach ($tags as $tag )
                            <li><a href="/tag/{{$tag->name}}/{{$tag->id}}">{{$tag->name}}</a></li>
                            @endforeach
                       
                        </ul>
                    </li>
                    <li><a href="/about-us" title="">About</a></li>
                    <li><a href="/contact-us" title="">Contact</a></li>
                </ul> <!-- end header__nav -->

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
    </header> <!-- header -->

