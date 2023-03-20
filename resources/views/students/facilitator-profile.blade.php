@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<div class="card bg-blue p-4 rounded-md my-3">
					<div class="row">
						<div class="thumbnail-xxl rounded-md overflow-hidden mx-3">
							<div class="inner bg-theme-blue">
										@if(isset($facilator_profile['userdetails']) && $facilator_profile['userdetails']['image'] != null)
										<img src="{{asset('profile_pic/' .$facilator_profile['userdetails']['image'])}}">
										@else
										<img src="{{asset('student/assets_new/img/img-8.jpg')}}">
										@endif
							</div>
						</div>
						<div class="col d-flex flex-column">
							<div class="flex-fill">
								<div class="d-flex align-items-center">
									<h1 class="text-uppercase my-0 flex-fill"><b>{{$facilator_profile->name}}</b> </h1>
								</div>
								<div class="font-xlight font-18">Teaches Sales and Persuasion</div>
								<div class="d-flex align-items-center mt-3 mb-4">
									<span class="mr-1">4.5</span>
									<div class="text-orange mx-2">
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star-half-o font-16 mr-1" aria-hidden="true"></i>
									</div>
								</div>
								<!-- <p class="font-18 text-uppercase text-white mb-2">About me</p> -->
								<!-- <p class="text-xlight">Lorem Ipsum Is Simply Text Of The Printing And Typesetting Industry. Orem Ipsum Has Been The Standard Lorem Ipsum Is Simply</p> -->
							</div>
							<div class="mt-4 d-flex">
								<div class="d-inline-flex align-items-center border-bottom border-light2 pb-3">
									<div class="d-flex align-items-center">
										<img src="{{asset('student/assets_new/img/icons/user-2.svg')}}" height="18">
										<h6 class="font-xlight my-0 mx-2">Fan Following</h6>
										<h3 class="text-white font-bold text-underline-light my-0">{{$fan_following}}</h3>
									</div>
									<div class="d-flex align-items-center ml-5">
										<img src="{{asset('student/assets_new/img/icons/course.svg')}}" height="18">
										<h6 class="font-xlight my-0 mx-2">Courses</h6>
										<h5 class="text-white font-bold text-underline-light my-0">{{sizeof($facilator_profile['courses_mentor'])}}</h5>
									</div>
								</div> 
								@if($following_status==1)
								<a href="{{route('fan-following',['id' => $facilator_profile->id])}}" class="btn btn-primary rounded-pill text-uppercase px-4 d-flex align-items-center mx-auto"><img src="{{asset('student/assets/img/icons/add-user.svg')}}" class="mr-3"> Unfollow</a>
								@else
								<a href="{{route('fan-following',['id' => $facilator_profile->id])}}" class="btn btn-primary rounded-pill text-uppercase px-4 d-flex align-items-center mx-auto"><img src="{{asset('student/assets/img/icons/add-user.svg')}}" class="mr-3"> Follow</a>
								@endif
								<span class="bg-primary-lt p-2 d-flex align-items-center justify-content-center rounded-sm"><img src="{{asset('student/assets/img/icons/circle-info.svg')}}" class="mx-1"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-3col mt-5">
					<div class="d-flex align-items-center flex-wrap border-bottom border-xlight mb-3 pb-3">
						<h4 class="text-light my-0 text-capitalize font-semibold flex-fill">Courses Posted</h4>
						<div class="swiper-arrow round">
							<span class="prev"><img src="{{asset('student/assets_new/img/icons/line-left-arrow.svg')}}"></span>
							<span class="next ml-2"><img src="{{asset('student/assets_new/img/icons/line-right-arrow.svg')}}"></span>
						</div>
					</div>
					<div class="swiper-container hide">
						<div class="swiper-wrapper">
							@foreach($facilator_profile['courses_mentor'] as $courses)
							<div class="swiper-slide">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										@if(isset($courses) && $courses['images'] != null)
											<img src="{{asset('cover_pic/' .$courses['images'])}}" class="img">
										@else
											<img src="{{asset('student/assets_new/img/img-1.png')}}" class="img">
										@endif
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$courses['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$courses['id']]) ? $avg_star_rating[$courses['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$courses->name}}</div>
									<p class="font-12">{{$courses->description}}</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('student/assets_new/img/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('student/assets_new/img/icons/module.svg')}}" height="16" class="mr-2"> {{$courses['total_no_of_module']}} Modules</div>
										</div>
										<a href="{{route('stu_course_details',['id' => $courses['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
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
		