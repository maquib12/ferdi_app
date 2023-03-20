@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<nav>
							<ol class="breadcrumb h4">
								<li class="breadcrumb-item active">Add Sub Admin</li>
							</ol>
						</nav>
						<form method="post" action="{{route('addSubAdmin')}}" enctype="multipart/form-data"> 
							@csrf
						<div class="card py-4">
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
									<div class="col-sm-12 form-group px-3">
										<input type="text" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your First Name*" name="name">
									</div>
									<div class="col-sm-12 form-group px-3 pb-2">
										<input type="email" class="form-control lg rounded-pill border-dark text-black" placeholder="Enter Your Email*" name="email">
									</div>
									<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="country" id="country">
											<option>Choose Your Country</option>
											@foreach($countries as $key => $country)
											<option value="{{$country['id']}}">{{$country['name']}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-sm-6 form-group px-3">
										<select class="form-control lg rounded-pill border-dark text-black" name="city" id="city">
											<option>Choose Your City</option>
										</select>
									</div>
									<div class="col-sm-6 px-3">
										<a class="btn btn-secondary btn-block rounded-pill btn-lg" href="{{route('sub_admin')}}">Cancel</a>
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
			console.log(country);
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
		});
	});
</script>