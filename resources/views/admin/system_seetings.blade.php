@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">System Settings</h4>
						</div>
						<div class="search-bar d-flex align-items-center justify-content-between mb-4">
							<div class="filter-tabs col-sm-10 pl-md-0">
								<ul class="nav nav-tabs slim-scroll targetClass">
									<li class="nav-item">@if($tab == 1)<a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1">@else<a class="nav-link" data-toggle="tab" href=".tab-1" data-target=".tab-1">@endif Business Type</a></li>

									<li class="nav-item">@if($tab == 2)<a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2">@else<a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">@endif Course Level</a></li>

									<li class="nav-item">@if($tab == 3)<a class="nav-link active" data-toggle="tab" href=".tab-3" data-target=".tab-3">@else<a class="nav-link" data-toggle="tab" href=".tab-3" data-target=".tab-3">@endif Location Management</a></li>

									<li class="nav-item">@if($tab == 4)<a class="nav-link active" data-toggle="tab" href=".tab-4" data-target=".tab-4">@else<a class="nav-link" data-toggle="tab" href=".tab-4" data-target=".tab-4">@endif Reasons for report abuse</a></li>

									<li class="nav-item">@if($tab == 5)<a class="nav-link active" data-toggle="tab" href=".tab-5" data-target=".tab-5">@else<a class="nav-link" data-toggle="tab" href=".tab-5" data-target=".tab-5">@endif Set minimun no of questions</a></li>

									<li class="nav-item">@if($tab == 6)<a class="nav-link active" data-toggle="tab" href=".tab-6" data-target=".tab-6">@else<a class="nav-link" data-toggle="tab" href=".tab-6" data-target=".tab-6">@endif Course Status</a></li>

									<li class="nav-item">@if($tab == 7)<a class="nav-link active" data-toggle="tab" href=".tab-7" data-target=".tab-7">@else<a class="nav-link" data-toggle="tab" href=".tab-7" data-target=".tab-7">@endif Stage Status</a></li>
									<!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-1">Business Type</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2">Course Level</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-3">Location Management</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-4">Reasons for report abuse</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-5">Set minimun no of questions</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-6">Course Status</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-7">Stage Status</a></li> -->
								</ul>
							</div>
							<div class="col-sm-2 px-0">
								<?php 
                  if((Auth::user()->user_type_id == 7 && page_access_permission(14,1) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 ?>
								<div class="tab-content">
									<div class="tab-pane fade show active tab-1 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_business" class="btn btn-primary rounded-pill">Add</a>
									</div>
									<div class="tab-pane fade tab-2 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_course_level" class="btn btn-primary rounded-pill">Add</a>
									</div>
									<div class="tab-pane fade tab-3 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_city" class="btn btn-primary rounded-pill">Add</a>
									</div>
									<div class="tab-pane fade tab-4 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_report" class="btn btn-primary rounded-pill">Add</a>
									</div>
									<div class="tab-pane fade tab-6 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_course_status" class="btn btn-primary rounded-pill">Add</a>
									</div>
									<div class="tab-pane fade tab-7 text-md-right">
										<a href="" data-toggle="modal" data-target="#add_stage_status" class="btn btn-primary rounded-pill">Add</a>
									</div>
								<?php } ?>
								<?php 
                  if((Auth::user()->user_type_id == 7 && (page_access_permission(14,1) != 0 || page_access_permission(14,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 ?>
									<div class="tab-pane fade tab-5 text-md-right">
										<a href="" data-toggle="modal" data-target="#minimum_questions" class="btn btn-primary rounded-pill">Add/Update</a>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="tab-content">
							@if($tab == 1)<div class="tab-pane fade show active position-relative tab-1">@else<div class="tab-pane fad position-relative tab-1">@endif
							<!-- <div class="tab-pane fade show active position-relative" id="tab-1"> -->
							<div class="modal" id="add_business">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Add Business Type</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<form method="post" action="{{route('add_business_type')}}">
        									@csrf
        								<div class="modal-body">
          									<input type="text" name="categories">
          									<p></p>
          									To add multiple Business Type at a time make them seperated with comma ","
        								</div>
        								<div class="modal-footer">
          									<input type="submit" class="btn btn-success" value="Save">
        								</div>
        								</form>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">Business Type</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($categories as $row => $category)
												<tr>
													<td>{{$i}}</td>
													<td>{{$category['category_name']}}</td>
													@if($category['status'] == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_business_type',['id'=>$category['id'],'status'=>$category['status']])}}">Inactive</a>
															@else Inactive @endif
														</td>
													@else
														<td>
                  							@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_business_type',['id'=>$category['id'],'status'=>$category['status']])}}">Active</a>
															@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#edit_business-{{$category['id']}}">Edit</a>
													<div class="modal" id="edit_business-{{$category['id']}}">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit Business Type</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_business_type')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="category_name" value="{{$category['category_name']}}">
          																<input type="hidden" name="category_id" value="{{$category['id']}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_business_type',['id'=>$category['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a>
													<?php } ?>
													</td>
												<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 2)<div class="tab-pane fade show active position-relative tab-2">@else<div class="tab-pane fad position-relative tab-2">@endif
							<!-- <div class="tab-pane fad position-relative" id="tab-2"> -->
							<div class="modal" id="add_course_level">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Add Course Level</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<form method="post" action="{{route('add_course_level')}}">
        									@csrf
        								<div class="modal-body">
          									<input type="text" name="levels">
          									<p></p>
          									To add multiple Business Type at a time make them seperated with comma ","
        								</div>
        								<div class="modal-footer">
          									<input type="submit" class="btn btn-success" value="Save">
        								</div>
        								</form>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">Course Level</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($course_levels as $r => $course_level)
												<tr>
													<td>{{$i}}</td>
													<td>{{$course_level['course_level']}}</td>
													@if($course_level['status'] == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_course_level',['id'=>$course_level['id'],'status'=>$course_level['status']])}}">Inactive</a>@else Inactive @endif
														</td>
													@else
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_course_level',['id'=>$course_level['id'],'status'=>$course_level['status']])}}">Active</a>
															@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#edit_course_level-{{$course_level['id']}}">Edit</a>
													<div class="modal" id="edit_course_level-{{$course_level['id']}}">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit Course Level</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_course_level')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="course_level" value="{{$course_level['course_level']}}">
          																<input type="hidden" name="course_level_id" value="{{$course_level['id']}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_course_level',['id'=>$course_level['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a>	
													<?php }?>											
													</td>
													<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 3)<div class="tab-pane fade show active position-relative tab-3">@else<div class="tab-pane fad position-relative tab-3">@endif
							<!-- <div class="tab-pane fad position-relative" id="tab-3"> -->
							<div class="modal" id="add_city">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Add City</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<div class="card card-table round py-4">
        								<form method="post" action="{{route('add_city')}}">
										@csrf
										<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="country">
											<option>Choose Country</option>
											@foreach($countries as $key => $country)
												<option value="{{$country['id']}}">{{$country['name']}}</option>
											@endforeach
										</select>
										</div>
										<div class="col-sm-6 form-group px-3">
											<input class="form-control lg rounded-pill border-dark text-black" type="text" name="city" placeholder="Enter City Name">
										</div>
										<div class="col-sm-6">
											<input type="submit" class="btn btn-primary btn-block rounded-pill btn-lg" value="Save">
										</div>
										</form>
									</div>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
								<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">City</th>
													<th class="py-4">Country</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($cities as $l => $city)
												<tr>
													<td>{{$i}}</td>
													<td>{{$city->name}}</td>
													<td>{{$city->country->name}}</td>
													@if($city->status == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_city',['id'=>$city->id,'status'=>$city->status])}}">Inactive</a>@else Inactive @endif
														</td>
													@else
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_city',['id'=>$city->id,'status'=>$city->status])}}">Active</a>@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#edit_city-{{$city->name}}">Edit</a>
													<div class="modal" id="edit_city-{{$city->name}}">		
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit City</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_city')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="city" value="{{$city->name}}">
          																<input type="hidden" name="city_id" value="{{$city->id}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_city',['id'=>$city->id])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a>	
													<?php } ?>											
													</td>
												<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 4)<div class="tab-pane fade show active position-relative tab-4">@else<div class="tab-pane fad position-relative tab-4">@endif
							<!-- <div class="tab-pane fade position-relative" id="tab-4"> -->
							<div class="modal" id="add_report">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Reason for Report Abuse</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<form method="post" action="{{route('add_report_reason')}}">
        									@csrf
        								<div class="modal-body">
          									<input type="text" name="reasons">
          									<p></p>
          									To add multiple Business Type at a time make them seperated with semicolon ";"
        								</div>
        								<div class="modal-footer">
          									<input type="submit" class="btn btn-success" value="Save">
        								</div>
        								</form>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">Reason of reports</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($reason_reports as $p => $reason_report)
												<tr>
													<td>{{$i}}</td>
													<td>{{$reason_report['reports']}}</td>
													@if($reason_report['status'] == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_report_reason',['id'=>$reason_report['id'],'status'=>$reason_report['status']])}}">Inactive</a>@else Inactive @endif
														</td>
													@else
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_report_reason',['id'=>$reason_report['id'],'status'=>$reason_report['status']])}}">Active</a>@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#edit_reasons-{{$reason_report['id']}}">Edit</a>
													<div class="modal" id="edit_reasons-{{$reason_report['id']}}">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit Reason of Reports</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_report_reason')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="reasons" value="{{$reason_report['reports']}}">
          																<input type="hidden" name="reason_report_id" value="{{$reason_report['id']}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_report_reason',['id'=>$reason_report['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a>	<?php } ?>											
													</td>
													<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 5)<div class="tab-pane fade show active position-relative tab-5">@else<div class="tab-pane fad position-relative tab-5">@endif
							<!-- <div class="tab-pane fade position-relative" id="tab-5"> -->
								<div class="card p-4">
									<div class="px-1">
										<div class="d-flex align-items-center justify-content-between mb-md-4">
											<h5 class="my-0">Minimum no of questions</h5>
											<div class="modal" id="minimum_questions">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Set Minimum no of questions</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('set_min_questions')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="min_question">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
												</div>
										<div class="col-5 pl-0 pr-5">
											<label class="sr-only" for="inlineFormInputGroup">Username</label>
											<div class="form-control lg input-group mb-2 border border-dark rounded-pill p-0 overflow-hidden">
												<input type="text" placeholder="" class="bg-light border-0 flex-fill px-4" value="{{$min_ques['minimum_question']}}" readonly>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							@if($tab == 6)<div class="tab-pane fade show active position-relative tab-6">@else<div class="tab-pane fad position-relative tab-6">@endif
							<!-- <div class="tab-pane fade position-relative" id="tab-6"> -->
							<div class="modal" id="add_course_status">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Add Course Status</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<form method="post" action="{{route('add_course_status')}}">
        									@csrf
        								<div class="modal-body">
          									<input type="text" name="status">
          									<p></p>
          									To add multiple Course Status at a time make them seperated with comma ","
        								</div>
        								<div class="modal-footer">
          									<input type="submit" class="btn btn-success" value="Save">
        								</div>
        								</form>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">Course Status</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($course_status as $q => $status)
												<tr>
													<td>{{$i}}</td>
													<td>{{$status['course_status']}}</td>
													@if($status['status'] == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_course_status',['id'=>$status['id'],'status'=>$status['status']])}}">Inactive</a>@else Inactive @endif
														</td>
													@else
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_course_status',['id'=>$status['id'],'status'=>$status['status']])}}">Active</a>@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#course_status-{{$status['id']}}">Edit</a>
													<div class="modal" id="course_status-{{$status['id']}}">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit Course Status</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_course_status')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="course_status" value="{{$status['course_status']}}">
          																<input type="hidden" name="course_id" value="{{$status['id']}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_course_status',['id'=>$status['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a><?php } ?>											
													</td>
												<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 7)<div class="tab-pane fade show active position-relative tab-7">@else<div class="tab-pane fad position-relative tab-7">@endif
							<!-- <div class="tab-pane fade position-relative" id="tab-7"> -->
							<div class="modal" id="add_stage_status">
    							<div class="modal-dialog">
      								<div class="modal-content">
        								<div class="modal-header">
          									<h4 class="modal-title">Add Stage Status</h4>
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								</div>
        								<form method="post" action="{{route('add_stage_status')}}">
        									@csrf
        								<div class="modal-body">
          									<input type="text" name="stage">
          									<p></p>
          									To add multiple Course Status at a time make them seperated with comma ","
        								</div>
        								<div class="modal-footer">
          									<input type="submit" class="btn btn-success" value="Save">
        								</div>
        								</form>
      								</div>
    							</div>
  							</div>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Sl No.</th>
													<th class="py-4">Stage Status</th>
													<th class="py-4">Status</th>
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<th class="py-4 text-center" width="200">Action</th><?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;?>
												@foreach($stage_status as $q => $stage)
												<tr>
													<td>{{$i}}</td>
													<td>{{$stage['stage_status']}}</td>
													@if($stage['status'] == 0)
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_stage_status',['id'=>$stage['id'],'status'=>$stage['status']])}}">Inactive</a>@else Inactive @endif
														</td>
													@else
														<td>
															@if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1)
															<a href="{{route('status_change_stage_status',['id'=>$stage['id'],'status'=>$stage['status']])}}">Active</a>@else Active @endif
														</td>
													@endif
													<?php 
                  					if((Auth::user()->user_type_id == 7 && (page_access_permission(14,2) != 0 || page_access_permission(14,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<td class="py-4 text-center">
													<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12"  data-toggle="modal" data-target="#stage_status-{{$stage['id']}}">Edit</a>
													<div class="modal" id="stage_status-{{$stage['id']}}">	
														<div class="modal-dialog">
      														<div class="modal-content">
        														<div class="modal-header">
          															<h4 class="modal-title">Edit Stage Status</h4>
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
        														</div>
        														<form method="post" action="{{route('edit_stage_status')}}">
        															@csrf
        															<div class="modal-body">
          																<input type="text" name="stage_status" value="{{$stage['stage_status']}}">
          																<input type="hidden" name="stage_id" value="{{$stage['id']}}">
        															</div>
        															<div class="modal-footer">
          																<input type="submit" class="btn btn-success" value="Save">
        															</div>
        														</form>
      														</div>
    													</div>
  													</div>
  												<?php } ?>
  												<?php 
                  					if((Auth::user()->user_type_id == 7 && page_access_permission(14,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                 					?>
													<a href="{{route('delete_stage_status',['id'=>$stage['id']])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Delete</a><?php } ?>												
													</td>
												<?php } ?>
												</tr>
												<?php $i = $i+1;?>
												@endforeach
											</tbody>
										</table>
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