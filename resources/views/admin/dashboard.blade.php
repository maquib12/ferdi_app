@extends('admin.layout.master')
@section('content')
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row mx-n3">
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="" class="card-body text-dark">
									<div class="d-flex align-items-center mb-3">
										<i class="icon"><img src="{{asset('assets/images/icons/earning.png')}}"></i>
										<p class="font-16 my-0 ml-3">Total Earnings</p>
									</div>
									<div class="weight-800 mb-2 h2">$ 2,15,000</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="{{route('total_facilitator')}}" class="card-body text-dark">
									<div class="d-flex align-items-center mb-2">
										<i class="icon"><img src="{{asset('assets/images/icons/facilitators.png')}}"></i>
										<p class="font-20s my-0 ml-3">Total Facilitators</p>
									</div>
									<div class="d-flex align-items-center">
										<div class="weight-800 my-0 h2 flex-fill">{{$total_active_facititors+$total_inactive_facititors}}</div>
										<div class="text-right">
											<span class="text-success">Active:</span> {{$total_active_facititors}}<br>
											<span class="text-danger">Inactive:</span> {{$total_inactive_facititors}}
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="{{route('total_students')}}" class="card-body text-dark">
									<div class="d-flex align-items-center mb-2">
										<i class="icon"><img src="{{asset('assets/images/icons/users.png')}}"></i>
										<p class="font-16 my-0 ml-3">Total Users</p>
									</div>
									<div class="d-flex align-items-center">
										<div class="weight-800 my-0 h2 flex-fill">{{$total_active_users+$total_inactive_users}}</div>
										<div class="text-right">
											<span class="text-success">Active:</span> {{$total_active_users}}<br>
											<span class="text-danger">Inactive:</span> {{$total_inactive_users}}
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="{{route('total_mentor')}}" class="card-body text-dark">
									<div class="d-flex align-items-center mb-2">
										<i class="icon"><img src="{{asset('assets/images/icons/mentors.png')}}"></i>
										<p class="font-16 my-0 ml-3">Total Mentors</p>
									</div>
									<div class="d-flex align-items-center">
										<div class="weight-800 my-0 h2 flex-fill">{{$total_active_mentors+$total_inactive_mentors}}</div>
										<div class="text-right">
											<span class="text-success">Active:</span> {{$total_active_mentors}}<br>
											<span class="text-danger">Inactive:</span> {{$total_inactive_mentors}}
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="{{route('total_sponsor')}}" class="card-body text-dark">
									<div class="d-flex align-items-center mb-2">
										<i class="icon"><img src="{{asset('assets/images/icons/sponsors.png')}}"></i>
										<p class="font-16 my-0 ml-3">Total Sponsors</p>
									</div>
									<div class="d-flex align-items-center">
										<div class="weight-800 my-0 h2 flex-fill">{{$total_active_sponsors+$total_inactive_sponsors}}</div>
										<div class="text-right">
											<span class="text-success">Active:</span> {{$total_active_sponsors}}<br>
											<span class="text-danger">Inactive:</span> {{$total_inactive_sponsors}}
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-4 stretch-card grid-margin px-3">
							<div class="card card-img-holder text-default">
								<a href="{{route('total_active_courses')}}" class="card-body text-dark">
									<div class="d-flex align-items-center mb-3">
										<i class="icon"><img src="{{asset('assets/images/icons/active-courses.png')}}"></i>
										<p class="font-16 my-0 ml-3">Total Active Courses</p>
									</div>
									<div class="weight-800 mb-2 h2">{{$total_active_courses}}</div>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 stretch-card grid-margin">
							<div class="card card-img-holder chart-tabs px-3 py-4">
								<div class="card-header">
									<div class="font-14 m-0 flex-fill text-black weight-600">Statistics</div>
								</div>
								<div class="px-2 mt-1 mb-3">
									<ul class="color-list list-group list-group-horizontal-xl my-2 font-12 weight-600 text-black">
										<li class="list-group-item p-0 border-0 mr-5" style="--color: #00a6e6">Successfully Completed The Courses</li>
										<li class="list-group-item p-0 border-0" style="--color: #ff6961">Successfully Obtained Loans</li>
									</ul>
								</div>
								<div class="chart yLable mt-2 d-flex align-items-center mb-3">
									<div class="w-100">
										<canvas id="statistics" class="graph" height="100"></canvas>
									</div>
								</div>
							</div>
						</div>
						<?php 
            				if((Auth::user()->user_type_id == 7 && page_permission(1) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
						?>
						<div class="col-md-6 stretch-card grid-margin">
							<div class="card card-img-holder chart-tabs px-3 pt-4 pb-2">
								<div class="card-header d-flex">
									<div class="font-14 m-0 flex-fill text-black weight-600">Facilitator Account Requests</div>
									<a href="{{route('facilitator_request')}}" class="font-14">View All</a>
								</div>
								<div class="list px-2">
									@foreach($facilitators as $row => $facilitator)
									<div class="d-flex align-items-center py-3">
										<div class="avatar md">
											<div class="inner">
												<img src="{{asset('assets/images/faces/face1.jpg')}}" class="rounded-pill">
											</div>
										</div>
										<div class="info flex-fill pl-3 pr-2 w-50">
											<div class="name text-info font-14 weight-600">{{$facilitator['name']}}</div>
											<span class="text-gray font-12">{{$facilitator['email']}}</span>
										</div>
										<?php 
            								if((Auth::user()->user_type_id == 7 && (page_access_permission(1,1) != 0 || page_access_permission(1,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
										?>
										<div class="action d-flex align-items-center">
											<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#rejectModal-{{$facilitator->id}}">Reject</a>
											<div class="modal fade" id="rejectModal-{{$facilitator->id}}" tabindex="-1">
												<div class="modal-dialog modal-sm modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-body">
															<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																<h5 class="modal-title weight-400">Facilitator Rejection Cause</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true"class=" weight-400">&times;</span>
																</button>
															</div>
															<form method="post" action="{{route('change_user_status')}}">
															@csrf
															<div class="form-group">
																<label>Reject Reason</label>
																<select class="form-control font-14 rounded-pill" name="report" id="remarks">
																	<option disabled selected hidden>Select Reason</option>
																	@foreach($reports as $m=>$report)
																	<option value="{{$report['id']}}">{{$report['reports']}}</option>
																	@endforeach
																	<option value="0">Remarks</option>
																</select>
															</div>
															<div class="form-group">
																Remarks
    															<input type="text" class="form-control font-14 rounded-pill" id="text_remarks" name="remarks" placeholder="Remarks">
															</div>
															<input type="hidden" name="user_id" value="{{$facilitator->id}}">
															<div class="text-center row justify-content-center mx-0 mb-2">
																<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<button class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-1" onclick="statusChange(<?php echo json_encode($facilitator['id']);?>,'active')">Accept</button>
										</div>
									<?php } ?>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-md-6 stretch-card grid-margin">
							<div class="card card-img-holder chart-tabs px-3 py-4">
								<div class="card-header d-flex">
									<div class="font-14 m-0 flex-fill text-black weight-600">Sponsor Account Requests</div>
									<a href="{{route('sponsor_request')}}" class="font-14">View All</a>
								</div>
								<div class="list px-2">
									@foreach($sponsors as $key=>$sponsor)
									<div class="d-flex align-items-center py-3">
										<div class="avatar md">
											<div class="inner">
												<img src="{{asset('assets/images/faces/face1.jpg')}}" class="rounded-pill">
											</div>
										</div>
										<div class="info flex-fill pl-3">
											<div class="name text-info font-14 weight-600">{{$sponsor->name}}</div>
											<span class="text-gray font-12">Business Analysis</span>
										</div>
										<?php 
            								if((Auth::user()->user_type_id == 7 && (page_access_permission(1,1) != 0 || page_access_permission(1,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
										?>										
										<div class="action">
											<!-- <button class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" onclick="statusChange(<?php echo json_encode($sponsor->id);?>,'rejected')"> -->
											<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#rejectmodal-{{$sponsor->name}}">Reject</a>
											<div class="modal fade" id="rejectmodal-{{$sponsor->name}}" tabindex="-1">
												<div class="modal-dialog modal-sm modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-body">
															<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																<h5 class="modal-title weight-400">Sponsor Rejection Cause</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true"class=" weight-400">&times;</span>
																</button>
															</div>
															<form method="post" action="{{route('change_user_status')}}">
															@csrf
															<div class="form-group">
																<label>Reject Reason</label>
																<select class="form-control font-14 rounded-pill" name="report" id="remarks_spons">
																	<option disabled selected hidden>Select Reason</option>
																	@foreach($reports as $m=>$report)
																	<option value="{{$report['id']}}">{{$report['reports']}}</option>
																	@endforeach
																	<option value="0">Remarks</option>
																</select>
															</div>
															<div class="form-group">
																Remarks
    															<input type="text" class="form-control font-14 rounded-pill" id="text_remarks_s" name="remarks" placeholder="Remarks">
															</div>
															<input type="hidden" name="user_id" value="{{$sponsor->id}}">
															<div class="text-center row justify-content-center mx-0 mb-2">
																<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<button class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2" onclick="statusChange(<?php echo json_encode($sponsor->id);?>,'active')">Accept</button>
										</div>
									<?php } ?>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<form method="post" action="{{route('changeUserStatus')}}" id="statusChangeForm">
							@csrf
							<input type="hidden" name="user_id" id="user_id" value="">
							<input type="hidden" name="status" id="status" value="">
						</form>
						<div class="col-md-12 stretch-card grid-margin">
							<div class="card card-img-holder chart-tabs px-3 pt-4">
								<div class="card-header d-flex border-0">
									<div class="font-14 m-0 flex-fill text-black weight-600">Courses Approval Requests</div>
									<a href="{{route('course_facilitator_request')}}" class="font-14">View All</a>
								</div>
								<div class="card-table mx-n3">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0">
											<thead>
												<tr>
													<td class="py-4">S.N.</td>
													<td class="py-4">Facilitator name</td>
													<td class="py-4">Course Name</td>
													<td class="py-4">Business Type</td>
													<td class="py-4">Requested On</td>
													<td class="py-4"></td>
												</tr>
											</thead>
											<tbody>
												@foreach($course_facilitators as $k=>$course_facilitator)
												<tr>
													<td>{{$k+1}}</td>
													<td><a href="{{route('userDetails',['id'=> $course_facilitator['id']])}}" class="text-info">{{$course_facilitator->createdBy->name}}</td>
													<td>{{$course_facilitator->name}}</td>
													<td>{{$course_facilitator->category->category_name}}</td>
													<td>12 mar 2021</td>
													<?php 
            											if((Auth::user()->user_type_id == 7 && (page_access_permission(1,1) != 0 || page_access_permission(1,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
													?>
													<td>
														<div class="action">
															<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#rejectCourse-{{$course_facilitator->id}}">Reject</a>
															<div class="modal fade" id="rejectCourse-{{$course_facilitator->id}}" tabindex="-1">
																<div class="modal-dialog modal-sm modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-body">
																			<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																				<h5 class="modal-title weight-400">Course Rejection Cause</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true"class=" weight-400">&times;</span>
																				</button>
																				</div>
																					<form method="post" action="{{route('change_Course_status')}}">
																					@csrf
																						<div class="form-group">
																							<label>Reject Reason</label>
																							<select class="form-control font-14 rounded-pill" name="report" id="remarks_course">
																								<option disabled selected hidden>Select Reason</option>
																								@foreach($reports as $m=>$report)
																									<option value="{{$report['id']}}">{{$report['reports']}}</option>
																								@endforeach
																								<option value="0">Remarks</option>
																							</select>
																						</div>
																						<div class="form-group">
																							Remarks
    																						<input type="text" class="form-control font-14 rounded-pill" id="text_remarks_c" name="remarks" placeholder="Remarks">
																						</div>
																						<div class="text-center row justify-content-center mx-0 mb-2">
																							<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																							<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																<a href="{{route('facilitator_request_approve',['course_id'=> $course_facilitator->id , 'status'=> 'accepted'])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Accept</a>
														</div>
													</td>
												<?php } ?>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function statusChange(id,status){
		document.getElementById('user_id').value = id;
		document.getElementById('status').value = status;
		document.getElementById("statusChangeForm").submit();
		
		$.ajax({
			  url: 'https://quytech.net/ferdi_app/public/admin/notifications',
			  type: 'post',
			  data:{ "_token": "{{ csrf_token() }}","user_id":id},
			  success: function(response){
			  	console.log(response);
			  }
			});
	}
	function remarks_f(){
		var remarks = document.getElementById('remarks').value;
		console.log(remarks);
		if(remarks == 0){
			$("#text_remarks").removeAttr("disabled");
            $("#text_remarks").focus();
		}else{
			$("#text_remarks").attr("disabled", "disabled");
		}
	}
	function remarks_s(){
		var remarks = document.getElementById('remarks_spons').value;
		if(remarks == 0){
			$("#text_remarks_s").removeAttr("disabled");
            $("#text_remarks_s").focus();
		}else{
			$("#text_remarks_s").attr("disabled", "disabled");
		}
	}
	function remarks_c(){
		var remarks = document.getElementById('remarks_course').value;
		if(remarks == 0){
			$("#text_remarks_c").removeAttr("disabled");
            $("#text_remarks_c").focus();
		}else{
			$("#text_remarks_c").attr("disabled", "disabled");
		}
	}
</script>