@extends('admin.layout.master')
@section('content')
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-md-7 m-auto grid-margin stretch-card pt-2 px-5">
							<div class="card mt-2 pt-3 px-4">
								<div class="card-body">
									<h3 class="title text-center">Change Your Password</h3>
									<div class="auth-form-light text-left mt-4">
										@if($errors->any())
											<h4 class="text-danger">{{$errors->first()}}</h4>
										@endif
										<form id="change_password" method="post" action="{{route('passwordChange')}}">
											@csrf
											<div class="form-group password-field">
												<input type="password" class="form-control lg rounded-pill border-dark lock-icon" name="current_password" id="current_pwd" placeholder="Enter Your Current Password" required>
												<i class="showPassword text-black"></i>
											</div>
											<div class="form-group password-field">
												<input type="password" class="form-control lg rounded-pill border-dark lock-icon" name="password" id="password" placeholder="Enter Your New Password" required>
												<i class="showPassword text-black"></i>
											</div>
											<div class="form-group password-field">
												<input type="password" class="form-control lg rounded-pill border-dark lock-icon" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password" required>
												<i class="showPassword text-black"></i>
											</div>
											<div class="col-sm-7 mx-auto mb-3">
												<input type="submit" class="btn btn-primary btn-block rounded-pill btn-lg px-2" value="Save Changes">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
        $('#password').on('keypress', function(e) {
            if (e.which == 32){
                return false;
            }
        });
	});
	$(function() {
        $('#confirm_password').on('keypress', function(e) {
            if (e.which == 32){
                return false;
            }
        });
	});
</script>