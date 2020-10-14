<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

         <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/404.css">

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
      
      <div id="container404">
        <div class="content">
            <h2>404</h2>
            <h3>Oops! Page not found</h3>
            <p>The page you're looking for doesn't exist. You may have mistyped the address or the page may have moved </p>
            <a href="/">Back to home</a>
        </div>
      </div>


 <script type="text/javascript" src="{{ mix('js/app.js') }}" ></script>

        <!-- script
        ================================================== -->
   
    <script src="/js/404.js"></script>
    </body>
</html>