@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title mb-4">
							<h4 class="weight-500 flex-fill">Page Access Management</h4>
						</div>
						<form action="{{route('addSubAdminPageAccess')}}" method="post" name="">
							@csrf
							<div class="card card-table round">
								<div class="table-responsive">
									<table class="table table-striped table-borderless text-black mb-0">
										<thead>
											<tr>
												<th class="py-4">Pages</th>
												<th class="py-4">Add</th>
												<th class="py-4">Edit</th>
												<th class="py-4">Delete</th>
											</tr>
										</thead>
										<tbody>
											<!-- <tr>
												<td></td>
												<td><label class="d-flex align-items-center" role="button"><input type="checkbox" class="mr-2"> Check All</label></td>
												<td><label class="d-flex align-items-center" role="button"><input type="checkbox" class="mr-2"> Check All</label></td>
												<td><label class="d-flex align-items-center" role="button"><input type="checkbox" class="mr-2"> Check All</label></td>
												<td><label class="d-flex align-items-center" role="button"><input type="checkbox" class="mr-2"> Check All</label></td>
											</tr> -->
											@foreach($pages as $key => $value)
											@if($value == 1)
											<tr>
												<td>Dashboard</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',1)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 2)
											<tr>
												<td>User Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',2)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 3)
											<tr>
												<td>Course Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',3)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 4)
											<tr>
												<td>Transaction Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',4)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 5)
											<tr>
												<td>Loyality Points Mangament</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',5)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 6)
											<tr>
												<td>Loan Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',6)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 7)
											<tr>
												<td>Reports</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',7)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 9)
											<tr>
												<td>Notification Mangament</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',9)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 10)
											<tr>
												<td>Email Templates Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',10)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 11)
											<tr>
												<td>Email Notifications Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',11)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 12)
											<tr>
												<td>SMS Notifications Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',12)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 13)
											<tr>
												<td>CMS Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',13)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 14)
											<tr>
												<td>Settings Management</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',14)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@if($value == 15)
											<tr>
												<td>Blog Managemnt</td>
												<?php 
													$permission = App\Permission::where('sub_admin',$user_id)->where('page_id',15)->get()->toArray();
												?>
												<td>
													@if($permission[0]['add'] == 0)<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button">
													@else<input type="checkbox" name="access[{{$value}}][1]" value="1" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['edit'] == 0)<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button">
													@else<input type="checkbox" name="access[{{$value}}][2]" value="2" role="button" checked="">@endif
												</td>
												<td>
													@if($permission[0]['delete'] == 0)<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button">
													@else<input type="checkbox" name="access[{{$value}}][3]" value="3" role="button" checked="">@endif
												</td>
											</tr>
											@endif
											@endforeach
										</tbody>
									</table>
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