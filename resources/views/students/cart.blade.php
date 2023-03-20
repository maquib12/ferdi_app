@extends('students.layout.master')
@section('content')

<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Cart</h1>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-8 pt-5">
						<div class="list no-last-border">
							@if($carts)
								@foreach($carts as $cart)
										<div class="item pb-4 border-bottom border-light mb-4">
											<div class="row ml-0 py-2">
												<div class="w150">
													<div class="image-md rounded-md overflow-hidden h105">
														@if(isset($cart['course']['images']))
															<img src="{{asset('cover_pic/' .$cart['course']['images'])}}" class="image-fit">
														@else
															<img src="{{asset('student/assets_new/img/img-1.png')}}" class="image-fit">>
														@endif
														
													</div>
												</div>
												<div class="col pl-4">
													<div class="d-flex align-items-center mb-2">
														<div class="col-md-8 px-0">{{$cart['course']['name']}}</div>
														<div class="rate-count text-white font-semibold ml-auto h4">
															${{$cart['course']['price']}}
														</div>
													</div>
													<div class="mb-3 font-12">By {{isset($cart['course']['createdBy']['name']) ? $cart['course']['createdBy']['name'] : ''}}</div>
													<div class="d-flex flex-fill mr-3 font-12">
														<a href="{{url('/remove_cart/'.$cart['id'])}}" class="d-flex align-items-center mr-5"><img src="{{asset('student/assets_new/img/icons/delete-color.svg')}}" class="mr-2"> Remove</a>
														@if(isset($cart->course_id))
														@if(!in_array($cart->course_id,$check_course_in_favourite))
														<a href="{{route('addtofavourites',$cart['course']['id'])}}" class="d-flex align-items-center mr-5"><img src="{{asset('student/assets_new/img/icons/heart-color.svg')}}" height="15" class="mr-2"> Add To Favourites</a>
														@else
														<a href="{{route('remove_to_favourites',$cart['course']['id'])}}" class="d-flex align-items-center mr-5"><img src="{{asset('student/assets_new/img/icons/fill-heart-color.svg')}}" height="15" class="mr-2"> Remove To Favourites</a>
														@endif
														@endif
													</div>
												</div>
											</div>
									   </div>

							    @endforeach

							@else

							@endif
							
						</div>
					</div>
					<div class="col-sm-4 pt-5">
						<div class="bg-dark px-4 py-5 rounded-md">
							<h2 class="font-bold">${{$totalPrice}}</h2>
							<div class="text-light font-light pb-2">{{$qty}} Item in Cart</div>
							<a href="{{url('our-courses')}}" class="btn btn-line-white rounded-lg py-2 px-4 btn-block mt-4"><div class="my-1 px-2">Add More Courses</div></a>
							@if(Auth::user()->user_type_id == 6)
							<a href="{{route('stu-checkout')}}" class="btn btn-primary rounded-lg py-2 px-4 btn-block mt-4"><div class="my-1 px-2">Proceed To Payment</div></a>
							@else
							<a href="{{route('checkout')}}" class="btn btn-primary rounded-lg py-2 px-4 btn-block mt-4"><div class="my-1 px-2">Proceed To Payment</div></a>
							@endif
						</div>
					</div>
				</div>
			</div>
</section>

@endsection