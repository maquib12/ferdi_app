@extends('facilitator.include.master')
@section('content')

		<section class="banner py-4">
			<div class="container mt-4">
				<div class="row align-items-center pb-5 pb-2">
					<div class="col-sm-5">
						<div class="col-sm-8 px-0 pt-2 mb-5">
							<h2 class="font-36 font-bold text-light">Our Courses</h2>
						</div>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
					</div>
					<div class="col-sm-6 ml-auto">
						<div class="banner-video">
							<img src="{{asset('assets/img/icons/circle.svg')}}" data-parallax='{"x": -100, "y": 350}' height="60" style="top: -35px; left: -25px; z-index: 1">
							<img src="{{asset('assets/img/icons/circle.svg')}}" data-parallax='{"x": 0, "y": 150}' height="40" style="top: 20px; left: 40px; z-index: 1">
							<img src="{{asset('assets/img/icons/dots.png')}}" data-parallax='{"x": -250, "y": 0}' style="top: 248px; right: -10px">
							<div class="rounded-lg overflow-hidden position-relative">
								<img class="card-img-top img-fluid" src="{{asset('assets/img/bg.png')}}" />
							</div>
						</div>
					</div>
				</div>
				<div class="search-bar full mt-5">
					<form class="d-flex align-items-center" action="{{route('my-course')}}" method="get">
						@csrf
						<input class="form-control bg-transparent col-sm-3 px-0 search" name="search" placeholder="Search Your Course">
						<select class="form-control bg-transparent col pl-4">
							<option value="">Categories</option>
							@foreach($category as $categories)
							<option value="">{{$categories->category_name}}</option>
							@endforeach
							
						</select>
						<select class="form-control bg-transparent col pl-4">
							<option value="">Select Level</option>
							@foreach($stage_status as $k => $stage)
							<option value="{{$stage['course_level']}}">{{$stage['course_level']}}</option>
							@endforeach
						</select>
						<select class="form-control bg-transparent col pl-4">
							<option value="">English</option>
							<option value="">Maths</option>
							<option value="">Science</option>
						</select>
						<div class="px-0 mr-2">
							<button type = "submit" class="btn btn-primary rounded-pill search px-4 py-2 my-1"><span class="mx-4 px-2 py-1 d-block">Search</span></button>
						</div>
					</form>
				</div>
			</div>
		</section>
		<section class="my-5 pb-4">
			<div class="container py-5 my-5">
				<div class="row align-items-center">
					<div class="col-sm-6">
						<h4 class="my-0">All Courses ({{$total_course}} Courses)</h4>
					</div>
					<!-- <div class="col-sm-3 ml-auto">
						<select class="default selectpicker lg rounded-pill sort-by" data-width="100%">
							<option value="">All</option>
							<option value="">Option 1</option>
							<option value="">Option 2</option>
							<option value="">Option 3</option>
						</select>
					</div> -->
				</div>
				<div class="courses-list">
					@foreach($courses as $course)
					<div class="item py-5 border-bottom border-light">
						
						<div class="row">
							<div class="col-sm-4">
								<div class="image rounded-lg overflow-hidden">
									<!-- <img src="{{asset('assets/img/img-1.png')}}" class="image-fit"> -->
									@if(isset($course) && $course['images'] != null)
									<img src="{{asset('cover_pic/' .$course['images'])}}" class="img w-100 h-100" alt="no image">
									@else
									<img src="{{asset('assets/img/img-1.png')}}" class="image-fit">
									@endif
								</div>
							</div>
							
							<div class="col-sm-8">
								<div class="d-flex align-items-center mb-3">
									<h4 class="my-0">{{$course['name']}} 2022</h4>
									<div class="rate-count bg-dark px-2 py-1 text-white font-semibold rounded-xs ml-auto">
										4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
									</div>
								</div>
								<p class="text-gray">Skills - {{$course['add_skills']}}</p>
								<div class="d-flex flex-fill mr-3">
									@if($course['language_id'] == 1)
									<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> English</div>
									@elseif($course['language_id'] == 2)
									<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> French</div>
									@else
									<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> German</div>
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
									<!-- <div class="ml-auto d-flex align-items-center">
										<div class="like-circle normal lg mr-4">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
										<button class="btn btn-primary rounded-lg py-2 px-4"><div class="my-1 px-2">Add To Cart</div></button>
									</div> -->
								</div>
							</div>
							
						</div>
						
					</div>
					@endforeach
			</div>
		</section>
@endsection

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/select-dropdown.js"></script>
    <script src="assets/js/acmeticker.min.js"></script>
    <script src="assets/js/fancybox.min.js"></script>
    <script src="assets/js/swiper-min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>
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
		</script>
  </body>
</html>