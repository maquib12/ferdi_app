@extends('students.layout.master')
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
						<div class="col-sm-4 my-2"><span class="text-xlight">Order number :</span> {{isset($order_details[0]['order_number']) ? $order_details[0]['order_number'] : ''}}</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Date :</span> <?php $date = date('d-m-Y', strtotime(isset($order_details[0]['created_at']) ? $order_details[0]['created_at'] : '')); 
						echo $date;?></div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Payment method :</span> {{isset($order_details[0]['payment_type']) ? $order_details[0]['payment_type'] : ''}}</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Student name :</span> {{isset($order_details[0]['student']['name']) ? $order_details[0]['student']['name'] : ''}}</div>
						<div class="col-sm-4 my-2"><span class="text-xlight">Student Email :</span> {{isset($order_details[0]['student']['email']) ? $order_details[0]['student']['email'] : ''}}</div>
					</div>
				</div>
				<div class="list no-last-border pt-5">
					@foreach($order_details as $row)
					@php
					$mentor = Helper::get_helper_name($row['course']['created_by']);
					@endphp
					<div class="item pb-4 border-bottom border-light mb-4">
						<div class="row ml-0 py-2">
							<div class="w150">
								<div class="image-md rounded-md overflow-hidden h105">
									@if(isset($row['course']['images']))
										<img src="{{asset('cover_pic/' .$row['course']['images'])}}" class="image-fit">
									@else
										<img src="{{asset('student/assets_new/img/img-1.png')}}" class="image-fit">>
									@endif
								</div>
							</div>
							<div class="col pl-4">
								<div class="d-flex align-items-center mb-2">
									<h4 class="col-md-8 px-0 font-regular">{{$row['course']['name']}}</h4>
									<div class="rate-count text-white font-regular ml-auto h4">
										${{$row['course']['price']}}
									</div>
								</div>
								<div class="mb-3 text-xlight">{{$mentor->name}}</div>
							</div>
						</div>
					</div>
					@endforeach
				
				</div>
				<div class="d-flex align-items-center py-4 border-top-dash">
					<div>Subtotal</div>
					<div class="ml-auto">$ {{$totalPrice}}</div>
				</div>
				<div class="d-flex align-items-center py-4 border-top-dash font-24">
					<div>Total</div>
					<div class="ml-auto">$ {{$totalPrice}}</div>
				</div>
			</div>
		</section>
@endsection	