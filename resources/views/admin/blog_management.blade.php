@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="d-flex align-items-center mb-4">
							<div class="sub-title flex-fill">
								<h4 class="weight-500 my-0">All Blog List</h4>
							</div>
							<div class="search-bar d-flex align-items-center justify-content-between col-sm-7 px-0">
								<div class="tab-content flex-fill">
									<div class="tab-pane fade show active tab-1">
										<div class="search flex-fill mx-2">
											<div class="form-group my-0">
												<input class="form-control search-icon" onkeyup="searchFunction()" id="searchInput" placeholder="Search..." type="Search">
												<span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
											</div>
										</div>
									</div>
									<div class="tab-pane fade tab-2">
										<div class="search flex-fill mx-2">
											<div class="form-group my-0">
												<input class="form-control search-icon" onkeyup="searchpublishFunction()" id="searchinput" placeholder="Search..." type="Search">
												<span class="clearsearch mdi mdi-close" onclick="clean_searches()"></span>
											</div>
										</div>
									</div>
								</div>
								<?php if((Auth::user()->user_type_id == 7 && (page_access_permission(15,1) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){ ?>
								<div class="filter">
									<a class="btn btn-primary float-right rounded-pill px-4" href="{{route('add_blog')}}">
										+ Add BLog
									</a>
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="form-check form-check-inline d-flex align-items-center targetClass mb-3">
							<label class="form-check-label nav-link mr-3 pl-4 position-relative ml-0 py-0" role="button" data-target=".tab-1">
								<input class="form-check-input" type="radio" name="requests" checked>
								Drafted Blogs
							</label>
							<label class="form-check-label nav-link mr-3 pl-4 position-relative ml-0 py-0" role="button" data-target=".tab-2">
								<input class="form-check-input" type="radio" name="requests">
								Published Blogs
							</label>
            </div>
						<div class="tab-content">
							<div class="tab-pane fade show active tab-1">
								<div class="card card-table round">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0" id="userTable">
											<thead>
												<tr>
													<th class="py-4">S.N.</th>
													<th class="py-4">Blog</th>
													<th class="py-4">Author</th>
													<th class="py-4">Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($drafted_blogs as $key => $drafted_blog)
												<tr id="trr">
													<td>{{$key+1}}</td>
													<td><a href="{{route('blog_detail',['id' => $drafted_blog['id']])}}">{{$drafted_blog['title']}}</a></td>
													<td>{{$drafted_blog['owner']['name']}}</td>
													<td>
														<?php 
                        			if((Auth::user()->user_type_id == 7 && (page_access_permission(15,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      			?>
														<form method="post" action="{{route('change_blog_status')}}">
															@csrf
																@if($drafted_blog['status'] == 1)
																<select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
																	<option value="active" selected>Publish</option>
																	<option value="inactive">Save as draft</option>
																</select>
																@endif
																@if($drafted_blog['status'] == 0)
																<select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
																	<option value="inactive" selected>Save as draft</option>
																	<option value="active">Publish</option>
																</select>
																@endif
															<input type="hidden" name="blog_id" value="{{$drafted_blog['id']}}">
														</form>
														<?php  }else{ ?>
															@if($drafted_blog['status'] == 1) Publish @endif
															@if($drafted_blog['status'] == 0) Save as draft @endif
														<?php } ?>
													</td>
												</tr>
												@endforeach					
											</tbody>
										</table>
									</div>
								</div>
								{{ $drafted_blogs->links() }}
								<div class="d-md-flex align-items-center justify-content-between mt-3">
									<div class="font-14 weight-500 text-gray">10 Results Per Page</div>
								</div>
							</div>
							<div class="tab-pane fade tab-2">
								<div class="card card-table round">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0" id="searchTable">
											<thead>
												<tr>
													<th class="py-4">S.N.</th>
													<th class="py-4">Blog</th>
													<th class="py-4">Author</th>
													<th class="py-4">Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($published_blogs as $k => $published_blog)
												<tr id="trr">
													<td>{{$k+1}}</td>
													<td><a href="{{route('blog_detail',['id' => $published_blog['id']])}}">{{$published_blog['title']}}</a></td>
													<td>{{$published_blog['owner']['name']}}</td>
													<td>
														<?php 
                        			if((Auth::user()->user_type_id == 7 && (page_access_permission(15,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      			?>
														<form method="post" action="{{route('change_blog_status')}}">  
															@csrf
																@if($published_blog['status'] == 1)
																<select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
																	<option value="active" selected>Publish</option>
																	<option value="inactive">Save as draft</option>
																</select>
																@endif
																@if($published_blog['status'] == 0)
																<select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
																	<option value="inactive" selected>Save as draft</option>
																	<option value="active">Publish</option>
																</select>
																@endif
															<input type="hidden" name="blog_id" value="{{$published_blog['id']}}">
														</form>
														<?php  }else{ ?>
															@if($published_blog['status'] == 1) Publish @endif
															@if($published_blog['status'] == 0) Save as draft @endif
														<?php } ?>
													</td>
												</tr>
												@endforeach					
											</tbody>
										</table>
									</div>
								</div>
								{{ $published_blogs->links() }}
								<div class="d-md-flex align-items-center justify-content-between mt-3">
									<div class="font-14 weight-500 text-gray">10 Results Per Page</div>
								</div>
							</div>
						</div>
					</div>
          <!-- content-wrapper ends -->		
			</div>
		</div>
	</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

function searchFunction() {
  var  tr, name,email, i, txtValue, txtValueEmail;
  var input = document.getElementById("searchInput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("userTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    email = tr[i].getElementsByTagName("td")[2];
    if (name || email) {
      txtValue = name.textContent || name.innerText;
      txtValueEmail = email.textContent || email.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if(txtValueEmail.toUpperCase().indexOf(filter) > -1){
      	tr[i].style.display = "";
      } else{
        tr[i].style.display = "none";
      }
    }       
  }
}
function clean_search() {
    console.log('a');
    document.getElementById("searchInput").value = "";
    searchFunction();
}
function searchpublishFunction() {
  var  tr, name,email, i, txtValue, txtValueEmail;
  var input = document.getElementById("searchinput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("searchTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    email = tr[i].getElementsByTagName("td")[2];
    if (name || email) {
      txtValue = name.textContent || name.innerText;
      txtValueEmail = email.textContent || email.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if(txtValueEmail.toUpperCase().indexOf(filter) > -1){
      	tr[i].style.display = "";
      } else{
        tr[i].style.display = "none";
      }
    }       
  }
}
function clean_searches() {
    console.log('a');
    document.getElementById("searchinput").value = "";
    searchFunction();
}
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