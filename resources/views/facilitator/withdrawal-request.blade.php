@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form action="{{route('withdrawl-post')}}" method="post" id="save">
				@csrf
					<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
						<h1 class="pb-2 font-bold font-36">Withdrawal Request</h1>
					</div>
					<div class="row">
						<div class="col-sm-12 mb-4 pb-2">
							<select class="selectpicker bg-dark icon-dropdown" data-width="100%" name="bank">
							  <option data-icon="icon-hdfc" value="HDFC">HDFC</option>
							  <option data-icon="icon-sbi" value="SBI">SBI</option>
							  <option data-icon="icon-boi" value="BOI">BOI</option>
							  <option data-icon="icon-axis" value="AXIS">AXIS</option>
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">Account Number<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="account_no" placeholder="Account Number">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">Confirm Account number<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="confirm_account_no" placeholder="Confirm Account Number">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">IFSC CODE<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="ifsc_code" placeholder="IFSC CODE">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">Account Holder Name<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="account_holder_name" placeholder="Account Holder Name">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">Phone Number<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="phone_number" placeholder="Phone Number">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-2">
							<label class="pb-1 font-xlight">Nick Name<span class="text-primary">*</span></label>
							<input class="form-control bg-transparent border-light p-4 font-14 rounded-sm text-white" name="nick_name" placeholder="Nick Name">
						</div>
					</div>
					<div class="border-bottom border-xlight border-solid-2 my-5"></div>
					<div class="col-sm-6 mx-auto pt-4">
						<button type="submit" class="btn btn-primary btn-block py-3 rounded-pill">Confirm</button>
					</div>
				</form>
			</div>
		</section>
@endsection
		