@extends('sponsor.layout.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 px-0 my-0">Total Sponsored Courses</h1>
					<a href="{{route('course-sponsor')}}" class="btn btn-primary rounded-pill btn-lg font-16 ml-auto"><div class="py-1 px-2">Sponsor Course</div></a>
				</div>
				<div class="row mt-2 pb-5">
					<div class="col-sm-8">
						<div class="pieChart mt-5">
							<div class="pie mr-4">
								<canvas id="pieChart" height="260" style="display: inline-block"></canvas>
								<div class="absolute">
									<h4>{{$total_sponsored_course}}</h4>
									<span>Sponsored Courses</span>
								</div>
							</div>
							<ul class="list">
								<li><em style="--color: #00A6E6"></em> {{$total_sponsored_course}} (Sponsored Courses)</li>
								<li><em style="--color: #77DD77"></em> {{$completed_sponsored_course}} (Completed Courses)</li>
								<li><em style="--color: #FF6961"></em> {{$rejected_sponsored_course}} (Rejected Courses)</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="bg-primary p-4 text-center rounded-md my-4 ml-4">
							<div class="mt-3 mb-1">
								<img src="{{asset('student/assets_new/img/students.svg')}}">
								<h1 class="font-48 font-bold text-white mt-3 mb-0">{{$total_students}}</h1>
								<div class="font-sb">Total Students</div>
							</div>
						</div>
					</div>
				</div>
				<div class="border-bottom border-light pt-5">
					<div class="row align-items-center mt-4 mt-md-5 mb-4">
						<div class="col">
							<h1 class="font-bold font-36 px-0 my-0">Users Sponsored</h1>
						</div>
						<div class="col">
							<div class="search-bar bg-dark">
								<form class="d-flex align-items-center" action="{{route('sponsor_home')}}" method="get">
									@csrf
									<input class="form-control bg-transparent search h50 ph-white" placeholder="Search" name="search">
									<button type = "submit" class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1"><span class="mx-md-4 px-md-2 d-block">Search</span></button>
								</form>
							</div>
						</div>
					<!-- 	<div class="col-sm-3">
							<select class="default selectpicker sort lg rounded-pill" data-width="100%">
								<option value="">All</option>
								<option value="">Option 1</option>
								<option value="">Option 2</option>
								<option value="">Option 3</option>
							</select>
						</div>
					</div> -->
				</div>
				<div class="row mt-4">

					@foreach($total_users as $users_course)
					@if(isset($users_course))
					<div class="col-sm-4 my-3">
						<div class="card bg-dark p-4 rounded-md d-flex flex-column">
							<div class="d-flex align-items-center mb-4">
								<div class="icon-70 rounded-pill bg-primary mr-4 overflow-hidden">
									@if(isset($users_course['student_details']) && $users_course['student_details']['image'] != null)
								<img src="{{url('profile_pic'.'/'.$users_course['student_details']['image'])}}" class="image-fit">
							@else
								<img src="{{asset('assets/img/255x255.jpg')}}" class="image-fit">
							@endif
								</div>
								<div class="flex-fill">
									<div class="name text-primary font-semibold mb-1">{{$users_course['student_course']['name']}}</div>
									<div class="font-12">{{$users_course['student_course']['email']}}</div>
								</div>
							</div>
							<p class="font-semibold flex-fill">{{$users_course['course']['name']}}</p>
							<div class="progress xlight label mb-3">
								<div class="progress-bar bg-orange" role="progressbar" 
								style="--color: #FF9D3A; --cent:{{$users_course['progress']}}%" data-value="50">
									<span class="cent">{{$users_course['progress']}}%</span>
								</div>
							</div>
							@if($users_course['progress'] == 100)
							<p class="font-xlight mb-0">Completed</p>
							@else
							<p class="font-xlight mb-0">In-Progress</p>
							@endif
						</div>
					</div>
					@endif
					@endforeach
				</div>
				<div class="border-bottom border-light">
					<div class="row align-items-center mt-4 mt-md-5 mb-4">
						<div class="col">
							<h1 class="font-bold font-36 px-0 my-0">Sponsored Courses</h1>
						</div>
						<div class="col">
							<div class="search-bar bg-dark">
								<form class="d-flex align-items-center" action="{{route('sponsor_home')}}" method="get">
									@csrf
									<input class="form-control bg-transparent search h50 ph-white" placeholder="Search" name="search_course">
									<button type="submit" class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1"><span class="mx-md-4 px-md-2 d-block">Search</span></button>
								</form>
							</div>
						</div>
					<!-- 	<div class="col-sm-3">
							<select class="default selectpicker sort lg rounded-pill" data-width="100%">
								<option value="">All</option>
								<option value="">Option 1</option>
								<option value="">Option 2</option>
								<option value="">Option 3</option>
							</select>
						</div> -->
					</div>
				</div>
				<ul class="nav nav-tabs theme-primary flex-nowrap overflow-auto border-0 text-center mt-5 text-nowrap">
					<li class="nav-item">
						<a class="nav-link px-md-5 active" data-toggle="tab" href="#allCourse" role="tab"><span class="mx-2">All Course ({{sizeof($sponsored_course_all)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#completed" role="tab"><span class="mx-2">Completed ({{sizeof($sponsored_course_completed)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#pending" role="tab"><span class="mx-2">Pending ({{sizeof($sponsored_course_pending)}})</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-md-5" data-toggle="tab" href="#expired" role="tab"><span class="mx-2">Expired ({{sizeof($sponsored_course_expired)}})</span></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="allCourse" role="tabpanel">
						<div class="row pt-4">
							@foreach($sponsored_course_all as $sponsored_courses_all)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										@if(isset($sponsored_courses_all['course']) && $sponsored_courses_all['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$sponsored_courses_all['course']['images'])}}" class="img">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$sponsored_courses_all['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											{{isset($avg_star_rating[$sponsored_courses_all['course']['id']]) ? $avg_star_rating[$sponsored_courses_all['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center mb-3">
										<div class="avatar sm2">
											<div class="inner border-0">
												@if(isset($sponsored_courses_all['userdetails']) && $sponsored_courses_all['userdetails']['image'] != null)
													<img src="{{asset('profile_pic/' .$sponsored_courses_all['userdetails']['image'])}}" class="mw-100">
												@else
													<img src="{{asset('student/assets_new/img/users/1.jpg')}}" class="mw-100">
												@endif
											</div>
										</div>
										<div class="pl-2">
											<div>{{$sponsored_courses_all['sponsor']['name']}}</div>
											<div class="d-flex align-items-center font-12 mt-1"><img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" height="14" class="mr-1"> {{date('d - M - Y', strtotime($sponsored_courses_all['created_at']))}}</div>
										</div>
									</div>
									<p class="font-12 text-xlight line-clamp-2">{{$sponsored_courses_all['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: {{isset($sponsored_courses_all['course_progress']->progress) ? $sponsored_courses_all['course_progress']->progress : 0}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">{{isset($sponsored_courses_all['course_progress']->progress) ? $sponsored_courses_all['course_progress']->progress : 0}}%</div>
										</div>
										<a href="{{route('/course-details',['id'=>$sponsored_courses_all['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="completed" role="tabpanel">
						<div class="row pt-4">
							@foreach($sponsored_course_completed as $sponsored_courses_completed)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										@if(isset($sponsored_courses_completed['course']) && $sponsored_courses_completed['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$sponsored_courses_completed['course']['images'])}}" class="img">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$sponsored_courses_completed['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center mb-3">
										<div class="avatar sm2">
											<div class="inner border-0">
												@if(isset($sponsored_courses_completed['userdetails']) && $sponsored_courses_completed['userdetails']['image'] != null)
													<img src="{{asset('profile_pic/' .$sponsored_courses_completed['userdetails']['image'])}}" class="mw-100">
												@else
													<img src="{{asset('student/assets_new/img/users/1.jpg')}}" class="mw-100">
												@endif
											</div>
										</div>
										<div class="pl-2">
											<div>{{$sponsored_courses_completed['sponsor']['name']}}</div>
											<div class="d-flex align-items-center font-12 mt-1"><img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" height="14" class="mr-1"> {{date('d - M - Y', strtotime($sponsored_courses_completed['created_at']))}}</div>
										</div>
									</div>
									<p class="font-12 text-xlight">{{$sponsored_courses_completed['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">100% Completed</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="assets/img/icons/arrow-rw.svg" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="pending" role="tabpanel">
						<div class="row pt-4">
							@foreach($sponsored_course_pending as $sponsored_courses_pending)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										@if(isset($sponsored_courses_pending['course']) && $sponsored_courses_pending['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$sponsored_courses_pending['course']['images'])}}" class="img">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$sponsored_courses_pending['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center mb-3">
										<div class="avatar sm2">
											<div class="inner border-0">
												@if(isset($sponsored_courses_pending['userdetails']) && $sponsored_courses_pending['userdetails']['image'] != null)
													<img src="{{asset('profile_pic/' .$sponsored_courses_pending['userdetails']['image'])}}" class="mw-100">
												@else
													<img src="{{asset('student/assets_new/img/users/1.jpg')}}" class="mw-100">
												@endif
											</div>
										</div>
										<div class="pl-2">
											<div>{{$sponsored_courses_pending['sponsor']['name']}}</div>
											<div class="d-flex align-items-center font-12 mt-1"><img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" height="14" class="mr-1"> {{date('d - M - Y', strtotime($sponsored_courses_pending['created_at']))}}</div>
										</div>
									</div>
									<p class="font-12 text-xlight">{{$sponsored_courses_pending['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">100% Completed</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets_new/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="expired" role="tabpanel">
						<div class="row pt-4">
							@foreach($sponsored_course_expired as $sponsored_courses_expired)
							<div class="col-sm-6 col-lg-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										@if(isset($sponsored_courses_expired['course']) && $sponsored_courses_expired['course']['images'] != null)
											<img src="{{asset('cover_pic/' .$sponsored_courses_expired['course']['images'])}}" class="img">
										@else
											<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">{{$sponsored_courses_expired['course']['name']}}</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center mb-3">
										<div class="avatar sm2">
											<div class="inner border-0">
												@if(isset($sponsored_courses_expired['userdetails']) && $sponsored_courses_expired['userdetails']['image'] != null)
													<img src="{{asset('profile_pic/' .$sponsored_courses_expired['userdetails']['image'])}}" class="mw-100">
												@else
													<img src="{{asset('student/assets_new/img/users/1.jpg')}}" class="mw-100">
												@endif
											</div>
										</div>
										<div class="pl-2">
											<div>{{$sponsored_courses_expired['sponsor']['name']}}</div>
											<div class="d-flex align-items-center font-12 mt-1"><img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" height="14" class="mr-1"> {{date('d - M - Y', strtotime($sponsored_courses_expired['created_at']))}}</div>
										</div>
									</div>
									<p class="font-12 text-xlight">{{$sponsored_courses_expired['course']['description']}}</p>
									<div class="progress lite rounded-lg">
										<div class="progress-bar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill py-4 mr-3">
											<div class="flex-fill d-flex align-items-center">100% Completed</div>
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
		<script src="{{asset('student/assets_new/js/chart.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
		<script>
			var data1 = {
			    labels: [
			        "Red",
			        "Blue",
			        "Yellow"
			    ],
			    datasets: [
			    {
			        borderWidth: 0,
			        data: [{{$total_sponsored_course}}, {{$completed_sponsored_course}}, {{$rejected_sponsored_course}}],
			        backgroundColor: [
			        "#00A6E6",
			        "#77DD77",
			        "#FF6961"
			        ],
			        hoverBackgroundColor: [
			        "#00A6E6",
			        "#77DD77",
			        "#FF6961"
			        ]
			    }]
      };
			var chart = new Chart(document.getElementById('pieChart'), {
			    type: 'doughnut',
			    data: data1,
			    options: {
			    cutoutPercentage: 80,
			    responsive: true,
			    legend: {
			    display: false
			    }
			    }
			});
		</script>
@endsection