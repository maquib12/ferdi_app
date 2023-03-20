@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title mb-4 d-flex align-items-center">
							<h4 class="weight-500 my-0 flex-fill">CMS List</h4>
							<div class="search-bar d-flex align-items-center justify-content-between">
								<div class="search mx-2 px-0">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
										<span class="clearsearch mdi mdi-close"></span>
									</div>
								</div>
								<?php if((Auth::user()->user_type_id == 7 && (page_access_permission(13,1) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){ ?>
									<div class="filter">
										<a class="btn btn-primary float-right rounded-pill px-4" href="{{route('cms')}}">+ Add CMS</a>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="card card-table round">
							<div class="table-responsive">
								<table class="table table-striped table-borderless text-black mb-0 dataTable" id="userTable">
									<thead>
										<tr>
                      <th class="py-4">S.N.</th>
                      <th class="py-4">Title</th>
                      <th class="py-4">Used in Application</th>
                      <?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(13,2) != 0 || page_access_permission(13,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      ?>
                      <th class="py-4 text-center">Action</th>
                    <?php  } ?>
                    </tr>
									</thead>
									<tbody>
                   <?php $i = 1;?>
										@foreach($applications as $key => $application)
                    	<tr id="trr">
                      	<td>{{$i}}</td>
                      	<td>{{$application['title']}}</td>
                      	<td >{{$application['user_type']['applications']}}</td>
                      	<td class="py-4 text-center">
                      		<?php 
                        		if((Auth::user()->user_type_id == 7 && page_access_permission(13,2) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      		?>
                      		<a class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2" href="{{route('edit_cms_list',['id'=>$application['id']])}}">Edit</a><?php } ?>
                      		<?php 
                        		if((Auth::user()->user_type_id == 7 && page_access_permission(13,3) != 0) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      		?>
                      		<a class="btn border-danger btn-sm text-danger px-3 rounded-pill font-12 ml-2" href="{{route('delete_cms',['id'=>$application['id']])}}">Delete</a><?php } ?>
                      	</td>
                    	</tr>
                    <?php $i = $i+1;?>
                    @endforeach         
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="d-md-flex align-items-center justify-content-between mt-3">
              <div class="font-14 weight-500 text-gray">10 Results Per Page</div>
              </div>   -->
          </div>
          <!-- content-wrapper ends -->   
      </div>
    </div>
  </div>
@endsection