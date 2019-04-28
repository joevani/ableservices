<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'XINROX AFFILIATE') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>XINROX AFFILIATE</title>

	<!-- Google font file. If you want you can change. -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" rel="stylesheet">

	<!-- Fontawesome font file css -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<!-- Template global css file. Requared all pages -->
	<link rel="stylesheet" type="text/css" href="css/global.style.css">
</head>

<body>

	<div class="wrapper">
		<div class="nav-menu">
			<nav class="menu">

				<!-- Menu navigation start -->
				<div class="nav-container">
					<ul class="main-menu">
						<li class="">
							<a href="{{URL::to('dashboard')}}"><img src="img/content/icons/1.png" alt=""><strong>Dashboard</strong> </a>
						</li>
						<li class="">
							<a href="wallet.html"><img src="img/content/icons/2.png" alt=""><strong>My Walet</strong> </a>
						</li>
						<li class="">
							<a href="trading.html"><img src="img/content/icons/3.png" alt=""><strong>Crypto Trade</strong> </a>
						</li>
						<li class="">
							<a href="buy-sell.html"><img src="img/content/icons/6.png" alt=""><strong>Buy & sell</strong> </a>
						</li>
						<li class="">
							<a href="profile.html"><img src="img/content/icons/5.png" alt=""><strong>Trader Profile</strong> </a>
						</li>
						<li class="">
							<a href="affiliate.html"><img src="img/content/icons/4.png" alt=""><strong>Affiliate System</strong> </a>
						</li>
						<li class="">
							<a href="setting.html"><img src="img/content/icons/11.png" alt=""><strong>Settings</strong> </a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="img/content/icons/9.png" alt=""><strong>Login/Register</strong> <span class="fa fa-angle-down"></span></a>
							<ul>
								<li><a href="login.html" data-loader="show">Login</a></li>
								<li><a href="signup.html" data-loader="show">Register</a></li>
								<li><a href="forgot-password.html" data-loader="show">Forgot Password</a></li>
							</ul>
						</li>

						<li>
							<a href="javascript:void(0);"><img src="img/content/icons/8.png" alt=""> <strong>Wizards</strong> <span class="fa fa-angle-down"></span></a>
							<ul>
								<li><a href="wizard-default.html" data-loader="show">Wizard Default</a></li>
								<li><a href="wizard-fullscreen.html" data-loader="show">Wizard Fullscreen</a></li>
							</ul>
						</li>
						<li class="">
							<a href="charts.html"><img src="img/content/icons/14.png" alt=""><strong>Charts</strong> </a>
						</li>
						<li>
							<a href="forms.html" data-loader="show"><img src="img/content/icons/7.png" alt=""><strong>Form Elements</strong></a>
						</li>
						<li>
							<a href="#"><img src="img/content/icons/10.png" alt=""><strong> Components</strong> <span class="fa fa-angle-down"></span></a>
							<ul>
								<li><a href="tab-bottom.html" data-loader="show">Tab (Bottom)</a></li>
								<li><a href="tab-top.html" data-loader="show">Tab (Top)</a></li>
								<li><a href="accordion.html" data-loader="show">Accordion</a></li>
								<li><a href="popup.html" data-loader="show">Popup Modal</a></li>
								<li><a href="checkbox-list.html" data-loader="show">Check List</a></li>
								<li><a href="link-list.html" data-loader="show">Link List</a></li>
								<li><a href="link-list-two-column.html" data-loader="show">Two Column Links</a></li>
							</ul>
						</li>
						<li class="active">
							<a href="#"><img src="img/content/icons/15.png" alt=""><strong> Pages</strong> <span class="fa fa-angle-down"></span></a>
							<ul>
								<li><a href="profile.html" data-loader="show">User Profile</a></li>
								<li><a href="search-result.html" data-loader="show">Search Results</a></li>
								<li><a href="contact.html" data-loader="show">Contact</a></li>
								<li class="active"><a href="blank.html" data-loader="show">Blank Page</a></li>
							</ul>
						</li>
					</ul>
				</div>
			<!-- Menu navigation end -->
			</nav>
		</div>
		<div class="wrapper-inline">
			<!-- Header area start -->
      yield('head_title')
			<!-- <header> <!-- extra class no-background -->
				<a class="go-back-link" href="javascript:history.back();"><i class="fa fa-arrow-left"></i></a>
				<h1 class="page-title"></h1>
				<div class="navi-menu-button">
					<em></em>
					<em></em>
					<em></em>
				</div>
			</header> -->
			<!-- Header area end -->
			<!-- Page content start -->
			<main>
				<div class="container">
					 yield('content')
				</div>

				<div class="form-divider"></div>

				<footer>
					<div class="container">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						</ul>
						<p>Copyright © All Right Reserved</p>
					</div>
				</footer>

			</main>
			<!-- Page content end -->
		</div>
	</div>


	<!--Page loader DOM Elements. Requared all pages-->
	<div class="sweet-loader">
		<div class="box">
		  	<div class="circle1"></div>
		  	<div class="circle2"></div>
		  	<div class="circle3"></div>
		</div>
	</div>

	<!-- JQuery library file. requared all pages -->
	<script src="{{ asset('Nandova/js/jquery-3.2.1.min.js')}}"></script>

	<!-- Template global script file. requared all pages -->
	<script src="{{ asset('Nandova/js/global.script.js') }}"></script>


</body>


</html>
