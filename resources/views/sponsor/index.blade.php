@extends('sponsor.layout.master')
@section('content')
		<section class="banner py-5">
			<div class="container py-5">
				<div class="row">
					<div class="col-sm-6">
						<div class="ticker d-flex align-items-center mb-4">
							<div class="label">New</div>
							<div class="text pl-3">
								<ul>
									<li><a>Stay Connect With Us To Gate All The Notification What You Need</a></li>
									<li><a>Stay Connect With Us To Gate All The</a></li>
									<li><a>Stay Connect With Us To</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-8 px-0 pt-2 mb-5">
							<h2 class="font-36 font-bold text-light">Get Started Your Learning & Enrich Your Dream</h2>
						</div>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
					</div>
					<div class="col-sm-6">
						<div class="banner-video">
							<img src="{{asset('assets/images/icons/circle.svg')}}" data-parallax='{"x": -100, "y": 350}' style="top: -78px">
							<img src="{{asset('assets/images/icons/circle.svg')}}" data-parallax='{"x": 0, "y": 150}' height="25" style="top: -28px; left: 70px">
							<img src="{{asset('assets/images/icons/dotted.png')}}" data-parallax='{"x": -250, "y": 0}' style="top: -65px; right: -25px">
							<div class="video-inner">
								<img class="card-img-top img-fluid" src="{{asset('assets/images/video-img.png')}}" />
								<a class="icon" data-fancybox="bigbuckbunny" data-width="640" data-height="360" href="{{asset('assets/images/video/video.mp4')}}">
									<img src="{{asset('assets/images/icons/play.svg')}}">
								</a>
							</div>
							<div class="download d-flex align-items-end" data-parallax='{"x": 0, "y": 150}'>
								<div class="icon px-4 py-2 bg-white"><img src="{{asset('assets/images/icons/pdf.svg')}}" class="my-1"></div>
								<a href="" class="btn-primary btn-sm font-10 px-3 py-1">Download</a>
							</div>
							<div class="card bg-white pl-4 py-4 pr-5 stats-card absolute rounded-md border-0" data-parallax='{"x": -50, "y": -100}'>
								<div class="user-inline mt-2 mr-2">
									<ul class="list-inline ml-3 d-flex align-items-center mb-0">
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/images/users/1.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/images/users/2.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/images/users/3.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/images/users/4.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner"><img src="{{asset('assets/images/users/5.jpg')}}"></div></li>
										<li class="list-inline-item ml-n3 mr-1 avatar sm"><div class="inner add-black"><img src="{{asset('assets/images/icons/plus.svg')}}" height="16"></div></li>
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
								<div class="heart px-2 py-1 bg-white rounded-sm" data-parallax='{"x": -100, "y": 0}'><img src="{{asset('assets/images/icons/heart.png')}}"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 mt-n5">
					<div class="col-sm-9 pl-0 pr-5 mt-n5 pt-3">
						<div class="search-bar">
							<form class="d-flex align-items-center">
								<input class="form-control bg-transparent col-sm-4 px-0 search" placeholder="Search Your Course">
								<select class="form-control bg-transparent col pl-4">
										<option value="">Categories</option>
										<option value="">Categories 1</option>
										<option value="">Categories 2</option>
									</select>
								<select class="form-control bg-transparent col pl-4">
										<option value="">English</option>
										<option value="">Maths</option>
										<option value="">Science</option>
									</select>
								<div class="px-0 mr-2">
									<button class="btn btn-primary rounded-pill search px-4 py-2 my-1"><span class="mx-4 px-2 py-1 d-block">Search</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5 bg-map pb-4">
			<div class="container py-5 my-5">
				<div class="heading text-center mb-5 pb-1">
					<h6 class="text-primary font-18 text-uppercase mb-3">build up the community</h6>
					<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">join the biggest community of learning</h3>
					<p class="text-light ol">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> orem Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard</p>
				</div>
				<div class="row justify-content-between mx-0">
					<div class="icon mt-5 ml-md-3 wow zoomIn">
						<img src="{{asset('assets/images/map/thumbnail/1.png')}}">
					</div>
					<div class="icon ml-n5 mr-4 wow zoomIn" data-wow-delay=".5s">
						<img src="{{asset('assets/images/map/thumbnail/2.png')}}">
					</div>
					<div class="icon mt-5 mr-4 pr-3 pt-2 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/images/map/thumbnail/3.png')}}">
					</div>
				</div>
				<div class="row col-sm-11 ml-auto justify-content-between mx-0 px-5 mt-5 pt-4 mr-3">
					<div class="icon mt-5 ml-5 pt-5 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/images/map/thumbnail/4.png')}}">
					</div>
					<div class="icon ml-n2 wow zoomIn" data-wow-delay=".8s">
						<img src="{{asset('assets/images/map/thumbnail/5.png')}}">
					</div>
					<div class="icon mt-4 mr-4 pr-4 wow zoomIn">
						<img src="{{asset('assets/images/map/thumbnail/6.png')}}">
					</div>
				</div>
				<div class="row col-sm-11 ml-auto justify-content-between mx-0 pl-5 mb-2">
					<div class="icon mt-4 mx-auto wow zoomIn" data-wow-delay=".5s">
						<img src="{{asset('assets/images/map/thumbnail/7.png')}}">
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row align-items-center">
					<div class="col-sm-5 order-md-2 ml-md-n5">
						<img src="{{asset('assets/images/img-7.png')}}" class="ml-md-n5">
					</div>
					<div class="col-sm-7 pr-5">
						<h6 class="text-primary font-18 text-uppercase mb-4">think and decide</h6>
						<h3 class="font-36 lh-xl text-light mb-4 text-capitalize font-semibold">let's know about the course and Instructors</h3>
						<p class="text-light">Lorem Ipsum is simply text of the printing and typesetting industry. orem Ipsum has been the standard Lorem Ipsum is simply dummy text of the printing and typesetting indus tryorem .</p>
						<div class="user-inline my-4">
							<ul class="list-inline ml-4 d-flex align-items-center">
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/images/users/1.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/images/users/2.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/images/users/3.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/images/users/4.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner"><img src="{{asset('assets/images/users/5.jpg')}}"></div></li>
								<li class="list-inline-item ml-n4 avatar md"><div class="inner add-primary"><img src="{{asset('assets/images/icons/plus.svg')}}"></div></li>
							</ul>
						</div>
						<p class="text-light mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard Lorem .</p>
						<a href="" class="btn btn-primary rounded-pill px-4 btn-md">Create Account</a>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row">
					<div class="col-sm-7 pr-5">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">our popular course</h3>
						<p class="text-light">Lorem Ipsum is simply text of the printing and typesetting industry. orem Ipsum has been the standard Lorem Ipsum is simply dummy text of the printing and typesetting indus tryorem.</p>
					</div>
					<div class="col-sm-5 text-center text-md-right">
						<a href="" class="btn btn-primary rounded-pill px-4 btn-md"><span class="mx-3">Browse All</span></a>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-1.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-2.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-3.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-4.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-5.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark px-3 pt-3 pb-0 rounded-md">
									<div class="image mb-3">
										<img src="{{asset('assets/images/img-6.png')}}" class="img">
										<div class="like-circle">
											<input type="checkbox">
											<i class="fa fa-heart-o position-relative" aria-hidden="true"></i>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="text-primary font-16 font-semibold text-uppercase">Business Analysis</div>
										<div class="rate-count border px-2 py-1 text-white font-semibold rounded-xs border-light">
											4.5 <i class="fa fa-star-half-o text-orange" aria-hidden="true"></i>
										</div>
									</div>
									<div class="title text-white font-semibold mb-2">The Business Intelligence Analyst Course 2021</div>
									<p class="font-12">The skills you need to become a BI Analyst - Statistics, Database theory, SQL, Tableau... - Everything is included</p>
									<div class="d-flex align-items-center">
										<div class="font-12 d-flex flex-fill border-top border-primary border-solid-2 py-4 mr-3">
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/globe.svg')}}" height="16" class="mr-2"> English, +2</div>
											<div class="flex-fill d-flex align-items-center"><img src="{{asset('assets/images/icons/module.svg')}}" height="16" class="mr-2"> 20 Modules</div>
										</div>
										<a class="btn btn-primary rounded-pill px-3"><img src="{{asset('assets/images/icons/arrow-rw.svg')}}" class="mx-1"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row">
					<div class="col-sm-8 mx-auto text-center mb-4">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">Best Fecilitators</h3>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard</p>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/1.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/2.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/3.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/4.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/5.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/6.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/7.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
							<div class="col-sm-3 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/facilitator/8.jpg')}}" class="img">
									</div>
									<div class="caption px-3">
										<div class="rate-count py-1 text-white font-semibold d-flex align-items-center mb-2">
											<i class="fa fa-star text-warning font-16 mr-1" aria-hidden="true"></i>
											<span class="font-12">4.5</span>
										</div>
										<div class="title text-white font-semibold mb-1 text-truncate">Facilitator name</div>
										<p class="font-12">Specialization</p>
									</div>
								</div>
							</div>
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
								<div class="swiper-button-prev"><img src="{{asset('assets/images/icons/arrow-left.svg')}}"></div>
								<div class="swiper-button-next"><img src="{{asset('assets/images/icons/arrow-right.svg')}}"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-5 px-0 bg-primary">
						<div class="swiper-container text-center mt-2 mt-md-n5">
							<div class="swiper-wrapper">
								<div class="swiper-slide"><img src="{{asset('assets/images/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/images/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/images/testimonials/1.png')}}"></div>
								<div class="swiper-slide"><img src="{{asset('assets/images/testimonials/1.png')}}"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">How it works</h3>
					</div>
				</div>
				<div class="row text-center my-5 pt-5">
					<div class="col-sm-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/images/blog/1.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 1</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/images/blog/2.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 2</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="rounded-img mx-auto" style="--size: 180px">
							<img src="{{asset('assets/images/blog/3.jpg')}}">
						</div>
						<div class="caption px-2 mt-2 pt-1">
							<div class="font-semibold my-3">Step 3</div>
							<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="my-5">
			<div class="container py-5 my-5">
				<div class="row">
					<div class="col-sm-8">
						<h3 class="font-36 text-light mb-4 text-capitalize font-semibold">Blogs</h3>
						<p class="text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard.</p>
					</div>
					<div class="col-sm-4 text-center text-md-right">
						<a href="" class="btn btn-primary rounded-pill px-2 btn-md"><span class="mx-3">Create Account</span></a>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/blog/1.jpg')}}" class="img">
									</div>
									<div class="px-3 pt-2 mb-4">
										<div class="mb-3 font-12 font-medium">21 Feb 2021</div>
										<div class="title text-white font-semibold mb-2 text-capitalize">masters in english | How to become a good english speaker</div>
										<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/blog/2.jpg')}}" class="img">
									</div>
									<div class="px-3 pt-2 mb-4">
										<div class="mb-3 font-12 font-medium">21 Feb 2021</div>
										<div class="title text-white font-semibold mb-2 text-capitalize">masters in english | How to become a good english speaker</div>
										<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 my-3">
								<div class="card bg-dark pb-0 rounded-md">
									<div class="image mb-3 rounded-top">
										<img src="{{asset('assets/images/blog/3.jpg')}}" class="img">
									</div>
									<div class="px-3 pt-2 mb-4">
										<div class="mb-3 font-12 font-medium">21 Feb 2021</div>
										<div class="title text-white font-semibold mb-2 text-capitalize">masters in english | How to become a good english speaker</div>
										<p class="font-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has... been the industry's standard</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection