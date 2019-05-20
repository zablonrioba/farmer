
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/fa/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    
</head>

<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="#">Illuminum Green House</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active" role="presentation"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#"><i class="fa fa-shopping-cart"></i>&nbsp; Cart</a></li>
                        <li role="presentation"><a href="#">Login</a></li>
                        <li role="presentation"><a href="#">Register</a></li>
                    
                    </ul>
            </div>
    </div>
    </nav>
    </div>
   



@yield('content')

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-6 item text">
                        <h3>Illuminum Green House</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col-md-3 col-md-pull-6 col-sm-4 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-md-pull-6 col-sm-4 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-4 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2016</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>

</html>