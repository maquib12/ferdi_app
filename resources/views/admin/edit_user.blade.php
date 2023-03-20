@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<nav>
								<ol class="breadcrumb h4">
									<li class="breadcrumb-item"><a href="{{route('user_management')}}">All Users</a></li>
									<li class="breadcrumb-item"><a href="{{route('userDetails',['id' => $userDetail['id']])}}">User Details</a></li>
									<li class="breadcrumb-item active">Edit User Details</li>
								</ol>
							</nav>
							<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{ url()->previous() }}">Back</a>
						</div>
						<form method="post" action="{{route('edit_user')}}" enctype="multipart/form-data"> 
							@csrf
						<div class="card pb-5">
							<div class="p-4 d-flex align-items-center">
								<div class="avatar xl position-relative">
									<div class="inner">
										@if(isset($userDetail->userdetails) && $userDetail->userdetails->image != null)
											<img src="{{asset('profile_pic/' .$userDetail->userdetails->image)}}" class="bordered">
										@else
											<img src="{{asset('assets/images/faces/face1.jpg')}}" class="bordered">
										@endif
									</div>
									<div class="edit">
										<img src="{{asset('assets/images/icons/edit-circle-fill.svg')}}" alt="edit">
										@if(isset($userDetail->userdetails) && $userDetail->userdetails->image != null)
											<input type="file" name="profile_pic" value="{{$userDetail->userdetails->image}}">
											<input type="hidden" name="images" value="{{$userDetail->userdetails->image}}">
										@else
											<input type="file" name="profile_pic">
										@endif
									</div>
								</div>
							</div>
							@if (count($errors) > 0)
         						<div class = "alert alert-danger">
            						<ul>
               							@foreach ($errors->all() as $error)
                  							<li>{{ $error }}</li>
               							@endforeach
            						</ul>
         						</div>
      						@endif
							<div class="col-sm-7">
								<div class="row justify-content-between mx-n3">
									<div class="col-sm-6 form-group px-3">
										<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Name*" value="{{$userDetail->name}}" name="name">
									</div>
									<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="gender" placeholder="Enter Your Gender">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->gender == null)
												<option disabled selected hidden>Enter Your Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											@else
												@if($userDetail->userdetails->gender == 'male')
													<option value="{{$userDetail->userdetails->gender}}"><?php echo ucfirst($userDetail->userdetails->gender);?></option>
													<option value="female">Female</option>
												@endif
												@if($userDetail->userdetails->gender == 'female')
													<option value="{{$userDetail->userdetails->gender}}"><?php echo ucfirst($userDetail->userdetails->gender);?></option>
													<option value="male">Male</option>
												@endif
											@endif
										</select>
									</div>
									<div class="col-sm-12 form-group px-3">
										<div class="form-control lg rounded-pill border-dark d-flex p-0 text-black">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->phone_code == null)
												<input type="number" class="col-2 border-0 bg-transparent weight-600" value="" placeholder="" readonly="" id="phonecode">
											@else
												<input type="number" class="col-2 border-0 bg-transparent weight-600" value="{{$userDetail->userdetails->phone_code}}" placeholder="" readonly="" id="phonecode">
											@endif
											<div class="border-left border-dark my-2 ml-4">&nbsp;</div>
											@if(isset($userDetail->userdetails))
												<input type="number" class="flex-fill pl-4 border-0 bg-transparent" placeholder="Enter Your Phone Number*" value="{{$userDetail->userdetails->phone_no}}" name="phone_no">
											@else
												<input type="number" class="flex-fill pl-4 border-0 bg-transparent" placeholder="Enter Your Phone Number*" name="phone_no">
											@endif
										</div>
									</div>
									<div class="col-sm-12 form-group px-3 pb-2">
										<input type="email" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Email*" value="{{$userDetail->email}}" name="email" readonly>
									</div>
									<div class="col-sm-12 form-group px-3 pb-2">
										@if(isset($userDetail->userdetails))
											<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Address" value="{{$userDetail->userdetails->address}}" name="address">
										@else
											<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Address" name="address">
										@endif
									</div>
									<div class="col-sm-12 form-group px-3 pb-2">
										@if(isset($userDetail->userdetails))
											<input type="date" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Date of Birth*" value="{{$userDetail->userdetails->date_of_birth}}" name="dob" min="30-12-2015">
										@else
											<input type="date" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Date of Birth*" name="dob" min="30-12-2015">
										@endif
									</div>
									<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="country" id="country">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->country_id == null)
												<option>Choose Your Country</option>
											@else
												<option value="{{$userDetail->userdetails->country_id}}">{{$userDetail->userdetails->country->name}}</option>
											@endif
											@foreach($countries as $key => $country)
											<option value="{{$country['id']}}">{{$country['name']}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="city" id="city">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->city_id == null)
												<option>Choose Your City</option>
											@else
												<option value="{{$userDetail->userdetails->city_id}}">{{$userDetail->userdetails->city->name}}</option>
											@endif
										</select>
									</div>
									@if($userDetail->user_type_id == 5)
									<div class="col-sm-12 form-group px-3 pb-2">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->business_name == null)
												<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Business Name" name="business_name">
											@else
												<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Business Name" value="{{$userDetail->userdetails->business_name}}" name="business_name">
											@endif
									</div>
									@endif
									@if($userDetail->user_type_id == 5)
									<div class="col-sm-12 form-group px-3 pb-2">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->business_owner_name == null)
												<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Business Owner Name" name="business_owner_name">
											@else
												<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Business Owner Name" value="{{$userDetail->userdetails->business_owner_name}}" name="business_owner_name">
											@endif
									</div>
									@endif
									@if($userDetail->user_type_id == 5 || $userDetail->user_type_id == 3 || $userDetail->user_type_id == 4)
									<div class="col-sm-12 form-group px-3 pb-2">
										<select class="form-control lg rounded-pill border-dark text-black" name="business_industry" id="business_industry">
											@if(!isset($userDetail->userdetails) || $userDetail->userdetails->business_industry == null)
												<option disabled selected hidden>Choose Your Business Type</option>
											@else
												<option value="{{$userDetail->userdetails->business_industry_relation}}" disabled selected hidden>{{$userDetail->userdetails->business_industry_relation->business_name}}</option>
											@endif
											@foreach($business as $k => $b)
											<option value="{{$b['id']}}">{{$b['business_name']}}</option>
											@endforeach
										</select>
									</div>
									@endif
									@if($userDetail->user_type_id == 5)
									<div class="form-group col-sm-12">
										<div class="drag-box bg-white">
											@if(isset($userDetail->userdetails) && $userDetail->userdetails->business_logo != null)
												<input type="file" name="business_logo" id="upload-image" value="{{$userDetail->userdetails->business_logo}}">
												<img src="{{asset('business_logo/' .$userDetail->userdetails->business_logo)}}" class="bordered">
												<input type="hidden" name="business_logo_images" value="{{$userDetail->userdetails->business_logo}}">
											@else
												<input type="file" id="upload-image" name="business_logo">
											@endif
											<div class="mb-4">
												<!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
											</div>
											<label class="btn btn-primary mb-4 rounded-pill" for="upload-image" role="button">Choose Business Logo...</label>
											<p class="my-0">Drag An Image File Here to add Business Logo</p>
										</div>
									</div>
									@endif
									@if($userDetail->user_type_id == 5 || $userDetail->user_type_id == 3 || $userDetail->user_type_id == 4)
									<div class="form-group col-sm-12">
										<div class="drag-box bg-white py-3">
											@if(isset($userDetail->userdetails) && $userDetail->userdetails->id_proof != null)
												<input type="file" name="id_proof" value="{{$userDetail->userdetails->id_proof}}">
												<img src="{{asset('id_proof/' .$userDetail->userdetails->id_proof)}}" class="bordered" style="max-height:250px">
												<input type="hidden" name="id_proof_images" value="{{$userDetail->userdetails->id_proof}}">
											@else
												<input type="file" id="id_proof" name="id_proof">
											@endif
											<div class="mb-4">
												<!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
											</div>
											<label class="btn btn-primary mb-4 rounded-pill" for="id_proof" role="button">Choose ID Proof...</label>
											<p class="my-0">Drag An Image File Here to add ID Proof</p>
										</div>
									</div>
									@endif
									<input type="hidden" name="user_id" value="{{$userDetail['id']}}">
									<div class="col-sm-6 px-3">
										<a class="btn btn-secondary btn-block rounded-pill btn-lg" href="{{route('user_management')}}">Cancel</a>
									</div>
									<div class="col-sm-6 px-3">
										<input type="submit" class="btn btn-primary btn-block rounded-pill btn-lg" value="Save">
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#country').change(function(){
			var country = $(this).val();
			$.ajax({
				url : 'getCity/'+country,
				type : 'get',
				dataType : 'json',
				success: function(response){
					console.log(response);
					if(response){
						$("#city").empty();
						$("#city").append('<option>Choose Your City</option>');
						$.each(response,function(key,value){
							console.log(key,value);
							$("#city").append('<option value="'+key+'">'+value+'</option>');
						});
					}
					else{
						$("#city").empty();
					}
				}
			});
			$.ajax({
				url : 'getPhone/'+country,
				type : 'get',
				dataType : 'json',
				success: function(response){
					console.log(response[0]);
					if(response){
						$("#phonecode").empty();
						document.getElementById("phonecode").value = response[0];
					}
					else{
						$("#phonecode").empty();
					}
				}
			});
		});
	});
</script>