@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<nav>
							<ol class="breadcrumb h4">
								<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="">Total Facilitators</a></li>
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
									<th class="py-4">User Type</th>
									<th class="py-4">City</th>
									<th class="py-4">Time Spent</th>
									<th class="py-4">Requested Date</th>
									<th class="py-4">Action</th>
								</tr>
							</thead>
								<tbody>
									<?php $i = 1;?>
									@foreach($total_facilitators as $k=>$user)
										<tr>
											<td>{{$i}}</td>
											<td><a href="{{route('userDetails',['id'=> $user['id']])}}" class="text-info">{{$user['name']}}</a></td>
											<td>{{$user['email']}}</td>
											<td class="type" id="user_type">
                        <div class="action">
                        	<span class="border border-warning text-warning rounded-pill btn-8" id='user_type'>Facilitator</span>
                        </div>
                      </td>
                      <td>
                        @if($user->userdetails == null)
                          <div class="w100 text-truncate">-</div>
                        @else
                        	@if($user->userdetails->city->name != null)
                          	<div class="w100 text-truncate">{{$user->userdetails->city->name}}</div>
                          @else
                          	<div class="w100 text-truncate">-</div>
                          @endif
                        @endif
                      </td>
                      @if((time() - strtotime($user['created_at'])) < 86400)
                        <td>0 days</td>
                      @else
                        <td>{{ floor((time() - strtotime($user['created_at'])) / (3600*24)) }} days</td>
                      @endif
											<td><?php echo date("d-m-Y", strtotime($user['created_at']));?></td>
											<td>
                        <form method="post" action="{{route('changeUserStatus')}}">
                        @csrf
                         @if($user['status'] == 1)
                          <select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
                            <option class="text-success" value="active" selected>Active</option>
                              <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                              ?>  
                                <option class="text-danger" value="inactive">Inactive</option>
                              <?php } ?>
                          </select>
                         @endif
                         @if($user['status'] == 0)
                          <select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
                            <option class="text-success" value="inactive" selected>Inactive</option>
                              <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                              ?>
                                <option class="text-danger" value="active">Active</option>
                              <?php } ?>
                          </select>
                         @endif
                         <input type="hidden" name="user_id" value="{{$user['id']}}">
                        </form>
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
