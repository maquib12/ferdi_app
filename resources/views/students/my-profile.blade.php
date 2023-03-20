@extends('students.layout.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-xlight mb-4 pb-1">
					<h1 class="pb-2 font-bold font-36">My Profile</h1>
				</div>
				<div class="row pt-4">
					<div class="thumbnail col-sm-3">
						<div class="inner rounded-md overflow-hidden d-table mx-auto">
							@if(isset($student_profile['userdetails']) && $student_profile['userdetails']['image'] != null)
								<img src="{{asset('profile_pic/' .$student_profile['userdetails']['image'])}}" class="mw-100">
							@else
								<img src="{{asset('assets/img/255x255.jpg')}}" class="mw-100">
							@endif
						</div>	
					</div>
					<div class="col-sm-9 col d-flex flex-column">
						<div class="flex-fill mt-4 mt-md-3 text-center text-md-left">
							<h2 class="font-bold font-36">{{isset($student_profile['name'])?$student_profile['name']:''}}</h2>
							<p class="text-gray">{{$student_profile['email']}}</p>
							@if(isset($student_profile['userdetails']['phone_no']))
							<p class="text-gray">+{{isset($student_profile['userdetails']['phone_code'])?$student_profile['userdetails']['phone_code']:''}} {{isset($student_profile['userdetails']['phone_no'])?$student_profile['userdetails']['phone_no']:''}}</p>
							@else
							<p><p>
							@endif
							<div class="mt-md-4">
								<a href="" data-toggle="modal" data-target="#change-password" class="btn btn-primary col-sm-5 col-lg-4 py-2 rounded-pill mr-md-4 mb-3 mb-md-0"><span class="py-1 d-block">Change Password</span></a>
								<a href="" data-toggle="modal" data-target="#edit-profile" class="btn btn-primary col-sm-5 col-lg-4 py-2 rounded-pill"><span class="py-1 d-block">Edit Profile</span></a>
							</div>
						</div>
					</div>
				</div>
				<ul class="nav nav-tabs theme-primary flex-nowrap overflow-auto border-0 text-center mt-5 text-nowrap">
					<li class="nav-item">
						<a class="nav-link px-md-5 active" data-toggle="tab" href="#home" role="tab"><span class="mx-2">All Course ({{sizeof($student_courses)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#profile" role="tab"><span class="mx-2">In Progress ({{sizeof($progress_course)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#contact" role="tab"><span class="mx-2">Completed ({{sizeof($completed_course)}})</span></a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="row pt-4">
						  @foreach($student_courses as $student_course)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										@if(isset($student_course['course']) && $student_course['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$student_course['course']['images'])}}" class="img img-cover">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$student_course['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$student_course['course']['id']]) ? $avg_star_rating[$student_course['course']['id']] : 0}}  <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2 flex-1 line-clamp-2">{{$student_course['course']['name']}}</div>
									<p class="font-12 text-xlight flex-1 line-clamp-2">{{$student_course['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{$student_course->progress}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{$student_course->progress}}% Completed</div>
										</div>
										<a href="{{route('my-course-details',['id' => $student_course['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
						  @endforeach
						  
						</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="row pt-4">
						@foreach($progress_course as $progress_courses)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										@if(isset($progress_courses['course']) && $progress_courses['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$progress_courses['course']['images'])}}" class="img img-cover">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$progress_courses['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$progress_courses['course']['id']]) ? $avg_star_rating[$progress_courses['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2 flex-1 line-clamp-2">{{$progress_courses['course']['description']}}</div>
									<p class="font-12 text-xlight flex-1">{{$progress_courses['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{$progress_courses->progress}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{$progress_courses->progress}}% Completed</div>
										</div>
										<a href="{{route('my-course-details',['id' => $student_course['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
						@endforeach		
						</div>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row pt-4">
						@foreach($completed_course as $completed_courses)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										<img src="{{asset('student/assets_new/img/img-1.png')}}" class="img img-cover">
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$completed_courses['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$completed_courses['course']['id']]) ? $avg_star_rating[$completed_courses['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2 flex-1">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12 text-xlight flex-1">{{$completed_courses['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{$completed_courses->progress}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{$completed_courses->progress}}% Completed</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
		<!-- Change Password -->
		<div class="modal fade br" id="change-password" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('student/assets_new/img/icons/close.svg')}}">
					</button>
					<form class="d-flex flex-column flex-fill" method="POST" action="{{ route('student_password_change')}}" id="change_password">
						@csrf
						<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-3">
							<h3 class="font-bold text-center mt-4 mb-2">Change Password</h3>
						</div>
						<div class="modal-body col-sm-8 mx-auto pb-5">
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="Old Password*" name="current_password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="New Password*" name="new_password" id="new_password" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="Confirm Password*" name="confirm_password" id="confirm_password" required>
								<span id='message'></span>
							</div>
							<button type="submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
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
						<img src="{{asset('student/assets_new/img/icons/close.svg')}}">
					</button>
					<div class="overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 h-100">
						<form class="d-flex flex-column h-100" method="POST" action="{{ route('student_edit_profile')}}" enctype="multipart/form-data">
							@csrf
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-1">
								<h3 class="font-bold text-center mt-4 mb-2">Edit Profile</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-0 flex-fill">
								<div class="avatar xl mx-auto mb-4 d-table">
									<div class="inner">
										@if(isset($student_profile['userdetails']) && $student_profile['userdetails']['image'] != null)
											<img id="blahs" src="{{asset('profile_pic/' .$student_profile['userdetails']['image'])}}" class="image-fit">
										@else
											<img id="blahs"src="{{asset('assets/img/255x255.jpg')}}" class="image-fit">
										@endif
										<span class="upload-icon">
											<img src="{{asset('student/assets_new/img/icons/edit-circle.svg')}}">
											<input accept="image/*" type="file" name="profile_pic" id="imgChange">
											<input type="hidden" name="images" value="{{isset($student_profile['userdetails']['image'])?$student_profile['userdetails']['image']:''}}">
										</span>
									</div>
								</div>
								<div class="row pt-4">
									<div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="First Name" value="{{$fname}}" name="fname">
										</div>
										<div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" value="{{$lname}}"
											placeholder="Last Name" name="lname">
										</div>
								</div>
								<div class="form-group mobile position-relative d-flex align-items-center">
									<div class="country border-right border-dark">
										<select class="d-inline border-0 selectpicker" name="phone_code" data-live-search="true" data-size="8">
											@foreach($country_code as $country)
											@if(isset($student_profile['userdetails']['phone_code']))
											<option value="{{$country->phonecode}}" @if($country->phonecode==$student_profile['userdetails']['phone_code']) selected @endif>+{{$country->phonecode}}</option>
											@else
											<option value="{{$country->phonecode}}" @if($country->phonecode=='+91') selected @endif>+{{$country->phonecode}}</option>
											@endif
											@endforeach
										</select>
									</div>
									<input class="form-control rounded-pill p-4 border-dark text-dark" placeholder="" value="{{isset($student_profile['userdetails']['phone_no'])?$student_profile['userdetails']['phone_no']:''}}" name="phone_no">
								</div>
								<div class="form-group">
									<input class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Email*" value="{{$student_profile['email']}}" readonly>
								</div>
								<button type="submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@section('scripts')
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

	$('#new_password, #confirm_password').on('keyup', function () {
  if ($('#new_password').val() == $('#confirm_password').val()) {
    $('#message').html('new password and confirm password match').css('color', 'green');
  } else 
    $('#message').html('new password and confirm password not match').css('color', 'red');
});

// $(function() {
//         $('#new_password').on('keypress', function(e) {
//             if (e.which == 32){
//                 return false;
//             }
//         });
// 	});
// 	$(function() {
//         $('#confirm_password').on('keypress', function(e) {
//             if (e.which == 32){
//                 return false;
//             }
//         });
// 	});

	   $("#change_password").validate({
    rules : {
        new_password : {
            minlength : 5
        },
        confirm_password : {
            minlength : 5,
            equalTo : '[name="new_password"]'
        }
    }
});

	

		</script>
  @endsection