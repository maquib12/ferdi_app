@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title mb-4">
							<h4 class="weight-500 flex-fill">User Navigation</h4>
						</div>
						<form action="{{route('addSubAdminPage')}}" method="post" name="">
							@csrf
							<div class="card card-table round px-3">
								<div class="form-group row align-items-center mt-4 mx-0">
									<!-- <label class="col-sm-2 col-form-label m-0">User Type</label>
									<div class="col-sm-4">
										<select class="form-control font-14 lg rounded-pill py-0">
											<option value="">Type A</option>
											<option value="">Type B</option>
											<option value="">Type C</option>
										</select>
									</div> -->
								</div>
								<div class="form-group row mx-0">
									<label class="col-sm-2 col-form-label py-0 my-0">Access Control</label>
									<div class="col-sm-4 treeview">
										<ul id="treeview" class="base">
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',1)->get()->toArray() != null)
													<label><input type="checkbox" name="pages[]" value="1" checked/> Dashboard(Facilitator Account Requests,Sponsor Account Requests and Courses Approval Requests) </label>
												@else
													<label><input type="checkbox" name="pages[]" value="1" /> Dashboard(Facilitator Account Requests,Sponsor Account Requests and Courses Approval Requests) </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',2)->get()->toArray() != null)
													<label><input type="checkbox" name="pages[]" value="2" checked/> User Management </label>
												@else
													<label><input type="checkbox" name="pages[]" value="2"/> User Management </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',3)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="3" checked="" /> Course Management </label>
												@else
												<label><input type="checkbox" name="pages[]" value="3"/> Course Management </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',4)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="4" checked="" /> Transaction Management </label>
												@else
												<label><input type="checkbox" name="pages[]" value="4"/> Transaction Management </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',5)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="5" checked="" /> Loyalty Point Management </label>
												@else
												<label><input type="checkbox" name="pages[]" value="5"/> Loyalty Point Management </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',6)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="6" checked="" /> Loan Management </label>
												@else
												<label><input type="checkbox" name="pages[]" value="6"/> Loan Management </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',7)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="7" checked="" /> Reports </label>
												@else
												<label><input type="checkbox" name="pages[]" value="7"/> Reports </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',9)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="9" checked="" /> Notification Management </label><p></p>
												@else
												<label><input type="checkbox" name="pages[]" value="9"/> Notification Management </label><p></p>
												@endif
												<ul class="child">
													<li>
														@if(App\Permission::where('sub_admin',$user_id)->where('page_id',9)->get()->toArray() != null || App\Permission::where('sub_admin',$user_id)->where('page_id',10)->get()->toArray() != null)
														<label><input type="checkbox" name="pages[]" value="10" checked="" /> Email Notification Template Management </label>
														@else
														<label><input type="checkbox" name="pages[]" value="10"/> Email Notification Template Management </label>
														@endif
													</li><p></p>
													<li>
														@if(App\Permission::where('sub_admin',$user_id)->where('page_id',9)->get()->toArray() != null || App\Permission::where('sub_admin',$user_id)->where('page_id',11)->get()->toArray() != null)
														<label><input type="checkbox" name="pages[]" value="11" checked="" /> Send Email Notification </label>
														@else
														<label><input type="checkbox" name="pages[]" value="11" /> Send Email Notification </label>
														@endif
													</li><p></p>
													<li>
														@if(App\Permission::where('sub_admin',$user_id)->where('page_id',9)->get()->toArray() != null || App\Permission::where('sub_admin',$user_id)->where('page_id',12)->get()->toArray() != null)
														<label><input type="checkbox" name="pages[]" value="12" checked="" /> Send SMS Notification </label>
														@else
														<label><input type="checkbox" name="pages[]" value="12"/> Send SMS Notification </label>
														@endif
													</li><p></p>
												</ul>
											</li>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',13)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="13" checked="" /> CMS Pages </label>
												@else
												<label><input type="checkbox" name="pages[]" value="13"/> CMS Pages </label>
												@endif
											</li><p></p>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',14)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="14" checked="" /> Settings </label>
												@else
												<label><input type="checkbox" name="pages[]" value="14  "/> Settings </label>
												@endif
											</li>
											<li>
												@if(App\Permission::where('sub_admin',$user_id)->where('page_id',15)->get()->toArray() != null)
												<label><input type="checkbox" name="pages[]" value="15" checked="" /> Blog Managemnt </label>
												@else
												<label><input type="checkbox" name="pages[]" value="15  "/> Blog Managemnt </label>
												@endif
											</li>
										</ul>
									</div>
								</div>
							</div>
							<input type="hidden" name="user_id" value="{{$user_id}}">
							<div class="action mt-4">
								<a class="btn btn-secondary btn-lg rounded-pill col-sm-3 mr-3" href="{{route('sub_admin')}}">Cancel</a>
								<input type="submit" value="Submit" class="btn btn-primary btn-lg rounded-pill col-sm-2">
							</div>
						</form>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection