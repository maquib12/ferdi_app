<!DOCTYPE html>
<html lang="en">
  <head>
   @include('students.includes.head')
  
  </head>
  <body>
    <header class="py-3">
      <nav class="navbar navbar-expand-lg navbar-light my-1">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('student/assets_new/img/logo.svg')}}" height="40"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".mainMenu,#mask" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ml-md-5 mainMenu">
            @include('students.includes.topnavbar')
            <div class="form-inline my-2 my-lg-0">
             @include('students.includes.sidebar')
            </div>
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
      </nav>
    </header>
     
       
         @include('sponsor.flash-message')
      @yield('content')
      @include('students.includes.copyright')
       @include('students.includes.modal')
    <!-- Essential javascripts for application to work-->
    @include('students.includes.scripts')
		<div id="mask" class="collapse"></div>
    @yield('scripts')
  </body>
</html>