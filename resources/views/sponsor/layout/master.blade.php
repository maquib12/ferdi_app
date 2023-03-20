<!DOCTYPE html>
<html lang="en">
  <head>
   @include('sponsor.include.head')
  
  </head>
  <body>
	@php
		$count = Helper::cartCount();
	@endphp
    <header class="py-3">
      <nav class="navbar navbar-expand-lg navbar-light my-1">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('student/assets/img/logo.svg')}}" height="40"></a>
					<a href="" class="ml-auto mr-1 d-md-none"><img src="{{asset('assets/img/icons/bell.svg')}}"></a>
					<div class="nav-item dropdown d-md-none">
						<a class="nav-link d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="E">
							<img src="{{asset('student/assets/img/icons/globe.svg')}}">
						</a>
						<div class="dropdown-menu changeLang dropdown-menu-right">
						</div>
					</div>
					@if(Auth::user())
						<a href="{{route('view_cart')}}" class="mr-4 position-relative d-md-none"><img src="{{asset('assets/img/icons/cart.svg')}}"><span class="count">{{isset($count)?$count:0}}</span></a>
					@else
						<a href="{{route('view_cart')}}" class="mr-4 position-relative d-md-none"><img src="{{asset('assets/img/icons/cart.svg')}}"><span class="count">{{Session::has('cart') ? Session::get('cart')->totalQty : 0}}</span></a>
					@endif
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".mainMenu,#mask" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ml-md-5 mainMenu">
            @include('sponsor.include.topnavbar')
            <div class="form-inline my-2 my-lg-0">
             @yield('adminmenu')
              
            @include('sponsor.include.sidebar')
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
            </div>
          </div>
        </div>
      </nav>
    </header>
     
       
         @include('sponsor.flash-message')
      @yield('content')
      @include('sponsor.include.copyright')
       @include('sponsor.include.modal')
    <!-- Essential javascripts for application to work-->
    @include('sponsor.include.scripts')
		<div id="mask" class="collapse"></div>
    @yield('scripts')
  </body>
</html>