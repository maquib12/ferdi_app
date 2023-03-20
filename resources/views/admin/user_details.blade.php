@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<nav>
								<ol class="breadcrumb h4 my-0">
									<li class="breadcrumb-item"><a href="{{route('user_management')}}">All Users</a></li>
									<li class="breadcrumb-item active">User Details</li>
								</ol>
							</nav>
							<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{route('user_management')}}">Back</a>
						</div>
						<div class="card">
							<div class="bg-sky rounded-xl-top p-4 d-flex align-items-center">
								<div class="avatar lg bordered">
									<div class="inner">
										@if($userDetails->userdetails != null && $userDetails->userdetails->image != null)
											<img src="{{asset('profile_pic/' .$userDetails->userdetails->image)}}" class="bordered">
										@else
											<img src="{{asset('assets/images/faces/face1.jpg')}}" class="bordered">
										@endif
									</div>
								</div>
								<div class="flex-fill pl-3">
									<strong>{{$userDetails['name']}}</strong>
									<p class="font-12 mt-1 mb-0">{{$userDetails['email']}}</p>
								</div>
								<?php 
            			if((Auth::user()->user_type_id == 7 && page_access_permission(2,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
								?>
								<div class="action">
									<a href="{{route('editUser',['id' => $userDetails['id']])}}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit"><img src="{{asset('assets/images/icons/edit-circle.svg')}}"></a>
									<!-- <span data-toggle="tooltip" data-placement="top" title="Deactivate">
										<a role="button" data-toggle="modal" data-target="#logoutModal"><img src="{{asset('assets/images/icons/deactivate.svg')}}"></a>
									</span> -->
								</div>
								<?php } ?>
							</div>
							<div class="p-4">
								<div class="row justify-content-between">
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">User Type</label>
										<div class="weight-500">{{$userDetails->user_type->user_type}}</div>
									</div>
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Email</label>
										<div class="weight-500">{{$userDetails->email}}</div>
									</div>
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Date of Birth</label>
										@if(isset($userDetails->userdetails))
											<div class="weight-500">{{$userDetails->userdetails->date_of_birth}}</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Gender</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->gender != null)
											<div class="weight-500"><?php echo ucfirst($userDetails->userdetails->gender); ?></div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@if($userDetails->user_type_id == 5 || $userDetails->user_type_id == 3 || $userDetails->user_type_id == 4)
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Business Type</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->business_industry_relation != null)	
											<div class="weight-500">{{$userDetails->userdetails->business_industry_relation->business_name}}</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@endif
									@if($userDetails->user_type_id == 5)
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Business Name</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->business_name != null)	
											<div class="weight-500">{{$userDetails->userdetails->business_name}}</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@endif
									@if($userDetails->user_type_id == 5)
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Business Owner Name</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->business_owner_name != null)	
											<div class="weight-500">{{$userDetails->userdetails->business_owner_name}}</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@endif
									@if($userDetails->user_type_id == 5)
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Business Logo</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->business_logo != null)
										<div class="avatar lg bordered">
											<div class="inner">
												<img src="{{asset('business_logo/' .$userDetails->userdetails->business_logo)}}" class="bordered">
											</div>
										</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@endif
									@if($userDetails->user_type_id == 5 || $userDetails->user_type_id == 3 || $userDetails->user_type_id == 4)
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">ID Proof</label>
										@if(isset($userDetails->userdetails) && $userDetails->userdetails->id_proof != null)
										<div class="avatar lg bordered">
											<div class="inner">
												<img src="{{asset('id_proof/' .$userDetails->userdetails->id_proof)}}" class="bordered">
											</div>
										</div>
										@else
											<div class="weight-500">-</div>
										@endif
									</div>
									@endif
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">City</label>
										@if(isset($userDetails->userdetails))
											<div class="weight-500">{{$userDetails->userdetails->city->name}}</div>
										@else
											<div class="weight-500 text-center">-</div>
										@endif
									</div>
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Time Spent</label>
										<div class="weight-500">{{ floor((time() - strtotime($userDetails['created_at'])) / (3600*24)) }} days</div>
									</div>
									@if($userDetails['status'] == 1 || $userDetails['status'] == 0)
									<div class="col-sm-6 mb-3">
										<form method="post" action="{{route('changeUserStatus')}}">
											@csrf
										<label class="font-14 text-gray mb-1">Status</label>
										<div class="mx-n1">
												@if($userDetails['status'] == 1)
												<select class="border-0 p-0 status text-success" onchange="this.form.submit()" name="status">
													<option value="active" selected>Active</option>
													<?php 
                        		if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      		?>	
													<option value="inactive">Inactive</option>
													<?php } ?>
												</select>
												@endif
												@if($userDetails['status'] == 0)
												<select class="border-0 p-0 status text-danger" onchange="this.form.submit()" name="status">
													<option value="inactive" selected>Inactive</option>
													<?php 
                        		if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      		?>
													<option value="active">Active</option>
													<?php } ?>
												</select>
												@endif
										</div>
										<input type="hidden" name="user_id" value="{{$userDetails->id}}">
										</form>
									</div>
									@endif
									<div class="col-sm-6 mb-3">
										<label class="font-14 text-gray mb-1">Requested on</label>
										<div class="weight-500"><?php echo date("d-m-Y", strtotime($userDetails->created_at));?></div>
									</div>
								</div>
							</div>
						</div>
					</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="post" action="{{route('changeUserStatus')}}">
	@csrf
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content text-center rounded">
      <div class="modal-body py-5">
        <h5 class="font-24 text-black">Deactivate User</h5>
        <div class="text-black mx-md-5 mt-3 mb-4">Are you sure you want to deactivate this user?</div>
        <div class="action row mx-0">
        <input type="hidden" name="user_id" value="{{$userDetails['id']}}">
        <input type="hidden" name="status" value="inactive">
          <div class="col-sm-6">
            <button type="button" class="btn btn-secondary-transparent btn-lg rounded-pill" data-dismiss="modal">No</button>
          </div>
          <div class="col-sm-6">
            <input type="submit" class="btn btn-primary btn-block btn-lg rounded-pill" value="Yes">
          </div>
        </div>
      </div>
    </div>
  </div>
 </form>
</div>
@endsection
          <!-- content-wrapper ends -->