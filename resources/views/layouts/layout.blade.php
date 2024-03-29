<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="@yield('title') ">
        <meta name="twitter:title" content="@yield('title') ">
        <title>@yield('title')</title>
        

         <!-- CSS
    ================================================== -->
    {{-- <link rel="stylesheet" href="/bs/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/images/lg.png">

        {{-- <script>
           
            (function () {
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
            })();
          
        </script> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
      
        {{-- App Header --}}
        {{-- @include('components.header') --}}

        {{-- App Body --}}
        <div id="app"> 
            @yield('content')    
        </div>

        {{-- App Footer --}}
        {{-- @include('components.footer') --}}


 <script type="text/javascript" src="{{ mix('js/app.js') }}" ></script>

        <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>
    <script src="/js/pace.min.js"></script>
     <!-- Java Script
    ================================================== -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/bs/js/bootstrap.min.js"></script>
    </body>
</html>
