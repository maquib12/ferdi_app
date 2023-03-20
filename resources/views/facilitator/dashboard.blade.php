@extends('facilitator.include.master')
@section('content')
		<section class="banner py-4 py-md-5">
			<div class="container">
				<div class="card bg-blue p-4 rounded-md my-md-3">
					<div class="row text-center text-md-left">
						<div class="thumbnail-lg rounded-md overflow-hidden mx-auto mx-md-3">
							<div class="inner">
								@if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
								<img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}">
								@else
								<img src="{{asset('assets/img/img-8.jpg')}}">
								@endif
							</div>
						</div>
						<div class="col-sm-9 d-flex flex-column">
							<div class="flex-fill">
								<h1 class="text-uppercase font-sm-28 mt-4 mt-md-0"><b>{{Auth::user()->name}}</b></h1>
								@if(Auth::user()->user_type_id == 3)
								<button type="button" class="btn btn-success"><i class="fas fa-award"></i>  Mentor</button>
								@else
								<button type="button" class="btn btn-success"><i class="fas fa-award"></i>  Facilitator</button>
								@endif
								@if($user['userdetails'] != null)
								@if($user['userdetails']['business_industry'] == 1)
								<div class="font-xlight font-18 mt-3">Teaches Educational Training</div>
								@elseif($user['userdetails']['business_industry'] == 2)
								<div class="font-xlight font-18 mt-3">Teaches Technical Training</div>
								@elseif($user['userdetails']['business_industry'] == 3)
								<div class="font-xlight font-18 mt-3">Teaches Production Industry</div>
								@else
								<div class="font-xlight font-18"> </div>
								@endif
								@endif
								<div class="d-inline-flex align-items-center  border-white border-solid-2 mt-3">
									<!-- <span class="font-12 mr-1">5.48</span> -->
									<!-- <div class="text-orange mx-2">
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star font-16" aria-hidden="true"></i>
										<i class="fa fa-star-half-o font-16 mr-1" aria-hidden="true"></i>
									</div> -->
									<!-- 17 vote -->
								</div>
							</div>
							<div>
								<a href="{{route('faci_create_course')}}" class="d-inline-flex align-items-center text-primary border-primary pb-2 text-decoration-none">
									<img src="{{asset('assets/img/icons/line-edit.svg')}}" class="mr-4"> Create A New Course
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 my-3">
						<div class="card bg-blue p-4 rounded-md">
							<div class="d-flex align-items-center mb-4">
								<div class="icon-md bg-primary mr-4">
									<img src="{{asset('assets/img/icons/total-earnings.svg')}}">
								</div>
								<h4 class="flex-fill text-uppercase font-regular text-underline-light my-0 font-sm-20">Total Earnings</h4>
								<h3 class="font-bold text-white font-sm-20 my-0">₦{{$myEarning}}</h3>
							</div>
							<p class="font-xlight mb-1">Progress</p>
							<div class="progress light">
								<div class="progress-bar bg-primary" role="progressbar" style="width: {{$myEarning}}%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 my-3">
						<div class="card bg-blue p-4 rounded-md">
							<div class="d-flex align-items-center mb-4">
								<div class="icon-md bg-primary mr-4">
									<img src="{{asset('assets/img/icons/active-courses.svg')}}">
								</div>
								<h4 class="flex-fill text-uppercase font-regular text-underline-light my-0 font-sm-20">Active Courses</h4>
								<h3 class="font-bold text-white font-sm-20 my-0">{{$active_courses}}</h3>
							</div>
							<p class="font-xlight mb-1">Progress</p>
							<div class="progress light">
								<div class="progress-bar bg-primary" role="progressbar" style="width: {{$active_courses}}%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 my-3">
						<div class="card bg-blue p-4 rounded-md">
							<div class="d-flex align-items-center mb-4">
								<div class="icon-md bg-primary mr-4">
									<img src="{{asset('assets/img/icons/users.svg')}}">
								</div>
								<h4 class="flex-fill text-uppercase font-regular text-underline-light my-0 font-sm-20">Fan Followings</h4>
								<h3 class="font-bold text-white font-sm-20 my-0">{{$fan_following}}</h3>
							</div>
							<p class="font-xlight mb-1">Progress</p>
							<div class="progress light">
								<div class="progress-bar bg-primary" role="progressbar" style="width: {{$fan_following}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 my-3">
						<div class="card bg-blue p-4 rounded-md">
							<div class="d-flex align-items-center mb-4">
								<div class="icon-md bg-primary mr-4">
									<img src="{{asset('assets/img/icons/subscribed.svg')}}">
								</div>
								<h4 class="flex-fill text-uppercase font-regular text-underline-light my-0 font-sm-20">Subscribed</h4>
								<h3 class="font-bold text-white font-sm-20 my-0">{{$subscribed}}</h3>
							</div>
							<p class="font-xlight mb-1">Progress</p>
							<div class="progress light">
								<div class="progress-bar bg-primary" role="progressbar" style="width: {{$subscribed}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>