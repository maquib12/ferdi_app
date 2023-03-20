@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<nav>
							<ol class="breadcrumb h4">
								<li class="breadcrumb-item"><a href="{{route('user_management')}}">User Management</a></li>
								<li class="breadcrumb-item"><a href="">Mentor Requests</a></li>
							</ol>
						</nav>
						<div class="search-bar d-flex align-items-center justify-content-between mb-4">
							<div class="search flex-fill pr-4 mr-2">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
										<span class="clearsearch mdi mdi-close"></span>
									</div>
							</div>
							<div class="d-flex align-items-center">
								<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{ url()->previous() }}">Back</a>
							</div>
						</div>
						<div class="card card-table round">
						<table class="table table-striped table-borderless text-black mb-0 dataTable">
							<thead>
								<tr>
									<th class="py-4">S.N.</th>
									<th class="py-4">Facilitator name</th>
									<th class="py-4">Email</th>
									<th class="py-4">Requested On</th>
									<th class="py-4">Action</th>
								</tr>
							</thead>
								<tbody>
									<?php $i = 1;?>
									@foreach($mentor_requests as $k=>$mentor_request)
										<tr>
											<td>{{$i}}</td>
											<td><a href="{{route('userDetails',['id'=> $mentor_request->facilitator_id])}}" class="text-info">{{$mentor_request->mentor_details->name}}</td>
											<td>{{$mentor_request->mentor_details->email}}</td>
											<td>{{$mentor_request->created_at}}</td>
											<td>
												<div class="action">
													<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#reject-{{$mentor_request->facilitator_id}}">Reject</a>
															<div class="modal fade" id="reject-{{$mentor_request->facilitator_id}}" tabindex="-1">
																<div class="modal-dialog modal-sm modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-body">
																			<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																				<h5 class="modal-title weight-400">Request Rejection Cause</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true"class=" weight-400">&times;</span>
																				</button>
																				</div>
																					<form method="post" action="{{route('changeMentorRequest')}}">
																					@csrf
																						<div class="form-group">
																							<label>Reject Reason</label>
																							<select class="form-control font-14 rounded-pill" name="report">
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
																						<input type="hidden" name="facilitator_id" value="{{$mentor_request->id}}">
																						<div class="text-center row justify-content-center mx-0 mb-2">
																							<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																							<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
													<a href="{{route('changeMentorRequests',['facilitator_id'=> $mentor_request->id,  'status'=> 'accepted'])}}" class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2">Accept</a>
												</div>
											</td>
										</tr>
										<?php $i = $i+1;?>
									@endforeach
								</tbody>
						</table>
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
