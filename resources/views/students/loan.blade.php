
@extends('students.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container py-5 my-5">
				<div class="heading border-bottom border-gray2 d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Loan</h1>
				</div>
				<div class="courses-list no-last-border">
					@foreach($course as $row)
					<div class="item py-5 border-bottom border-gray2">
						<div class="row">
							<div class="col-sm-4">
								<div class="image rounded-lg overflow-hidden w350">
								@if(isset($row['course']['images']))
									<img src="{{asset('cover_pic/' .$row['course']['images'])}}" class="image-fit">
								@else
									<img src="{{asset('student/assets_new/img/img-1.png')}}" class="image-fit">>
								@endif
								</div>
							</div>
							
							<div class="col-sm-8">
									<div class="d-flex align-items-center mb-3">
										<h4 class="my-0">{{$row['course']['name']}} Course 2021</h4>
										<div class="rate-count bg-dark px-2 py-1 text-white font-semibold rounded-xs ml-auto">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<p class="text-gray">Skills-{{$row['course']['add_skills']}}</p>
									<div class="d-flex flex-fill mr-3">
										<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/globe.svg" height="20" class="mr-2"> English, Yoruba, Hausa</div>
										<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/module.svg" height="20" class="mr-2"> {{$row['course']['total_no_of_module']}} Modules</div>
										<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/clock.svg" height="20" class="mr-2"> {{$row['course']['course_duration_in_hours']}} Hours On-Demand Video</div>
									</div>
									<div class="d-flex align-items-center mt-5">
										<div class="font-18">
											Complete Course 100%
											<div class="progress xlight mt-3">
												<div class="progress-bar bg-orange" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="ml-auto d-flex align-items-center">
											<?php /*<div class="like-circle normal lg mr-4 position-relative">
												<input type="checkbox">
												<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
											</div>*/ ?>
											<a href="{{route('loans-apply',[$row->course_id])}}" class="btn btn-primary rounded-lg py-2 px-4"><div class="my-1 px-2">Apply Loan</div></a>
										</div>
								</div>
							</div>
							
						</div>
					</div>
					@endforeach
					<!-- <div class="item py-5 border-bottom border-gray2">
						<div class="row">
							<div class="col-sm-4">
								<div class="image rounded-lg overflow-hidden w350">
									<img src="assets/img/img-1.png" class="image-fit">
								</div>
							</div>
							<div class="col-sm-8">
								<div class="d-flex align-items-center mb-3">
									<h4 class="my-0">The Business Intelligence Analyst Course 2021</h4>
									<div class="rate-count bg-dark px-2 py-1 text-white font-semibold rounded-xs ml-auto">
										4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
									</div>
								</div>
								<p class="text-gray">The Skills You Need To Become A BI Analyst - Statistics, Database Theory, SQL, Tableau – Everything Is Included</p>
								<div class="d-flex flex-fill mr-3">
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/globe.svg" height="20" class="mr-2"> English, Yoruba, Hausa</div>
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/module.svg" height="20" class="mr-2"> 20 Modules</div>
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/clock.svg" height="20" class="mr-2"> 20 Hours On-Demand Video</div>
								</div>
								<div class="d-flex align-items-center mt-5">
									<div class="font-18">
										Complete Course 50%
										<div class="progress xlight mt-3">
											<div class="progress-bar bg-orange" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="ml-auto d-flex align-items-center">
										<?php /*<div class="like-circle normal lg mr-4 position-relative">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>*/ ?>
										<button class="btn btn-primary rounded-lg py-2 px-4"><div class="my-1 px-2">Re Apply Loan</div></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item py-5 border-bottom border-gray2">
						<div class="row">
							<div class="col-sm-4">
								<div class="image rounded-lg overflow-hidden w350">
									<img src="assets/img/img-1.png" class="image-fit">
								</div>
							</div>
							<div class="col-sm-8">
								<div class="d-flex align-items-center mb-3">
									<h4 class="my-0">The Business Intelligence Analyst Course 2021</h4>
									<div class="rate-count bg-dark px-2 py-1 text-white font-semibold rounded-xs ml-auto">
										4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
									</div>
								</div>
								<p class="text-gray">The Skills You Need To Become A BI Analyst - Statistics, Database Theory, SQL, Tableau – Everything Is Included</p>
								<div class="d-flex flex-fill mr-3">
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/globe.svg" height="20" class="mr-2"> English, Yoruba, Hausa</div>
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/module.svg" height="20" class="mr-2"> 20 Modules</div>
									<div class="flex-fill d-flex align-items-center"><img src="assets/img/icons/clock.svg" height="20" class="mr-2"> 20 Hours On-Demand Video</div>
								</div>
								<div class="d-flex align-items-center mt-5">
									<div class="font-18">
										Complete Course 70%
										<div class="progress xlight mt-3">
											<div class="progress-bar bg-orange" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="ml-auto d-flex align-items-center">
										<?php /*<div class="like-circle normal lg mr-4 position-relative">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>*/ ?>
										<button class="btn btn-orange rounded-lg py-2 px-3"><div class="my-1 px-2">Loan Apply Done</div></button>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</section>
@endsection