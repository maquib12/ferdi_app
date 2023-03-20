
@extends('students.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Loan Application Form</h1>
				</div>
				<div class="d-flex my-4 py-4">
					<ul class="nav nav-pills arrow-tabs">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">EDI Forms 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">EDI Forms 2</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Loan Application Form</a>
						</li>
					</ul>
					<a href="" class="btn btn-default-outline d-flex align-items-center px-4 ml-auto">Save As Draft</a>
				</div>
				<h4>Personal Information</h4>
				<form action="{{route('loan-form1-post')}}" method="post" id="loan-form1">
					@csrf
					<div class="row">
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="first_name" placeholder="First Name*">
							<input type="hidden" name="loan_id" value="{{$id}}">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="last_name" placeholder="Last Name*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="other_name" placeholder="Other Name">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="gender" placeholder="Gender*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="state_of_origin" placeholder="State Of Origin*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="mobile_number" placeholder="Mobile Number*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="email" placeholder="Email*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="dob" placeholder="Date Of Birth (DD/MM/YY)*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="marital_status" >
								<option selected disabled value="">Marital Status*</option>
								<option value="married">Married</option>
								<option value="single">Single</option>
							</select>
						</div>
					</div>
					<div class="row my-4 py-2">
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="street_address" placeholder="Street Address*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="landmark" placeholder="Nearest Landmark*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="country" >
								<option selected disabled value="">Country*</option>
								<option value="1">India</option>
								<option value="2">USA</option>
								<option value="3">UK</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="state" >
								<option selected disabled value="">State*</option>
								<option value="1">Haryana</option>
								<option value="2">UP</option>
								<option value="3">UK</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 my-2">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="bvn" placeholder="Company Or Individual BVN (Bank Verification Number)*">
						</div>
						<div class="col-sm-6 my-2">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="government_id" >
								<option selected disabled value="">Select Type Of Government Issued ID That You Possessed*</option>
								<option value="1">Haryana</option>
								<option value="2">UP</option>
								<option value="3">UK</option>
							</select>
						</div>
						<div class="col-sm-6 my-2">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="id_number" placeholder="ID Number*">
						</div>
					</div>
					<div class="row mt-4 pt-2">
						<div class="col-sm-12 d-flex align-items-center my-3">
							<span class="text-xlight">Do You Have Any Educational Qualification?*</span>
							<label class="switch-primary ml-auto sm font-12 select-none">
								<span>No</span>
								<span>Yes</span>
								<input type="checkbox" class="d-none input checkClass" id="qualification" checked>
								<em></em>
							</label>
						</div>
						<div class="col-sm-6 my-2 pb-1 institute">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="institute_name" placeholder="Institute Name*">
						</div>
						<div class="col-sm-6 my-2 pb-1 qualification">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="qualification" placeholder="Qualification*">
						</div>
						<div class="col-sm-6 my-2 pb-1 course">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="course" placeholder="Course*">
						</div>
						<div class="col-sm-6 my-2 pb-1 date_awarded">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="date_awarded" placeholder="Date Awarded (DD/MM/YYYY)*">
						</div>
						<div class="col-sm-12 d-flex align-items-center my-3">
							<span class="text-xlight">Do you have a certificate(s) as proof of your training as stated above?</span>
							<label class="switch-primary ml-auto sm font-12 select-none">
								<span>No</span>
								<span>Yes</span>
								<input type="checkbox" id="certification" class="d-none input checkClass" checked>
								<em></em>
							</label>
						</div>
					</div>
					<div class="row mt-5 company_details">
						<div class="col-sm-12 mb-4">
							<h4>Company Details</h4>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="company_name" placeholder="Company/ Business Name*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="company_address" placeholder="Company/ Business Address*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="company_street_address" placeholder="Street Address*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="company_landmark" placeholder="Nearest Landmark*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="company_country">
								<option selected disabled value="">Country*</option>
								<option value="1">India</option>
								<option value="2">USA</option>
								<option value="3">UK</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="company_state">
								<option selected disabled value="">State*</option>
								<option value="1">Haryana</option>
								<option value="2">UP</option>
								<option value="3">UK</option>
							</select>
						</div>
					</div>
					<div class="row mt-4 pt-2">
						<div class="col-sm-12 d-flex align-items-center my-3">
							<span class="text-xlight">Do you belong to any recognize cooprative or trade association?*</span>
							<label class="switch-primary ml-auto sm font-12 select-none">
								<span>No</span>
								<span>Yes</span>
								<input type="checkbox" id="trade_association" class="d-none input checkClass" checked>
								<em></em>
							</label>
						</div>						
						<div class="col-sm-6 my-2 pb-1 association_name">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="name_of_association" placeholder="Name Of Association*">
						</div>
						<div class="col-sm-6 my-2 pb-1 association_address">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="address_of_association" placeholder="Address Of Association**">
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-sm-12">
							<h4>Business Assessment</h4>
							<h6 class="text-xlight mt-5 mb-0">SWOT ANALYSIS</h6>
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Strengths (Internal strengths of your business)</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="strength1" placeholder="Strength 1*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="strength2" placeholder="Strength 2*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="strength3" placeholder="Strength 3*">
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Opportunities (Market opportunities)</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="opportunity1" placeholder="Opportunity 1*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="opportunity2" placeholder="Opportunity 2*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="opportunity3" placeholder="Opportunity 3*">
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Weakness (Internal weakness of your business)</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="weakness1" placeholder="Weakness 1*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="weakness2" placeholder="Weakness 2*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="weakness3" placeholder="Weakness 3*">
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Threats (external threats of your business)</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="threats1" placeholder="Threats 1*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="threats2" placeholder="Threats 2*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="threats3" placeholder="Threats 3*">
						</div>
						<div class="col-sm-12 d-flex align-items-center mt-5 mb-3">
							<span class="text-xlight">Details of owner of the business*</span>
							<a href="javascript:void(0)" class="text-primary ml-auto font-18 font-semibold more_owner">+ ADD MORE OWNER</a>
						</div>
						<div class="name_of_owner row mx-0">
							<div class="col-sm-6 my-2 pb-1">
							  <input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="owner_name[]" placeholder="Name*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="owner_share[]" placeholder="Share Holding In %*">
							</div>
							
						</div>
						
						<div class="col-sm-12 d-flex align-items-center mt-5 mb-3">
							<span class="text-xlight">Details of manager of the business*</span>
							<a href="javascript:void(0)" class="text-primary ml-auto font-18 font-semibold more_manager">+ ADD MORE MANAGER</a>
						</div>
						<div class="add_manager row mx-0">
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="manager_name[]" placeholder="Name*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="manager_responsibility[]" placeholder="Area Of Responsibility*">
							</div>
						</div>
							
					</div>
					<div class="row mt-5">
						<div class="col-sm-12 mb-4">
							<h4>Preliminary Information</h4>
						</div>
						<div class="col-sm-6 my-2 pb-1 mr-md-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="sector_engaged">
								<option selected disabled value="">What Sector Are You Engaged In?*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="sub_sector" placeholder="What Sub-Sector Do You Operate In?*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="aspect" placeholder="What Aspect Do You Operate In?*">
						</div>
						<div class="col-sm-12 my-2 pb-1">
							<textarea class="form-control rounded-md bg-dark border-0 px-4 py-3 ph-gray text-white resize-none" rows="8" name="nature_of_your_business" placeholder="Kindly Provide A Brief Overview On The Nature Of Your Business*"></textarea>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="stage_of_business">
								<option selected disabled value="">Stage Of Your Business*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="totals_years" placeholder="Years Have You Been Operating*">
						</div>
					</div>
					<div class="row mt-5 pt-md-4">
						<div class="col-sm-3">
							<button class="btn btn-default-outline rounded-pill btn-block btn-md">Save As Draft</button>
						</div>
						<div class="col-sm-3">
							<button class="btn btn-primary rounded-pill btn-block btn-md">Save & Continue</button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<script src="{{asset('student/assets/js/jquery-3.5.1.min.js')}}"></script>
		<script type="text/javascript">
			$(".checkClass").on("change", function(){
				var isTrue = $('#qualification').is(":checked");
			    if(isTrue) {
			        $('.institute').show();
			        $('.qualification').show();
			        $('.course').show();
			        $('.date_awarded').show();
			    } else {
			        $('.institute').hide();
			        $('.qualification').hide();
			        $('.course').hide();
			        $('.date_awarded').hide();
			    }

			    var companyChecked = $('#certification').is(":checked");
			    if(companyChecked){
			    	
			    	$('.company_details').show();
			    }else{
			    	$('.company_details').hide();
			    }

			    var trade_association = $('#trade_association').is(":checked");
			    if(trade_association){
			    	
			    	$('.association_name').show();
			    	$('.association_address').show();
			    }else{
			    	$('.association_name').hide();
			    	$('.association_address').hide();
			    }
			});

			$(".more_owner").on("click", function(){
							$('.name_of_owner').append('<div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Name*" name="owner_name[]"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Share Holding In %*" name="owner_share[]"></div>');

			});

			$(".more_manager").on("click", function(){
				$('.add_manager').append('<div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Name*" name="manager_name[]"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Area Of Responsibility*" name="manager_responsibility[]"></div>');
				});
		</script>
@endsection