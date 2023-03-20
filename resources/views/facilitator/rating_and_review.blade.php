@extends('facilitator.include.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
					<h1 class="pb-2 font-bold font-36">Rating &amp; Review</h1>
				</div>
				<div class="row">
					<div class="col-sm-3 text-white">
						<div class="d-md-table text-center mt-md-2">
							<div class="font-80 font-bold">{{$avg_star_rating}}</div>
							<div class="text-orange mx-2 mb-3">
								<?php
									$avg_star_rating_explode = 0;
									if($avg_star_rating != 0){
										$avg_star_rating_explode = explode('.',$avg_star_rating);
									}
									//$len = isset($$avg_star_rating_explode[0]) ? count($avg_star_rating_explode[0]) : 0;
								?>
								
								@if(isset($avg_star_rating_explode[0]))
								@for($i =0; $i<$avg_star_rating_explode[0]; $i++)
								<i class="fa fa-star font-32 mr-1" aria-hidden="true"></i>
								@endfor
								@if(isset($avg_star_rating_explode[1]) >= 5)
								<i class="fa fa-star-half font-32 mr-1" aria-hidden="true"></i>
								@else
								<i class="fa fa-star-half-o font-32 mr-1" aria-hidden="true"></i>
								@endif
								@endif
							</div>
							<h4 class="font-regular">Course Rating</h4>
						</div>
					</div>
					<div class="col-sm-9 d-flex flex-column justify-content-between pl-md-0 ml-md-n4">
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="progress rounded-lg bg-white">
									<div class="progress-bar" style="width: <?php echo $five_star_rating;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-sm-3 px-0 d-flex align-items-center justify-content-between pl-2 pr-3 px-md-0 my-2 my-md-0">
								<div class="text-orange mx-2 text-nowrap">
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
								</div>
								<h4 class="text-primary my-0">{{$five_star_rating}}%</h4>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="progress rounded-lg bg-white">
									<div class="progress-bar" style="width: <?php echo $four_star_rating;?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-sm-3 px-0 d-flex align-items-center justify-content-between pl-2 pr-3 px-md-0 my-2 my-md-0">
								<div class="text-orange mx-2 text-nowrap">
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i>
								</div>
								<h4 class="text-primary my-0">{{$four_star_rating}}%</h4>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="progress rounded-lg bg-white">
									<div class="progress-bar" style="width: <?php echo $three_star_rating;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-sm-3 px-0 d-flex align-items-center justify-content-between pl-2 pr-3 px-md-0 my-2 my-md-0">
								<div class="text-orange mx-2 text-nowrap">
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i>
								</div>
								<h4 class="text-primary my-0">{{$three_star_rating}}%</h4>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="progress rounded-lg bg-white">
									<div class="progress-bar" style="width: <?php echo $two_star_rating;?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-sm-3 px-0 d-flex align-items-center justify-content-between pl-2 pr-3 px-md-0 my-2 my-md-0">
								<div class="text-orange mx-2 text-nowrap">
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i>
								</div>
								<h4 class="text-primary my-0">{{$two_star_rating}}%</h4>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="progress rounded-lg bg-white">
									<div class="progress-bar" style="width: <?php echo $one_star_rating;?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-sm-3 px-0 d-flex align-items-center justify-content-between pl-2 pr-3 px-md-0 my-2 my-md-0">
								<div class="text-orange mx-2 text-nowrap">
									<i class="fa fa-star font-26 mr-1" aria-hidden="true"></i>
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i> 
									<i class="fa fa-star-o font-26 mr-1" aria-hidden="true"></i>
								</div>
								<h4 class="text-primary my-0">{{$one_star_rating}}%</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row align-items-center mt-4 mt-md-5">
					<div class="col-sm-9">
						<div class="search-bar">
							<form class="d-flex align-items-center" action="{{ route('faci_rating_and_review') }}" method="GET">
								@csrf
								<input class="form-control bg-transparent search border-0" placeholder="Search Review" id="search" name="search" required/>
								<button class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1" type="submit"><span class="mx-md-4 px-md-2 py-md-1 d-block">Search</span></button>
							</form>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<select class="default selectpicker lg rounded-pill" data-width="100%">
							<option value="">All Ratings</option>
							<option value="">Option 1</option>
							<option value="">Option 2</option>
							<option value="">Option 3</option>
						</select>
					</div> -->
				</div>
				@foreach($user_review as $row)
				<div class="row mt-5 ml-md-0 px-3 px-md-0">
					
					<div class="avatar md2">
						<div class="inner rounded-md border-0"><img src="{{asset('assets/img/users/1.jpg')}}"></div>
					</div>
					<div class="col pl-4">
						<div class="d-flex align-items-center"><h5 class="my-0 font-light text-white font-sm-14">{{$row['users']->name}}</h5> <span class="mx-3 font-xlight mt-1">-</span><small class="font-12 font-xlight">30 Minutes</small></div>
						@if(isset($row['user_review']))
						<div class="text-orange my-1">
						       @for($i =0; $i<$row['user_review']->rating; $i++)
								<i class="fa fa-star font-32 mr-1" aria-hidden="true"></i>
								@endfor
								@if(isset($row['user_review']->rating) >= 5)
								<i class="fa fa-star-half font-32 mr-1" aria-hidden="true"></i>
								@else
								<i class="fa fa-star-half-o font-32 mr-1" aria-hidden="true"></i>
								@endif
						</div>
						@endif
						<p class="font-xlight text-xlight lh-28 text-md-justify">{{$row->review}}</p>
						<div class="action d-flex align-items-center">
							<!-- <div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="like">
									<em></em>
									<img src="{{asset('assets/img/icons/like.svg')}}">
								</label> Like
							</div>
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="dislike">
									<em></em>
									<img src="{{asset('assets/img/icons/dislike.svg')}}">
								</label> Dislike
							</div> -->
						</div>
					</div>
					
				</div>
				@endforeach
				<!-- <div class="row mt-5 ml-md-0 px-3 px-md-0">
					<div class="avatar md2">
						<div class="inner rounded-md border-0"><img src="{{asset('assets/img/users/2.jpg')}}"></div>
					</div>
					<div class="col pl-4">
						<div class="d-flex align-items-center"><h5 class="my-0 font-light text-white font-sm-14">Jeroen Kortenhorst</h5> <span class="mx-3 font-xlight mt-1">-</span><small class="font-12 font-xlight">40 Minutes</small></div>
						<div class="text-orange my-1">
							<i class="fa fa-star mr-1" aria-hidden="true"></i>
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star-half-o mr-1" aria-hidden="true"></i>
						</div>
						<p class="font-xlight text-xlight lh-28 text-md-justify">Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of</p>
						<div class="action d-flex align-items-center">
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="like">
									<em></em>
									<img src="{{asset('assets/img/icons/like.svg')}}">
								</label> Like
							</div>
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="dislike">
									<em></em>
									<img src="{{asset('assets/img/icons/dislike.svg')}}">
								</label> Dislike
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5 ml-md-0 px-3 px-md-0">
					<div class="avatar md2">
						<div class="inner rounded-md border-0"><img src="{{asset('assets/img/users/3.jpg')}}"></div>
					</div>
					<div class="col pl-4">
						<div class="d-flex align-items-center"><h5 class="my-0 font-light text-white font-sm-14">Hugo Nicolás Quiroga Ortiz</h5> <span class="mx-3 font-xlight mt-1">-</span><small class="font-12 font-xlight">1 Minutes</small></div>
						<div class="text-orange my-1">
							<i class="fa fa-star mr-1" aria-hidden="true"></i>
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star-half-o mr-1" aria-hidden="true"></i>
						</div>
						<p class="font-xlight text-xlight lh-28 text-md-justify">Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of</p>
						<div class="action d-flex align-items-center">
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="like">
									<em></em>
									<img src="{{asset('assets/img/icons/like.svg')}}">
								</label> Like
							</div>
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="dislike">
									<em></em>
									<img src="{{asset('assets/img/icons/dislike.svg')}}">
								</label> Dislike
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5 ml-md-0 px-3 px-md-0">
					<div class="avatar md2">
						<div class="inner rounded-md border-0"><img src="{{asset('assets/img/users/4.jpg')}}"></div>
					</div>
					<div class="col pl-4">
						<div class="d-flex align-items-center"><h5 class="my-0 font-light text-white font-sm-14">Francesco Castronuovo</h5> <span class="mx-3 font-xlight mt-1">-</span><small class="font-12 font-xlight">1 hour</small></div>
						<div class="text-orange my-1">
							<i class="fa fa-star mr-1" aria-hidden="true"></i>
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star mr-1" aria-hidden="true"></i> 
							<i class="fa fa-star-half-o mr-1" aria-hidden="true"></i>
						</div>
						<p class="font-xlight text-xlight lh-28 text-md-justify">Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of Lorem Ipsum is simply dummy text the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy inter took a galley of</p>
						<div class="action d-flex align-items-center">
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="like">
									<em></em>
									<img src="{{asset('assets/img/icons/like.svg')}}">
								</label> Like
							</div>
							<div class="mr-4 pr-2 d-flex align-items-center">
								<label class="icon-default sm my-0 mr-2">
									<input type="radio" name="like" value="dislike">
									<em></em>
									<img src="{{asset('assets/img/icons/dislike.svg')}}">
								</label> Dislike
							</div>
						</div>
					</div>
				</div> -->
				<div class="clearfix mt-5"><a href="" class="font-18 my-0 text-primary">View All Review</a></div>
			</div>
		</section>
@endsection