@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form>
					<div class="mb-4">
						<h4 class="pb-2 font-medium text-uppercase">Welcome to Withdrawal</h4>
						<div class="font-12 text-xlight mt-n3">Hi, {{$bank_details[0]['users']['name'] ?? ''}} Welcome Back.</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="bg-dark p-4 rounded-md">
								<div class="text-white text-uppercase px-1">My Account</div>
								<div class="row px-1 my-2">
									<div class="col-sm-7">
										<div class="bg-primary p-3 rounded-md bg-rounded overflow-hidden position-relative h-100">
											<div class="position-relative">
												<div class="d-flex align-items-center">
													<span class="ml-auto font-medium">{{$bank_details[0]['users']['name'] ?? ''}}</span>
												</div>
												<div class="d-flex align-items-center font-semibold my-4"> {{$bank_details[0]['bank'] ?? ''}} Bank</div>
												<small class="font-12">Account Number</small>
												<div class="h5 mb-3">{{$bank_details[0]['account_no'] ?? ''}}</div>                                                
                                            </div>
										</div>
									</div>
									<div class="col-sm-5 d-flex">
										<div class="bg-theme-blue d-flex flex-column align-items-center flex-fill rounded-md p-3" role="button">
											<div class="bg-dark p-4 col-8 rounded-md text-center">
												<a href="{{route('withdrawl')}}"><img src="{{asset('assets/img/icons/plus-lg.svg')}}" class="my-1"></a>
											</div>
											<span class="text-uppercase text-primary text-underline mt-3 font-18"><a href="{{route('withdrawl')}}">Add new account</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex flex-column px-md-3 w-400">
							<div class="bg-dark p-4 rounded-md text-center flex-fill">
								<div class="font-18 mt-3">Your Total Balance</div>
								<div class="font-36 font-bold text-underline my-4">CREDIT ₦{{isset($totalBalance->wallets) ? $totalBalance->wallets : 0}}</div>
								<div class="mb-4"> {{$mytime}}</div>
								<a href="{{route('withdrawl-request')}}" class="btn btn-primary col-10 rounded-lg py-2 w-100"><div class="my-1">Withdrawal</div></a>
							</div>
						</div>
					</div>
					<div class="mt-5 mb-4 heading border-bottom border-xlight border-solid-2 mb-4 pb-1 d-flex align-items-center pb-4">
						<h4 class="font-medium text-uppercase my-0">Last Transaction</h4>
						<form class="d-flex align-items-center">
							<div class="search-bar ml-auto">
								<input class="form-control bg-transparent search lg" placeholder="Search" onkeyup="searchFunction()" id="searchInput">
							</div>
							<div class="col-sm-3 pr-md-0">
								<select class="default time-style selectpicker lg rounded-pill bg-dark border-0 calendar-icon small select-date" data-width="100%">
									<option value="">Last 7 DAYS</option>
									<option value="">Last Month</option>
									<option value="">Last Year</option>
								</select>
							</div>
						</form>
					</div>
					@foreach($transaction_last as $key=>$value)
					<div class="font-12 text-uppercase pt-2">{{$key}}</div>
					<table class="table table-borderless text-white align-middle mt-4" id="list">
						@foreach($value as $values)
						<tr>
							<td width="50" class="pl-0"><img src="{{asset('assets/img/icons/up-circcle-arrow.svg')}}"></td>
							<td class="text-uppercase font-18 font-semibold text-primary">PAYPAL - SENT</td>
							<td><img src="{{asset('assets/img/icons/box-dot.svg')}}" height="32" class="mr-2"> {{$values['transaction_type']}}</td>
							<td>{{ \Carbon\Carbon::parse($values['created_at'])->format('d/m/Y')}}</td>
							<td class="text-danger text-right">- ${{$values['amount']}}</td>
						</tr>
						@endforeach
					</table>
					@endforeach
				</form>
			</div>
		</section>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	function searchFunction() {
		var i, txtValue;
		var input = document.getElementById("searchInput");
		var upper = input.value.toUpperCase();
		var filter = upper.trim();
		var table = document.getElementById("list");
		var tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			label = tr[i].getElementsByTagName("td")[0];
			txtValue = label.textContent || label.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				} 
		}
}
</script>