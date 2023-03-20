@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Loan Management</h4>
						</div>
						<div class="search-bar d-flex align-items-center justify-content-between mb-0">
							<div class="filter-tabs">
								<ul class="nav nav-tabs weight-300 targetClass">
									<li class="nav-item">@if($tab == 'loan')<a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2">@else<a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">@endif Loan Management</a></li>
									<li class="nav-item">@if($tab == 'mentor')<a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1">@else<a class="nav-link" data-toggle="tab" href=".tab-1" data-target=".tab-1">@endif Assign A Mentor</a></li>
								</ul>
							</div>
							<div class="search pl-md-4 ml-md-2">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
										<span class="clearsearch mdi mdi-close"></span>
									</div>
							</div>
						</div>
						<div class="tab-content">
								@if($tab == 'mentor')<div class="tab-pane fade tab-1">@else<div class="tab-pane fade tab-1">@endif
									<div class="form-check form-check-inline d-flex align-items-center simpleTab mb-3">
										<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0 active" role="button" data-target="tab1-1">
											<input class="form-check-input" type="radio" name="assign_mentor" checked>
											Requested to Assign Mentor
										</label>
										<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab1-2" role="button">
											<input class="form-check-input" type="radio" name="assign_mentor">
											Mentor Assigned
										</label>
									</div>
									<div class="tabContent">
										<div class="tabpane fade show active tab1-1">
											<div class="card card-table round data-table bg-transparent mt-3">
												<div class="table-responsive">
													<table class="table table-striped table-borderless text-black mb-0 dataTable">
														<thead>
															<tr>
																<th class="py-4">S.N.</th>
																<th class="py-4">Student name</th>
																<th class="py-4">Email</th>
																<th class="py-4">Course Name</th>
																<th class="py-4">Business Type</th>
																<th class="py-4">Requested On</th>
																<?php 
																	if((Auth::user()->user_type_id == 7 && (page_access_permission(6,1) != 0 || page_access_permission(6,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<th class="py-4">Action</th>
															<?php } ?>
															</tr>
														</thead>
														<tbody id="myTable">
															<?php $i = 1;?>
															@foreach($students as $key => $student)
																	<tr>
																		<td>{{$i}}</td>
																		<td><a href="{{route('userDetails',['id' => $student['id']])}}" class="text-info">{{$student['name']}}</a></td>
																		<td>{{$student['email']}}</td>
																		<td>{{$student['course']->name}}</td>
																		<td>{{$student['course']->category->category_name}}</td>
																		<td>12 mar 2021</td>
																	<?php 
																			if((Auth::user()->user_type_id == 7 && (page_access_permission(6,1) != 0 || page_access_permission(6,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																		?>
																		<td><a href="{{route('mentors',['student_id' => $student['id'], 'course_id' => $student['course']->id])}}"><button class="btn btn-sm btn-primary rounded-pill font-12 px-3">Action</button></a></td>
																	<?php } ?>
																	</tr>
															<?php $i = $i+1;?>
															@endforeach									
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tabpane fade show tab1-2">
											<div class="card card-table round data-table bg-transparent mt-3">
												<div class="table-responsive">
													<table class="table table-striped table-borderless text-black mb-0 dataTable">
														<thead>
															<tr>
																<th class="py-4">S.N.</th>
																<th class="py-4">Student name</th>
																<th class="py-4">Email</th>
																<th class="py-4">Course Name</th>
																<th class="py-4">Mentor Name</th>
																<th class="py-4">Change Mentor</th>
															</tr>
														</thead>
														<tbody id="myTable">
															<?php $i = 1;?>
															@foreach($approved_students as $hj => $approved_student)
																<?php 
																	foreach($approved_student->course as $crs => $course){
																		$mentor = App\User::find($course->pivot->mentor_id);
																		if($course->pivot->mentor_id != null && $mentor != null){
																?>
																	<tr>
																		<td>{{$i}}</td>
																		<td><a href="{{route('userDetails',['id' => $approved_student->id])}}" class="text-info">{{$approved_student->name}}</a></td>
																		<td>{{$approved_student->email}}</td>
																		<td>{{$course->name}}</td>
																		<td>{{$mentor['name']}}</td>
																		<?php 
																			if((Auth::user()->user_type_id == 7 && (page_access_permission(6,1) != 0 || page_access_permission(6,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																		?>
																			<td><a href="{{route('mentors',['student_id' => $approved_student['id'], 'course_id' => $course->id])}}"><button class="btn btn-sm btn-primary rounded-pill font-12 px-3">Change Mentor</button></a></td>
																		<?php } ?>
																		<?php $i = $i+1;?>
																		<?php 
																			}} 
																		?>
																	</tr>
															@endforeach									
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								@if($tab == 'loan')<div class="tab-pane fade show active tab-2">@else<div class="tab-pane fade show active tab-2">@endif
								<div class="form-check form-check-inline d-flex align-items-center simpleTab mb-3">
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0 active" role="button" data-target="tab2-1">
										<input class="form-check-input" type="radio" name="requests" checked>
										Requested
									</label>
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-2" role="button">
										<input class="form-check-input" type="radio" name="requests">
										Approved Requests
									</label>
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-3" role="button">
										<input class="form-check-input" type="radio" name="requests">
										Rejected Requests
									</label>
								</div>
								<div class="tabContent">
									<div class="tabpane fade show active tab2-1">
										<div class="card card-table round data-table bg-transparent">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.N.</th>
															<th class="py-4">Student name</th>
															<th class="py-4">Email</th>
															<th class="py-4">Course Name</th>
															<th class="py-4">Mentor Name</th>
															<th class="py-4">Application</th>
															<th class="py-4">Requested on</th>
															<?php 
                        				if((Auth::user()->user_type_id == 7 && (page_access_permission(6,1) != 0 || page_access_permission(6,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      				?>
															<th class="py-4 text-center" width="200">Status</th><?php } ?>
														</tr>
													</thead>
													<tbody id="myTable">
														<?php $i = 1;?>
														@foreach($loans as $key => $loan)
																<tr>
																	<td>{{$i}}</td>
																	<td>{{$loan['user']['name']}}</td>
																	<td>{{$loan['user']['email']}}</td>
																	<td>{{$loan['courses']['name']}}</td>
																	<td>{{$loan['courses']['created_by']['name']}}</td>
																	<td><a href="{{route('download_pdf',['id'=>$loan['id']])}}">{{$loan['loan_application']}}</a></td>
																	<td><?php echo date("d-m-Y", strtotime($loan['created_at']));?></td>
																	<?php 
                        						if((Auth::user()->user_type_id == 7 && (page_access_permission(6,1) != 0 || page_access_permission(6,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      						?>
																	<td>
																		<div class="action">
																		<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#reject-{{$loan['id']}}">Reject</a>
																		<div class="modal fade" id="reject-{{$loan['id']}}" tabindex="-1">
																			<div class="modal-dialog modal-sm modal-dialog-centered">
																				<div class="modal-content">
																					<div class="modal-body">
																						<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																							<h5 class="modal-title weight-400">Course Rejection Cause</h5>
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true"class=" weight-400">&times;</span>
																							</button>
																						</div>
																							<form method="post" action="{{route('loan_status_rejected')}}">
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
    																							<input type="text" class="form-control font-14 rounded-pill" id="text_remarks_c" name="remarks">
																								</div>
																								<input type="hidden" name="id" value="{{$loan['id']}}">
																								<div class="text-center row justify-content-center mx-0 mb-2">
																									<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																									<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																			</div>
																			<a href="{{route('loan_status_accepted',['id'=> $loan['id'],  'status'=> 'accepted','course_id'=> $loan['courses']['id'] ,'mentor_id'=> $loan['courses']['created_by']['id'] ,'user_id'=> $loan['user']['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Accept</a>
																		</div>
																	</td><?php } ?>
																</tr>
														<?php $i = $i+1;?>
														@endforeach									
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tabpane fade show tab2-2">
										<div class="card card-table round data-table bg-transparent">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.N.</th>
															<th class="py-4">Student name</th>
															<th class="py-4">Email</th>
															<th class="py-4">Course Name</th>
															<th class="py-4">Mentor Name</th>
															<th class="py-4">Approved on</th>
														</tr>
													</thead>
													<tbody id="myTable">
														<?php $j = 1;?>
														@foreach($approved_loans as $a => $approved_loan)
																<tr>
																	<td>{{$j}}</td>
																	<td>{{$approved_loan['user']['name']}}</td>
																	<td>{{$approved_loan['user']['email']}}</td>
																	<td>{{$approved_loan['courses']['name']}}</td>
																	<td>{{$approved_loan['courses']['created_by']['name']}}</td>
																	<td><?php echo date("d-m-Y", strtotime($approved_loan['updated_at']));?></td>
																</tr>
														<?php $j = $j+1;?>
														@endforeach									
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tabpane fade show tab2-3">
										<div class="card card-table round data-table bg-transparent">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.N.</th>
															<th class="py-4">Student name</th>
															<th class="py-4">Email</th>
															<th class="py-4">Course Name</th>
															<th class="py-4">Mentor Name</th>
															<th class="py-4">Cause of Rejection</th>
															<th class="py-4">Rejected on</th>
														</tr>
													</thead>
													<tbody id="myTable">
														<?php $j = 1;?>
														@foreach($rejected_loans as $b => $rejected_loan)
																<tr>
																	<td>{{$j}}</td>
																	<td>{{$rejected_loan['user']['name']}}</td>
																	<td>{{$rejected_loan['user']['email']}}</td>
																	<td>{{$rejected_loan['courses']['name']}}</td>
																	<td>{{$rejected_loan['courses']['created_by']['name']}}</td>
																	<td>{{$rejected_loan['report']['reports']}}</td>
																	<td><?php echo date("d-m-Y", strtotime($rejected_loan['updated_at']));?></td>
																</tr>
														<?php $j = $j+1;?>
														@endforeach									
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
					</div>
				</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
<script type="text/javascript">
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