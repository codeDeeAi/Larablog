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
     

        {{-- Ajax  --}}
        <script type="text/javascript">
            $(document).ready(function() {   
                
    
                // Sign Up Request
                $("#signupBtn").click(function guestrequest() {
                    signup_firstname = $("signup_firstname").val();
                    signup_lastname = $("signup_lastname").val();
                    signup_username = $("signup_username").val();
                    signup_email = $("signup_emailname").val();
                    signup_phone = $("signup_phone").val();
                    signup_password = $("signup_password").val();
    
                    $.ajax({
                        type: "POST",
                        url: "/user-signup",
                        data: "signup_firstname=" + signup_firstname + "&signup_lastname=" + signup_lastname + "&signup_username=" + signup_username +  "&signup_email=" + signup_email + "&signup_phone=" + signup_phone  "&signup_password=" + signup_password,
                        success: function(html) {
                            if (html == 'true') {
    
                                $("#add_err3").html('<div class="alert alert-success"> \
                                     <strong>Prayer Request</strong> sent. \ \
                                     </div>');
    
                                // window.location.href = "index.php";
    
                            } else if (html == 'false') {
                                $("#add_err3").html('<div class="alert alert-danger"> \
                                     <strong>Prayer Request</strong> not sent. \ \
                                     </div>');
    
                            } else {
                                $("#add_err3").html('<div class="alert alert-danger"> \
                                     <strong>Error</strong> processing request. Please try again. \ \
                                     </div>');
                            }
                        },
                        beforeSend: function() {
                            $("#add_err3").html('<div class="alert alert-primary"> \
                                     loading... \ \
                                     </div>');
                        }
                    });
                    return false;
                });
                // Sign Up Request Ends
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sign Up</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent" style="margin-top: 4%;">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="margin-top: 4%;">
                                    {{-- Sign Up form --}}
                                    <form method="POST" action="/signup">
                                        {{-- @csrf --}}
                                        <div id="add_err3"></div>
                                        <div class="form-group">
                                            <label >First Name</label>
                                            <input type="text" class="form-control" name="signup_firstname"  required>
                                          </div>
                                          <div class="form-group">
                                            <label >Last Name</label>
                                            <input type="text" class="form-control" name="signup_lastname"  required>
                                          </div>
                                          <div class="form-group">
                                            <label >Username</label>
                                            <input type="text" class="form-control" name="signup_username"  required>
                                          </div>
                                        <div class="form-group">
                                          <label >Email address</label>
                                          <input type="email" class="form-control"  name="signup_email" required>
                                          <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label >Phone Number</label>
                                            <input type="text" class="form-control"  name="signup_phone" required minlength="10">
                                          </div>
                                        <div class="form-group">
                                          <label >Password</label>
                                          <input type="password" class="form-control" name="signup_password" required minlength="6">
                                        </div>
                                        <a  href="#!" id="signupBtn" class="btn btn-primary">Sign Up</a>
                                        {{-- <button type="submit" class="btn btn-primary">Sign Up</button> --}}
                                      </form>
                                      <div class="row">
                                        <div class="mr-auto">Don't have an account? <a href="/signup">Signup now</a></div>
                                    </div>
                                    {{-- Sign Up form --}}
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
