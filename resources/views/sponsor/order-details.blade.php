@extends('sponsor.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Order Details</h1>
				</div>
				<div class="alert alert-success rounded-md py-3 my-5">
					<div class="d-flex align-items-center">
						<img src="assets/img/icons/check-circle.svg" class="mr-3"> Thank You. Your Order Has Been Received.
					</div>
				</div>
				<div class="bg-dark rounded-md py-4">
					<div class="row px-5">
						<div class="col-sm-4 my-2"><span class="text-xlight">Order number :</span> 4749</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Date :</span> March 2, 2021</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Payment method :</span> Credit Card</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Student name :</span> Jason bark</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Student Email :</span> jason_bark@gmail.com</div>
					</div>
				</div>
				<div class="list no-last-border pt-5">
					<div class="item pb-4 border-bottom border-light mb-4">
						<div class="row ml-0 py-2">
							<div class="w150">
								<div class="image-md rounded-md overflow-hidden h105">
									<img src="assets/img/img-1.png" class="image-fit">
								</div>
							</div>
							<div class="col pl-4">
								<div class="d-flex align-items-center mb-2">
									<h4 class="col-md-8 px-0 font-regular">The Business Intelligence Analyst Course 2021</h4>
									<div class="rate-count text-white font-regular ml-auto h4">
										$100
									</div>
								</div>
								<div class="mb-3 text-xlight">By Edward Viaene</div>
							</div>
						</div>
					</div>
					<div class="item pb-4 border-bottom border-light mb-4">
						<div class="row ml-0 py-2">
							<div class="w150">
								<div class="image-md rounded-md overflow-hidden h105">
									<img src="assets/img/img-2.png" class="image-fit">
								</div>
							</div>
							<div class="col pl-4">
								<div class="d-flex align-items-center mb-2">
									<h4 class="col-md-8 px-0 font-regular">Masters In English | How To Become A Good English Speaker</h4>
									<div class="rate-count text-white font-regular ml-auto h4">
										$100
									</div>
								</div>
								<div class="mb-3 text-xlight">By Edward Viaene</div>
							</div>
						</div>
					</div>
					<div class="item pb-4 border-bottom border-light mb-4">
						<div class="row ml-0 py-2">
							<div class="w150">
								<div class="image-md rounded-md overflow-hidden h105">
									<img src="assets/img/img-3.png" class="image-fit">
								</div>
							</div>
							<div class="col pl-4">
								<div class="d-flex align-items-center mb-2">
									<h4 class="col-md-8 px-0 font-regular">Marketing On Facebook: Managing A Company Page</h4>
									<div class="rate-count text-white font-regular ml-auto h4">
										$100
									</div>
								</div>
								<div class="mb-3 text-xlight">By Edward Viaene</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex align-items-center py-4 border-top-dash">
					<div>Subtotal</div>
					<div class="ml-auto">$ 300</div>
				</div>
				<div class="d-flex align-items-center py-4 border-top-dash font-24">
					<div>Total</div>
					<div class="ml-auto">$ 300</div>
				</div>
			</div>
		</section>
@endsection	