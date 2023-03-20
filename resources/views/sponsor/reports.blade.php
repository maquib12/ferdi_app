@extends('students.layout.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Reports</h1>
				</div>
				<div class="row align-items-center mt-4 mt-md-5 mb-4">
					<div class="col-sm-9">
						<div class="search-bar bg-dark">
							<form class="d-flex align-items-center" action="{{route('/reports/filter')}}" method="get">
								@csrf
								<input class="form-control bg-transparent search h50 ph-white" placeholder="Search by name or email..." name="email_search">
								<button type = "submit" class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1"><span class="mx-md-4 px-md-2 d-block">Search</span></button>
							</form>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<select class="default selectpicker sort lg rounded-pill" data-width="100%">
							<option value="">All</option>
							<option value="">Option 1</option>
							<option value="">Option 2</option>
							<option value="">Option 3</option>
						</select>
					</div -->>
				</div>
				<div class="row">
					@foreach($total_users as $users_course)
					@if(isset($users_course))
					<div class="col-sm-6 my-3">
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
								<div class="progress-bar bg-orange" role="progressbar" style="--color: #FF9D3A; --cent: {{$users_course['progress']}}%" data-value="50">
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
			</div>
		</section>
 @endsection