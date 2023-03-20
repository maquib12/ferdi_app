@extends('admin.layout.header')@section('content')
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper login-bg">
				<div class="row flex-grow">
					<div class="loginLeft align-items-center justify-content-center p-0 d-none d-md-flex col">
						<img src="{{asset('assets/images/login.png')}}">
					</div>
					<div class="col-lg-6 loginRight">
						<div>
							<div class="brand-logo text-center mb-4 mb-md-5 pb-md-4">
								<img src="{{asset('/assets/images/logo.svg')}}">
							</div>
							<div class="auth-form-light text-left pb-md-0">
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email*" required autocomplete="email" autofocus>

										@error('email')
                                    		<span class="invalid-feedback" role="alert">
                                        		<strong>{{ $message }}</strong>
                                    		</span>
                                		@enderror
										<!-- <input type="email" class="form-control weight-400" id="" placeholder="Email*"> -->
									</div>
									<div class="form-group password-field">
										<!-- <input type="password" class="form-control unlock-icon weight-400" id="" placeholder="Password*"> -->
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password*" required autocomplete="current-password">

										@error('password')
                                    		<span class="invalid-feedback" role="alert">
                                        		<strong>{{ $message }}</strong>
                                    		</span>
                                		@enderror
										<?php /*<i class="showPassword text-black"></i>*/ ?>
									</div>
									<button class="btn btn-block btn-primary rounded-pill btn-lg" type="submit">{{ __('Login') }}</button>
									<div class="text-center mt-4 mt-md-5 pt-md-5">
										@if (Route::has('password.request'))
											<!-- <a href="#" class="text-info weight-500">Forgot Password?</a> -->
											<a class="text-info weight-500" href="{{ route('password.request') }}">
												{{ __('Forgot Password?') }}
                                    		</a>
										@endif
									</div>
								</form>
							</div>
							<div class="text-center">
								<a href="{{route('forget_password')}}" class="text-primary">Forgot Password?</a>
							</div>
						</div>
					</div>
				</div>
      </div>
    </div>

@endsection
