
@extends('sponsor.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="border-bottom border-light d-flex align-items-center pb-5 mb-5">
					<div class="avatar lg">
						<div class="inner border-0">
							@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['business_logo'] != null)
								<img src="{{asset('sponsor/logo/' .$sponsor_profile['userdetails']['business_logo'])}}" class="rounded-md">
								@else
								<img src="{{asset('student/assets_new/img/global.jpg')}}" class="image-fit">
								@endif
						</div>
					</div>
					<div class="pl-4 ml-2">
						<h4>{{$sponsor_profile['userdetails']['business_name']}}</h4>
						<div class="text-xlight">Business Analytics</div>
					</div>
					<div class="btn-warning-outline no-hover btn-lg font-16 py-3 px-4 ml-auto"><span class="mx-2">In-Progress</span></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<table>
							<tr>
								<td class="text-xlight pb-4">Name</td>
								<td class="px-5 text-xlight">:</td>
								<td>{{$sponsor_profile['name']}}</td>
							</tr>
							<tr>
								<td class="text-xlight pb-4">Mobile Number</td>
								<td class="px-5 text-xlight">:</td>
								<td>+{{$sponsor_profile['userdetails']['phone_code']}} {{$sponsor_profile['userdetails']['phone_no']}}</td>
							</tr>
							<tr>
								<td class="text-xlight pb-4">Email ID</td>
								<td class="px-5 text-xlight">:</td>
								<td>{{$sponsor_profile['email']}}</td>
							</tr>
							<tr>
								<td class="text-xlight pb-4">Applied On</td>
								<td class="px-5 text-xlight">:</td>
								<td>Mar 2, 2021</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-4">
						@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['id_proof'] != null)
								<img src="{{asset('sponsor/id_proof/' .$sponsor_profile['userdetails']['id_proof'])}}" class="rounded-md">
								@else
								<img src="{{asset('student/assets_new/img/profile-id.jpg')}}" class="rounded-md">
								@endif
					</div>
				</div>
			</div>
		</section>
@endsection	
		
		