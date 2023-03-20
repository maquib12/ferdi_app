@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="d-flex align-items-center mb-4">
							<div class="sub-title flex-fill">
								<h4 class="weight-500 my-0">All Email Templates</h4>
							</div>
							<div class="search-bar d-flex align-items-center justify-content-between col-sm-7 px-0">
								<div class="search flex-fill mx-2">
										<div class="form-group my-0">
											<input class="form-control search-icon" onkeyup="searchFunction()" id="searchInput" placeholder="Search..." type="Search">
											<span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
										</div>
								</div>
								<div class="filter">
									<a class="btn btn-primary float-right rounded-pill px-4" href="{{route('add_email_template')}}">
										+ Add Email Template
									</a>
								</div>
							</div>
						</div>
						<div class="card card-table round">
							<div class="table-responsive">
								<table class="table table-striped table-borderless text-black mb-0" id="userTable">
									<thead>
										<tr>
											<th class="py-4">S.N.</th>
											<th class="py-4">Template name</th>
											<th class="py-4">Status</th>
											<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(10,3) != 0 || page_access_permission(10,2) != 0 || page_access_permission(9,3) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      ?>
                      <th class="py-4">Action</th>
                    <?php  } ?>
										</tr>
									</thead>
									<tbody>
										@foreach($email_templates as $key => $email_template)
										<tr id="trr">
											<td>{{$key+1}}</td>
											<td>{{$email_template['template_name']}}</td>
											<td>
												<?php 
                        	if((Auth::user()->user_type_id == 7 && (page_access_permission(10,2) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      	?>
                        <form method="post" action="{{route('change_status_email_template')}}"><?php } ?>
                          @csrf
                          	@if($email_template['status'] == 1)
                          	<select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
                            	<option value="active" selected>Active</option>
                            	<?php 
                        				if((Auth::user()->user_type_id == 7 && (page_access_permission(10,2) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                     					?>
                            	<option value="inactive">Inactive</option><?php } ?>
                            </select>
                          	@endif
                          	@if($email_template['status'] == 0)
                          	<select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
                            	<option value="inactive" selected>Inactive</option>
                            	<?php 
                        				if((Auth::user()->user_type_id == 7 && (page_access_permission(10,2) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      				?>
                            	<option value="active">Active</option><?php } ?>
                            </select>
                          	@endif
                        	<input type="hidden" name="template_id" value="{{$email_template['id']}}">
                        	<?php 
                       		 if((Auth::user()->user_type_id == 7 && (page_access_permission(10,2) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      		?>
                        </form><?php } ?>
											</td>
                      <td>
                      	<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(10,2) != 0 || page_access_permission(9,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      	?>
                      	<a class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2" href="{{route('edit_email_template',['id'=>$email_template['id']])}}">Edit</a><?php } ?>
                      	<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(10,3) != 0 || page_access_permission(9,3) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      	?>
                      	<a class="btn border-danger btn-sm text-danger px-3 rounded-pill font-12 ml-2" href="{{route('delete_email_template',['id'=>$email_template['id']])}}">Delete</a><?php }?>
                      </td>
										</tr>
										@endforeach					
									</tbody>
								</table>
							</div>
						</div>
            {{ $email_templates->links() }}
            <div class="d-md-flex align-items-center justify-content-between mt-3">
              <div class="font-14 weight-500 text-gray">10 Results Per Page</div>
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