<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <!-- google font -->

    <link rel="manifest" href="{{ asset('manifest.json')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
  	<link href="{{ asset('capstone/Template/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('capstone/Template/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('capstone/Template/assets/css/line-awesome.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('capstone/Template/assets/css/ionicons.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('capstone/Template/assets/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('capstone/Template/assets/css/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
  	<link href="{{ asset('capstone/Template/assets/css/weather-icons.min.css')}}" rel="stylesheet">
  	<!--Morris Chart -->
  	<link rel="stylesheet" href="{{ asset('capstone/Template/assets/js/index/morris-chart/morris.css')}}">
  	<!-- owl_carousel -->
  		<link rel="stylesheet" type="text/css" href="{{ asset('capstone/Template/assets/css/owl.carousel.min.css')}}">

  	<link href="{{ asset('capstone/Template/assets/css/style.css')}}" rel="stylesheet">
  	<link href="{{ asset('capstone/Template/assets/css/responsive.css')}}" rel="stylesheet">

    <link rel="apple-touch-icon" href="{{ asset('Nandova/img/iphonetouch.png') }}" >
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('Nandova/img/152x152.png') }}" >
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('Nandova/img/180x180.png') }}" >
	<link rel="apple-touch-icon" sizes="167x167" href="{{ asset('Nandova/img/167x167.png') }}" >
	<link rel="apple-touch-startup-image"  href="{{ asset('Nandova/img/180x180.png') }}" >

	<link href="{{ asset('splashscreens/iphone5_splash.png')}}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphone6_splash.png')}}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphoneplus_splash.png')}}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonex_splash.png')}}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonexr_splash.png')}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonexsmax_splash.png')}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipad_splash.png')}}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro1_splash.png')}}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro3_splash.png')}}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro2_splash.png')}}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
</head>

<body class="bg_darck">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">

                <a href="index.html" class="login_close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </a>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                          <img src="{{ asset('capstone/Template/assets/images/logo.jpg')}}"  alt="">
                          @if(Session::get('message'))
                           <div class="alert alert-danger">{{Session::get('message')}}</div>
                       @endif

                       @if ($errors->has('username'))
                                <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                        @endif
                        @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                         @endif
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                        <!-- <div class="register-link m-t-15 text-center">
                            <p>Don't have account ?
                                <a href="#"> Sign Up Here</a>
                            </p>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>
</body>

</html>
