@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="d-flex align-items-center">
							<div class="sub-title flex-fill">
								<h4 class="weight-500">Transaction Management</h4>
							</div>
							<form method="get" action="{{route('transactionManagementView')}}">
							@csrf
							<div class="tab-content">
								<div class="tab-pane fade show active tab-1">
									<div class="form-row align-items-center justify-content-end">
										<div class="col-sm-4 my-1">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="from" placeholder="From Date" name="from" value="{{$from}}">
										</div>
										<div class="col-sm-4 my-1">
											<input type="text" class="form-control sm calendar-icon" autocomplete="off" id="to" placeholder="To Date" name="to" value="{{$to}}">
										</div>
										<div class="col-auto my-1">
											<input type="submit" class="btn btn-primary rounded-pill" value="Filter">
										</div>
										@if($filter == 'Yes')
											<div class="col-auto my-1">
												<a href="{{route('transactionManagementView')}}" data-toggle="tooltip" data-placement="top" title="Clear Filter"><img src="{{asset('assets/images/icons/clear-filter.png')}}"></a>
											</div>
										@endif
									</div>
								</div>
							</div>
							</form>
						</div>
						<div class="search-bar d-flex align-items-center justify-content-between mb-4">
							<div class="filter-tabs">
								<ul class="nav nav-tabs targetClass" >
									<li class="nav-item">@if($tab == 1)<a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1"> @else <a class="nav-link" data-toggle="tab" href=".tab-1" data-target=".tab-1">@endif All Transactions</a></li>
									<li class="nav-item">@if($tab == 2)<a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2"> @else <a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">@endif Commission Management</a></li>
									<li class="nav-item">@if($tab == 3)<a class="nav-link active" data-toggle="tab" href=".tab-3" data-target=".tab-3"> @else <a class="nav-link" data-toggle="tab" href=".tab-3" data-target=".tab-3">@endif Tax Management</a></li>
									<li class="nav-item">@if($tab == 4)<a class="nav-link active" data-toggle="tab" href=".tab-4" data-target=".tab-4"> @else <a class="nav-link" data-toggle="tab" href=".tab-4" data-target=".tab-4">@endif Withdrawal Requests</a></li>

									<!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1">All Transactions</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">Commission Management</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-3" data-target=".tab-3">Tax Management</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-4" data-target=".tab-4">Withdrawal Requests</a></li> -->
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade show active tab-1 text-md-right">
									@if($from == null && $to == null)
										<button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport()">Export data</button>
									@else
										<button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport_filter('<?php echo $from;?>','<?php echo $to;?>')">Export data</button>
									@endif
								</div>
							</div>
						</div>
						<div class="tab-content">
							@if($tab == 1)<div class="tab-pane fade show active tab-1">@else<div class="tab-pane fade tab-1">@endif
								<!-- <div class="tab-pane fade show active tab-1"> -->
								<div class="card card-table round data-table bg-transparent">
									<div class="table-responsive">
										<table class="table table-striped table-borderless text-black mb-0 dataTable">
											<thead>
												<tr>
													<th class="py-4">Transaction id</th>
													<th class="py-4">User Name</th>
													<th class="py-4">User Type</th>
													<th class="py-4">Transaction Type</th>
													<th class="py-4">Transaction Purpose</th>
													<th class="py-4">Transaction Date</th>
													<th class="py-4">Total Amount</th>
													<th class="py-4">Commission Earned</th>
												</tr>
											</thead>
											<tbody>
												<?php $m = 1;?>
												@foreach($transactions as $key => $transaction)
												@if($transaction['user']['name'] != null)
												<tr>
													<td>{{$m}}</td>
													<td>{{$transaction['user']['name']}}</td>
													<td>{{$transaction['user']['user_type']['user_type']}}</td>
													<td>{{$transaction['transaction_type']}}</td>
													@if($transaction['transaction_type'] == 'credited')
														<td>{{$transaction['comes_from']}}</td>
													@else
														<td>Course Purchased</td>
													@endif
													<td><?php echo date("d-m-Y", strtotime($transaction['created_at']));?></td>
													@if($transaction['original_amount_for_commission'] == null)
													<td>-</td>
													@else
													<td>{{$transaction['original_amount_for_commission']}}</td>
													@endif
													<td>{{$transaction['amount']}}</td>
												</tr>
												<?php $m = $m+1;?>
												@endif
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($tab == 2)<div class="tab-pane fade show active tab-2">@else<div class="tab-pane fade tab-2">@endif
							<!-- <div class="tab-pane fade tab-2"> -->
								<div class="card p-4">
									<div class="px-1">
										<div class="d-flex align-items-center justify-content-between mb-md-4">
											<h5 class="my-0">The Commission Will Be Taken On Sale Of Each Course From The Facilitator</h5>
											<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(4,1) != 0 || page_access_permission(4,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      ?>
											<a href="{{route('editTransactionManagementView',['type' => 'Commission'])}}"><img src="{{asset('assets/images/icons/edit-circle.svg')}}"></a>
										<?php } ?>
										</div>
										<div class="col-5 pl-0 pr-5">
											<label class="sr-only" for="inlineFormInputGroup">Username</label>
											<div class="form-control lg input-group mb-2 border border-dark rounded-pill p-0 overflow-hidden">
												<input type="text" placeholder="" class="bg-light border-0 flex-fill px-4" value="{{$taxCommission['commission']}}" readonly>
												<div class="input-group-append col-3 px-0">
													<div class="flex-fill text-center bg-sky-2 cent d-flex align-items-center justify-content-center">
													<img src="{{asset('assets/images/icons/cent.svg')}}"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@if($tab == 3)<div class="tab-pane fade show active tab-3">@else<div class="tab-pane fade tab-3">@endif
							<!-- <div class="tab-pane fade tab-3"> -->
								<div class="card p-4">
									<div class="px-1">
										<div class="d-flex align-items-center justify-content-between mb-md-4">
											<h5 class="my-0">The Tax Will Be Taken On Sale Of Each Course From The Facilitator</h5>
											<?php 
                        if((Auth::user()->user_type_id == 7 && (page_access_permission(4,1) != 0 || page_access_permission(4,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      ?>
											<a href="{{route('editTransactionManagementView',['type' => 'Tax'])}}"><img src="{{asset('assets/images/icons/edit-circle.svg')}}"></a>
										<?php } ?>
										</div>
										<div class="col-5 pl-0 pr-5">
											<label class="sr-only" for="inlineFormInputGroup">Username</label>
											<div class="form-control lg input-group mb-2 border border-dark rounded-pill p-0 overflow-hidden">
												<input type="text" placeholder="" class="bg-light border-0 flex-fill px-4" value="{{$taxCommission['tax']}}" readonly>
												<div class="input-group-append col-3 px-0">
													<div class="flex-fill text-center bg-sky-2 cent d-flex align-items-center justify-content-center">
													<img src="{{asset('assets/images/icons/cent.svg')}}"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@if($tab == 4)<div class="tab-pane fade show active tab-4">@else<div class="tab-pane fade tab-4">@endif
							<!-- <div class="tab-pane fade tab-4"> -->
								<div class="form-check form-check-inline d-flex align-items-center simpleTab mb-3">
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0 active" role="button" data-target="tab2-1">
										<input class="form-check-input" type="radio" name="requests" checked>
										Requested
									</label>
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-2" role="button">
										<input class="form-check-input" type="radio" name="requests">
										Approved Requests
									</label>
									<label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-3" role="button">
										<input class="form-check-input" type="radio" name="requests">
										Rejected Requests
									</label>
								</div>
								<div class="tabContent">
									<div class="tabpane active tab2-1">
										<div class="card card-table round data-table bg-transparent">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.no</th>
															<th class="py-4">Name</th>
															<th class="py-4 text-center">Withdrawl Amount</th>
															<th class="py-4 text-center">Total Amount in wallet</th>
															<th class="py-4 text-center">Withdrawl Request Date</th>
															<?php 
                        				if((Auth::user()->user_type_id == 7 && (page_access_permission(4,1) != 0 || page_access_permission(4,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      				?>
															<th class="py-4 text-center" width="200">Action</th><?php } ?>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1;?>
														@foreach($withdrals as $row => $withdral)
														@if(isset($withdral->user['name'])?$withdral->user['name']:'' != null)
														<tr>
															<td>{{$i}}</td>
															<td>{{$withdral->user['name']}}</td>
															<td class="py-4 text-center">{{$withdral->withdrawl_amount}}</td>
															<td class="py-4 text-center">{{$withdral->total_point}}</td>
															<td class="py-4 text-center"><?php echo date("d-m-Y", strtotime($withdral->created_at));?></td>
															<?php 
                        				if((Auth::user()->user_type_id == 7 && (page_access_permission(4,1) != 0 || page_access_permission(4,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                      				?>
															<td class="py-4 text-center">
																<a href="{{route('update_withdrawl_status',['id' => $withdral->id,'status'=>'approve'])}}" class="btn border-success btn-sm text-success px-4 rounded-pill font-12">Approve</a>
																<a href="{{route('update_withdrawl_status',['id' => $withdral->id,'status'=>'reject'])}}" class="btn border-danger btn-sm text-danger px-3 rounded-pill font-12 ml-2">Reject</a>
															</td><?php } ?>
														</tr>
														@endif
														<?php $i = $i+1;?>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tabpane tab2-2">
										<div class="card card-table round data-table bg-transparent">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.no</th>
															<th class="py-4">Name</th>
															<th class="py-4">Withdrawl Amount</th>
															<th class="py-4 text-center">Withdrawl Approval Date</th>
															<th class="py-4 text-center">Total Amount in wallet</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1;?>
														@foreach($approved_withdrals as $a => $approved_withdral)
														@if($approved_withdral->user['name'] != null)
														<tr>
															<td>{{$i}}</td>
															<td>{{$approved_withdral->user['name']}}</td>
															<td>{{$approved_withdral->withdrawl_amount}}</td>
															<td class="py-4 text-center"><?php echo date("d-m-Y", strtotime($withdral->updated_at));?></td>
															<td class="py-4 text-center">{{$approved_withdral->total_point}}</td>
														</tr>
														@endif
														<?php $i = $i+1;?>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tabpane tab2-3">
										<div class="card card-table round data-table bg-transparent	">
											<div class="table-responsive">
												<table class="table table-striped table-borderless text-black mb-0 dataTable">
													<thead>
														<tr>
															<th class="py-4">S.no</th>
															<th class="py-4">Name</th>
															<th class="py-4">Withdrawl Amount</th>
															<th class="py-4 text-center">Withdrawl Rejection Date</th>
															<th class="py-4 text-center">Total Amount in wallet</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1;?>
														@foreach($rejected_withdrals as $b => $rejected_withdral)
														@if($rejected_withdral->user['name'] != null)
														<tr>
															<td>{{$i}}</td>
															<td>{{$rejected_withdral->user['name']}}</td>
															<td>{{$rejected_withdral->withdrawl_amount}}</td>
															<td class="py-4 text-center"><?php echo date("d-m-Y", strtotime($withdral->updated_at));?></td>
															<td class="py-4 text-center">{{$approved_withdral->total_point}}</td>
														</tr>
														@endif
														<?php $i = $i+1;?>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
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
function userexport() {
  var url = "{{URL::to('admin/transaction_management')}}?transaction_type_id=1";
  window.location = url;
}
function userexport_filter(from,to) {
		console.log(from,to);
    var url = "{{URL::to('admin/transaction_management')}}?transaction_type_id=1&from="+from+"&to="+to;
    window.location = url;
}
</script>