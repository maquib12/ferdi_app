@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<nav>
							<ol class="breadcrumb h4">
								<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="">Facilitator Account Requests</a></li>
							</ol>
						</nav>
						<div class="search-bar d-flex align-items-center justify-content-between mb-4">
							<div class="search flex-fill pr-4 mr-2">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search by name..." id="searchInput" onkeyup="searchFunction()">
										<span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
									</div>
							</div>
							<div class="d-flex align-items-center">
								<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{ url()->previous() }}">Back</a>
							</div>
						</div>
						<div class="card card-table round">
						<table class="table table-striped table-borderless text-black mb-0" id="myTable">
							<tbody>
								@foreach($facilitators as $row => $facilitator)
									<tr>
										<td>
											<div class="avatar md">
												<div class="inner">
													<img src="{{asset('assets/images/faces/face1.jpg')}}" class="rounded-pill">
												</div>
											</div>
										</td>
										<td class="pl-1">
											<div class="font-16 weight-600 mb-2"><a href="{{route('userDetails',['id'=> $facilitator['id']])}}">{{$facilitator['name']}}</a></div>
											<small>Specialization</small>
										</td>
										<td class="pl-1 pt-4">
											<div class="mb-2">Email</div>
											<div class="font-16 weight-600 mb-2">{{$facilitator['email']}}</div>
										</td>
										<td class="w-100 pl-4 pt-4">
											<div class="mb-2">Date</div>
											<div class="font-16 weight-600 mb-2"><?php echo date("d-m-Y", strtotime($facilitator['created_at']));?></div>
										</td>
										<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(1,1) != 0 || page_access_permission(1,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                    ?>
										<td class="pr-4">
											<a href="" class="btn border-danger btn-sm text-danger px-4 rounded-pill font-12" data-toggle="modal" data-target="#rejectModal-{{$facilitator->id}}">Reject</a>
											<div class="modal fade" id="rejectModal-{{$facilitator->id}}" tabindex="-1">
												<div class="modal-dialog modal-sm modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-body">
															<div class="row d-flex justify-content-between align-items-center pb-2 border-bottom mb-3 mx-n3 px-3">
																<h5 class="modal-title weight-400">Facilitator Rejection Cause</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true"class=" weight-400">&times;</span>
																</button>
															</div>
															<form method="post" action="{{route('change_user_status')}}">
															@csrf
															<div class="form-group">
																<label>Reject Reason</label>
																<select class="form-control font-14 rounded-pill" name="report" id="remarks">
																	<option disabled selected hidden>Select Reason</option>
																	@foreach($reports as $m=>$report)
																	<option value="{{$report['id']}}">{{$report['reports']}}</option>
																	@endforeach
																	<option value="0">Remarks</option>
																</select>
															</div>
															<div class="form-group">
																	Remarks
    															<input type="text" class="form-control font-14 rounded-pill" id="text_remarks" name="remarks" placeholder="Remarks">
															</div>
															<input type="hidden" name="user_id" value="{{$facilitator->id}}">
															<div class="text-center row justify-content-center mx-0 mb-2">
																<button type="button" class="btn btn-secondary btn-sm rounded-pill mx-1 py-2 px-4" data-dismiss="modal">Close</button>
																<input type="submit" class="btn btn-primary btn-sm rounded-pill mx-1 py-2 px-4" value="Save">
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td>
											<button class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2" onclick="statusChange(<?php echo json_encode($facilitator['id']);?>,'active')">Accept</button>
										</td>
									<?php } ?>
									</tr>
									@endforeach

							<form method="post" action="{{route('changeUserStatus')}}" id="statusChangeForm">
							@csrf
							<input type="hidden" name="user_id" id="user_id" value="">
							<input type="hidden" name="status" id="status" value="">
						</form>
								</tbody>
							</table>
							</div>
						{{ $facilitators->links() }}
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
  var  tr, name, i, txtValue, txtValueEmail;
  var input = document.getElementById("searchInput");
  var upper = input.value.toUpperCase();
  var filter = upper.trim();
  var table = document.getElementById("myTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    if (name) {
      txtValue = name.textContent || name.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else{
        tr[i].style.display = "none";
      }
    }       
  }
}
function remarks_f(){
		var remarks = document.getElementById('remarks').value;
		console.log(remarks);
		if(remarks == 0){
			$("#text_remarks").removeAttr("disabled");
            $("#text_remarks").focus();
		}else{
			$("#text_remarks").attr("disabled", "disabled");
		}
}
function clean_search() {
    console.log('a');
    document.getElementById("searchInput").value = "";
    searchFunction();
}
function statusChange(id,status){
		document.getElementById('user_id').value = id;
		document.getElementById('status').value = status;
		document.getElementById("statusChangeForm").submit();
		
		$.ajax({
			  url: 'https://quytech.net/ferdi_app/public/admin/notifications',
			  type: 'post',
			  data:{ "_token": "{{ csrf_token() }}","user_id":id},
			  success: function(response){
			  	console.log(response);
			  }
			});
	}
</script>