@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="sub-title d-flex align-items-center justify-content-between mb-3">
              <h4 class="weight-500 my-0 flex-fill">Active Courses</h4>
							<div class="search flex-fill mx-2">
								<div class="form-group my-0">
                    <input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
                    <span class="clearsearch mdi mdi-close"></span>
                </div>
              </div>
            </div>
						<div class="tab-content">
							<div class="tab-pane fade show active tab-1">
								<div class="card card-table round">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">S.N.</th>
													<th class="py-4">Course name</th>
													<th class="py-4">Business Type</th>
													<th class="py-4">Language</th>
													<th class="py-4">Facilitator/Mentor</th>
													<th class="py-4">Price(₦)</th>
													<th class="py-4">Time Spent</th>
													<th class="py-4">Applied On</th>
													<th class="py-4">Last Updated On</th>
													<th class="py-4">Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($total_active_courses as $key => $course)
												<tr id="trr">
													<td>{{$key+1}}</td>
													<td><a href="{{route('course_details',['id' => $course['id']])}}">{{$course['name']}}</a></td>
													<td >{{$course['category']['category_name']}}</td>
													<td >{{$course['language']['language']}}</td>
													<td >{{$course['createdBy']['name']}}</td>
													<td >{{$course['price']}}</td>
													<td>{{$course['time_spent']}} days</td>
													<td><?php echo date("d-m-Y", strtotime($course['created_at']));?></td>
													<td><?php echo date("d-m-Y", strtotime($course['updated_at']));?></td>
													<td>
														<input type="hidden" name="sts" id="sts" value="{{$course['status']}}">
														<?php 
															if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
														?>
														<form method="post" action="{{route('changeCourseStatus')}}">
														<?php } ?>
															@csrf
															@if($course['status'] == 0)
															<select class="status border-0 bg-transparent text-warning" onchange="this.form.submit()" name="status">
																<option disabled selected hidden>Requested</option>
																<?php 
																if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<option class="text-success" value="active">Active</option>
																<option class="text-danger" value="inactive">Inactive</option>
																<option class="text-info" value="rejected">Rejected</option>
																<?php }else{ ?>
																<option class="text-warning" value="active">Requested</option><?php } ?>
															</select>
															@endif
															@if($course['status'] == 1)
															<select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
																<option class="text-success" value="active" selected>Active</option>
																<?php 
																if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<option class="text-danger" value="inactive">Inactive</option>
																<option class="text-info" value="rejected">Rejected</option>
																<?php } ?>
															</select>
															@endif
															@if($course['status'] == 2)
															<select class="status border-0 bg-transparent text-primary" onchange="this.form.submit()" name="status">
																<?php 
																if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<option class="text-success" value="active">Active</option>
																<option class="text-danger" value="inactive">Inactive</option>
																<?php } ?>
																<option class="text-info" value="rejected" selected>Rejected</option>
															</select>
															@endif
															@if($course['status'] == 3)
															<select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
																<?php 
																if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<option class="text-success" value="active">Active</option><?php } ?>
																<option class="text-danger" value="inactive" selected>Inactive</option>
																<?php 
																if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
																?>
																<option class="text-info" value="rejected">Rejected</option><?php } ?>
															</select>
															@endif
														<input type="hidden" name="course_id" value="{{$course['id']}}">
														<?php 
															if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
														?>
														</form><?php } ?>
													</td>
												</tr>
												@endforeach        
											</tbody>
										</table>
									</div>
								</div>
							</div>
            </div>
          <!-- content-wrapper ends -->   
      </div>
    </div>
  </div>
@endsection
