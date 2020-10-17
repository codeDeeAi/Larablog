@extends('layouts.layout')

@section('title', 'LaraBlog  --Search')
@section('content')

<section class="s-content">
        <div class="row">
            <h3>Search results :</h3>
        </div>
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($blogs as $blog)
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    

                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="/blog/{{$blog->id}}/{{$blog->slug}}">{{$blog->date}}</a>
                        </div>
                        <h1 class="entry__title"><a href="/blog/{{$blog->id}}/{{$blog->slug}}">{{$blog->title}}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <p>
                            {{$blog->post_except}}
                        </p>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            @foreach ($blog->cat as $c)                                
                        <a   href="/category/{{$c->categoryName}}/{{$c->id}}" >{{$c->categoryName}}</a> 
                            @endforeach
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->
            @endforeach
           


        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <ul>
                    <li><a class="pgn__num">{!! $blogs->links(); !!}</a></li>
                </ul>
            </nav>
        </div>
    </div>

</section> <!-- s-content -->


@endsection  