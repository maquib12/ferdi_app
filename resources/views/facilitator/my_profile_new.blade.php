@extends('facilitator.include.master')
@section('content')
<section class="py-3 py-md-5">
			<div class="container">
				@if(isset($message) && $message != null)
					<div class = "alert alert-info">{{$message}}</div>
				@endif
				<div class="card bg-blue p-4 rounded-md my-md-3">
					<div class="row">
						<div class="thumbnail-xxl rounded-md overflow-hidden mx-3 mb-4 mb-md-0">
							<div class="inner bg-theme-blue">
								@if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
								<img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}">
								@else
								<img src="{{asset('assets/img/img-8.jpg')}}">
								@endif
							</div>
							
						</div>
						<div class="col d-flex flex-column">
							<div class="flex-fill">
								<div class="d-flex align-items-center">
									@if($user['name'] != null)
									<h1 class="text-uppercase my-0 flex-fill font-sm-24"><b>{{$user['name']}}</b></h1>
									@else
									<h1 class="text-uppercase my-0 flex-fill"><b></b></h1>
									@endif
									<a href="" data-toggle="modal" data-target="#edit-profile" class="edit"><img src="{{asset('assets/img/icons/edit-circle-light.svg')}}"></a>
								</div>
								@if($user['userdetails'] != null)
								@if($user['userdetails']['business_industry'] == 1)
								<div class="font-xlight font-18 font-sm-14">Teaches Educational Training</div>
								@elseif($user['userdetails']['business_industry'] == 2)
								<div class="font-xlight font-18 font-sm-14">Teaches Technical Training</div>
								@else
								<div class="font-xlight font-18 font-sm-14">Teaches Production Industry</div>
								@endif
								@endif
								<div class="d-flex align-items-center mt-3 mb-4">
									@if($avg_star_rating == null)
									<span class="mr-1"><span>
									@else
									<span class="mr-1">{{$avg_star_rating}}</span>
									@endif
									<div class="text-orange mx-2">
										@php
											$avg_star_rating_explode = 0;
											if($avg_star_rating != 0){
												$avg_star_rating_explode = explode('.',$avg_star_rating);
											}
											//$len = isset($$avg_star_rating_explode[0]) ? count($avg_star_rating_explode[0]) : 0;
										@endphp
										@if(isset($avg_star_rating_explode[0]))
										@for($i =0; $i<$avg_star_rating_explode[0]; $i++)
										<i class="fa fa-star font-32 mr-1" aria-hidden="true"></i>
										@endfor
										@if(isset($avg_star_rating_explode[1]) >= 5)
										<i class="fa fa-star-half font-32 mr-1" aria-hidden="true"></i>
										@else
										<i class="fa fa-star-half-o font-32 mr-1" aria-hidden="true"></i>
										@endif
										@endif
									</div>
								</div>
								<p class="font-18 text-uppercase text-white mb-2">About me</p>
								<p class="text-xlight font-sm-14">Lorem Ipsum Is Simply Text Of The Printing And Typesetting Industry. Orem Ipsum Has Been The Standard Lorem Ipsum Is Simply</p>
							</div>
							<div class="mt-4">
								<div class="d-flex d-inline-md-flex align-items-center border-bottom border-light2 pb-3">
									<a href="{{route('faci_fan_following')}}" class="text-white text-decoration-none">
										<div class="d-flex align-items-center">
											<img src="{{asset('assets/img/icons/user-2.svg')}}">
											<h4 class="font-xlight my-0 mx-2 mx-md-4 font-sm-14">Fan Following</h4>
											<h3 class="text-white font-bold text-underline-light my-0 font-sm-14">{{$fans}}</h3>
										</div>
									</a>
									<a href="{{route('my-course')}}" class="ml-md-5 ml-auto text-white text-decoration-none">
										<div class="d-flex align-items-center">
											<img src="{{asset('assets/img/icons/course.svg')}}">
											<h4 class="font-xlight my-0 mx-2 mx-md-4 font-sm-14">Courses</h4>
											<h3 class="text-white font-bold text-underline-light my-0 font-sm-14">{{$course_count}}</h3>
										</div>   	
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-3col mt-5">
					<div class="d-flex align-items-center flex-wrap border-bottom border-xlight mb-3 pb-3">
						<h4 class="text-light my-0 text-capitalize font-semibold flex-fill">Courses Posted</h4>
						<div class="swiper-arrow round">
							<span class="prev"><img src="{{asset('assets/img/icons/line-left-arrow.svg')}}"></span>
							<span class="next ml-2"><img src="{{asset('assets/img/icons/line-right-arrow.svg')}}"></span>
						</div>
					</div>
					<div class="swiper-container hide">
						@if($courses != null)
						<div class="swiper-wrapper h-auto">
							@foreach($courses as $key => $course)
							<div class="swiper-slide">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3 course-posted-img">
										<!-- <img src="{{asset('assets/img/img-1.png')}}" class="img"> -->
										@if(isset($course) && $course['images'] != null)
										<img src="{{asset('cover_pic/' .$course['images'])}}" class="img w-100 h-100" alt="no image">
										@else
										<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-15 font-semibold text-uppercase line-clamp-1 course-name">{{$course['name']}}</div>
										<div class="d-flex align-items-center justify-content-between ">
											@if($course['status'] == 1)
											<div class="text-primary font-15 font-semibold text-uppercase">Approved</div>
											@elseif($course['status'] == 0)
											<div class="text-primary font-15 font-semibold text-uppercase">In Process</div>
											@elseif($course['status'] == 2)
											<div class="text-primary font-15 font-semibold text-uppercase">Not Approved</div>
											@endif
											<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light ml-2">
									
												{{isset($average_star_rating[$course['id']]) ? $average_star_rating[$course['id']] : 0}} <i class="fa fa-star-half text-orange" aria-hidden="true"></i>
											</div>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2 line-clamp-2">{{$course['description']}}</div>
									<p class="font-12 line-clamp-2 course-desc">Skills - {{$course['add_skills']}}</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											@if($course['language_id'] == 1)
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> English</div>
											@elseif($course['language_id'] == 2)
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> French</div>
											@else
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> German</div>
											@endif
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/module.svg')}}" height="16" class="mr-2"> {{$course['total_no_of_module']}} Modules</div>
										</div>
										<a href="{{route('faci_course_details',['id' => $course['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@endif		
					</div>
				</div>
			</div>
		</section>
<div class="modal fade br" id="change-password" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('assets/img/icons/close.svg')}}">
					</button>
					<form class="d-flex flex-column flex-fill" method="POST" action="{{ route('facilitator_password_change') }}">
						@csrf
						<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-3">
							<h3 class="font-bold text-center mt-4 mb-2">Change Password</h3>
						</div>
						<div class="modal-body col-sm-8 mx-auto pb-5 flex-fill">
							<div class="form-group">
								<input class="form-control rounded-pill p-4" placeholder="Old Password*" name="current_password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" name="password" required placeholder="New Password*">
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" name="password_confirmation" required  placeholder="Confirm Password*">
							</div>
							<input id="email" type="hidden" name="email" value="{{$user['email']}}">
						</div>
						<div class="col-sm-8 mx-auto flex-fill d-flex align-items-end pb-5">
							<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Profile -->
		<div class="modal fade br" id="edit-profile" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('assets/img/icons/close.svg')}}">
					</button>
					<div class="step- overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 h-100">
						<!-- <form class="d-flex flex-column h-100" id="userdetail" method="post" enctype="multipart/form-data" action="{{route('facilitator_edit_my_profile')}}" onsubmit="return checkForm(this);"> -->
						<form class="d-flex flex-column h-100" method="post" enctype="multipart/form-data" action="{{route('facilitator_edit_my_profile')}}">
							@csrf
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-1">
								<h3 class="font-bold text-center mt-4 mb-2">Complete Your Profile</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-0 flex-fill">
								<div class="avatar xl mx-auto mb-4 d-table">
									<div class="inner">
										@if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
											<img id="blahs" src="{{asset('profile_pic/' .$user['userdetails']['image'])}}" >
										@else
											<img id="blahs" style="width:100%; height:100%" src="{{asset('assets/img/user1.svg')}}">
										@endif
										<span class="upload-icon">
											<img src="{{asset('assets/img/icons/edit-circle.svg')}}">
											<input accept="image/*" type="file" name="profile_pic" id="imgChange">
										</span>
									</div>
								</div>
								<div class="row pt-4">
									<div class="form-group col-sm-12">
										<input type="text" class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Name*" value="{{$user['name']}}" name="name">
									</div>
									<div class="form-group col-sm-12">
										<input type="email" class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Email*" value="{{$user['email']}}" name="email">
									</div>
									<div class="form-group col-sm-12">
										<select class="form-control lg rounded-pill border-dark text-black" name="country" id="country">
											@if(!isset($user['userdetails']) || $user['userdetails']['country_id'] == null)
												<option>Choose Your Country*</option>
											@else
												<option value="{{$user['userdetails']['country_id']}}">{{$user['userdetails']['country']['name']}}</option>
											@endif
											@foreach($countries as $k => $country)
											<option value="{{$country['id']}}">{{$country['name']}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group col-sm-12">
										<select class="form-control lg rounded-pill border-dark text-black" name="city" id="city">
											@if(!isset($user['userdetails']) || $user['userdetails']['city_id'] == null)
												<option value="">Choose Your City</option>
											@else
												<option value="{{$user['userdetails']['city_id']}}">{{$user['userdetails']['city']['name']}}</option>
											@endif
										</select>
									</div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Business License no" value="{{isset($user['userdetails']['license']) ? $user['userdetails']['license'] : null}}" name="license">
								</div>
								<div class="form-group">
										<div class="form-control lg rounded-pill border-dark d-flex p-0 text-black">
											@if(!isset($user['userdetails']) || $user['userdetails']['phone_code'] == null)
												<input type="tel" class="col-2 border-0 bg-transparent weight-600" value="" placeholder="" readonly="" id="phonecode" name="phone_code">
											@else
												<input type="tel"  class="col-2 border-0 bg-transparent weight-600" value="{{$user['userdetails']['phone_code']}}" placeholder="" readonly="" id="phonecode" name="phone_code">
											@endif
											<div class="border-left border-dark my-2 ml-2">&nbsp;</div>
											@if(isset($user['userdetails']))
												<input type="tel"  class="flex-fill pl-2 border-0 bg-transparent" placeholder="Enter Your Phone Number*" value="{{$user['userdetails']['phone_no']}}" name="phone_no">
											@else
												<input type="tel"  class="flex-fill pl-2 border-0 bg-transparent" placeholder="Enter Your Phone Number*" name="phone_no">
											@endif
										</div>
								</div>
								<div class="form-group">
									<select class="form-control lg rounded-pill border-dark text-black" name="business_industry" id="business_industry">
										@if(!isset($user['userdetails']) || $user['userdetails']['business_industry'] == null)
											<option disabled selected hidden>Choose Your Business Type</option>
										@else
											<option value="{{$user['userdetails']['business_industry_relation']['id']}}" disabled selected hidden>{{$user['userdetails']['business_industry_relation']['business_name']}}</option>
										@endif
										@foreach($business as $x => $b)
											<option value="{{$b['id']}}">{{$b['business_name']}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-sm-12">
									<label class="font-14 pb-1">Upload ID Proof*</label>
									<div class="bf-gray rounded-md">
										<div class="dragdrop mb-4 pt-4">
											
											@if(!isset($user['userdetails']) || $user['userdetails']['id_proof'] == null)
												<input accept="image/*" type="file" name="id_proof" id="imgInp">
											@endif
											<div class="mt-2 mb-3 pb-1">
												@if(isset($user['userdetails']) && $user['userdetails']['id_proof'] != null)
													<img id="blah" style="width: -webkit-fill-available;" src="{{asset('id_proof/' .$user['userdetails']['id_proof'])}}" class="mw-100">
												@else
													<img id="blah" src="{{asset('assets/img/icons/upload.svg')}}">
												@endif
											</div>
											@if(isset($user['userdetails']) && $user['userdetails']['id_proof'] != null)
												<p class="text-danger">YOU CAN'T CHANGE YOUR ID</p>
											@else
												<p class="mb-3 text-secondary font-12">Upload ID Proof*</p>
											@endif
										</div>
									</div>
								</div>
								<!-- <div class="form-group col-sm-12">
									<input type="checkbox" id="terms" name="terms" value="accepted">
  									<label for="terms"><a href=""> Terms and Conditions</a></label><br>
  								</div> -->
								<button class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
							</div>
							<div class="mt-4 text-dark text-center">
							<div class="mb-4">Complete. <a role="button" data-step="step-3" class="font-14 text-primary">My Account</a></div>
							<div class="text-dark text-center mt-4 pt-4">
								<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy-policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms-n-conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
							</div>
						</div>
						</form>
						
					</div>

					<div class="step-3 overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 d-none">
						<div class="d-flex flex-column">
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-0 pb-0">
								<h3 class="font-bold text-center mt-4 mb-2">My Account</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto">
								<form method="POST" action="{{ route('facilitator_password_change') }}">
								@csrf
									<!-- <div class="avatar xl mx-auto mb-4 d-table">
										<div class="inner">
											<img src="{{asset('assets/img/users/5.jpg')}}">
											<span class="upload-icon">
												<img src="{{asset('assets/img/icons/edit-circle.svg')}}">
												<input type="file">
											</span>
										</div>
									</div>
 -->									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter Email Address*" name="email"  required>
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Current Password*" name="current_password" required>
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter registered email address*"name="new_email"  required >
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Enter New Password *" name="password" required>
									</div>
									<div class="form-group">
										<input class="form-control rounded-pill p-4 font-14" placeholder="Re-enter New Password *" name="password" required>
									</div>
									<input id="email" type="hidden" name="email" value="{{$user['email']}}">
									<button  type = "submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Submit</span></button>
									<div class="text-dark text-center mt-4 pt-4">
										<p class="font-12 text-muted">By logging in, you agree to our <a href="{{route('privacy-policy')}}" class="text-decoration text-muted">Privacy Policy</a> and <a href="{{route('terms-n-conditions')}}" class="text-decoration text-muted">Terms of Service</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#country').change(function(){
			var country = $(this).val();
			$.ajax({
				url : 'city/'+country,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						$("#city").empty();
						$("#city").append('<option>Choose Your City</option>');
						$.each(response,function(key,value){
							$("#city").append('<option value="'+key+'">'+value+'</option>');
						});
					}
					else{
						$("#city").empty();
					}
				}
			});
			$.ajax({
				url : 'phone/'+country,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						console.log('a');
						$("#phonecode").empty();
						document.getElementById("phonecode").value = response[0];
					}
					else{
						$("#phonecode").empty();
					}
				}
			});
		});
	});
 // function checkForm(form)
 //  {
 //    if(!form.terms.checked) {
 //      alert("Please accept the Terms and Conditions");
 //      form.terms.focus();
 //      return false;
 //      return true;
 //    }else{
 //       $("#userdetail").submit();
 //    }
 //  }

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
	
	
			$('[data-step]').click(function(){
				var target_elem = $(this).data('step');
				$(this).closest('div[class*="step-"]').slideUp('fast');
				$('.'+target_elem).removeClass('d-none').slideDown('fast');
				console.log(target_elem);
			});


	
	
	
</script>		