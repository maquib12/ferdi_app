@extends('facilitator.include.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-xlight mb-4 pb-1">
					<h1 class="pb-2 font-bold font-36">My Profile</h1>
				</div>
				@if(isset($message) && $message != null)
					<div class = "alert alert-info">{{$message}}</div>
				@endif
				<div class="row pt-4">
					<div class="thumbnail col-sm-3">
						<div class="inner rounded-md overflow-hidden d-table mx-auto">
							@if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
								<img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}" class="mw-100">
							@else
								<img src="{{asset('assets/img/255x255.jpg')}}" class="mw-100">
							@endif
						</div>
					</div>
					<div class="col-sm-9 col d-flex flex-column">
						<div class="flex-fill mt-4 mt-md-3 text-center text-md-left">
							@if($user['name'] != null)
							<h2 class="font-bold font-36">{{$user['name']}}</h2>
							@endif
							@if(Auth::user()->user_type_id == 3)
								<i class="fas fa-award"></i>  Mentor
							@endif
							<p class="text-gray">{{$user['email']}}</p>
							@if($user['userdetails'] != null)
							<p class="text-gray">{{$user['userdetails']['phone_no']}}</p>
							@endif
							<div class="mt-md-4">
								<a href="" data-toggle="modal" data-target="#change-password" class="btn btn-line-white col-sm-5 col-lg-4 py-2 rounded-pill mr-md-4 mb-3 mb-md-0"><span class="py-1 d-block">Change Password</span></a>
								<a href="" data-toggle="modal" data-target="#edit-profile" class="btn btn-primary col-sm-5 col-lg-4 py-2 rounded-pill"><span class="py-1 d-block">Edit Profile</span></a>
								
							</div>
						</div>
					</div>
				</div>
				<ul class="nav nav-tabs theme-primary flex-nowrap overflow-auto border-0 text-center mt-5 text-nowrap">
					<li class="nav-item">
						<a class="nav-link px-md-5 active" data-toggle="tab" href="#home" role="tab"><span class="mx-2">All Course ({{$course_count}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#process" role="tab"><span class="mx-2">In Process ({{$process_count}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#approved" role="tab"><span class="mx-2">Not Approved ({{$not_approved_count}})</span></a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="row pt-4">
							@foreach($courses as $key => $course)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('cover_pic/' .$course['images'])}}" class="img">
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$course['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$course['description']}}</div>
									<p class="font-12 text-xlight">The skills you need - {{$course['add_skills']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<!-- <div class="flex-fill d-flex align-items-center">25% Completed</div> -->
										</div>
										<a class="btn btn-primary rounded-pill px-3 py-2" href="{{route('faci_course_details',['id' => $course['id']])}}"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1 my-1"></a>
									</div>
								</div>
							</div>
							@endforeach
					   <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="profile-tab">
						<div class="row pt-4">
							@foreach($process_courses as $process_course)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('cover_pic/' .$process_course['images'])}}" class="img">
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$process_course->name}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$process_course->description}}</div>
									<p class="font-12 text-xlight">The skills you need to become a BI Analyst - {{$process_course->add_skills}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">25% Completed</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3 py-2"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1 my-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row pt-4">
							@foreach($not_approved_courses as $not_approved_course)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/img/img-4.png')}}" class="img">
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$not_approved_course->name}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$not_approved_course->description}}</div>
									<p class="font-12 text-xlight">The skills you need to become a BI Analyst - {{$not_approved_course->add_skills}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">Start Course</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3 py-2"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1 my-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- Change Password -->
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
								<input type="password" class="form-control rounded-pill p-4" name="password" required  placeholder="Confirm Password*">
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
					<div class="overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 h-100">
						<!-- <form class="d-flex flex-column h-100" id="userdetail" method="post" enctype="multipart/form-data" action="{{route('facilitator_edit_my_profile')}}" onsubmit="return checkForm(this);"> -->
						<form class="d-flex flex-column h-100" method="post" enctype="multipart/form-data" action="{{route('facilitator_edit_my_profile')}}">
							@csrf
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-1">
								<h3 class="font-bold text-center mt-4 mb-2">Edit Profile</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-0 flex-fill">
								<div class="avatar xl mx-auto mb-4 d-table">
									<div class="inner">
										@if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
											<img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}">
										@else
											<img src="{{asset('assets/img/255x255.jpg')}}">
										@endif
										<span class="upload-icon">
											<img src="{{asset('assets/img/icons/edit-circle.svg')}}">
											<input type="file" name="profile_pic">
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
												<option>Choose Your City</option>
											@else
												<option value="{{$user['userdetails']['city_id']}}">{{$user['userdetails']['city']['name']}}</option>
											@endif
										</select>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<input type="text" class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Business License no" value="{{isset($user['userdetails']['license'])}}" name="license">
								</div>
								<div class="form-group col-sm-12">
										<div class="form-control lg rounded-pill border-dark d-flex p-0 text-black">
											@if(!isset($user['userdetails']) || $user['userdetails']['phone_code'] == null)
												<input type="number" class="col-2 border-0 bg-transparent weight-600" value="" placeholder="" readonly="" id="phonecode" name="phone_code">
											@else
												<input type="number" class="col-2 border-0 bg-transparent weight-600" value="{{$user['userdetails']['phone_code']}}" placeholder="" readonly="" id="phonecode" name="phone_code">
											@endif
											<div class="border-left border-dark my-2 ml-4">&nbsp;</div>
											@if(isset($user['userdetails']))
												<input type="number" class="flex-fill pl-4 border-0 bg-transparent" placeholder="Enter Your Phone Number*" value="{{$user['userdetails']['phone_no']}}" name="phone_no">
											@else
												<input type="number" class="flex-fill pl-4 border-0 bg-transparent" placeholder="Enter Your Phone Number*" name="phone_no">
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
											@if(isset($user['userdetails']) && $user['userdetails']['id_proof'] == null)
												<input type="file" name="id_proof">
											@endif
											<div class="mt-2 mb-3 pb-1">
												@if(isset($user['userdetails']) && $user['userdetails']['id_proof'] != null)
													<img src="{{asset('id_proof/' .$user['userdetails']['id_proof'])}}" class="mw-100">
												@else
													<img src="{{asset('assets/img/icons/upload.svg')}}">
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
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$('[data-step]').click(function(){
				var target_elem = $(this).data('step');
				$(this).closest('div[class*="step-"]').slideUp('fast');
				$('.'+target_elem).removeClass('d-none').slideDown('fast');
				console.log(target_elem);
			});
			var swiper = new Swiper(".slider-3col .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
				navigation: {
					nextEl: '.swiper-arrow .next',
					prevEl: '.swiper-arrow .prev',
				}
      });
    </script>
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
</script>