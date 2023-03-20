@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Commission Management</h4>
						</div>
						<div class="search-bar d-flex align-items-center justify-content-between mb-4">
							<div class="filter-tabs">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link"  href="{{route('transactionManagementView')}}">All Transactions</a></li>
									@if($type == 'Commission')
										<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-2">Commission Management</a>
									@else
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2">Commission Management</a></li>
									@endif
									</li>
									@if($type == 'Tax')
										<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-3">Tax Management</a>
									@else
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-3">Tax Management</a>
									@endif
									</li>
									<li class="nav-item"><a class="nav-link" href="{{route('transactionManagementView')}}">Withdrawal Requests</a></li>
								</ul>
							</div>
						</div>
						<div class="card p-4">
							<div class="tab-content">
							@if($type == 'Commission')
							<div class="tab-pane fade show active" id="tab-2">
							@else
							<div class="tab-pane fade" id="tab-2">
							@endif
								<div class="card p-4">
									<div class="px-1">
										<div class="d-flex align-items-center justify-content-between mb-md-4">
											<h5 class="my-0">The Commission Will Be Taken On Sale Of Each Course From The Facilitator</h5>
										</div>
										@if (count($errors) > 0)
         									<div class = "alert alert-danger">
            									<ul>
               										@foreach ($errors->all() as $error)
                  										<li>{{ $error }}</li>
               										@endforeach
            									</ul>
         									</div>
      									@endif
										<form method="post" action="{{route('edit_transaction_management')}}">
										@csrf
										<div class="row ml-0 justify-content-between pt-2">
											<div class="col-5 pl-0 pr-5">
												<label class="sr-only" for="inlineFormInputGroup">Username</label>
												<div class="form-control lg input-group mb-2 border border-dark rounded-pill p-0 overflow-hidden">
													<input type="text" placeholder="" class="border-0 flex-fill px-4" value="{{$commission_tax['commission']}}" name="commission">
													<div class="input-group-append col-3 px-0">
														<div class="flex-fill text-center bg-sky-2 cent d-flex align-items-center justify-content-center">
															<img src="{{asset('assets/images/icons/cent.svg')}}"></div>
														</div>
													</div>
												</div>
												<div class="col-4 pl-0 pr-2">
													<a class="btn btn-secondary btn-lg rounded-pill" href="{{route('transactionManagementView')}}">Cancel</a>
													<input type="submit" class="btn btn-primary btn-lg rounded-pill" value="Save">
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
							@if($type == 'Tax')
							<div class="tab-pane fade show active" id="tab-3">
							@else
							<div class="tab-pane fade" id="tab-3">
							@endif
								<div class="card p-4">
									<div class="px-1">
										<div class="d-flex align-items-center justify-content-between mb-md-4">
											<h5 class="my-0">The Tax Will Be Taken On Sale Of Each Course From The Facilitator</h5>
										</div>
										@if (count($errors) > 0)
         									<div class = "alert alert-danger">
            									<ul>
               										@foreach ($errors->all() as $error)
                  										<li>{{ $error }}</li>
               										@endforeach
            									</ul>
         									</div>
      									@endif
										<form method="post" action="{{route('edit_transaction_management')}}">
										@csrf
										<div class="row ml-0 justify-content-between pt-2">
											<div class="col-5 pl-0 pr-5">
												<label class="sr-only" for="inlineFormInputGroup">Username</label>
												<div class="form-control lg input-group mb-2 border border-dark rounded-pill p-0 overflow-hidden">
													<input type="text" placeholder="" class="border-0 flex-fill px-4" value="{{$commission_tax['tax']}}" name="tax">
													<div class="input-group-append col-3 px-0">
														<div class="flex-fill text-center bg-sky-2 cent d-flex align-items-center justify-content-center">
															<img src="{{asset('assets/images/icons/cent.svg')}}"></div>
														</div>
													</div>
												</div>
												<div class="col-4 pl-0 pr-2">
													<a class="btn btn-secondary btn-lg rounded-pill" href="{{route('transactionManagementView')}}">Cancel</a>
													<input type="submit" class="btn btn-primary btn-lg rounded-pill" value="Save">
											</div>
										</div>
										</form>
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