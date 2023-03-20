
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
		<a class="navbar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('assets/images/logo-inner.svg')}}" alt="logo" /></a>
		<a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
			<img src="{{asset('assets/images/logo-sm.svg')}}" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
			<span class="mdi mdi-menu"></span>
		</button>
		<h3 class="my-0 text-black weight-600 font-20">{{$page}}</h3>
		<ul class="navbar-nav navbar-nav-right">
			<li class="nav-item nav-notification dropdown">
				<a class="nav-link" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="{{asset('assets/images/icons/notification.svg')}}">
					<em class="count">2</em>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<div class="menu-header-content">
						<h5 class="menu-header-title">Notifications</h5>
						<h6 class="menu-header-subtitle mb-0">You have <b>21</b> unread messages</h6>
					</div>
					<div class="menu-body">
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
						<div class="item">
							<p>BCA 123 - New Order , Loka City , 3 Items, Pending</p>
							<div class="dateTime">26/06/2020 , 10:30 AM</div>
						</div>
					</div>
					<div class="menu-footer">
						<a href="" class="btn btn-sm btn-default">View All Notifications</a>
					</div>
				</div>
			</li>
			<li class="nav-item nav-profile dropdown">
				<a href="" class="nav-link" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="nav-profile-img">
						<img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
					</div>
					<div class="nav-profile-text">
						<p class="mb-1 text-black">{{auth()->user()->name}}</p>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{{route('password_change')}}"><i class="mdi mdi-key-variant mr-2"></i> Change Password</a>
					<a class="dropdown-item" href="{{route('logout')}}"><i class="mdi mdi-logout mr-2"></i> Logout</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>
