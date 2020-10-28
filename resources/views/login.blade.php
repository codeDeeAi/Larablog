<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="@yield('title') ">
        <meta name="twitter:title" content="@yield('title') ">
        <title>LaraBlog -- Sign In</title>
        

         <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bs/css/bootstrap-grid.min.css">
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

        {{-- J-Query --}}
        <script src="/js/jquery-3.2.1.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {   
        // Login Request
                $("#login").click(function guestrequest() {
                    login_email = $("#login_email").val();
                    login_password = $("#login_password").val();    
                    $.ajax({
                        type: "POST",
                        url: "/user-login",
                        data: {
                            "_token":"{{ csrf_token() }}",
                            "id":id,
                            "login_email=": login_email,
                            "&login_password=" : login_password 
                        },
                        success: function(html) {    
                                $("#add_err2").html(data.msg);
                        },
                        beforeSend: function() {
                            $("#add_err2").html('<div class="alert alert-primary"> \
                                                     loading... \ \
                                                     </div>');
                        }
                    });
                    return false;
                });
                // Login Request Ends
            });
        </script>
      
    </head>
    <body>
      
        {{-- App Header --}}
        @include('components.header')

        {{-- Login Body --}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="card col-md-6">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sign In</a>
                                </div>
                              </nav>
                              <div class="tab-content" id="nav-tabContent" style="margin-top: 4%;">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    {{-- Login form --}}
                                    <form>
                                        @csrf
                                        <div id="add_err2"></div>
                                        <div class="form-group">
                                          <label >Email address</label>
                                          <input type="email" id="login_email" class="form-control">
                                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                          <label>Password</label>
                                          <input type="password" class="form-control" id="login_password" >
                                        </div>
                                        <a href="#!" id="login" class="btn btn-primary">Login</a>
                                      </form>
                                      <div class="row">
                                        <div class="mr-auto">Don't have an account? <a href="/signup">Signup now</a></div>
                                    </div>
                                    {{-- Login form --}}
                                </div>                                
                              </div>
                        </div>
                      </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
        {{-- Login Body Ends--}}

        {{-- App Footer --}}
        @include('components.footer')


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
