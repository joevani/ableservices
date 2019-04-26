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
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/icons/Icon-152.png') }}" >
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/Icon-180.png') }}" >
	<link rel="apple-touch-icon" sizes="167x167" href="{{ asset('images/icons/Icon-167.png') }}" >
	<link rel="apple-touch-startup-image"  href="{{ asset('images/icons/Icon-180.png') }}" >

	<link href="{{ asset('images/icons/Icon-splash-640x1136.png')}}" media="(device-width: 640px) and (device-height: 1136px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphone6_splash.png')}}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphoneplus_splash.png')}}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonex_splash.png')}}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonexr_splash.png')}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/iphonexsmax_splash.png')}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipad_splash.png')}}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro1_splash.png')}}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro3_splash.png')}}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="{{ asset('splashscreens/ipadpro2_splash.png')}}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

  <link rel="manifest" href="{{ asset('manifest.json')}}">

  <script type="text/javascript">
	'use strict';
				if ('serviceWorker' in navigator) {
				navigator.serviceWorker.register('/service-worker.js').then(function(reg) {
				  console.log('ServiceWorker registration successful with scope: ', reg.scope);
				reg.onupdatefound = function() {
								// The updatefound event implies that reg.installing is set; see
								// https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-container-updatefound-event
								var installingWorker = reg.installing;
								installingWorker.onstatechange = function() {
												switch (installingWorker.state) {
												case 'installed':
															if (navigator.serviceWorker.controller) {
																// At this point, the old content will have been purged and the fresh content will
																// have been added to the cache.
																// It's the perfect time to display a "New content is available; please refresh."
																// message in the page's interface.
																console.log('New or updated content is available.');
															} else {
																// At this point, everything has been precached.
																// It's the perfect time to display a "Content is cached for offline use." message.
																console.log('Content is now available offline!');
															}
													break;
												case 'redundant':
													console.error('The installing service worker became redundant.');
													break;
												}
								};
				};
				}).catch(function(e) {
				console.error('Error during service worker registration:', e);
				});
			}
</script>

</head>

<body class="bg_darck">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">

                <a href="index.html" class="login_close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </a>
                <form method="POST" id="form" action="{{ route('login') }}">
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
                            <input type="text" name="username" class="form-control" placeholder="Username">
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
                        <button type="submit" id="btn_login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

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
    <script type="text/javascript" src="{{ asset('capstone/Template/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('capstone/Template/assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('capstone/Template/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('capstone/Template/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('capstone/Template/assets/js/custom.js')}}" type="text/javascript"></script>

    <script>

        $(function() {
              $('#form').submit(function(){
                $('#btn_login').html('<span class="fa fa-spin fa-spinner"></span>');
              });

        });

    </script>

    <script>

    // This is the "Offline page" service worker

    // Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

    // Check compatibility for the browser we're running this in
    // if ("serviceWorker" in navigator) {
    //       if (navigator.serviceWorker.controller) {
    //       console.log("[PWA Builder] active service worker found, no need to register");
    //       } else {
    //       // Register the service worker
    //       navigator.serviceWorker
    //       .register("pwa-builder.js", {
    //         scope: "./"
    //       })
    //       .then(function (reg) {
    //         console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
    //       });
    //       }
    // }

    </script>

    <script>

//     $(function(){
//       var installPromptEvent;
//           var btnInstall = document.querySelector('.install');
//
//           window.addEventListener('beforeinstallprompt', function (event) {
//             event.preventDefault();
//             installPromptEvent = event;
//             btnInstall.removeAttribute('disabled');
//           });
//
//           btnInstall.click( function () {
//             btnInstall.setAttribute('disabled', '');
//             installPromptEvent.prompt();
//             installPromptEvent.userChoice.then((choice) => {
//                 if (choice.outcome === 'accepted') {
//                     console.log('User accepted the A2HS prompt');
//                 } else {
//                     console.log('User dismissed the A2HS prompt');
//                 }
//                 installPromptEvent = null;
//             });
//           });
//
// });




    </script>

</body>

</html>
