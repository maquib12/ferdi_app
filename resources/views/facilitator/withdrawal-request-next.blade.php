@extends('facilitator.include.master')
@section('content')
<section class="py-5">
	<div class="container">
		<form action="{{route('withdrawl_request')}}" method="post">
			@csrf
			<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
				<h1 class="pb-2 font-bold font-36">Withdrawal Request</h1>
			</div>
			<div class="row pb-4">
				<div class="col-sm-6 mx-auto mb-4 pb-2">
					<input type="number" class="form-control border-bottom bg-transparent border-top-0 border-right-0 border-left-0 border-bottom rounded-0 border-light shadow-none text-white text-center font-36 font-bold" min="1" name="amount" value="" placeholder="$0"  required>
				</div>
			</div>
			<h4 class="text-uppercase text-white text-center mt-5">choose bank account</h4>
			<div class="row">
				@foreach($account_details as $account)
				<div class="col-sm-11 mx-auto">
					<label class="radio-lg my-4 d-block" role="button">
						<input type="radio" name="bank" value="{{$account->id}}" class="d-none" checked>
						<div class="d-flex px-4 border border-light rounded-md radio-inner">
							<div class="d-flex align-items-center border-right border-light py-3 text-nowrap">
								@if($account->bank == 'SBI')
								<div class="icon mr-4"><img src="{{asset('assets/img/bank/sbi.png')}}"></div>
								@elseif($account->bank == 'HDFC')
								<div class="icon mr-4"><img src="{{asset('assets/img/bank/hdfc.png')}}"></div>
								@elseif($account->bank == 'AXIS')
								<div class="icon mr-4"><img src="{{asset('assets/img/bank/axis.png')}}"></div>
								@else
								<div class="icon mr-4"><img src="{{asset('assets/img/bank/boi.png')}}"></div>
								@endif
								<div class="text-uppercase h6 my-0 pl-2 pr-5">
									<div class="font-xlight mb-1">{{$account->bank}} Bank</div>
									<div>{{$account['users']->name}}</div>
								</div>
							</div>
							<?php 
									$account_number = substr($account->account_no, -4)
							?>
							<div class="h4 mb-0 pl-5 flex-fill col d-flex align-items-center">************{{$account_number}}</div>
							<div class="radio-icon px-2 d-flex align-items-center border-left border-light pl-4">
								<em></em>
							</div>
						</div>
					</label>
					
				</div>
				@endforeach
				<div class="text-md-right text-center py-3 col-sm-11 mx-auto">
						<button class="btn btn-default-outline-light px-5 py-3"><a href="{{route('withdrawl')}}">Add New Account</a></button>
				</div>
			</div>
			<div class="border-bottom border-xlight border-solid-2 my-5 pt-4"></div>
			<div class="col-sm-6 mx-auto pt-4">
				<button tyoe="submit" class="btn btn-primary btn-block py-3 rounded-pill">Withdrawal</button>
			</div>
		</form>
	</div>
</section>
@endsection
		