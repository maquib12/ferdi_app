@extends('students.layout.master')
@section('content')
		<section class="py-md-5">
			<div class="container">
				<div class="card bg-transparent p-0 rounded-md my-3">
					<div class="row">
						<div class="thumbnail col-sm-8">
							<div class="inner bg-theme-blue video-overlay rounded-lg overflow-hidden">
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
							</div>
						</div>
						<div class="col-lg-4">
					@if($module)
					@php
						$i=1;
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
						<div class="col-sm-7 col d-flex flex-column">
							<div class="flex-fill mt-4 mt-md-3">
								<div class="text-primary font-18 font-semibold text-uppercase">{{$course['category']['category_name']}}</div>
								<div class="d-flex align-items-center my-2 my-lg-4">
									<h2 class="my-0 flex-fill font-bold font-36">{{$course['name']}}</h2>
								</div>
								<div class="font-xlight">The Skills You Need To Become A BI Analyst - {{$course['add_skills']}}
								<p></p> Tableau - Everything Is Included</div>
								<div class="d-flex align-items-center mt-3 mb-3 mb-lg-4">
									<span class="mr-1"><a href="{{route('faci_rating_and_review',['id'=>$course['id']])}}">{{$avg_star_rating}}</a></span>
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
										@endif
									</div>
									<div class="text-primary font-18 font-semibold text-uppercase">{{$total_rating}} Vote</div>
								</div>
								<div>
									<a href="{{route('facilator_profile',['id' => $user['id']])}}">
										<div class="avatar sm d-flex align-items-center">
									    @if(isset($user['userdetails']) && $user['userdetails']['image'] != null)
										<div class="inner"><img src="{{asset('profile_pic/' .$user['userdetails']['image'])}}"></div>
										@else
										<div class="inner"><img src="{{asset('assets/img/users/5.jpg')}}"></div>
										@endif
										
										<span class="ml-2 font-medium">{{$user['name']}}</span>
									</div>
										
									</a>
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
					<h4>About Course</h4>
					<!-- <p>Business management is a term used for organizing, overseeing planning different aspects of business and it covers all domains of management including but not limited to Human resource management, Project Management, Team Management etc. Whether you are a business owner or working in an organization this will add to <span class="d-none" id="more">your skills set by equipping you with knowledge of managing human resource so that you could manage the human resource effectively. Moreover, this business management course will teach you to manage the project, leading you from project charter to project closure.</span></p> -->
					<p>{{$course['description']}}</p>
					<!-- <a role="button" class="text-primary" data-more="#more">Read More <i class="fa fa-angle-down ml-1" aria-hidden="true"></i></a> -->
				</div>
				<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
					<h4>What you will learn?</h4>
					<ul class="check-list mb-4">
						@foreach($learning_objects as $k => $learning_object)
						<li>{{$learning_object}}</li>
						@endforeach
					</ul>
					<a href="" class="text-primary">Read Less <i class="fa fa-angle-up ml-1" aria-hidden="true"></i></a>
				</div>
				<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
					<h4>This course includes</h4>
					<div class="row">
						<div class="col-sm-4">
							<ul class="icon-list sm">
								<li><i class="icon"><img src="{{asset('assets/img/icons/clock.svg')}}" alt="on-demand"></i> {{$course['course_duration_in_hours']}} hours on-demand video</li>
								<li><i class="icon"><img src="{{asset('assets/img/icons/pdf-sm.svg')}}" alt="resources"></i> 16 downloadable resources</li>
								<li><i class="icon"><img src="{{asset('assets/img/icons/mobile.svg')}}" alt="mobile and web"></i> Access on mobile and Web</li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul class="icon-list sm">
								<li><i class="icon"><img src="{{asset('assets/img/icons/book.svg')}}" alt="modules"></i> {{$course['total_no_of_module']}} Modules</li>
								<li><i class="icon"><img src="{{asset('assets/img/icons/calendar.svg')}}" alt="months access"></i> 3 months access</li>
								<li><i class="icon"><img src="{{asset('assets/img/icons/medal.svg')}}" alt="certificate"></i> {{$course['financial_rewards']}}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix my-3 my-lg-5 pt-3 pt-lg-5">
					<h4>Course Modules</h4>
					<div class="accordion" id="accordionExample">
						@if(count($module) > 0)
						@foreach($module as $row)
						 @if($row->course_id == $course['id'])
							<div class="card bg-dark px-2 px-md-4 my-3">
								<div class="card-header p-0 d-flex align-items-center justify-content-between h-60" data-toggle="collapse" data-target="#item-2{{$row->id}}" aria-expanded="false" aria-controls="collapseOne">
									<div class="title font-sm-12"><i class="arrow mr-2"><img src="{{asset('assets/img/icons/angle-down.svg')}}"></i> {{$row->name}}</div>
									<div class="d-flex align-items-end align-items-md-center flex-column flex-md-row justify-content-end font-sm-12">
										<span class="mr-md-3">{{$row->no_of_lecture}} Lectures</span>
										<span>{{$row->time}} Hrs</span>
										@if($row->level === 1)
											<div class="font-12 font-semibold bg-lgreen text-dark py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">	
												<span class="py-1 d-block">Beginner</span>
											</div>
										@elseif($row->level === 2)
											<div class="font-12 font-semibold bg-lorange py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">
												<span class="py-1 d-block">Intermediate</span>
											</div>
										@else
											<div class="font-12 font-semibold bg-lred py-2 rounded-pill ml-5 w125 text-center label d-none d-md-block">
											<span class="py-1 d-block">Advance</span>
											</div>
										@endif
									</div>
								</div>
								<div id="item-2{{$row->id}}" class="collapse border-top border-light2" data-parent="#accordionExample">
									<div class="card-body px-0 py-4 mt-2 mb-md-4">
										<h4 class="font-semibold mb-3">Understanding yourself</h4>
										<h5 class="font-18 text-uppercase text-primary mb-3 mb-md-4">Business Management</h5>
										<p>Business management is a term used for organizing, overseeing planning different aspects of business and it covers all domains of management including but not limited to Human resource management, Project Management, Team Management etc.</p>
										<!-- <div class="price font-36 d-flex align-items-center font-medium mt-2 mt-md-4 pt-md-2">
											$ 10 <s class="h6 my-0 ml-3 font-regular">$ 15</s>
										</div> -->
										<div class="d-flex align-items-center justify-content-between mt-3 mt-md-5">
											
											@if($row->level === 1)
											<div class="font-12 font-semibold bg-lgreen text-dark px-4 py-2 rounded-pill d-table">
												<span class="py-1 d-block">Beginner</span>
											</div>
										    @elseif($row->level === 2)
											<div class="font-12 font-semibold bg-lorange text-dark px-4 py-2 rounded-pill d-table">
												<span class="py-1 d-block">Intermediate</span>
											</div>
										    @else
											<div class="font-12 font-semibold bg-lred text-dark px-4 py-2 rounded-pill d-table">
												<span class="py-1 d-block">Advance</span>
											</div>
										    @endif
											<div class="d-flex align-items-center">
												<a href="" class="ml-2 ml-md-3"><img src="{{asset('assets/img/icons/edit-circle-w.svg')}}" alt="edit"></a>
												<a href="#" onclick = "openModal({{$row->id}})"; data-placement="right" class="ml-2 ml-md-3"><img src="{{asset('assets/img/icons/delete-circle.svg')}}" alt="delete"></a>
												<a href="{{route('faci_add_module')}}" class="ml-2 ml-md-3"><img src="{{asset('assets/img/icons/plus-circle.svg')}}" alt="plus"></a>
											</div>
										</div>
									</div>
								</div>
							</div>

						 @endif
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</section>

		<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="{{route('delete-module')}}" method="post">
					@csrf

						<div class="modal-body">
							<h4 color="black">Are you sure you want to delete this module?</h4>
							<input type="hidden" id="deleteValue" name="module_id">
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Yes</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection