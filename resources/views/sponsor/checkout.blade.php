@extends('sponsor.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Checkout</h1>
				</div>
			</div>
			<div class="container">
				<form method="POST" action="{{route('sponsor-purchase-course')}}" id="payForm">
							@csrf
				<div class="row">
					<div class="col-sm-8 pt-5 pr-md-5">
						@if($carts <= 0)
						<h4>Whom You Want To Sponsor</h4>
						@endif
							@if($carts <= 0)
							<div class="row my-4 pb-5">
								<div class="col-sm-6">
									<input type="text" name="" class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Full Name" id="full_name">
								</div>
								<div class="col-sm-6">
									<input type="text"  class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Email" id="email" name="email">
									 <input type="hidden" name="currency" value="NGN">
	            			
								</div>
							</div>
							@endif
							<h4 class="mt-5">Select Payment Method</h4>
							<div class="list no-last-border pr-md-5">
								<label class="item py-4 py-md-5 border-bottom border-light d-block" role="button">
									<div class="row align-items-center">
										<div class="col-2 col-sm-1 text-center"><img src="{{asset('student/assets_new/img/icons/wallet.png')}}"></div>
										<div class="d-md-flex align-items-center flex-fill ml-md-3">
											<h3 class="mr-auto my-0">Wallet</h3>
											<div class="pr-1"><span class="text-xlight">Available Credit</span> ${{$wallet_balance->wallets}}</div>
										</div>
										<div class="lg-radio ml-4 px-3">
											<input type="radio" name="method" class="d-none withdraw pay_type" value="wallet" id="wallet" checked>
											<em></em>
										</div>
									</div>
								</label>
								<label class="item py-4 py-md-5 border-bottom border-light d-block" role="button">
									<div class="row align-items-center">
										<div class="col-2 col-sm-1 text-center"><img src="{{asset('student/assets_new/img/icons/paystack.png')}}"></div>
										<div class="d-md-flex align-items-center flex-fill ml-md-3">
											<h3 class="mr-auto my-0">Paystack</h3>
										</div>
										<div class="lg-radio ml-4 px-3">
											<input type="radio" name="method" class="d-none paystack pay_type" value="paystack">
											<em></em>
										</div>
									</div>
								</label>
								<!-- <label class="item py-4 py-md-5 border-bottom border-light d-block" role="button">
									<div class="row align-items-center">
										<div class="col-2 col-sm-1 text-center"><img src="{{asset('student/assets_new/img/icons/interswitch.png')}}"></div>
										<div class="d-md-flex align-items-center flex-fill ml-md-3">
											<h3 class="mr-auto my-0">Flutterwave</h3>
										</div>
										<div class="lg-radio ml-4 px-3">
											<input type="radio" name="method" class="d-none">
											<em></em>
										</div>
									</div>
								</label> -->
							</div>
						
					</div>
					<div class="col-sm-4 pt-3 pt-md-5">
						<div class="bg-dark px-4 py-5 rounded-md">
							<h2 class="font-bold">${{$totalPrice}}</h2>
							<div class="text-light font-light pb-2">{{$qty}} Item in Cart</div>
							<button type="submit" class="btn btn-primary rounded-lg py-2 px-4 btn-block mt-4 paystackbtn d-none" id="btn"><div class="my-1 px-2">Complete Payment</div></button>
							<button class="btn btn-primary rounded-lg py-2 px-4 btn-block mt-4 buy_course" id="btn"><div class="my-1 px-2">Complete Payment</div></button>
							<div class="d-flex align-items-center font-12 mt-3"><img src="{{asset('student/assets_new/img/icons/lock.svg')}}" class="mr-2"> Secure Payment</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</section>
		<script src="{{asset('student/assets/js/jquery-3.5.1.min.js')}}"></script>
		<script>
				$(".pay_type").on('change',function(){
				 		var check_pay = $('.paystack').is(":checked");
				 		if(check_pay==true){
				 			$(".buy_course").addClass("d-none");
				 			$(".paystackbtn").removeClass("d-none");
				 		}else{
				 			
				 			$(".paystackbtn").addClass("d-none");
				 			$(".buy_course").removeClass("d-none");
				 		}
				});
				$(".buy_course").on("click", function(e){
					e.preventDefault();
					document.getElementById("btn").disabled = true;
          setTimeout(function () { document.getElementById("btn").disabled = false; }, 5000);
					var checked = $('#wallet').is(":checked")
					if(checked){
						$(".buy_course").removeAttr('type');
						var check = $(".withdraw").val();
						var email = $('#email').val();
						var reference = $('#reference').val();

						$.ajax({
                  type: "POST",  
                  dataType: "json",
                  url: "sponsor-purchase-course",
                  data:{
                  	value:check,
                  	email:email,
                  	_token: "{{ csrf_token() }}",
                  },
                  cache: false,
                  success: function(response){
                    if(response.success == 1){
                      toastr.success(response.message);
                      setTimeout(() => {
												location.reload();
										  }, 5000);

                    }else if(response.success == 0){
                      toastr.error(response.message);
                    }
                    if(response.success == true){
                      toastr.error(response.message);
                      setTimeout(() => {
												location.reload();
										  }, 5000);
                    }    
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });
					}else{
						// var check = $(".paystack").val();
						// var email = $('#email').val();
						// var reference = $('#reference').val();
						// console.log(email)
						// $.ajax({
            //       type: "POST",
            //       dataType: "json",
            //       url: "sponsor-purchase-course",
            //       headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //       data:{
            //       	value:check,
            //       	email:email,
            //       },
            //       cache: false,
            //       success: function(response){
            //         if(response.success == 1){
            //           console.log(response);
            //           toastr.success(response.message);
            //           setTimeout(()=>{
            //           	window.location.href = "{{route('sponsor_home')}}";
            //           },5000);

            //         }else if(response.success == 0){
            //           toastr.error(response.message);
            //         }
                        
                           
            //       },
            //       error: function (err) {
            //          toastr.error(err);
                  
            //     }
            //   });
					}
					
				});
		</script>
@endsection