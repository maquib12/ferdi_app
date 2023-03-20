@extends('admin.layout.header')@section('content')
<script type="text/javascript">
    var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Le3_cYaAAAAAPcJsontFd2VQ7YjhjL_XTFSsvyr'
        });
      };

    function validateRecaptcha() {
    var response = grecaptcha.getResponse();
    if (response.length === 0) {
        alert("not validated");
        return false;
    } else {
        alert("validated");
        return true;
    }
}
</script>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper login-bg">
				<div class="row flex-grow">
					<div class="loginLeft align-items-center justify-content-center p-0 d-none d-md-flex col">
						<img src="{{asset('assets/images/login.png')}}">
					</div>
					<div class="col-lg-6 loginRight">
						<div class="d-flex flex-fill flex-column align-items-center justify-content-center">
							<div class="text-center px-4">
								<div class="cross-after">
									<h2 class="text-black weight-700">Reset Password</h2>
									<a href="" class="close position-absolute"><img src="{{asset('assets/images/icons/close.svg')}}"></a>
								</div>
								<p class="h5 weight-400 mt-4 lh-initial text-black">Enter your email address below. We'll look for your account and send you a reset password email.</p>
							</div>
							<div class="auth-form-light text-left mt-3 pt-4 pb-md-0 mx-auto">
								<form method="POST" action="{{ route('password.email') }}" onsubmit="return validateRecaptcha();">
									@csrf
									<div class="form-group">
										<!-- <input type="email" class="form-control weight-400" id="" placeholder="Email*"> -->
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email*" autofocus>

										@error('email')
                                    		<span class="invalid-feedback" role="alert">
                                        		<strong>{{ $message }}</strong>
                                    		</span>
                                		@enderror
									</div>
									<div id="html_element"></div>
									<button class="btn btn-block btn-primary rounded-pill btn-lg mt-md-5" button type="submit">Send Password Reset</button>
								</form>
							</div>
						</div>
						<div class="text-center mt-4 mb-md-4 weight-500">
							Didn't recieved the reset link? <a href="#" class="text-info weight-500">Resend Now</a>
						</div>
					</div>
				</div>
      </div>
    </div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>	
@endsection