<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content rounded-lg">
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
                  <a role="button" data-step="fnm-login" data-target="#login" class="list-group-item list-primary arrow my-1 my-md-3 px-4 py-3">
                    <span class="icon"><img src="{{asset('student/assets_new/img/icons/student.jpg')}}" class="mr-4"></span> Student
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </a>
                  <a role="button" data-step="fnm-login" data-target="#login" class="list-group-item list-success arrow my-1 my-md-3 px-4 py-3">
                    <img src="{{asset('student/assets_new/img/icons/mentor.jpg')}}" class="mr-4"> Facilitator &amp; Mentor
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </a>
                  <a role="button" data-step="spr-login" data-target="#login" class="list-group-item list-danger arrow my-1 my-md-3 px-4 py-3">
                    <img src="{{asset('student/assets_new/img/icons/sponsor.jpg')}}" class="mr-4"> Sponsor
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="step- fnm-login overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none h-100">
            <div class="d-flex flex-column h-100">
              <div class="heading text-dark text-center mx-auto col-sm-9 px-md-5 mb-2 mb-md-4 pb-2">
                <h3 class="font-bold text-center mt-4 mb-4">Log In</h3>
                <p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
              </div>
              <div class="modal-body col-sm-8 mx-auto pb-4 mb-2">
                <form method="POST" action="{{ route('facilogin') }}">
                  @csrf
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email*" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group password-field">
                    <input id="password" type="password" class="form-control rounded-pill p-4 font-14 @error('password') is-invalid @enderror" name="password" placeholder="Password*" required autocomplete="current-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <button class="btn btn-primary btn-block py-1 rounded-pill mt-5" type="submit"><span class="my-2 d-block">{{ __('Login') }}</span></button>
                </form>
                  <div class="mt-4 text-center">
                    <a role="button" data-step="reset-step" data-target="#login" class="font-14">Forgot Password?</a>
                  </div>
              </div>
              <div class="text-dark text-center mt-4 pt-1">
                <div class="mb-4">Don't have an account? <a role="button" data-step="fnm-step-4" data-target="#login" class="text-primary">Registration</a></div>
                <p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy-policy')}}" class="text-underline-light text-muted">Privacy Policy</a> and <a href="{{route('terms-n-conditions')}}" class="text-underline-light text-muted">Terms of Service</a></p>
              </div>
            </div>
          </div>
          <div class="reset-step overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none h-100">
            <div class="d-flex flex-column h-100">
              <div class="heading text-dark text-center mx-auto col-sm-9 px-md-5 mb-2 mb-md-4 pb-2">
                <h3 class="font-bold text-center mt-4 mb-4">Reset Password</h3>
                <p class="font-14 mb-0">Enter your email address below. We'll look for your account and send you reset password email.</p>
              </div>
              <div class="modal-body col-sm-8 mx-auto pb-5">
                <form action="{{route('forget')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" name="email" placeholder="Enter Your Email*">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Send Password Reset</span></button>
                </form>
              </div>
              <div class="text-dark text-center mt-5 pt-5">
                <div class="mt-4">Didn't received the reset link? <a href="" class="text-primary">Resend Now</a></div>
              </div>
            </div>
          </div>
          <div class="fnm-step-4 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
            <div class="d-flex flex-column">
              <div class="heading text-dark text-center mx-auto col-sm-9 px-md-5 mb-2 mb-md-4 pb-2">
                <h3 class="font-bold text-center mt-4 mb-4">Registration</h3>
                <p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
              </div>
              <div class="modal-body col-sm-8 mx-auto">
                <form method="POST" action="{{ route('registration') }}">
                  @csrf
                  <div class="form-group">
                    <input id="email" type="email" class="form-control rounded-pill p-4 font-14 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email*">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <!-- <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Email*"> -->
                  </div>
                  <!-- <div class="form-group mobile position-relative d-flex align-items-center">
                    <div class="country border-right">
                      <select class="d-inline border-0">
                        <option value="">+91</option>
                        <option value="">+1</option>
                        <option value="">+92</option>
                        <option value="" selected="">+2345</option>
                      </select>
                    </div>
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Mobile Number*">
                  </div> -->
                  <div class="form-group">
                    <input id="password" type="password" class="form-control rounded-pill p-4 font-14 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Your Password*">
                    <!-- <input class="form-control rounded-pill p-4 font-14" placeholder="Your Password*"> -->

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <!-- <input class="form-control rounded-pill p-4 font-14" placeholder="Confirm Password*"> -->
                    <input id="password-confirm" type="password" class="form-control rounded-pill p-4 font-14" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Confirm Password*">
                  </div>
                  <input type="hidden" name="refer" value="{{isset($ref)?$ref:''}}">
                  <input type="hidden" name="user_type" value="4">
                  <input type="hidden" name="status" value="2">
                  <button type="submit" data-step="fnm-step-5" data-target="#login" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Create Account</span></button>
                  </form>
                  <div class="text-dark text-center mt-5 pt-5">
                    <div class="mb-4">I have an account. <a role="button" data-step="fnm-login" data-target="#login" class="text-primary">Log In Now</a></div>
                    <p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy-policy')}}" class="text-underline-light text-muted">Privacy Policy</a> and <a href="{{route('terms-n-conditions')}}" class="text-underline-light text-muted">Terms of Service</a></p>
                  </div>
              </div>
            </div>
          </div>
<!--           <div class="fnm-step-5 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
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
                    <div class="mb-4">Complete. <a role="button" data-step="fnm-step-6" data-target="#login" class="text-primary">My Account</a></div>
                    <p class="font-12 text-muted">By logging in, you agree to our <a href="" class="text-underline-light text-muted">Privacy Policy</a> and <a href="" class="text-underline-light text-muted">Terms of Service</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="fnm-step-6 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
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
                    <p class="font-12 text-muted">By logging in, you agree to our <a href="" class="text-underline-light text-muted">Privacy Policy</a> and <a href="" class="text-underline-light text-muted">Terms of Service</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div> -->
          <div class="spr-login overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none h-100">
            <div class="d-flex flex-column h-100">
              <div class="heading text-dark text-center mx-auto w-75 px-5 mb-4">
                <h3 class="font-bold text-center mt-4 mb-0">Sponser Log In</h3>
              </div>
              <div class="modal-body col-sm-8 mx-auto pb-4 mb-2">
                <form>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Email*">
                  </div>
                  <div class="form-group mb-4 pb-2">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Password*">
                  </div>
                  <button class="btn btn-primary btn-block py-1 rounded-pill"><span class="my-2 d-block">Login</span></button>
                  <div class="mt-4 text-center">
                    <a role="button" data-step="reset-step" data-target="#login" class="font-14">Forgot Password?</a>
                  </div>
                </form>
              </div>
              <div class="text-dark text-center mt-4 pt-1">
                <div class="mb-4">Don't have an account? <a role="button" data-step="spr-signup" data-target="#login" class="text-primary">Sign Up Now</a></div>
                <p class="font-12 text-muted">By logging in, you agree to our <a href="" class="text-underline-light text-muted">Privacy Policy</a> and <a href="" class="text-underline-light text-muted">Terms of Service</a></p>
              </div>
            </div>
          </div>
          <div class="spr-signup overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
            <div class="d-flex flex-column">
              <div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pb-2">
                <h3 class="font-bold text-center mt-4 mb-4">Sign Up</h3>
              </div>
              <div class="modal-body col-sm-8 mx-auto">
                <form>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Email*">
                  </div>
                  <div class="form-group mobile position-relative d-flex align-items-center">
                    <div class="country border-right">
                      <select class="d-inline border-0">
                        <option value="">+91</option>
                        <option value="">+1</option>
                        <option value="">+92</option>
                        <option value="" selected="">+2345</option>
                      </select>
                    </div>
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Mobile Number*">
                  </div>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Password*">
                  </div>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Re-Enter Your Password*">
                  </div>
                  <button type="button" data-step="av-step" data-target="#login" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Create Account</span></button>
                  <div class="text-dark text-center mt-5 pt-5">
                    <div class="mb-4">I have an account. <a role="button" data-step="fnm-step-2" data-target="#login" class="text-primary">Log In Now</a></div>
                    <p class="font-12 text-muted">By logging in, you agree to our <a href="" class="text-underline-light text-muted">Privacy Policy</a> and <a href="" class="text-underline-light text-muted">Terms of Service</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="av-step overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none h-100">
            <div class="d-flex flex-column h-100">
              <div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pb-2">
                <h3 class="font-bold text-center mt-4 mb-4">Account Verification</h3>
                <p class="font-14 mb-0">Enter the code sent to <b>+91 9898989898</b></p>
              </div>
              <div class="modal-body col-sm-8 mx-auto">
                <form>
                  <div class="form-group d-flex otp mt-3 mb-4 otpInput">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                    <input type="text" class="form-control mx-2" value="" maxlength="1" autocomplete="off">
                  </div>
                  <button type="button" data-step="spr-cp" data-target="#login" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Verify</span></button>
                </form>
              </div>
              <div class="text-dark text-center mt-5 pt-5">
                <div class="mb-4">Resend code in <span class="text-primary">00:58 Sec</span></div>
              </div>
            </div>
          </div>
          <div class="spr-cp overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
            <div class="d-flex flex-column">
              <div class="heading text-dark text-center mx-auto w-75 px-5 mb-3">
                <h3 class="font-bold text-center mt-4">Complete Your Profile</h3>
              </div>
              <div class="modal-body col-sm-8 mx-auto">
                <form>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Business Name*">
                  </div>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Business Owner Name*">
                  </div>
                  <div class="form-group">
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Email Address*">
                  </div>
                  <div class="form-group">
                    <div class="form-control rounded-pill p-4 font-14 lg d-flex align-items-center uploadFile">
                      Business Logo* (<small>Browse From Device Or Drag & Drop</small>)
                      <input type="file">
                    </div>
                  </div>
                  <div class="form-group mobile position-relative d-flex align-items-center">
                    <select class="form-control rounded-pill px-4 py-0 lg font-14 text-dark">
                      <option value="" selected>Business Type*</option>
                      <option value="">Type A</option>
                      <option value="">Type B</option>
                      <option value="">Type C</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="form-control rounded-pill p-4 font-14 lg d-flex align-items-center uploadFile">
                      Upload ID Proofs* (<small>Browse From Device Or Drag & Drop</small>)
                      <input type="file">
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="accept">
                    <label class="form-check-label text-muted font-14" for="accept" role="button">
                      I accept all <a href="">Privacy Policy</a> and <a href="">Terms & Conditions</a>
                    </label>
                  </div>
                  <button type="button" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Submit</span></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade br" id="contact-us" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
        <div class="modal-content mt-md-5 rounded-lg">
          <button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
            <img src="assets/img/icons/close.svg">
          </button>
          <div class="overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3">
            <div class="d-flex flex-column pb-5">
              <div class="heading text-dark text-center mx-auto w-75 px-5 mb-0 pb-0">
                <h3 class="font-bold text-center mt-4 mb-2">Contact Us</h3>
              </div>
              <div class="modal-body col-sm-8 mx-auto">
                <form action="{{route('contact_us')}}" method="post">
                  @csrf
                  <div class="row pt-4">
                    <div class="form-group col-sm-6">
                      <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your First Name*" name="first_name" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Last Name*" name="last_name" required>
                    </div>
                  </div>
                  <div class="form-group mobile position-relative d-flex align-items-center">
                    <div class="country border-right">
                      <select class="d-inline border-0" name="code">
                        <option value="+91" selected>+91</option>
                        <option value="+1">+1</option>
                        <option value="+92">+92</option>
                        <option value="+2345">+2345</option>
                      </select>
                    </div>
                    <input class="form-control rounded-pill p-4 font-14" placeholder="Enter Your Mobile Number*" name="phone_no" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control rounded-pill p-4 font-14" placeholder="Email*"  name="email" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control rounded-md px-4 py-3 font-14 lg h-auto" rows="8" placeholder="Write here..." name="text"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Submit</span></button>
                </form>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
	
	