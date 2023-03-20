@extends('sponsor.layout.master')
@section('content')
		<section class="py-4 py-md-5">
			<div class="container">
				<div class="heading">
					<h1 class="pb-2 font-bold font-36 col-md-8 px-0">The Leading Global Marketplace For Learning And Instruction</h1>
				</div>
				<div class="content">
					<div class="my-4">{{$about->description}}</div>
				</div>
				<div class="row text-center mt-md-5 pt-2 pt-md-4">
					<div class="col-6 col-6 col-sm-3 d-flex flex-column my-3 my-3">
						<div class="icon flex-fill mb-3 d-flex align-items-center justify-content-center">
							<img src="{{asset('assets/img/icons/globe-lg.svg')}}">
						</div>
						<div class="font-36 font-bold text-white">15</div>
						<p class="px-md-4">Years Of Language Education Experience</p>
					</div>
					<div class="col-6 col-sm-3 d-flex flex-column my-3">
						<div class="icon flex-fill mb-3 d-flex align-items-center justify-content-center">
							<img src="{{asset('assets/img/icons/users-lg.svg')}}">
						</div>
						<div class="font-36 font-bold text-white">253,085</div>
						<p class="px-md-4">Learners Enrolled In Ferdi Courses</p>
					</div>
					<div class="col-6 col-sm-3 d-flex flex-column my-3">
						<div class="icon flex-fill mb-3 d-flex align-items-center justify-content-center">
							<img src="{{asset('assets/img/icons/presentation.svg')}}">
						</div>
						<div class="font-36 font-bold text-white">985</div>
						<p class="px-md-4">Qualified Facilitators And Mentors</p>
					</div>
					<div class="col-6 col-sm-3 d-flex flex-column my-3">
						<div class="icon flex-fill mb-3 d-flex align-items-center justify-content-center">
							<img src="{{asset('assets/img/icons/online-education.svg')}}">
						</div>
						<div class="font-36 font-bold text-white">1500 +</div>
						<p class="px-md-4">Innovative Business Courses</p>
					</div>
				</div>
			</div>
		</section>
@endsection