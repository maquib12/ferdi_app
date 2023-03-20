@extends('students.layout.master')
@section('content')

		<section class="py-5">
			<div class="container">
				<form class="collapse show h-auto myAccount">
					<div class="mb-4">
						<h4 class="pb-2 font-medium text-uppercase">Welcome to Withdrawal</h4>
						
						<div class="font-12 text-xlight mt-n3">Hi, {{$bank_details[0]['users']['name'] ?? ''}} Welcome Back.</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="bg-dark p-4 rounded-md">
								<div class="text-white  px-1">Debit Card Account</div>
								<div class="row px-1 my-2">
									
									<div class="col-sm-7">
										<div class="bg-primary p-3 rounded-md bg-rounded overflow-hidden position-relative ferdi-cardbg">
											<div class="position-relative px-1">
												<div class="d-flex align-items-center">
													<div class="ferdi"><img src="{{asset('student/assets_new/img/logo-w.svg')}}" height="20"></div>
													<span class="ml-auto font-14 font-medium text-xlight">Platinum Debit</span>
												</div>
												<div class="d-flex align-items-center font-semibold my-4"><img src="{{asset('student/assets_new/img/icons/card-date.svg')}}" height="36"></div>
												<div class="mb-3 font-24 font-medium">{{$card_number}}</div>
												<div class="d-flex align-items-center pb-1">
													<div class="font-14 flex-fill text-xlight">Valid Thru {{$bank_details[0]['expiry_date'] ?? ''}}</div>
													<div class="card-icon">
														<img src="{{asset('student/assets_new/img/icons/visa-card.svg')}}" height="16">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-5 d-flex">
										<div class="bg-theme-lblue d-flex flex-column align-items-center flex-fill rounded-md p-3" data="toggle" data-show=".addCard" data-hide=".myAccount" role="button">
											<div class="bg-dark p-4 col-8 rounded-md text-center">
												<img src="{{asset('student/assets_new/img/icons/plus-lg.svg')}}" class="my-1">
											</div>
											<span class="text mt-3 font-18">ADD CARDS</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex flex-column px-md-3">
							<div class="bg-dark p-4 rounded-md text-center flex-fill">
								<div class="font-18 mt-3">Your Total Balance</div>
								<div class="font-36 font-bold text-underline my-4">CREDIT ₦ {{$credit->wallets ?? '0'}}</div>
								<div class="mb-4 text-xlight">{{$mytime}}</div>
								<button type="button" class="btn btn-primary col-10 rounded-lg py-2 w-100 font-24" data="toggle" data-show=".addAmount" data-hide=".myAccount" role="button"><div class="my-1">ADD MONEY</div></button>
							</div>
						</div>
					</div>
					<div class="bg-dark mt-5 rounded-md">
						<div class="mb-4 heading border-bottom border-gray2 border-solid-2 d-flex align-items-center px-4 py-3">
							<h4 class="font-medium text-uppercase my-0">Last Transaction</h4>
							<div class="d-flex align-items-cente ml-auto">
								<div class="search-bar ml-auto">
									<input class="form-control bg-transparent search lg" placeholder="Search">
								</div>
								<div class="pr-md-0 ml-3">
									<select class="default selectpicker lg rounded-pill bg-dark border-0 calendar-icon small" data-width="100%">
										<option value="">Last 7 DAYS</option>
										<option value="">Last Month</option>
										<option value="">Last Year</option>
									</select>
								</div>
							</div>
						</div>
						<div class="px-4 py-2">
							
							@foreach($transaction_last as $key=>$value)
							<div class="font-12 text-uppercase pt-2">{{$key}}</div>
							<table class="table table-borderless text-white align-middle mt-4">
								@foreach($value as $values)
								
								<tr>
									<td width="50" class="pl-0"><img src="{{asset('student/assets_new/img/icons/up-circcle-arrow.svg')}}"></td>
									@if($values['transaction_type'] == "credited")
									<td class="text-uppercase font-18 font-semibold text-primary">PAYPAL - SENT</td>
									@else
									<td class="text-uppercase font-18 font-semibold text-primary">PAYPAL - RECEIVED</td>
									@endif
									<td><img src="{{asset('student/assets_new/img/icons/box-dot.svg')}}" height="32" class="mr-2"> {{$values['transaction_type']}}</td>
									<td>{{ \Carbon\Carbon::parse($values['created_at'])->format('d/m/Y')}}</td>
									@if($values['transaction_type'] == "credited")
									<td class="text-success text-right">+ ${{$values['original_amount_for_commission']}}</td>
									@else
									<td class="text-danger text-right">- ${{$values['original_amount_for_commission']}}</td>
									@endif
								</tr>
								@endforeach
							</table>
							@endforeach
						</div>
					</div>
				</form>
				<form class="addCard d-none" id="addCard">
					@csrf
					<div class="bg-dark border border-light rounded-md overflow-hidden p-4">
						<div class="heading border-bottom border-gray2 d-flex align-items-center pb-3 border-bottom border-light">
							<h1 class="font-bold font-36 col-8 px-0 my-0">Add Cards</h1>
							<img src="{{asset('student/assets_new/img/icons/close-w.svg')}}" role="button" class="ml-auto" data="toggle" data-show=".myAccount" data-hide=".addCard" role="button">
						</div>
						<div class="d-flex align-items-cente my-4 py-3">
							<label class="checkbox-btn btn my-0 mr-md-4"><input type="radio" name="cardType" class="d-none" checked value="1"><em></em> <span class="d-flex align-items-center" ><img src="{{asset('student/assets_new/img/icons/card-date.svg')}}" height="20" class="mr-3"> CREDIT CARD</span></label>
							<label class="checkbox-btn btn my-0"><input type="radio" name="cardType" class="d-none" value="0"><em></em> <span class="d-flex align-items-center"><img src="{{asset('student/assets_new/img/icons/card-date.svg')}}" height="20" class="mr-3"> DEBIT CARD</span></label>
						</div>
						<div class="row">
							<div class="col-sm-6 mb-4 pb-2">
								<label>Card Holder Name <span class="font-light text-gray2">(Full name as displayed on card)</span><span class="text-primary">*</span></label>
								<input class="form-control text-white bg-gray icon-input xl rounded-md ph-white" placeholder="CARD HOLDER NAME" style="--icon: url(../img/icons/user-b.svg)" name="holder_name">
							</div>
							<div class="col-sm-6 mb-4 pb-2">
								<label>Card Number <span class="text-primary">*</span></label>
								<input class="form-control text-white bg-gray icon-input xl rounded-md ph-white" placeholder="0000 0000 0000 0000" style="--icon: url(../img/icons/card.svg)" name="card_number">
							</div>
							<div class="col-sm-6 mb-4 pb-2">
								<label>Card Expiration <span class="text-primary">*</span></label>
								<input class="form-control text-white bg-gray icon-input xl rounded-md ph-white" placeholder="MM / YY" style="--icon: url(../img/icons/card-date.svg)" name="card_expiry">
							</div>
							<div class="col-sm-6 mb-4 pb-2">
								<label>CVC <span class="text-primary">*</span></label>
								<input class="form-control text-white bg-gray xl rounded-md ph-white" placeholder="CVC" name="card_cvc">
							</div>
							<div class="col-sm-12 mb-4 py-2">
								<label class="form-checkbox my-0" role="button"><input type="checkbox" class="d-none" name="check"><em class="mr-3 text-gray2"></em> I Have Read And Accept The Terms And Conditions And Privacy Policy</label>
							</div>
							<div class="col-sm-12">
								<div class="border-top border-light3 text-center py-3 mt-4 pt-4">
									<button type="button" class="btn btn-primary btn-lg py-2 rounded-pill mt-4 col-sm-4 font-22 font-semibold stuSaveCards"><span class="d-block my-2">SAVE CARD</span></button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<form class="addAmount d-none" method="POST" action="{{ route('pay') }}" accept-charset="UTF-8">
					<div class="bg-dark border border-light rounded-md overflow-hidden p-4">
						<div class="heading border-bottom border-gray2 d-flex align-items-center pb-3 border-bottom border-light">
							<h1 class="font-bold font-36 col-8 px-0 my-0">Add Amount</h1>
							<img src="{{asset('student/assets_new/img/icons/close-w.svg')}}" role="button" class="ml-auto" data="toggle" data-show=".myAccount" data-hide=".addAmount" role="button">
						</div>
						<div class="col-sm-6 mx-auto border-bottom border-white mt-4 mb-5">
							<input class="form-control bg-transparent border-0 shadow-none text-center text-white font-36 font-bold py-5" value="100" name="amount" id="moneyAdd">
							<input type="hidden" name="currency" value="NGN">
							<input type="hidden" name="message" value="wallet">
	            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
	        		<input type="hidden" name="orderID" value="345">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
						</div>
						<div class="d-flex align-items-cente my-4 py-3 justify-content-between">
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value="100" checked><em></em> <span>$100</span></label>
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value="200"><em></em> <span>$200</span></label>
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value="300"><em></em> <span>$300</span></label>
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value="400"><em></em> <span>$400</span></label>
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value="500"><em></em> <span>$500</span></label>
							<label class="checkbox-btn btn my-0 lg"><input type="radio" name="cardType" class="d-none addMoney" value=""><em></em> <span>Other Amount</span></label>
						</div>
						<div class="row pr-3 pb-5">
							<div class="col-sm-12 mt-4 mb-3">
								<h4>ADD WITH</h4>
							</div>
							@foreach($card_details  as $card_detail)
							<div class="col">
								<label class="circle-radio checkbox-btn btn my-0 lg text-left py-0 align-items-strech px-4">
									<input type="radio" name="addWith" class="d-none" checked value="{{$card_detail->id}}"><em></em>
									<div class="radio-inner d-flex position-relative h-100 flex-fill">
										@if($card_detail->card_type == 1)
										<div class="icon d-flex align-items-center mr-4"><img src="{{asset('student/assets_new/img/icons/visa-card.svg')}}"></div>
										@else
										<div class="icon d-flex align-items-center mr-4"><img src="{{asset('student/assets_new/img/icons/master-card.svg')}}"></div>
										@endif
										<div class="font-18 font-medium border-right border-w50 d-flex align-items-center flex-fill">
										
											<div>VISA MASTER CARD
											<div class="font-xlight d-flex justify-content-between mt-2"><span>****</span><span>****</span> <span>****</span> <span>
												@php
													$var = $card_detail->card_number;
												  echo substr($var,-4);
												@endphp 
											</span></div></div>
										</div>
										<div class="radio-icon d-flex align-items-center pl-4">
											<i></i>
										</div>
									</div>
								</label>
							</div>
							@endforeach
							<button data="toggle" type="button" class="btn bg-gray text-white font-24 px-4 rounded-md hover ml-3" data-show=".addCard" data-hide=".addAmount" role="button"><span class="mx-2">Add New</span></button>
						</div>
						<div class="border-top border-light3 text-center py-3 mt-5">
							<button type="submit" class="btn btn-primary btn-lg py-2 rounded-pill mt-4 col-sm-4 font-22 font-semibold"><span class="d-block my-2">ADD AMOUNT</span></button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
		<script>
			$(".addMoney").on("click", function(){
					var money = $(this).val();
					$('#moneyAdd').val(money);
					console.log(money);
			});
		</script>
@endsection