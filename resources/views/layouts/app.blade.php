<!DOCTYPE html> <html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ABLE Services - Clean and Go</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">


	<link rel="manifest" href="{{ asset('manifest.json')}}">
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

	<!-- <script type="text/javascript">
	'use strict';
			if ('serviceWorker' in navigator) {
					// Your service-worker.js *must* be located at the top-level directory relative to your site.
					// It won't be able to control pages unless it's located at the same level or higher than them.
					// *Don't* register service worker file in, e.g., a scripts/ sub-directory!
					// See https://github.com/slightlyoff/ServiceWorker/issues/468
					navigator.serviceWorker.register('/service-worker.js').then(function(reg) {
					// updatefound is fired if service-worker.js changes.
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
</script> -->

	@yield('styles')
</head>

<body>
	<div id="loader_wrpper">
		<div class="loader_style"></div>
	</div>

	<div class="wrapper">
		<!-- header -->
	 @include('layouts.header')
		<!-- header_End -->
		<!-- Content_right -->
		<div class="container_full">

			<!--SIDEBAR-->
				@include('layouts.menu')
			<!--END SIDEBAR-->

			<div class="content_wrapper">
					<div id="app">
						@yield('content')
					</div>

			</div>
		</div>
		<!-- Content_right_End -->
		<!-- Footer -->
		@include('layouts.footer')
		<!-- Footer_End -->
	</div>

	<script src="{{ asset('js/app.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/owl.carousel.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('capstone/Template/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{ asset('capstone/Template/assets/js/custom.js')}}" type="text/javascript"></script>
	@yield('scripts')
</body>

</html>
