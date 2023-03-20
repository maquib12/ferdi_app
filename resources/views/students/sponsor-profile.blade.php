@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<div class="card bg-blue p-4 rounded-md my-3">
					<div class="row">
						<div class="thumbnail-xxl rounded-md overflow-hidden mx-3">
							<div class="inner bg-theme-blue">
								@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['image'] != null)
								<img src="{{asset('profile_pic/' .$sponsor_profile['userdetails']['image'])}}">
								@else
								<img src="{{asset('student/assets_new/img/img-8.jpg')}}">
								@endif
							</div>
						</div>
						<div class="col d-flex flex-column">
							<div class="flex-fill">
								<div class="d-flex align-items-center">
									<h1 class="text-uppercase my-0 flex-fill"><b>{{$sponsor_profile->name}}</b> <span class="font-xlight">Schultz</span></h1>
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
								<p class="font-18 text-uppercase text-white mb-2">About me</p>
								<p class="text-xlight">Lorem Ipsum Is Simply Text Of The Printing And Typesetting Industry. Orem Ipsum Has Been The Standard Lorem Ipsum Is Simply</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection