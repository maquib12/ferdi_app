@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title d-flex align-items-center mb-4">
							<h4 class="weight-500 flex-fill my-0">Sub Admin Management</h4>
							<div class="search-bar d-flex align-items-center justify-content-between">
								<div class="search mx-2 px-0">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
										<span class="clearsearch mdi mdi-close"></span>
									</div>
									</div>
								<div class="filter">
									<a class="btn btn-primary rounded-pill px-4"  href="{{route('add_sub_admin')}}">+ Add Sub Admin</a>
								</div>
							</div>
						</div>
						<div class="card card-table round data-table bg-transparent">
							<div class="table-responsive">
								<table class="table table-striped table-borderless text-black mb-0 dataTable" id="userTable">
									<thead>
										<tr>
											<th class="py-4">S.N.</th>
											<th class="py-4">User name</th>
											<th class="py-4">Email</th>
											<th class="py-4">User Type</th>
											<th class="py-4">City</th>
											<th class="py-4">Time Spent</th>
											<th class="py-4">Registration Date</th>
											<th class="py-4">Status</th>
                      <th class="py-4">Edit Permission</th>
										</tr>
									</thead>
									<tbody>
                  <?php $i = 1;?>
										@foreach($users as $key => $user)
										<tr id="trr">
											<td>{{$i}}</td>
											<td><a href="{{route('userDetails',['id'=> $user['id']])}}" class="text-info">{{$user['name']}}</a></td>
											<td >{{$user['email']}}</td>
											<td class="type" id="user_type">
												<div class="action">{{$user->user_type->user_type}}</div>
											</td>
											<td>
                        @if($user->userdetails == null)
                          <div class="w100 text-truncate">-</div>
                        @else
                          <div class="w100 text-truncate">{{$user->userdetails->city->name}}</div>
                        @endif
                      </td>
											<td>{{ floor((time() - strtotime($user['created_at'])) / (3600*24)) }} days</td>
											<td><?php echo date("d-m-Y", strtotime($user['created_at']));?></td>
											<td>
                        <form method="post" action="{{route('changeUserStatus')}}">
                          @csrf
													<select class="status border-0 bg-transparent" onchange="this.form.submit()" name="status">
                          	@if($user['status'] == 1)
                            	<option value="active" selected>Active</option>
                            	<option value="inactive">Inactive</option>
                          	@endif
                          	@if($user['status'] == 0)
                            	<option value="inactive" selected>Inactive</option>
                            	<option value="active">Active</option>
                          	@endif
													</select>
                        	<input type="hidden" name="user_id" value="{{$user['id']}}">
                        </form>
											</td>
                      <td><a class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2" href="{{route('edit_sub_admin_permission',['id'=>$user['id']])}}">Edit Permission</a></td>
										</tr>
                    					<?php $i = $i+1;?>
										@endforeach					
									</tbody>
								</table>
							</div>
						</div>
            <!-- <div class="d-md-flex align-items-center justify-content-between mt-3">
              <div class="font-14 weight-500 text-gray">10 Results Per Page</div>
              </div>  --> 
					</div>
          <!-- content-wrapper ends -->		
			</div>
		</div>
	</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

function changeStatus(id,type) {
  var type = document.getElementById("status").value;
  var formData = {
      user_id: id,
      status: type,
      "_token": "{{ csrf_token() }}",
  };
   $.ajax({
         url: 'changeUserStatus',
         type: 'post',
         data: formData,
         dataType: 'json',
         success: function(response){
          return response;
         }
   });
}
</script>