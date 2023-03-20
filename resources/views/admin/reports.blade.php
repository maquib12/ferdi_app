@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<!-- <div class="search-bar d-flex align-items-center justify-content-between mb-0">
							<div class="filter-tabs">
								<ul class="nav nav-tabs weight-300 targetClass">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-1">Tab 1</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2">Tab 2</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-3">Tab 3</a></li>
								</ul>
							</div>
						</div> -->
						<div class="tab-content">
							<div class="tab-pane fade show active tab-1">
							<form method="get" action="{{route('search_report')}}">
								@csrf
								<div class="d-flex align-items-center">
									<div class="d-flex align-items-center justify-content-between flex-fill">
										<nav>
											<ol class="breadcrumb h4 my-0">
												<li class="breadcrumb-item"><a href="#">Reports </a></li>
												<li class="breadcrumb-item active">Users Reports</li>
											</ol>
										</nav>
									</div>
									<div class="search flex-fill">
										<div class="form-group my-0">
											<input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
											<span class="clearsearch mdi mdi-close"></span>
										</div>
									</div>
									<div class="pl-3">
										@if($report_type == 0)
											<button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport(0)">Export data</button>
										@else
											<button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport_filter('<?php echo $type;?>','<?php echo $user;?>','<?php echo $select;?>','<?php echo $from;?>','<?php echo $to;?>')">Export data</button>
										@endif
									</div>
								</div>
								<div class="d-flex align-items-center">
									<select class="form-control rounded-pill font-14 col-sm-2 mr-md-2" name="type" id="option">
										@if(!isset($type) || ($type == null))
										<option disabled selected hidden>Select Report Type</option>
										@else
										<option disabled selected hidden>{{$type}}</option>
										@endif
										<option value="commission">Reports based on Commission</option>
										<option value="loyalty">Reports based on Loyalty Bonus</option>
									</select>
									<select class="form-control rounded-pill font-14 col-sm-2 mr-md-2" name="select" id="select">
										@if(!isset($select) || ($select == null))
										<option disabled selected hidden>Select User Type</option>
										@else
										<option disabled selected hidden><?php echo ucfirst($select); ?></option>
										@endif
									</select>
									<select class="form-control rounded-pill font-14 col-sm-2 mr-md-2" name="user" id="type">
										@if(!isset($user) || ($user == null))
										<option disabled selected hidden>Select User</option>
										@else
										<option disabled selected hidden>{{$user}}</option>
										@endif
									</select>
									<div class="form-row align-items-center justify-content-end">
										@if(isset($from))
										<div class="col">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="from" placeholder="From Date" name="from" value="{{$from}}">
										</div>
										@else
										<div class="col">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="from" placeholder="From Date" name="from">
										</div>
										@endif
										@if(isset($to))
										<div class="col">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="to" placeholder="To Date" name="to" value="{{$to}}">
										</div>
										@else
										<div class="col">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="to" placeholder="To Date" name="to">
										</div>
										@endif
										<div class="col-auto my-1">
											<input type="submit" class="btn btn-primary rounded-pill" value="Filter">
										</div>
										@if(isset($filter))
											<div class="col-auto my-1">
												<a href="{{route('report')}}" data-toggle="tooltip" data-placement="top" title="Clear Filter"><img src="{{asset('assets/images/icons/clear-filter.png')}}"></a>
											</div>
										@endif
									</div>
								</div>
							</form>
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Users</th>
													<th class="py-4">Users Types</th>
													<th class="py-4">Commissions</th>
													<th class="py-4">Loyalty Bonus Given</th>
													<th class="py-4">Loyalty Bonus Earn</th>
												</tr>
											</thead>
											<tbody>
												@foreach($credit_points as $key => $credit_point)
												@if(isset($credit_point->user_name))
												<tr>
													<td>{{$credit_point->user_name}}</td>
													<td>{{$credit_point->user_type}}</td>
													@if(isset($credit_point->earned_commission) && $credit_point->earned_commission != null)
													<td>{{$credit_point->earned_commission}}</td>
													@else
													<td>-</td>
													@endif
													@if(isset($credit_point->reg_credit_points) && $credit_point->reg_credit_points != null)
													<td>{{$credit_point->reg_credit_points}}</td>
													@else
													<td>-</td>
													@endif
													@if(isset($credit_point->earned_credit_points) && $credit_point->earned_credit_points != null)
													<td>{{$credit_point->earned_credit_points}}</td>
													@else
													<td>-</td>
													@endif
												</tr>
												@endif
												@endforeach
											</tbody>
										</table>
									</div>
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
	$(document).ready(function() {
		$('#option').change(function(){
			var option = $(this).val();
			if(option == 'commission'){
				$("#select").empty();
				$("#select").append('<option disabled selected hidden>Select User Type</option><option value="all-commission">All</option><option value="facilitators">Facilitators</option><option value="mentors">Mentors</option>');
			}
			if(option == 'loyalty'){
				$("#select").empty();
				$("#select").append('<option disabled selected hidden>Select User</option><option value="all-loyalty">All</option><option value="students">Students</option><option value="facilitators">Facilitators</option><option value="mentors">Mentors</option><option value="sponsors">Sponsors</option>');
			}
		});
	});
	$(document).ready(function() {
		$('#select').click(function(){
			var select = $(this).val();
			console.log(select);
			$.ajax({
				url : 'getuser/'+select,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						$("#type").empty();
						$("#type").append('<option value="all">All</option>');
						$.each(response,function(key,value){
							$("#type").append('<option value="'+key+'">'+value+'</option>');
						});
					}
					else{
						$("#type").empty();
					}
				}
			});
		});
	});
function userexport(id) {
	if(id == 0){
    var url = "{{URL::to('admin/report')}}?report_type_id="+id;
    window.location = url;
  }
}
function userexport_filter(type,user,select,from,to) {
  	console.log(user,type);
    var url = "{{URL::to('admin/search_report')}}?report_type_id=1&type="+type+"&user="+user+"&select="+select+"&from="+from+"&to="+to;
    window.location = url;
}
</script>