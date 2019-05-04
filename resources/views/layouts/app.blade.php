<!DOCTYPE html> <html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ABLE Services - Clean and Go</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

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

		<!-- <script>
				$(function() {
					showNotification();
					var options = {
						body: 'Welcome to ABLE Services.', // body part of the notification
						dir: 'ltr', // use for derection of message
						image:'/images/icons/192.png' // use for show image

					}
										var myNotify = new Notification('Titles', options);
					});


					function showNotification() {
							if(window.Notification) {
									Notification.requestPermission(function(status) {
											console.log('Status: ', status); // show notification permission if permission granted then show otherwise message will not show
								var options = {
										body: 'Welcome to ABLE Services.', // body part of the notification
										dir: 'ltr', // use for direction of message
										image:'/images/icons/192.png' // use for show image

									}
										var n = new Notification('New Message', options);
									});
							}
							else {
									alert('Your browser doesn\'t support notifications.');
							}
					}

			</script> -->

			<script type="text/javascript">


			$(function(){
							setInterval(getNotificationFeed, 1000);
							setInterval(getNotificationMessage, 1000);
							setInterval(getNotificationMemo, 1000);

			});



				function getNotificationFeed() {

							$.ajax({
								 type:'GET',
								 url:'/notification/message',
								 data:{},
								 success:function(data){
									 	if(data.feed > 0) {
												$('#feed').html(data.feed);
										}
										if(data.feeds > 0) {
												$('#feeds').html(data.feeds);
										}

								 }

							});
				}

				function getNotificationMessage() {

							$.ajax({
								 type:'GET',
								 url:'/notification/chat',
								 data:{},
								 success:function(data){
										if(data.message < 1) {
													if(data.chat > 0){
																$('#chat').html('<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.chat+'</span>');
																	$('#chat1').html('<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.chat+'</span>');
													}

										}
										if(data.message > 0) {
												$('#chat').html('<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.message+'</span>');
												$('#chat1').html('<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.message+'</span>');
										}

								 }

							});
				}

				function getNotificationMemo() {

							$.ajax({
								 type:'GET',
								 url:'/notification/memo',
								 data:{},
								 success:function(data){
										if(data.memo > 0) {
												$('#memo').html('	<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.memo+'</span>');
												$('#memo1').html('	<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">'+data.memo+'</span>');


										}


								 }

							});
				}



</script>


</body>

</html>
