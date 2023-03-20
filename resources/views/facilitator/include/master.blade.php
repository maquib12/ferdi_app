
@php
if(Auth::check()){
	$notification = Helper::notificationMsg();
}
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ferdi - Facilitator</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select-dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@6.6.2/swiper-bundle.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> -->
		<script>
			var baseUrl = "{{url('/')}}";
		</script>
	</head>
  <body class="theme-blue">
		<header class="py-3">
			<nav class="navbar navbar-expand-lg navbar-light my-1">
				<div class="container">
					<a class="navbar-brand" href="#"><img src="{{asset('assets/img/logo.svg')}}" height="40"></a>
					<?php /*<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>*/ ?>
					<div class="d-flex" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							 @if(!Auth::check())
              <li class="nav-item  {{ ( Request::is('/') || Request::is('/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{url('/')}}">{{ __('messages.home') }} <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ ( Request::is('about_us') || Request::is('about_us/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{route('about_us')}}">{{ __('messages.about') }}</a>
              </li>
              <li class="nav-item {{ ( Request::is('our-courses') || Request::is('our-courses/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{route('our-courses')}}">{{ __('messages.courses') }}</a>
              </li>
              <li class="nav-item {{ ( Request::is('blog') || Request::is('blog/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{url('blog')}}">{{ __('messages.blogs') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#contact-us">{{ __('messages.contact us') }}</a>
              </li>
              <li class="nav-item dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="E">
                  <img src="{{asset('student/assets/img/icons/globe.svg')}}" class="mr-2"> English
                </a>
                <div class="dropdown-menu changeLang" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('change?lang=en')}}" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</a>
                  <a class="dropdown-item" href="{{url('change?lang=ar')}}" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</a>
                  <a class="dropdown-item" href="#">Danish</a>
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Finnish</a>
                  <a class="dropdown-item" href="{{url('change?lang=fr')}}" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</a>
                  <a class="dropdown-item" href="#">Georgian</a>
                </div>
              </li>
            	@endif
						</ul>
						<div class="form-inline notification position-relative">
							<a href="javascript:void(0)" class="mr-md-4 nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="icon" onclick="pushNotification();" src="{{asset('assets/img/icons/bell.svg')}}">
								@if(Auth::check())
									@if($notification > 0)
									  <em class="count pushCount">{{$notification}}</em>
									@endif
								@endif
							</a>
							<div class="dropdown-menu dropdown-menu-right px-3" aria-labelledby="dropdownMenuButton">
								<div class="menu-header-content">
									<h6 class="menu-header-title my-0 font-14">Notifications</h6>
									<!-- <h6 class="menu-header-title my-0 font-14 pushCount">2</h6> -->
								</div>
							    <div class="menu-body push_notification">
							    </div>
							    <div class="menu-footer d-none">
								    <a href="" class="btn btn-sm btn-default">View All Notifications</a>
							    </div>
						    </div>
						</div>
						<div class="dropdown mr-md-4">
							@if(Auth::check())
							<button class="btn btn-primary rounded-pill name-initial font-sm-16" type="button" data-toggle="dropdown">
								 @php
								 $name  = strtoupper(Auth::user()->name); ;
										 $words = explode(" ", $name);
											 $firtsName = $words[0];
										 $lastName  = sizeof($words)>1?end($words):"";
										 echo substr($firtsName,0,1);
										 echo substr($lastName ,0,1);
								 @endphp
							</button>
							<div class="dropdown-menu p-0 box dropdown-menu-right flex-column">
								<div class="d-flex info bg-primary px-3 px-md-5 py-4">
									<div class="name-initial bg-white mr-3 font-semibold text-primary">
										 @php
										 $name  = strtoupper(Auth::user()->name); ;
												 $words = explode(" ", $name);
													 $firtsName = $words[0];
												 $lastName  = sizeof($words)>1?end($words):"";
												 echo substr($firtsName,0,1);
												 echo substr($lastName ,0,1);
										 @endphp
									</div>
									<div class="text-white">
										{{Auth::user()->name}}
										@if(Auth::user()->user_type_id == 3)
										<p><i class="fas fa-award"></i>  Mentor</p>
										@else
										<p><i class="fas fa-award"></i>  Facilitator</p>
										@endif
										<p class="font-12 mb-3">{{Auth::user()->email}}</p>
										<a href="{{route('switch')}}" class="btn btn-default-outline font-12 px-4">Switch To Student Account</a>
									</div>
								</div>
								<div class="links py-3 y-scroll slim-scroll">
									<a class="dropdown-item" href="{{route('facilitator_complete_profile')}}"><i class="icon"><img src="{{asset('assets/img/icons/user.svg')}}"></i> My Profile</a>
									<a class="dropdown-item" href="{{route('facilitator_home')}}"><i class="icon"><img src="{{asset('assets/img/icons/user.svg')}}"></i> Dashboard</a>
									<a class="dropdown-item" href="{{route('faci_add_skills')}}"><i class="icon"><img src="{{asset('assets/img/icons/my-courses.svg')}}"></i> Questionnories</a>
									<a class="dropdown-item" href="{{route('refer-n-earn')}}"><i class="icon"><img src="{{asset('assets/img/icons/loan.svg')}}"></i> Refer & Earn</a>
									<a class="dropdown-item" href="{{route('faci_fan_following')}}"><i class="icon"><img src="{{asset('assets/img/icons/favourites.svg')}}"></i> My Fans</a>
									<a class="dropdown-item" href="{{route('wallets')}}"><i class="icon"><img src="{{asset('assets/img/icons/wallet.svg')}}"></i> My Earnings</a>
									<a class="dropdown-item" href="{{route('faci_rating_and_review')}}"><i class="icon"><img src="{{asset('assets/img/icons/wallet.svg')}}"></i> Rating & Reviews</a>
									@if(Auth::user()->user_type_id == 4)
									<a class="dropdown-item" href="{{route('message')}}"><i class="icon"><img src="{{asset('assets/img/icons/messages.svg')}}"></i> Messages</a>
									@endif
									<a class="dropdown-item" href="{{route('forum')}}"><i class="icon"><img src="{{asset('assets/img/icons/forums.svg')}}"></i> Forums</a>
									<a class="dropdown-item" href="{{route('public_forum')}}"><i class="icon"><img src="{{asset('assets/img/icons/forums.svg')}}"></i> Public Forums</a>
									<a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="icon"><img src="{{asset('assets/img/icons/logout.svg')}}"></i> Logout</a>
								</div>
							</div>
							@else
							<button class="btn btn-primary my-2 my-sm-0 rounded-pill px-5 btn-md btn-block btn-md-inline" type="button" data-toggle="modal" data-target="#login"><span class="mx-2">{{ __('messages.login') }}</span></button>
							@endif
						</div>
					</div>
					</div>
				</div>
			</nav>
		</header>
@yield('content')
		<footer class="py-5">
			<div class="container mb-5">
				<div class="row">
					<div class="col-sm-12 mb-5 pb-2">
						<div class="footer-logo"><img src="{{asset('assets/img/logo.svg')}}"></div>
					</div>
					<div class="col-sm-4">
						<div class="widget">
							<div class="h4 font-medium">Pages</div>
							<div class="inner">
								<ul class="arrow-list mt-md-4">
									<li><a href="{{route('facilitator_home')}}">Home</a></li>
									<li><a href="{{route('about-us')}}">About-Us</a></li>
									<li><a href="">Our app</a></li>
									<li><a href="{{route('my-course')}}">Course -Categories</a></li>
									<li><a href="#" data-toggle="modal" data-target="#contact-us">Contact-Us</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="widget">
							<div class="h4 font-medium">Useful links</div>
							<div class="inner">
								<ul class="arrow-list mt-md-4">
									<li><a href="">What We Do</a></li>
									<li><a href="">Our Project</a></li>
									<li><a href="">FAQ</a></li>
									<li><a href="">News and Articles</a></li>
									<li><a href="">Support team</a></li>
									<li><a href="">Events</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="widget">
							<div class="h4 font-medium">Don't miss out</div>
							<div class="inner">
								<p class="font-14 text-capitalize pt-1">sign up for your course for free.</p>
								<form action="" method="" name="" class="pt-1 mt-4">
									<div class="form-group">
										<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="Enter Your Name">
									</div>
									<div class="form-group pb-2">
										<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="Enter Your Email">
									</div>
									<button class="btn btn-primary btn-block py-2 rounded-pill mt-4"><span class="d-block my-1">Send Now</span></button>
								</form>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</footer>
		<div class="copyright bg-dark py-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 font-12">
						Copyright &copy; 2021 I All Rights Reserved
					</div>
					<div class="col-sm-6 font-12 text-center text-md-right d-flex align-items-center justify-content-end">
						<a href="{{route('privacy_policy')}}" class="text-light">Privacy Policy</a>
						<span class="mx-2">|</span>
						<a href="{{route('terms_conditions')}}" class="text-light">Terms & Conditions</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade br" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('assets/img/icons/close.svg')}}">
					</button>
					<div class="step-1 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3">
						<div class="d-flex flex-column">
							<div class="heading mt-3">
							<h3 class="text-dark font-bold text-center mt-4 mb-0">Continue As</h3>
						</div>
							<div class="modal-body d-flex flex-fill align-items-center">
								<div class="list-group font-medium col-sm-8 mx-auto pb-4 px-4 px-md-0 my-5 pt-2">
									<a href="#" class="list-group-item list-primary arrow my-1 my-md-3 px-4 py-3">
										<span class="icon"><img src="{{asset('assets/img/icons/student.jpg')}}" class="mr-4"></span> Student
										<i class="fa fa-angle-right" aria-hidden="true"></i>
									</a>
									<a role="button" data-step="step-2" class="list-group-item list-success arrow my-1 my-md-3 px-4 py-3">
										<img src="{{asset('assets/img/icons/mentor.jpg')}}" class="mr-4"> Facilitator &amp; Mentor
										<i class="fa fa-angle-right" aria-hidden="true"></i>
									</a>
									<a href="#" class="list-group-item list-danger arrow my-1 my-md-3 px-4 py-3">
										<img src="{{asset('assets/img/icons/sponsor.jpg')}}" class="mr-4"> Sponsor
										<i class="fa fa-angle-right" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="step-2 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pb-2">
								<h3 class="font-bold text-center mt-4 mb-4">Log In</h3>
								<p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-4 mb-2">
								<form>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14">
									</div>
									<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Login</span></button>
									<div class="mt-4 text-center">
										<a role="button" data-step="step-3" class="font-14">Forgot Password?</a>
									</div>
								</form>
							</div>
							<div class="text-dark text-center mt-5">
								<div class="mb-4">Don't have an account? <a role="button" data-step="step-4" class="text-primary">Registration</a></div>
								<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy_policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms_conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
							</div>
						</div>
					</div>
					<div class="step-3 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pb-2">
								<h3 class="font-bold text-center mt-4 mb-4">Reset Password</h3>
								<p class="font-14 mb-0">Enter your email address below. We'll look for your account and send you reset password email.</p>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-5">
								<form>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Email*">
									</div>
									<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Send Password Reset</span></button>
								</form>
							</div>
							<div class="text-dark text-center mt-5 pt-5">
								<div class="mt-4">Didn't received the reset link? <a href="" class="text-primary">Resend Now</a></div>
							</div>
						</div>
					</div>
					<div class="step-4 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pb-2">
								<h3 class="font-bold text-center mt-4 mb-4">Registeration</h3>
								<p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
							</div>
							<div class="modal-body col-sm-8 mx-auto">
								<form>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Email*">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Your Password*">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Confirm Password*">
									</div>
									<button type="button" data-step="step-5" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Create Account</span></button>
									<div class="text-dark text-center mt-5 pt-5">
										<div class="mb-4">I have an account. <a role="button" data-step="step-2" class="text-primary">Log In Now</a></div>
										<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy_policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms_conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="step-5 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-0 pb-0">
								<h3 class="font-bold text-center mt-4 mb-2">Complete Your Profile</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto">
								<form>
									<div class="avatar xl mx-auto mb-4 d-table">
										<div class="inner">
											<img src="{{asset('assets/img/users/5.jpg')}}">
											<span class="upload-icon">
												<img src="{{asset('assets/img/icons/edit-circle.svg')}}">
												<input type="file">
											</span>
										</div>
									</div>
									<div class="row pt-4">
										<div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="First Name">
										</div>
										<div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="Last Name">
										</div>
									</div>
									<div class="form-group mobile position-relative d-flex align-items-center">
										<div class="country border-right border-dark">
											<select class="d-inline border-0">
												<option value="">+91</option>
												<option value="">+1</option>
												<option value="">+92</option>
												<option value="" selected>+2345</option>
											</select>
										</div>
										<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="Email*" value="How you heard about the programme ?">
									</div>
									<div class="form-group">
										<select class="form-control rounded-pill px-4 font-14 border-dark lg">
											<option value="">Location Select</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
										</select>
									</div>
									<div class="form-group">
										<select class="form-control rounded-pill px-4 font-14 border-dark lg">
											<option value="">How you heard about the programme ?</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
										</select>
									</div>
									<div class="dragdrop mb-4 pt-4">
										<input type="file">
										<div class="my-2"><img src="{{asset('assets/img/icons/upload.png')}}"></div>
										<p class="mb-3 text-secondary">Upload ID proofs</p>
									</div>
									<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
									<div class="text-dark text-center mt-5 pt-5">
										<div class="mb-4">Complete. <a role="button" data-step="step-6" class="text-primary">My Account</a></div>
										<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy_policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms_conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="step-6 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-0 pb-0">
								<h3 class="font-bold text-center mt-4 mb-2">My Account</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto">
								<form>
									<div class="avatar xl mx-auto mb-4 d-table">
										<div class="inner">
											<img src="{{asset('assets/img/users/5.jpg')}}">
											<span class="upload-icon">
												<img src="{{asset('assets/img/icons/edit-circle.svg')}}">
												<input type="file">
											</span>
										</div>
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter Email Address*">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Change Password*">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter registered email address*">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter New Password *">
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Re-enter New Password *">
									</div>
									<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Submit</span></button>
									<div class="text-dark text-center mt-4 pt-4">
										<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy_policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms_conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Logout Modal -->
		<div class="modal" id="logoutModal" tabindex="-1" role="dialog">
			<div class="modal-dialog logout-dialog modal-dialog-centered" role="document">
				<div class="modal-content logout-content">
					<div class="modal-body logout-wrapper">
						<h3>Logout</h3>
						<p>Are you sure you want to<br>logout?</p>
						<div class="button-groups">
						<a data-dismiss="modal" class="btn btn-line-gray py-1 rounded-pill"><span class="my-2 d-block">No</span></a>
							<a class="btn btn-primary py-1 rounded-pill" href="{{route('logout')}}"><span class="my-2 d-block">Yes</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Logout Modal End -->

    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/select-dropdown.js')}}"></script>
    <script src="{{asset('assets/js/acmeticker.min.js')}}"></script>
    <script src="{{asset('assets/js/fancybox.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper-min.js')}}"></script>
    <script src="{{asset('assets/js/parallax-scroll.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="https://unpkg.com/swiper@6.6.2/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/js/custom_facilitator.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/js/validate.js')}}"></script>
	<script src="{{ asset('js/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		<script>
				$('[data-step]').click(function(){
					var target_elem = $(this).data('step');
					$(this).closest('div[class*="step-"]').slideUp('fast');
					$('.'+target_elem).removeClass('d-none').slideDown('fast');
					console.log(target_elem);
				});
				$('.category-slider .inner span').each(function(){
					var elem_w = $(this).outerWidth();
					$(this).closest('.swiper-slide').width(elem_w+50+'px')
				});
				var swiper = new Swiper(".category-slider", {
					slidesPerView: '6',
					spaceBetween: 20,
					navigation: {
	          nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev'
	        },
	      });

				var swiper = new Swiper(".slider-3col .swiper-container", {
	        breakpoints: {
						640: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						768: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1024: {
							slidesPerView: 3,
							spaceBetween: 30,
						},
					},
					navigation: {
						nextEl: '.swiper-arrow .next',
						prevEl: '.swiper-arrow .prev',
					}
	      });

    	</script>
	</script>

		@yield('scripts')
  </body>
</html>