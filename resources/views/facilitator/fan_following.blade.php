@extends('facilitator.include.master')
@section('content')
		<section class="py-4 py-md-5">
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-2 pb-md-1">
					<h1 class="pb-2 font-bold font-36">Fan Followings</h1>
					<h3 class="font-sm-20">Total No of Fan Following : {{$no_of_fans}}</h3>
				</div>
				<div class="row pt-2">
					@foreach($fans_details as $fans)
					<div class="col-sm-6 my-3">
						<div class="card bg-dark p-0 rounded-md d-flex flex-row">
							<div class="thumbnail-md rounded-left-md">
								<img src="{{url('/profile_pic').'/'.$fans['user_details']->image}}" class="img">
							</div>
							<div class="info flex-fill pl-3 pr-3 py-0 d-flex flex-column justify-content-between py-2 py-md-0">
								<div class="d-flex align-items-center mt-md-3">
									<h4 class="text-white flex-fill text-truncate mb-2 font-sm-16">{{$fans['users']->name}}</h4>
									<div class="ellipsis-dropdown">
										<span role="button" class="pt-0 px-2 text-xlight my-0" data-toggle="dropdown">
											<img src="{{asset('assets/img/icons/v-ellipsis.svg')}}">
										</span>
										<div class="dropdown-menu dropdown-menu-right gray-icon mr-2 py-1">
											<form action="{{route('block')}}" method="POST">
												@csrf
												<input type="hidden" name="id" value="{{$fans['users']['id']}}">
												<button class="dropdown-item px-2 d-flex align-items-center" type="submit"><i class="icon"><img src="{{asset('assets/img/icons/block.svg')}}"></i> Block</button>
												<!-- <a href="" class="dropdown-item px-3" type="button"><i class="icon">
													<img src="{{asset('assets/img/icons/report.svg')}}"></i> Report</a> -->
							                </form>
										</div>
									</div>
								</div>
								<div class="text-xlight font-xlight mt-0 mb-2 font-sm-14">{{date('F j Y',strtotime($fans->created_at))}}</div>
								<p class="text-xlight font-light font-sm-14 mb-0">Location : {{$fans['user_details']->address}}</p>
							</div>
						</div>
					</div>
					@endforeach
			
				</div>
			</div>
		</section>
@endsection