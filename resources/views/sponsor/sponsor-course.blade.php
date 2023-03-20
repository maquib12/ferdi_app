@extends('sponsor.layout.master')
@section('content')

		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 px-0 my-0">Sponsor Courses</h1>
				</div>
				<p class="my-4">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum</p>
				<form class="row" action="{{route('course-shared')}}" method="post">
					@csrf
					<div class="col-sm-6 mb-4">
						<input type="text" class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white shadow-none" style="height: 60px" placeholder="Name*"/ name="name">
						<input type="hidden" name="course_id[]" id="course_id">
					</div>
					<div class="col-sm-6 mb-4">
						<input type="text" class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white shadow-none" style="height: 60px" placeholder="Email*"/ name="email">
					</div>
					<div class="col-sm-6 mb-4">
						<div class="form-group mobile position-relative d-flex align-items-center">
							<div class="country border-right">
								<select class="d-inline border-0" name="phone_code">	
									@foreach($country_code as $country)
									<option value="{{$country->phonecode}}">+{{$country->phonecode}}</option>
									@endforeach	
								</select>
							</div>
							<input class="form-control rounded-pill p-4 font-14 bg-dark border-0 shadow-none ph-gray text-white" style="height: 60px" placeholder="Enter Your Mobile Number*" name="phone_no">
						</div>
					</div>
					<div class="col-sm-6 mb-4">
						<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white shadow-none" style="height: 60px" name="notification">
							<option>Choose Notification Type :</option>
							<option value="email">Send Email Notification</option>
							<option value="sms">Send SMS Notification</option>
							<option value="both">Send Both Notification</option>
						</select>
					</div>
					<div class="col-md-12">
						<button class="btn btn-line-white rounded-lg py-2 px-5 mt-4 mr-3"><div class="my-2 px-5">Cancel</div></button>
						<button class="btn btn-primary rounded-lg py-2 px-5 mt-4"><div class="my-2 px-5">Send</div></button>
					</div>
				</form>
				<div class="row align-items-center mt-4 mt-md-5 mb-4">
					<div class="col">
						<h1 class="font-sb font-24 px-0 my-0">All Courses ({{sizeof($courses)}} Courses)</h1>
					</div>
					<div class="col">
						<div class="search-bar bg-dark">
							<form class="d-flex align-items-center" action="{{route('course-sponsor')}}" method="get">
								@csrf
								<input class="form-control bg-transparent search h50 ph-white" placeholder="Search" name="search">
								<button type="submit" class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1"><span class="mx-md-4 px-md-2 d-block">Search</span></button>
							</form>
						</div>
					</div>
				</div>
				<div class="courses-list">
				@foreach($courses as $course)	
					<div class="item py-5 border-bottom border-light">
						<div class="row">
							<div class="col-sm-4">
								<div class="image rounded-lg overflow-hidden">
									@if(isset($course) && $course['images'] != null)
									<img src="{{asset('cover_pic/' .$course['images'])}}" class="image-fit" alt="no image">
									@else
									<img src="{{asset('assets/img/img-1.png')}}" class="image-fit">
									@endif
								</div>
							</div>
							<div class="col-sm-8">
									<div class="d-flex align-items-center mb-3">
										<h4 class="my-0">{{$course->name}}</h4>
										<div class="rate-count bg-dark px-2 py-1 text-white font-semibold rounded-xs ml-auto">
											{{isset($avg_star_rating[$course->id]) ? $avg_star_rating[$course->id] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
										<p class="text-gray">The Skills-{{$course->add_skills}}</p>
										<div class="d-flex flex-fill mr-3">
											@if($course['language_id'] == 1)
											<div class="flex-fill d-flex align-items-center justify-content-center justify-content-md-start mt-1 mb-mb-0"><img src="{{asset('assets/img/icons/globe-lg.svg')}}" height="16" class="mr-2"> English</div>
											@elseif($course['language_id'] == 2)
											<div class="flex-fill d-flex align-items-center justify-content-center justify-content-md-start mt-1 mb-mb-0"><img src="{{asset('assets/img/icons/globe-lg.svg')}}" height="16" class="mr-2"> French</div>
											@else
											<div class="flex-fill d-flex align-items-center justify-content-center justify-content-md-start mt-1 mb-mb-0"><img src="{{asset('assets/img/icons/globe-lg.svg')}}" height="16" class="mr-2"> German</div>
											@endif
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/module.svg')}}" height="20" class="mr-2"> {{$course['total_no_of_module']}} Modules</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/clock.svg')}}" height="20" class="mr-2"> {{$course['course_duration_in_hours']}} Hours On-Demand Video</div>
										</div>
										<div class="d-flex align-items-center mt-5">
											<div class="d-flex align-items-center">
												<h4 class="my-0">${{$course['price']}}</h4>
													@if($course['price'] <= 500)
													<s class="ml-3">${{$course['price'] + 50}}</s>
													@elseif($course['price'] >=500 && $course['price'] <=1000)
													<s class="ml-3">${{$course['price'] + 100}}</s>
													@else
													<s class="ml-3">${{$course['price'] + 200}}</s>
													@endif
											</div>
											<div class="ml-auto d-flex align-items-center">
												<label class="checkboxBtn my-0">
													<input type="checkbox" class="d-none sponsor_course" data-id="selected_course_{{$course->id}}">
													<div class="btn btn-primary rounded-lg py-2 px-4 position-relative border-0">
														<div class="my-1 d-flex align-items-center">
															<span class="selected_course_{{$course->id}}">Select</span><em></em><span></span>
														</div>
													</div>
												</label>
										  </div>
							 			</div>
						  </div>
					  </div>
				  </div>
				  @endforeach
			  </div>
		</section>
		<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
		<script>
			var courses_id = [];
				$(".sponsor_course").on("change", function(){
					console.log('aquib')
					let selected_course = $(this).data("id");

					courses_id.push(selected_course.split('_')[2]);
					console.log(courses_id);
					$('#course_id').val(courses_id)
					if($(this).is(':checked')){
						$("."+selected_course).html("Selected");
					}else{
						$("."+selected_course).html("Select");
					}
				});
		</script>
@endsection
		