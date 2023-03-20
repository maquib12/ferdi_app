@extends('students.layout.master')
@section('content')
<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-gray2 mb-4 pb-4 d-flex align-items-center">
					<h1 class="font-bold font-36 my-0">My Sponsored Courses</h1>
					<div class="search-bar bg-dark ml-auto col-sm-6 pl-3 pr-2">
						<form class="d-flex" action="{{route('my-sponsored-course')}}" method="get">
							@csrf
							<input class="form-control bg-transparent search h50 ph-white border-0" name="search" placeholder="Search" autocomplete="off">
							<button type="submit" class="btn btn-primary rounded-pill search px-4 py-md-2 my-1"><span class="mx-md-4 px-md-2 d-block">Search</span></button>
						</form>
					</div>
				</div>
				<ul class="nav nav-tabs theme-primary flex-nowrap overflow-auto border-0 text-center mt-5 text-nowrap">
					<li class="nav-item">
						<a class="nav-link px-md-5 active" data-toggle="tab" href="#home" role="tab"><span class="mx-2"><img src="{{asset('student/assets_new/img/icons/my-courses.svg')}}" class="icon"> All Course ({{sizeof($all_courses)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#contact" role="tab"><span class="mx-2"><img src="{{asset('student/assets_new/img/icons/completed.svg')}}" class="icon"> Completed ({{sizeof($completed)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#profile" role="tab"><span class="mx-2"><img src="{{asset('student/assets_new/img/icons/in-progress.svg')}}" class="icon"> Pending ({{sizeof($pending)}})</span></a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#profile" role="tab"><span class="mx-2"><img src="{{asset('student/assets_new/img/icons/my-courses.svg')}}"> Expired (8)</span></a>
					</li> -->
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="row pt-4">
							@foreach($all_courses as $all_course)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										@if(isset($all_course['course']) && $all_course['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$all_course['course']['images'])}}" class="img img-cover">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img img-cover">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$all_course['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$all_course['course']['id']]) ? $avg_star_rating[$all_course['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div class="avatar sm2 mr-2">
											<div class="inner border-0">
												@if(isset($all_course['userdetails']) && $all_course['userdetails']['image'] != null)
													<img src="{{asset('profile_pic/' .$all_course['userdetails']['image'])}}" class="mw-100">
												@else
													<img src="{{asset('student/assets_new/img/users/1.jpg')}}" class="mw-100">
												@endif
											</div>
										</div>
										<div class="flex-fill">
											<a href="{{route('sponsor_profile',['id' => $all_course['sponsor']['id']])}}">
												<div class="font-medium">{{$all_course['sponsor']['name']}}</div>
												<div class="d-flex align-items-center font-12 mt-1">
													<img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" height="16" class="mr-1"> {{date('d - M - Y', strtotime($all_course['created_at']))}}
												</div>
											</a>

										</div>
									</div>
									<div class="title text-white font-semibold mb-2"></div>
									<p class="font-12 text-xlight flex-1">{{$all_course['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{isset($all_course->course_progress->progress) ?? 0}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"></div>
										</div>
										<a href="{{route('stu_course_details',['id' => $all_course['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="row pt-4">
							@foreach($pending as $pending_courses)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										@if(isset($pending_courses['course']) && $pending_courses['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$pending_courses['course']['images'])}}" class="img img-cover">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img img-cover">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$pending_courses['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$pending_courses['course']['id']]) ? $avg_star_rating[$pending_courses['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$pending_courses['course']['name']}}</div>
									<p class="font-12 text-xlight flex-1">{{$pending_courses['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{isset($pending_courses->course_progress->progress) ?? 0}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{isset($pending_courses->course_progress->progress) ?? 0}}% Completed</div>
										</div>
										<a href="{{route('stu_course_details',['id' => $pending_courses['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row pt-4">
							@foreach($completed as $completed_courses)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
									<div class="image mb-3 imageSize">
										@if(isset($completed_courses['course']) && $completed_courses['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$completed_courses['course']['images'])}}" class="img img-cover">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img img-cover">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$completed_courses['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$completed_courses['course']['id']]) ? $avg_star_rating[$completed_courses['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$completed_courses['course']['name']}}</div>
									<p class="font-12 text-xlight flex-1">{{$completed_courses['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{isset($completed_courses->course_progress->progress) ?? 0}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{isset($completed_courses->course_progress->progress) ?? 0}}% Completed</div>
										</div>
										<a href="{{route('stu_course_details',['id' => $completed_courses['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
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