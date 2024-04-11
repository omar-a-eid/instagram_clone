<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title> 
    <link rel="stylesheet" href="./public/sass/vender/bootstrap.css">
    <link rel="stylesheet" href="./public/sass/vender/bootstrap.min.css">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./sass/main.css">
    <style>
    .custom-error-style {
    /* Add your custom styles for the error message here */
    background-color: #ffcccc;
    color: #cc0000;
    padding: 4px;
    border-radius: 5px;
    border: 1px solid #cc0000;
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="images d-none d-lg-block">
                <div class="frame">
                    <img src="images/home-phones.png" alt="picutre frame">
                </div>
                <div class="sliders">
                    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="./images/screenshot1.png" class="d-block" alt="screenshot1">
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="content">
                <div class="log-on border_insc">
                    <div class="logo">
                        <img src="./images/logo.png" alt="Instagram logo">
                    </div>
               

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                
                <input type="email" name="email" class="form-control  " id="email" required placeholder="Email">
               
            </div>
            <div class="form-group">
             
                <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
              
                @error('password')
                <div class="alert alert-danger custom-error-style">{{ $message }}</div>
                @enderror
            </div>
            <a href="./home.html">
                <button class="log_btn">
                    Log in
                </button>
            </a>
            <div class="other-ways">
                <div class="seperator">
                    <span class="ligne"></span>
                    <span class="ou">OR</span>
                    <span class="ligne"></span>
                </div>
                <div class="forget-password">
                    <a href="{{route('password.request')}}">
                        Forgot password?
                    </a>
                </div>
            </div>
        </div>
          
        </form>
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
       
   
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
</body>
</html>