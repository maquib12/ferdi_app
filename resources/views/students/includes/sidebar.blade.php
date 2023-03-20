@php
  $count = Helper::cartCount();
@endphp

<a href="" class="mr-4"><img src="{{asset('student/assets_new/img/icons/bell.svg')}}"></a>
              @if(Auth::user())
              <a href="{{route('view_cart')}}" class="mr-4"><img src="{{asset('assets/img/icons/cart.svg')}}">[{{isset($count)?$count:0}}]</a>
              @else
              <a href="{{route('view_cart')}}" class="mr-4"><img src="{{asset('assets/img/icons/cart.svg')}}">[{{Session::has('cart') ? Session::get('cart')->totalQty : 0}}]</a>
              @endif
              <div class="dropdown mr-4">
                @if(isset(Auth::user()->name))
                  <button class="btn btn-primary rounded-pill name-initial" type="button" data-toggle="dropdown">
                    @php
                          $name  = strtoupper(Auth::user()->name); ;
                          $words = explode(" ", $name);
                          $firtsName = $words[0];
                          $lastName  = sizeof($words)>1?end($words):"";
                          echo substr($firtsName,0,1);
                          echo substr($lastName ,0,1);
                    @endphp
                  </button>
                @else
                  <button class="btn btn-primary rounded-pill name-initial" type="button" data-toggle="dropdown">
                    FN
                  </button>
                @endif

                <div class="dropdown-menu p-0 box dropdown-menu-right flex-column">
                  <div class="d-flex info bg-primary px-5 py-4">
                    @if(isset(Auth::user()->name))
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
                    @else
                      <div class="name-initial bg-white mr-3 font-semibold text-primary">
                        FN
                      </div>
                    @endif

                    <div class="text-white">
                      @if(isset(Auth::user()->name))
                        {{Auth::user()->name}}
                      @else
                        Full Name
                      @endif
                      <p class="font-12 mb-3">{{Auth::user()->email}}</p>
                      <a href="" class="btn btn-default-outline font-12 px-4">Switch To Student Account</a>
                    </div>
                  </div>
                  @if(Auth::user()->user_type_id == 6)
                  <div class="links py-3 y-scroll slim-scroll">
                    <a class="dropdown-item" href="{{route('students_profile')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> My Courses</a>
                    <a class="dropdown-item" href="{{route('my-sponsored-course')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> My Sponsored Courses</a>
                    <a class="dropdown-item" href="{{route('view_cart')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> My Cart</a>
                    <a class="dropdown-item" href="{{route('loan')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/my-courses.svg')}}"></i> Loans</a>
                    <a class="dropdown-item" href="{{route('view_favourites')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> Favourites</a>
                    <a class="dropdown-item" href="{{route('student-wallet')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> Wallet </a>
                    <a class="dropdown-item" href="{{route('refer-earn')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/loan.svg')}}"></i> Refer & Earn</a>
                    <a class="dropdown-item" href="{{route('stu-notifications')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/favourites.svg')}}"></i>Notifications</a>
                    <a class="dropdown-item" href="{{route('stu-message')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/messages.svg')}}"></i> Messages</a>
                    <a class="dropdown-item" href="{{route('student_forum')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/forums.svg')}}"></i> Forums</a>
                    <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="icon"><img src="{{asset('student/assets_new/img/icons/logout.svg')}}"></i> Logout</a>
                  </div>
                  @else
                  <div class="links py-3 y-scroll slim-scroll">
                    <a class="dropdown-item" href="{{route('sponsored_course')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> Sponsored Courses</a>
                    <a class="dropdown-item" href="{{route('view_cart')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> My Cart</a>
                    <a class="dropdown-item" href="{{route('view_favourites')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> Favourites</a>
                    <a class="dropdown-item" href="{{route('sponsor-wallet')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/user.svg')}}"></i> Wallet </a>
                    <a class="dropdown-item" href="{{route('reports')}}"><i class="icon" ><img src="{{asset('student/assets_new/img/icons/forums.svg')}}"></i> Reports</a>
                    <a class="dropdown-item" href="{{route('refer-earn')}}"><i class="icon"><img src="{{asset('student/assets_new/img/icons/loan.svg')}}"></i> Refer & Earn</a>
                    <a class="dropdown-item" href="#"><i class="icon"><img src="{{asset('student/assets_new/img/icons/favourites.svg')}}"></i>Notifications</a>
                    
                    <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="icon"><img src="{{asset('student/assets_new/img/icons/logout.svg')}}"></i> Logout</a>
                  </div>
                  @endif
                </div>
              </div>
