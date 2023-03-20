
@extends('sponsor.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3 mb-5">
					<h1 class="font-bold font-36 col-8 px-0 my-0">My Profile</h1>
				</div>
				<div class="border-bottom border-light d-flex align-items-center pb-5 mb-5">
					<div class="avatar lg">
						<div class="inner border-0">
								@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['business_logo'] != null)
								<img src="{{asset('sponsor/logo/' .$sponsor_profile['userdetails']['business_logo'])}}" class="image-fit">
								@else
								<img src="{{asset('student/assets_new/img/global.jpg')}}" class="image-fit">
								@endif
						</div>
					</div>
					<div class="pl-4 ml-2">
						<h4>Global Business</h4>
						<div class="text-xlight">Business Analytics</div>
					</div>
					<div class="ml-auto">
						<a href="" data-toggle="modal" data-target="#change-password" class="btn btn-line-white py-2 rounded-pill mr-md-4 mb-3 mb-md-0 px-4"><span class="py-1 d-block">Change Password</span></a>
						<a href="" data-toggle="modal" data-target="#edit-profile" class="btn btn-primary py-2 rounded-pill px-5"><span class="py-1 d-block">Edit Profile</span></a>
					</div>
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
								<td>{{date("M j Y",strtotime($sponsor_profile['created_at']))}}</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-4 text-center">
								@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['id_proof'] != null)
								<img src="{{asset('sponsor/id_proof/' .$sponsor_profile['userdetails']['id_proof'])}}" class="rounded-md" style="max-height: 200px;">
								@else
								<img src="{{asset('student/assets_new/img/profile-id.jpg')}}" class="rounded-md">
								@endif
					</div>
				</div>
			</div>
		</section>

		<div class="modal fade br" id="change-password" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('student/assets_new/img/icons/close.svg')}}">
					</button>
					<form id="sponsor-change-password" enctype="multipart/form-data">
						<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-3">
							<h3 class="font-bold text-center mt-4 mb-2">Change Password</h3>
						</div>
						<div class="modal-body col-sm-8 mx-auto pb-5">
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="Old Password*" name="sponsor_current_password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="New Password*" name="sponsor_new_password" id="sponsor_new_password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control rounded-pill p-4" placeholder="Confirm Password*" name="sponsor_confirm_password">
							</div>
							<div class="form-group d-flex align-items-center">
								<input class="form-control rounded-pill p-4" placeholder="Enter Captcha As Shown In Image*">
								<div class="captcha ml-4">
									<img src="{{asset('student/assets_new/img/captcha.png')}}" alt="captcha">
								</div>
							</div>
						</div>
						<div class="col-sm-8 mx-auto d-flex align-items-end pb-5">
							<button type="button" class="btn btn-primary btn-block py-1 rounded-pill sponsor-reset-submit"><span class="my-2 d-block">Save</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Profile -->
		<div class="modal fade br" id="edit-profile" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg modal-align-end mb-0 pt-2 d-flex h-100 mt-0" role="document">
				<div class="modal-content mt-md-5 rounded-lg">
					<button type="button" class="close tr" data-dismiss="modal" aria-label="Close">
						<img src="{{asset('student/assets_new/img/icons/close.svg')}}">
					</button>
					<div class="overflow-auto slim-scroll my-0 mr-2 mt-3 mb-3 h-100">
						<form class="d-flex flex-column h-100" method="POST" action="{{ route('sponsor_edit_profile')}}" enctype="multipart/form-data">
							@csrf
							<div class="heading text-dark text-center mx-auto w-75 px-5 mb-4 pt-1">
								<h3 class="font-bold text-center mt-4 mb-2">Edit Profile</h3>
							</div>
							<div class="modal-body col-sm-8 mx-auto pb-0 flex-fill">
								<div class="avatar xl mx-auto mb-4 d-table">
									<div class="inner">
										@if(isset($sponsor_profile['userdetails']) && $sponsor_profile['userdetails']['image'] != null)
										<img id="blahs" src="{{asset('profile_pic/' .$sponsor_profile['userdetails']['image'])}}">
										@else
										<img id="blahs"src="{{asset('assets/img/255x255.jpg')}}">
										@endif
										<span class="upload-icon">
											<img src="{{asset('student/assets_new/img/icons/edit-circle.svg')}}">
											<input accept="image/*" type="file" name="profile_pic" id="imgChange">
											<input type="hidden" name="images" value="{{isset($sponsor_profile['userdetails']['image'])?$sponsor_profile['userdetails']['image']:''}}">
										</span>
									</div>
								</div>
								<div class="row pt-4">
									  <div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" placeholder="First Name" value="{{$fname}}" name="fname">
										</div>
										<div class="form-group col-sm-6">
											<input class="form-control rounded-pill p-4 font-14 border-dark" value="{{$lname}}"
											placeholder="Last Name" name="lname">
										</div>
								</div>
								<div class="form-group mobile position-relative d-flex align-items-center">
									<div class="country border-right border-dark">
										<select class="d-inline border-0" name="phone_code">
											
											@foreach($country_code as $country)
											@if(isset($sponsor_profile['userdetails']['phone_code']))
											<option value="{{$country->phonecode}}" @if($country->phonecode==$sponsor_profile['userdetails']['phone_code']) selected @endif>+{{$country->phonecode}}</option>
											@else
											<option value="{{$country->phonecode}}">+{{$country->phonecode}}</option>
											@endif
											@endforeach
											

										</select>
									</div>
									<input class="form-control rounded-pill p-4 border-dark text-dark" placeholder="" value="{{isset($sponsor_profile['userdetails']['phone_no'])?$sponsor_profile['userdetails']['phone_no']:''}}" name="phone_no">
								</div>
								<div class="form-group">
									<input class="form-control rounded-pill p-4 border-dark text-dark" placeholder="Email*" value="{{$sponsor_profile['email']}}" readonly>
								</div>
								<button type="submit" class="btn btn-primary btn-block py-1 rounded-pill mt-5"><span class="my-2 d-block">Save</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection