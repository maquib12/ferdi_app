@extends('students.layout.master')
@section('content')
<?php
use App\courseUser;
?>
<style>
.assessment-disabled{
	pointer-events: none;
}
</style>
<section class="py-md-5">
	<div class="container">
		<div class="card bg-transparent p-0 rounded-md my-3">
			<div class="row">
				<div class="thumbnail col-lg-8">
					<div class="inner bg-theme-blue video-overlay rounded-md overflow-hidden">
						@if(isset($course) && $course['images'] != null)
						<img src="{{asset('cover_pic/' .$course['images'])}}" class="mw-100" alt="no image">
						@else
						<img src="{{asset('assets/img/img-1-md.jpg')}}" class="mw-100">
						@endif
						
						@if(isset($course) && $course['images'] != null)
						<a class="icon sm" data-fancybox="bigbuckbunny" data-width="640" data-height="360" href="{{asset('video/' .$course['videos'])}}">
							<img src="{{asset('assets/img/icons/play.svg')}}" height="70">
						</a>
						@endif
						<!-- <img src="{{asset('student/assets_new/img/img-1-md.jpg')}}" class="mw-100">
						<a class="icon sm" data-fancybox="bigbuckbunny" data-width="640" data-height="360" href="{{asset('student/assets_new/img/video/video.mp4')}}">
							<img src="{{asset('student/assets_new/img/icons/play.svg')}}" height="70">
						</a> -->
					</div>
					<div class="flex-fill mt-4 mt-md-3">
						<div class="text-primary font-18 font-semibold text-uppercase">{{$course['name']}}</div>
						<div class="d-flex align-items-center my-2 my-lg-4">
							<h2 class="my-0 flex-fill font-bold font-36">{{$course['name']}}</h2>
						</div>
						<div class="font-xlight">{{$course['description']}}</div>
						<div class="d-flex align-items-center mt-3 mb-3 mb-lg-4">
							<span class="mr-1">{{$avg_star_rating}}</span>
							<div class="text-orange mx-2">
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
								@else
								<i class="fa fa-star font-32 mr-1" aria-hidden="true"></i>
								@endif
							</div>
							<div class="text-primary font-18 font-semibold text-uppercase">{{$total_rating}} Vote</div>
						</div>
						<div>
							<a href="{{route('facilator_profile',['id' => $user['id']])}}">
								<div class="avatar sm d-flex align-items-center">
									<div class="inner">
										@if(isset($user) && isset($user['userdetails']['image']))
										<img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}" class="img">
										@else
											<img src="{{asset('student/assets_new/img/img-1.png')}}" class="img">
										@endif
									</div>
								    <span class="ml-2 font-medium">{{$user['name']}}</span>
							   </div>
							</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					@if($module)
					@php
						$i=1;
						$modules_percentage = 0;
					@endphp
			    	@foreach($mod_detail as $key=>$mod)
					<div class="module mb-3">Module {{$i++}}</div>
					<div class="arrow-accordion" id="accordion">
						<div class="card mb-3 bg-dark rounded-xs px-3">
							<div class="card-header bg-transparent px-0 py-3 d-flex align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false">{{$mod['name']}}<i class="fa fa-angle-down ml-auto" aria-hidden="true"></i></div>
							<div id="collapse1" class="collapse @if($key==0) show @endif" data-parent="#accordion" style="">
								<div class="row">
									<div class="col-sm-6">
										<h4 class="font-semibold pb-2">Video's</h4>
										<ul class="list text-xlight font-xlight underline font-18 mb-5 pb-md-4">
											@if(isset($mod->videos))
											@php
											$mod_videos = explode(",",$mod->images);
											$i=1;
											@endphp
											@foreach($mod_videos as $mv)
											<li><a href="{{url('module_image').'/'.$mv}}" target="_blank" class="@if(Auth::user()->user_type_id==5) assessment-disabled @endif">Lecture {{$i++}}</a></li>
											@endforeach
											@endif
										</ul>
									</div>
									<div class="col-sm-6">
										<h4 class="font-semibold pb-2">Pdf's</h4>
										<ul class="list text-xlight font-xlight underline font-18 mb-5 pb-md-4">
											@if(isset($mod->pdf))
											@php
											$mod_pdfs = explode(",",$mod->pdf);
											$j=1;
											@endphp
											@foreach($mod_pdfs as $mp)
											<li><a href="{{url('/module_pdf').'/'.$mp}}" class="@if(Auth::user()->user_type_id==5) assessment-disabled @endif" target="_blank">PDF {{$j++}}</a></li>
											@endforeach
											@endif
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <?php 
				 
					$percentage_count = Helper::get_module_percentage($mod->id);
					$modules_percentage = $modules_percentage+$percentage_count;
					if($modules_percentage>0){
					$modules_percentage2 = $modules_percentage/$course->total_no_of_module;
					courseUser::where(['course_id'=>$course->id,'mentor_id'=>$course->created_by])->update(['progress'=>$modules_percentage2]);
					}
					$previous_module_percentage = Helper::get_module_percentage(($mod->id)-1);
					?>
					@if(Auth::user()->user_type_id!=5)
					@if($key==0 && $no_of_questions!=null)
					<a href="{{route('stu-skill-assessment',['id' => $mod->id,'q_id' => 1,'courseId'=>$mod->course_id])}}" class="btn btn-primary btn-block py-2 rounded-pill mt-4"><span class="d-block my-1">
					@if($percentage_count){{$percentage_count}}% Completed @else{{"Skill Assessment"}}@endif</span></a>
					@elseif($no_of_questions!=null)
					<a href="{{route('stu-skill-assessment',['id' => $mod->id,'q_id' => 1,'courseId'=>$mod->course_id])}}" class="btn btn-primary btn-block py-2 rounded-pill mt-4 d @if($previous_module_percentage<=70) assessment-disabled @endif"><span class="d-block my-1">@if($percentage_count){{$percentage_count}}% Completed @else{{"Skill Assessment"}}@endif</span></a>
					@else
					@if($key==0)
					<a href="{{route('stu-skill-assessment',['id' => $mod->id,'q_id' => 1,'courseId'=>$mod->course_id])}}" class="btn btn-primary btn-block py-2 rounded-pill mt-4 d"><span class="d-block my-1">@if($percentage_count){{$percentage_count}}% Completed @else{{"Skill Assessment"}}@endif</span></a>
					@else
					<a href="{{route('stu-skill-assessment',['id' => $mod->id,'q_id' => 1,'courseId'=>$mod->course_id])}}" class="btn btn-primary btn-block py-2 rounded-pill mt-4 d @if($previous_module_percentage<=70)assessment-disabled @endif"><span class="d-block my-1">@if($percentage_count){{$percentage_count}}% Completed @else{{"Skill Assessment"}}@endif</span></a>
					@endif
					@endif
					@endif
					<div class="swiper single-slider mt-4 overflow-hidden swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
						<div class="d-flex align-items-center">
							<div class="flex-fill font-12 text-xlight my-3">Upnext</div>
							<div class="d-flex position-relative font-18">
								<div class="swiper-prev arrow-n swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-10fe1d6910ea37ab86" aria-disabled="true"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
								<div class="swiper-next arrow-n ml-3" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-10fe1d6910ea37ab86" aria-disabled="false"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
							</div>
						</div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
					@endforeach
				@endif
				</div>
				<input type="hidden" name="review_popup" id="review_popup" value="{{isset($percentage_count)}}">
				<input type="hidden" name="popup_count" id="popup_count" value="{{$course_review}}">
			<!-- <div class="col-lg-4">
			@if($module)
			@php
				$i=1;
			@endphp
			    @foreach($module as $modules)
				<a href="javascript:void(0)" class="module mb-3">{{$modules['name']}}</a>
					<div class="arrow-accordion" id="accordion">
						@foreach($lectures as $key => $lecture)
						<div class="card mb-3 bg-dark rounded-xs px-3">
							<div class="card-header bg-transparent px-0 py-3 d-flex align-items-center" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true">Lecture {{$key + 1}} | {{$lecture->time}} Minutes <i class="fa fa-angle-down ml-auto" aria-hidden="true"></i></div>
							<div id="collapse1" class="collapse show" data-parent="#accordion">
								<div class="card-body px-0 border-top border-light3 border-solid-2 py-3">
									<div class="mb-1">{{$lecture->name}}</div>
									<p class="font-12 text-xlight lh-18">{{$lecture->description}}.</p>
									<div class="font-12 font-semibold bg-lgreen text-dark py-1 rounded-pill d-table w100 text-center">
										@if($lecture->level == 1)
										<span class="py-1 d-block">Beginner</span>
										@elseif($lecture->level == 2)
										<span class="py-1 d-block">Intermediate</span>
										@else
										<span class="py-1 d-block">Advance</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					<div class="swiper single-slider mt-4 overflow-hidden">
					</div>
				</div>
				@endforeach
			@endif
			</div>
		</div> -->
		<a href="{{route('certificate')}}">Download Certificate</a>
		<div class="border-top border-bottom border-gray2 border-solid-2 py-5 mt-5">
			<div class="row">
				<div class="avatar xxl sm-sm ml-3 mr-md-3">
					<div class="inner border-0">
					       @if(isset($sponsor['userdetails']) && isset($sponsor['userdetails']['image']))
									<img src="{{asset('profile_pic/' .$sponsor['userdetails']['image'])}}" class="image-fit">
							@else
								<img src="{{asset('student/assets_new/img/users/5.jpg')}}" class="image-fit">
							@endif
					</div>
				</div>
				<div class="col">
					<div class="text-xlight mb-2">SPONSOR</div>
					<div class="h4 font-medium mb-3">{{isset($sponsor['sponsor']['name']) ? $sponsor['sponsor']['name'] : ""}}</div>
					<div>Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
				</div>
			</div>
		</div>
		<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
			<h4>About Course</h4>
			<p>{{$course['description']}}</p>
			<!-- <a role="button" class="text-primary" data-more="#more">Read More <i class="fa fa-angle-down ml-1" aria-hidden="true"></i></a> -->
		</div>
	</div>
		<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
			<h4>What you will learn?</h4>
			<ul class="check-list mb-4">
				@php
					$learning_obj = explode(",",$course['learning_objects']);
				@endphp
				@if($learning_obj!="")
				@foreach($learning_obj as $obj)
				<li>{{$obj}}</li>
				@endforeach
				@else
				<li class="text-danger">Oops! No learning objectives found</li>
				@endif
				
			</ul>
			<a href="" class="text-primary">Read Less <i class="fa fa-angle-up ml-1" aria-hidden="true"></i></a>
		</div>
		<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
			<h4>This course includes</h4>
			<div class="row">
				<div class="col-sm-4">
					<ul class="icon-list sm">
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/clock.svg')}}" alt="on-demand"></i> {{$course['course_duration_in_hours']}} hours on-demand video</li>
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/pdf-sm.svg')}}" alt="resources"></i> 16 downloadable resources</li>
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/mobile.svg')}}" alt="mobile and web"></i> Access on mobile and Web</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<ul class="icon-list sm">
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/book.svg')}}" alt="modules"></i> {{$course['total_no_of_module']}} Modules</li>
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/calendar.svg')}}" alt="months access"></i> 3 months access</li>
						<li><i class="icon"><img src="{{asset('student/assets_new/img/icons/medal.svg')}}" alt="certificate"></i> Certificate on completion </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
			<h4>Course Modules</h4>
			<div class="accordion" id="accordionExample">
				@if(count($module)>0)
				@foreach($module as $key=>$mod)
				<div class="card bg-dark px-2 px-md-3 px-lg-4 my-3">
					<div class="card-header p-0 d-flex align-items-center justify-content-between h-60" data-toggle="collapse" data-target="#item-1" aria-expanded="true" aria-controls="collapseOne">
						<div class="title font-sm-12" id="course_mod"><i class="arrow mr-2"><img src="{{asset('assets/img/icons/angle-down.svg')}}"></i>{{ucwords($mod->name)}}</div>
						<div class="d-flex align-items-end align-items-md-center flex-column flex-md-row justify-content-end font-sm-12">
							<span class="mr-md-3">{{$mod->no_of_lecture}}</span>
							<span>{{$mod->time}} Hrs</span>
							<div class="font-12 font-semibold bg-lgreen text-dark py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">
								<span class="py-1 d-block">@if($mod->level==1){{"Beginner"}}@elseif($mod->level==2){{"Intermediate"}}@else{{"Advanced"}}@endif</span>
							</div>
						</div>
					</div>
					<div id="item-1" class="collapse @if($key==0)show @endif border-top border-light2 item_data{{$key}}" data-parent="#accordionExample">
						<div class="card-body px-0 py-4 mt-2 mb-md-4">
							<h4 class="font-semibold mb-3">{{$mod->overview	}}</h4>
							<h5 class="font-18 text-uppercase text-primary mb-3 mb-md-4">{{$mod->cname}}</h5>
							<p>{!! $mod->description !!}</p>
							<div class="price font-36 d-flex align-items-center font-medium mt-2 mt-md-4 pt-md-2">
								<!-- $ 10 <s class="h6 my-0 ml-3 font-regular">$ 15</s> -->
							</div>
							<!-- <button class="btn btn-primary py-2 rounded-pill mt-4 px-4"><span class="d-block my-1 mx-2">Add To Cart</span></button>
							<button class="btn btn-line-white py-2 rounded-pill mt-4 px-4 ml-4"><span class="d-block my-1 mx-4">Buy Now</span></button> -->
						</div>
					</div>
				</div>
				@endforeach
				@endif
				<!-- <div class="card bg-dark px-2 px-md-3 px-lg-4 my-3">
					<div class="card-header p-0 d-flex align-items-center justify-content-between h-60" data-toggle="collapse" data-target="#item-7" aria-expanded="false" aria-controls="collapseOne">
						<div class="title font-sm-12"><i class="arrow mr-2"><img src="assets/img/icons/angle-down.svg"></i> Module Name</div>
						<div class="d-flex align-items-end align-items-md-center flex-column flex-md-row justify-content-end font-sm-12">
							<span class="mr-md-3">6 Lectures</span>
							<span>3.5 Hrs</span>
							<div class="font-12 font-semibold bg-lorange text-dark py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">
								<span class="py-1 d-block">Intermediate</span>
							</div>
						</div>
					</div>
					<div id="item-7" class="collapse border-top border-light2" data-parent="#accordionExample">
						<div class="card-body px-0 py-4 mt-2 mb-md-4">
							<h4 class="font-semibold mb-3">Understanding yourself</h4>
							<h5 class="font-18 text-uppercase text-primary mb-3 mb-md-4">Business Management</h5>
							<p>Business management is a term used for organizing, overseeing planning different aspects of business and it covers all domains of management including but not limited to Human resource management, Project Management, Team Management etc.</p>
							<div class="price font-36 d-flex align-items-center font-medium mt-2 mt-md-4 pt-md-2">
								$ 10 <s class="h6 my-0 ml-3 font-regular">$ 15</s>
							</div>
							<button class="btn btn-primary py-2 rounded-pill mt-4 px-4"><span class="d-block my-1 mx-2">Add To Cart</span></button>
							<button class="btn btn-line-white py-2 rounded-pill mt-4 px-4 ml-4"><span class="d-block my-1 mx-4">Buy Now</span></button>
															</div>
					</div>
				</div> -->
				
				<!-- <div class="card bg-dark px-2 px-md-3 px-lg-4 my-3">
					<div class="card-header p-0 d-flex align-items-center justify-content-between h-60" data-toggle="collapse" data-target="#item-14" aria-expanded="false" aria-controls="collapseOne">
						<div class="title font-sm-12"><i class="arrow mr-2"><img src="assets/img/icons/angle-down.svg"></i> Module Name</div>
						<div class="d-flex align-items-end align-items-md-center flex-column flex-md-row justify-content-end font-sm-12">
							<span class="mr-md-3">6 Lectures</span>
							<span>3.5 Hrs</span>
							<div class="font-12 font-semibold bg-lred text-dark py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">
								<span class="py-1 d-block">Advance</span>
							</div>
						</div>
					</div>
					<div id="item-14" class="collapse border-top border-light2" data-parent="#accordionExample">
						<div class="card-body px-0 py-4 mt-2 mb-md-4">
							<h4 class="font-semibold mb-3">Understanding yourself</h4>
							<h5 class="font-18 text-uppercase text-primary mb-3 mb-md-4">Business Management</h5>
							<p>Business management is a term used for organizing, overseeing planning different aspects of business and it covers all domains of management including but not limited to Human resource management, Project Management, Team Management etc.</p>
							<div class="price font-36 d-flex align-items-center font-medium mt-2 mt-md-4 pt-md-2">
								$ 10 <s class="h6 my-0 ml-3 font-regular">$ 15</s>
							</div>
							<button class="btn btn-primary py-2 rounded-pill mt-4 px-4"><span class="d-block my-1 mx-2">Add To Cart</span></button>
							<button class="btn btn-line-white py-2 rounded-pill mt-4 px-4 ml-4"><span class="d-block my-1 mx-4">Buy Now</span></button>
															</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<div class="modal fade dark" id="rateModal" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered px-5" role="document">
				<div class="modal-content bg-dark rounded-md p-3">
					<div class="modal-body text-center">
					<form action="{{route('/submit/review')}}" method="POST">
						@csrf
						<div id="rateCourse">
							<div class="text-right mt-n3 mb-2">
								<span type="button" class="font-14" data-dismiss="modal" aria-label="Close">Skip</button>
							</div>
							<div class="font-14 font-bold">Rate The Course</div>
							<div class="text-xlight font-light font-12 mt-2 pt-1 lh-22">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</div>
							<input type="hidden" name="course_id" id="course_id" value="{{$course['id']}}">
							<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
							<div class="d-flex font-12 mt-3 rating-icon">
								<div class="col px-1">
									<div class="icon active">
										<input type="checkbox" value="1" checked>
										<svg class="mb-2" width="36.82" height="35.242"><path id="Icon_awesome-star" data-name="Icon awesome-star" d="M21.827,1.225l4.494,9.112L36.376,11.8a2.2,2.2,0,0,1,1.218,3.758L30.32,22.65,32.04,32.663a2.2,2.2,0,0,1-3.193,2.319l-9-4.728-9,4.728a2.2,2.2,0,0,1-3.193-2.319L9.384,22.65,2.109,15.561A2.2,2.2,0,0,1,3.327,11.8l10.055-1.466,4.494-9.112a2.2,2.2,0,0,1,3.95,0Z" transform="translate(-1.441 0.001)" fill="#ffcc23"/></svg>
										<div class="text mt-1">Don't like</div>
									</div>
								</div>
								<div class="col px-1">
									<div class="icon active">
										<input type="checkbox" value="2" checked>
										<svg class="mb-2" width="36.82" height="35.242"><path id="Icon_awesome-star" data-name="Icon awesome-star" d="M21.827,1.225l4.494,9.112L36.376,11.8a2.2,2.2,0,0,1,1.218,3.758L30.32,22.65,32.04,32.663a2.2,2.2,0,0,1-3.193,2.319l-9-4.728-9,4.728a2.2,2.2,0,0,1-3.193-2.319L9.384,22.65,2.109,15.561A2.2,2.2,0,0,1,3.327,11.8l10.055-1.466,4.494-9.112a2.2,2.2,0,0,1,3.95,0Z" transform="translate(-1.441 0.001)" fill="#ffcc23"/></svg>
										<div class="text mt-1">Okay</div>
									</div>
								</div>
								<div class="col px-1">
									<div class="icon active">
										<input type="checkbox" value="3" checked>
										<svg class="mb-2" width="36.82" height="35.242"><path id="Icon_awesome-star" data-name="Icon awesome-star" d="M21.827,1.225l4.494,9.112L36.376,11.8a2.2,2.2,0,0,1,1.218,3.758L30.32,22.65,32.04,32.663a2.2,2.2,0,0,1-3.193,2.319l-9-4.728-9,4.728a2.2,2.2,0,0,1-3.193-2.319L9.384,22.65,2.109,15.561A2.2,2.2,0,0,1,3.327,11.8l10.055-1.466,4.494-9.112a2.2,2.2,0,0,1,3.95,0Z" transform="translate(-1.441 0.001)" fill="#ffcc23"/></svg>
										<div class="text mt-1">Normal</div>
									</div>
								</div>
								<div class="col px-1">
									<div class="icon">
										<input type="checkbox" value="4">
										<svg class="mb-2" width="36.82" height="35.242"><path id="Icon_awesome-star" data-name="Icon awesome-star" d="M21.827,1.225l4.494,9.112L36.376,11.8a2.2,2.2,0,0,1,1.218,3.758L30.32,22.65,32.04,32.663a2.2,2.2,0,0,1-3.193,2.319l-9-4.728-9,4.728a2.2,2.2,0,0,1-3.193-2.319L9.384,22.65,2.109,15.561A2.2,2.2,0,0,1,3.327,11.8l10.055-1.466,4.494-9.112a2.2,2.2,0,0,1,3.95,0Z" transform="translate(-1.441 0.001)" fill="#ffcc23"/></svg>
										<div class="text mt-1">Liked</div>
									</div>
								</div>
								<div class="col px-1">
									<div class="icon">
										<input type="checkbox" value="5">
										<svg class="mb-2" width="36.82" height="35.242"><path id="Icon_awesome-star" data-name="Icon awesome-star" d="M21.827,1.225l4.494,9.112L36.376,11.8a2.2,2.2,0,0,1,1.218,3.758L30.32,22.65,32.04,32.663a2.2,2.2,0,0,1-3.193,2.319l-9-4.728-9,4.728a2.2,2.2,0,0,1-3.193-2.319L9.384,22.65,2.109,15.561A2.2,2.2,0,0,1,3.327,11.8l10.055-1.466,4.494-9.112a2.2,2.2,0,0,1,3.95,0Z" transform="translate(-1.441 0.001)" fill="#ffcc23"/></svg>
										<div class="text mt-1">Loved it</div>
									</div>
								</div>
							</div>
							<textarea class="bg-light rounded-xs border-light4 w-100 px-3 py-3 font-14 border resize-none my-3" rows="4" placeholder="Write a review" name="user_review" id="user_review"></textarea>
							<button class="btn btn-primary rounded-pill btn-block h50" data="toggle" data-show="#reviewSubmit" data-hide="#rateCourse" role="button">Submit</button>
						</div>
					</form>
						<!-- <div class="text-center d-none" id="reviewSubmit">
							<div class="icon mb-5"><img src="assets/img/icons/star-black-xl.png"></div>
							<div class="font-18 mb-1">Great! Review Submitted</div>
							<div class="text-xlight font-12 mb-4 pb-3">Thank You For Your Rating</div>
							<button class="btn btn-primary rounded-pill btn-block h50" data-dismiss="modal" role="button">Done</button>
						</div> -->
					</div>
				</div>
			</div>
		</div>
</section>
<script src="{{asset('student/assets_new/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('student/assets_new/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('student/assets_new/js/acmeticker.min.js')}}"></script>
<script src="{{asset('student/assets_new/js/fancybox.min.js')}}"></script>
<script src="{{asset('student/assets_new/js/swiper-min.js')}}"></script>
<script src="{{asset('student/assets_new/js/parallax-scroll.js')}}"></script>
<script src="{{asset('student/assets_new/js/wow.min.js')}}"></script>
<script src="{{asset('student/assets_new/js/custom.js')}}"></script>
<script>
	if($("#review_popup").val()!=""){
		if($("#popup_count").val()<1){
		$('#rateModal').modal('show');
	}
    }
	$('.rating-icon').mouseleave(function(){
		if($(this).find('input').is(':checked')){
			$(this).find('input:checked').parent('.icon').addClass('active');
		}else {
			$(this).find('.icon').removeClass('active');
		}
		$(this).find('input:not(:checked)').parent('.icon').removeClass('active');
	});
	$('.rating-icon .icon input').mouseenter(function(){
		$(this).closest('.col').find('.icon').addClass('active').parent('.col').prevAll('.col').find('.icon').addClass('active');					
		$(this).closest('.col').find('.icon.active').parent().nextAll('.col').find('.icon').removeClass('active');
	}).change(function(){
		if(this.checked) {
			$(this).closest('.col').prevAll('.col').find('input').prop('checked',true);
			$(this).closest('.col').find('.icon').addClass('active').parent('.col').nextAll('.col').find('.icon').removeClass('active')
		}else {
			$(this).prop('checked',true);
			$(this).closest('.col').nextAll('.col').find('input').prop('checked',false);
			$(this).closest('.col').nextAll('.col').find('.icon').removeClass('active')
		}
	});
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
		var swiper = new Swiper(".single-slider", {
	navigation: {
	  nextEl: ".swiper-next",
	  prevEl: ".swiper-prev",
	},
});
</script>
@endsection