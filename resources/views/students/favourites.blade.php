@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
					<h1 class="pb-2 font-bold font-36">Favourites</h1>
				</div>
				<div class="row pt-2">
					@foreach($favourites as $favourite)
					@php
						$course_category = Helper::get_course_category($favourite['course']['category_id']);
					@endphp
					<div class="col-sm-4 my-3">
						<div class="card bg-dark px-3 pt-3 pb-0 rounded-md d-flex h-100">
							<div class="image mb-3 imageSize">
								@if($favourite['course']['images'])
								<img src="{{url('/cover_pic').'/'.$favourite['course']['images']}}" class="img img-cover">
								@else
								<img src="{{asset('student/assets/img/img-1.png')}}" class="img img-cover">
								@endif
								@if($favourite->id)	
									<div class="like-circle">
										<input type="checkbox" onclick="removeTofavourite({{$favourite->id}})" checked>
										<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
									</div>
								
								@endif
							</div>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="text-primary font-16 font-semibold text-uppercase">
									{{$course_category->category_name}}</div>
								<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
									{{isset($avg_star_rating[$favourite['course']['id']]) ? $avg_star_rating[$favourite['course']['id']] : 0}} <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
								</div>
							</div>
							<div class="title text-white font-semibold mb-2 flex-1">{{$favourite['course']['name']}}</div>
							<p class="font-12 text-xlight flex-1">{{$favourite['course']['description']}}</p>
							<div class="d-flex align-items-center">
								<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
									<div class="flex-fill d-flex align-items-center"><img src="{{asset('student/assets/img/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
									<div class="flex-fill d-flex align-items-center"><img src="{{asset('student/assets/img/icons/module.svg')}}" height="16" class="mr-2"> {{$favourite['course']->total_no_of_module}} Modules</div>
								</div>
								<a href="{{route('stu_course_details',['id' => $favourite['course']['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('student/assets/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
	@endsection	
    
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

			function removeTofavourite(id){
				window.location.href = "{{url('students/remove_favourites')}}"+'/'+id;
			}
		</script>