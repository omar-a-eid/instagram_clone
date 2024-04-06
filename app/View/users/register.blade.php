<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title> 
    <link rel="stylesheet" href="./public/sass/vender/bootstrap.css">
    <link rel="stylesheet" href="./public/sass/vender/bootstrap.min.css">
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./sass/main.css">
</head>
<body>
    <div class="container">
        <div class="sign_up">
            <div class="content">
                <div class="log-on border_insc">
                    <div class="logo">
                        <img src="./images/logo.png" alt="Instagram logo">
                        <p>Sign up to see photos and videos from your friends.</p>
                

                    </div>
                    <form method="POST" action="{{route('users.handleRegister')}}">
                      @csrf
                        <div>
                            <input type="email" name="email" id="emai" placeholder="email address">
                        </div>
                        
                        <div>
                            <input type="text" name="name" id="name" placeholder="Full Name">
                        </div>
                        <div>
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div>
                            <input type="password" name="password" id="password" placeholder="password">
                        </div>
                        <div class="info">
                            <p>
                                People who use our service may have uploaded your contact information to Instagram. 
                                <a href="#">Learn more</a>
                            </p>
                            <p>
                                By signing up, you agree to our 
                                <a href="#">Terms, Privacy Policy and Cookies Policy.</a> 
                            </p>
                        </div>
                        <button type="submit" class="log_btn">
                          Sign Up
                       </button>

                    </form>
               
                       
                 
                </div>
                <div class="sing-in border_insc">
                    <p>
                        Have an account? 
                        <a href="./login.html">Log in</a>
                    </p>
                </div>
                <div class="download">
                    <p>Get the app.</p>
                    <div>
                        <img src="./images/google_play_icon.png" alt="download app from google play">
                        <img src="./images/microsoft-icon.png" alt="download app from microsoft">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
       
   

</html>