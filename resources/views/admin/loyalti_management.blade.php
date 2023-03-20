@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title d-flex align-items-center mb-4">
							<h4 class="weight-500 my-0 flex-fill">Loyalty Point Management</h4>
							<div class="search-bar d-flex align-items-center justify-content-between col-7 px-0">
								<div class="search flex-fill">
										<div class="form-group my-0">
											<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
											<span class="clearsearch mdi mdi-close"></span>
										</div>
								</div>
								<?php 
            			if((Auth::user()->user_type_id == 7 && (page_access_permission(5,1) != 0 || page_access_permission(5,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
								?>
								<div class="filter ml-2">
									<a class="btn btn-primary rounded-pill px-4 font-14 text-nowrap"  href="{{route('add_loylity_managemet_parameters')}}">
									Add/Edit Parameters
									</a>
								</div>
								<?php } ?>
								<div class="filter ml-2">
									<button class="btn btn-primary float-right rounded-pill px-4 font-14 text-nowrap" type="button" onclick="loyaltyexport()" id="export_data">Export data</button>
								</div>
							</div>
						</div>
						<div class="card card-table round data-table bg-transparent">
							<div class="table-responsive">
								<table class="table table-striped table-borderless text-black mb-0 dataTable">
									<thead>
										<tr>
											<th class="py-4">S.N.</th>
											<th class="py-4">User name</th>
											<th class="py-4">Total Credit</th>
											<th class="py-4">Total Debit</th>
											<th class="py-4">Total Points</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;?>
										@foreach($credited as $key => $value)
										@if(isset($value->user_name))
										<tr id="trr">
											<td>{{$i}}</td>
											<td>{{$value->user_name}}</td>
											<td>{{$value->credited}}</td>
											@if(isset($value->debited))
											<td>{{$value->debited}}</td>
											<td><?php echo ($value->credited-($value->debited));?></td>
											@else
											<td>-</td>
											<td>{{$value->credited}}</td>
											@endif
										</tr>
										<?php $i = $i+1;?>
										@endif
										@endforeach				
									</tbody>
								</table>
							</div>
						</div>
            <div class="d-md-flex align-items-center justify-content-between mt-3">
              <!-- <div class="font-14 weight-500 text-gray">10 Results Per Page</div> -->
              </div>  
					</div>
          <!-- content-wrapper ends -->		
			</div>
		</div>
	</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

// function searchFunction() {
//   var  tr, name,email, i, txtValue, txtValueEmail;
//   var input = document.getElementById("searchInput");
//   var filter = input.value.toUpperCase();
//   var table = document.getElementById("userTable");
//   var tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     name = tr[i].getElementsByTagName("td")[1];
//     email = tr[i].getElementsByTagName("td")[2];
//     if (name || email) {
//       txtValue = name.textContent || name.innerText;
//       txtValueEmail = email.textContent || email.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else if(txtValueEmail.toUpperCase().indexOf(filter) > -1){
//       	tr[i].style.display = "";
//       } else{
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }

function loyaltyexport() {
    var url = "{{URL::to('admin/loylity_managemet')}}?filter=1" ;
    window.location = url;
}

</script>