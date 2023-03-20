@extends('sponsor.layout.master')
@section('content')

		<section class="banner py-md-5">
			<div class="container py-5">
				<div class="row">
					<div class="col-sm-6">
						<div class="ticker d-flex align-items-center mb-4">
							<div class="label">New</div>
							<div class="text pl-2 pl-md-3">
								<ul>
									<li><a>Stay Connect With Us To Gate All The Notification What You Need</a></li>
									<li><a>Stay Connect With Us To Gate All The</a></li>
									<li><a>Stay Connect With Us To</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-8 px-0 pt-2 mb-3 mb-md-5 text-center text-md-left">
							<h2 class="font-36 font-bold text-light">{{ __('messages.Get Started Your Learning') }} &<br>{{ __('messages.Enrich Your Dream') }}</h2>
						</div>
						<p class="text-light text-center text-md-left">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
					</div>
					<div class="col-sm-6">
						<div class="banner-video">
							<img src="{{asset('assets/img/icons/circle.svg')}}" data-parallax='{"x": -100, "y": 350}' style="top: -78px">
							<img src="{{asset('assets/img/icons/circle.svg')}}" data-parallax='{"x": 0, "y": 150}' height="25" style="top: -28px; left: 70px">
							<img src="{{asset('assets/img/icons/dotted.png')}}" data-parallax='{"x": -250, "y": 0}' style="top: -65px; right: -25px">
							<div class="video-inner">
								<img class="card-img-top img-fluid" src="{{asset('assets/img/video-img.png')}}" />
								<a class="icon" data-fancybox="bigbuckbunny" data-width="640" data-height="360" href="{{asset('assets/img/video/video.mp4')}}">
									<img src="{{asset('assets/img/icons/play.svg')}}">
								</a>
							</div>
							<!-- <div class="download d-flex align-items-end" data-parallax='{"x": 0, "y": 150}'>
								<div class="icon px-4 py-2 bg-white"><img src="{{asset('assets/img/icons/pdf.svg')}}" class="my-1"></div>
								<a href="" class="btn-primary btn-sm font-10 px-3 py-1">Download</a>
							</div> -->
							<div class="card bg-white pl-4 py-4 pr-5 stats-card absolute rounded-md border-0 d-none d-md-block" data-parallax='{"x": -50, "y": -100}'>
								<div class="user-inline mt-2 mr-2">
									<ul class="list-inline ml-3 d-flex align-items-center mb-0">
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/img/users/1.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/img/users/2.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/img/users/3.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/img/users/4.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/img/users/5.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner add-black"><img src="{{asset('assets/img/icons/plus.svg')}}" height="16"></div></li>
									</ul>
								</div>
								<div class="font-14 text-dark font-medium mt-2">45K+ Students</div>
								<div class="font-12 text-warning mt-2 pt-1 mb-1">
									<span class="text-dark font-10">5.00</span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
								</div>
								<div class="heart px-2 py-1 bg-white rounded-sm" data-parallax='{"x": -100, "y": 0}'><img src="{{asset('assets/img/icons/heart.png')}}"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 mt-n5">
					<div class="col-sm-9 pl-0 pr-0 pr-md-3 pr-m-5 mt-n5 pt-3">
						<div class="search-bar">
							<form class="d-flex align-items-center flex-wrap" action="{{url('/')}}" method="get">
								<input class="form-control bg-transparent col-sm-4 px-0 search" name="search" placeholder="Search Your Course">
								<select class="form-control bg-transparent col pl-4" name="cat_search" id="cat_search">
										<option value="">Categories</option>
										@foreach($category as $cate)
										<option value="{{$cate->id}}">{{$cate->category_name}}</option>
										@endforeach
									</select>
								<select class="form-control bg-transparent col pl-4" name="language" id="language">
										<option value="">Select Language</option>
										@foreach(Helper::languages() as $lang)
										<option value="{{$lang->id}}">{{$lang->language}}</option>
										@endforeach	
									</select>
								<div class="px-0 mr-md-2 action">
									<button type="submit" class="btn btn-primary rounded-pill search px-md-4 py-2 my-1 btn-block"><span class="mx-4 px-2 py-1">Search</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5 bg-map pb-md-4">
			<div class="container py-md-5 my-md-5">
				<div class="heading text-center mb-5 pb-1">
					<h6 class="text-primary font-18 text-uppercase mb-3">build up the community</h6>
					<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">join the biggest community of learning</h3>
					<p class="text-light ol">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> orem Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>orem Ipsum has been the industry's standard</p>
				</div>
				<div class="row justify-content-between mx-0 px-3 px-md-0 my-3 my-md-0">
					<div class="icon mt-md-5 ml-md-3 wow zoomIn">
						<img src="{{asset('assets/img/map/thumbnail/1.png')}}">
					</div>
					<div class="icon ml-n5 mr-md-4 wow zoomIn" data-wow-delay=".5s">
						<img src="{{asset('assets/img/map/thumbnail/2.png')}}">
					</div>
					<div class="icon mt-md-5 mr-md-4 pr-md-3 pt-2 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/img/map/thumbnail/3.png')}}">
					</div>
				</div>
				<div class="row col-sm-11 ml-auto justify-content-between mx-0 px-5 mt-md-5 pt-md-4 mr-3">
					<div class="icon mt-md-5 ml-md-5 pt-md-5 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/img/map/thumbnail/4.png')}}">
					</div>
					<div class="icon ml-n2 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/img/map/thumbnail/5.png')}}">
					</div>
					<div class="icon mt-md-4 mr-md-4 pr-md-4 wow zoomIn">
						<img src="{{asset('assets/img/map/thumbnail/6.png')}}">
					</div>
				</div>
				<div class="row col-sm-11 ml-auto justify-content-between mx-0 pl-md-5 mt-4 mt-md-0 mb-md-2">
					<div class="icon mt-md-4 mx-auto wow zoomIn" data-wow-delay=".5s">
						<img src="{{asset('assets/img/map/thumbnail/7.png')}}">
					</div>
				</div>


			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row align-items-center">
					<div class="col-sm-5 order-md-2 ml-md-n5 mb-4 mb-md-0">
						<img src="{{asset('assets/img/img-7.png')}}" class="mw-100">
					</div>
					<div class="col-sm-7 pr-md-5 text-center text-md-left">
						<h6 class="text-primary font-18 text-uppercase mb-4">think and decide</h6>
						<h3 class="font-36 lh-xl text-light mb-4 text-capitalize font-semibold">let's know about the course and Instructors</h3>
						<p class="text-light">Lorem Ipsum is simply text of the printing and typesetting industry. orem Ipsum has been the standard Lorem Ipsum is simply dummy text of the printing and typesetting indus tryorem .</p>
						<div class="user-inline my-4">
							<ul class="list-inline ml-4 d-flex align-items-center justify-content-center justify-content-md-start">
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/img/users/1.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/img/users/2.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/img/users/3.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/img/users/4.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/img/users/5.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner add-primary"><img src="{{asset('assets/img/icons/plus.svg')}}"></div></li>
							</ul>
						</div>
						<p class="text-light mb-0 mb-md-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard Lorem .</p>
						<!-- <a href="" class="btn btn-primary rounded-pill px-4 btn-md">Create Account</a> -->
					</div>
				</div>
			</div>
		</section>
		<section class="mb-5 my-md-5">
			<div class="container pb-5 py-md-5 my-5">
				<div class="row">
					<div class="col-sm-7 pr-md-5 text-center text-md-left">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">our popular course</h3>
						<p class="text-light">Lorem Ipsum is simply text of the printing and typesetting industry. orem Ipsum has been the standard Lorem Ipsum is simply dummy text of the printing and typesetting indus tryorem.</p>
					</div>
					<div class="col-sm-5 text-center text-md-right">
						<a href="{{route('our-courses')}}" class="btn btn-primary rounded-pill px-4 btn-md"><span class="mx-3">Browse All</span></a>
					</div>
					<div class="col-sm-12">
						<div class="row">
							@foreach($courses as $course)
							
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3 course-img">
										@if(isset($course) && $course['images'] != null)
										<img src="{{asset('cover_pic/' .$course['images'])}}" class="img">
										@else
										<img src="{{asset('assets/img/img-1.png')}}" class="img">
										@endif
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										@if($course->category_id == 1)
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										@elseif($course->category_id == 2)
										<div class="text-primary font-16 font-semibold text-uppercase">Accounts & Finance</div>
										@elseif($course->category_id == 3)
										<div class="text-primary font-16 font-semibold text-uppercase">Agriculture</div>
										@elseif($course->category_id == 4)
										<div class="text-primary font-16 font-semibold text-uppercase">Science</div>
										@elseif($course->category_id == 5)
										<div class="text-primary font-16 font-semibold text-uppercase">Technology</div>
										@else
										<div class="text-primary font-16 font-semibold text-uppercase">Arts</div>
										@endif
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">{{$course->name}}</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/img/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a href="{{route('/course/detail',['id'=>$course['id']])}}" class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/img/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-md-5 my-5">
				<div class="row">
					<div class="col-sm-8 mx-auto text-center mb-4">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">Best Fecilitators</h3>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard</p>
					</div>
					<div class="col-sm-12">
						<div class="row card-slider flex-nowrap flex-md-wrap overflow-auto">
							@foreach($facilitator as $faci)
							
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
									@if(isset($faci['userdetails']) && $faci['userdetails']['image'] != null)
										<img src="{{asset('profile_pic/' .$faci['userdetails']['image'])}}" class="img">
									@else
										<img src="{{asset('assets/img/facilitator/1.jpg')}}" class="img">
									@endif
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">{{isset($faci->name) ? $faci->name : ''}}</div>
										<!-- <p class="font-12">Specialization</p> -->
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row">
					<div class="col-sm-6 text-center text-md-left pr-md-5">
						<h3 class="font-36 lh-xl text-light mb-4 text-capitalize font-semibold mr-md-5">Real success stories from students</h3>
						<p class="text-light">Education Is The Process Of Facilitating Learning Or The Acquisition Of Knowledge, Skills, Values, Beliefs, And Habits.</p>
					</div>
				</div>
				<div class="row testimonials mt-4 pt-2 mx-0">
					<div class="col-sm-7 bg-dark p-5">
						<div class="swiper-container h-100">
							<div class="swiper-wrapper">
								<div class="swiper-slide d-flex flex-column justify-content-between">
									<div class="text">
										I've been out of college for about two years, Ferdi has changed my outlook on my career. Taking the foundational courses in marketing has helped me launch my career.<br><br>
										–Jenny, Associate Marketing<br>	
									</div>
									<div class="caption">
										<p class="font-bold mb-2">Mr. Jonathon Dalas</p>
										<div class="text-light">Father of Mithceal</div>
									</div>
								</div>
								<div class="swiper-slide d-flex flex-column justify-content-between">
									<div class="text">
										I've been out of college for about two years, Ferdi has changed my outlook on my career. Taking the foundational courses in marketing has helped me launch my career.<br><br>
										–Jenny, Associate Marketing<br>	
									</div>
									<div class="caption">
										<p class="font-bold mb-2">Mr. Jonathon Dalas</p>
										<div class="text-light">Father of Mithceal</div>
									</div>
								</div>
								<div class="swiper-slide d-flex flex-column justify-content-between">
									<div class="text">
										I've been out of college for about two years, Ferdi has changed my outlook on my career. Taking the foundational courses in marketing has helped me launch my career.<br><br>
										–Jenny, Associate Marketing<br>	
									</div>
									<div class="caption">
										<p class="font-bold mb-2">Mr. Jonathon Dalas</p>
										<div class="text-light">Father of Mithceal</div>
									</div>
								</div>
								<div class="swiper-slide d-flex flex-column justify-content-between">
									<div class="text">
										I've been out of college for about two years, Ferdi has changed my outlook on my career. Taking the foundational courses in marketing has helped me launch my career.<br><br>
										–Jenny, Associate Marketing<br>	
									</div>
									<div class="caption">
										<p class="font-bold mb-2">Mr. Jonathon Dalas</p>
										<div class="text-light">Father of Mithceal</div>
									</div>
								</div>
							</div>
							<div class="controls">
								<div class="swiper-button-prev"><img src="{{asset('assets/img/icons/arrow-left.svg')}}"></div>
								<div class="swiper-button-next"><img src="{{asset('assets/img/icons/arrow-right.svg')}}"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-5 px-0 bg-primary">
						<div class="swiper-container text-center mt-2 mt-md-n5">
							<div class="swiper-wrapper">
								<div class="swiper-slide"><img src="{{asset('assets/img/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/img/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/img/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/img/testimonials/1.png')}}"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-md-5">
			<div class="container py-md-5 my-md-5">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3 class="font-36 text-light mb-0 mb-md-4 text-capitalize font-semibold">How it works</h3>
					</div>
				</div>
				<div class="row text-center my-3 my-md-5 pt-md-5">
					<div class="col-sm-4 mt-md-0 mt-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/img/blog/1.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 1</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
					<div class="col-sm-4 mt-md-0 mt-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/img/blog/2.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 2</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
					<div class="col-sm-4 mt-md-0 mt-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/img/blog/3.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 3</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-md-5">
			<div class="container py-5 my-md-5">
				<div class="row">
					<div class="col-sm-8">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">Blogs</h3>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard.</p>
					</div>
					<div class="col-sm-4 text-center text-md-right">
						<!-- <a href="" class="btn btn-primary rounded-pill px-2 btn-md"><span class="mx-3">Create Account</span></a> -->
					</div>
					<div class="col-sm-12">
						<div class="row flex-nowrap overflow-auto slide-md-auto">
							@foreach($blog as $blogs)
							<div class="col-sm-4 my-3">
								<div class="card bg-dark pb-0 rounded-md h-100 d-flex flex-column">
									<div class="image mb-3 rounded-top flex-fill">
										<img src="{{asset('blog_image/' .$blogs->image_one)}}" class="img image-fit">
									</div>
									<div class="px-3 pt-2 mb-4">
										<a href="{{url('blog_detail',$blogs->id)}}"><div class="mb-3 font-12 font-medium">{{ date('d M y', strtotime($blogs->created_at)) }}</div>
										<div class="title text-white font-semibold mb-2 text-capitalize">{{$blogs->title}}</div>
										<p class="font-12">{{$blogs->content}}</p></a>
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