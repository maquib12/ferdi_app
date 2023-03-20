@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form action="{{route('faci_createCourse')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
						<h3 class="pb-2 font-regular">Course Info</h3>
						<p>(* marked are mandatory fields)</p>
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
      		@if(isset($message))
      		<div class = "alert alert-danger">{{$message}}</div>
      		@endif
      		@if(isset($success_message))
      		<div class = "alert alert-success">{{$success_message}}</div>
      		@endif
					<div class="row">
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Business Type*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="category" required="">
								<option disabled selected hidden>Select Business Category</option>
								@foreach($categories as $key => $category)
								<option value="{{$category['id']}}">{{$category['category_name']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course Title*</label>
							<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="Course name" type="text" name="name" required="">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course Language*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="language" required="">
								<option disabled selected hidden>Select Language</option>
								@foreach($languages as $k => $language)
								<option value="{{$language['id']}}">{{$language['language']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Price*</label>
							<div class="form-control bg-dark border-dark border-0 rounded-pill p-0 d-flex align-items-center">
								<span class="px-4 h-100 d-flex align-items-center border-right border-xlight ml-2 h4 my-0 text-xlight">₦</span>
								<input class="font-16 text-xlight border-0 h-100 bg-transparent flex-fill px-4 font-18" value="0" name="price" type="number" required="">
							</div>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course Description*</label>
							<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="description" required=""></textarea>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Upload Video & Images(Cover Photo)*</label>
							<div class="bg-dark rounded-md">
								<div class="dragdrop mb-4 pt-4">
									<input accept="image/*" type="file" name="cover_pic" required="" id="imgInp">
									<div class="mt-2 mb-3 pb-1 imageSize2"><img id="blah"  src="{{asset('assets/img/icons/upload.svg')}}"></div>
									<p class="mb-3 text-secondary font-12">Drop An Image & Video File Here</p>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="heading border-bottom border-xlight border-solid-2 mt-2 mb-4 pb-1">
						<h4 class="pb-2 font-regular">Add Modules</h4>
					</div>
					<div class="swiper-container category-slider mb-4">
						<span class="swiper-button-prev"></span>
						<div class="swiper-wrapper">
							<div class="swiper-slide" style="width:150px"><div class="inner"><span>Business Analysis</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:100px"><div class="inner"><span>Business Management</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:200px"><div class="inner"><span>Teaches Sales and Persuasion</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:175px"><div class="inner"><span>Teaches Voice Acting</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:150px"><div class="inner"><span>Business Analysis</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:100px"><div class="inner"><span>Business Management</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:220px"><div class="inner"><span>Teaches Sales and Persuasion</span><input type="checkbox"><em></em></div></div>
							<div class="swiper-slide" style="width:150px"><div class="inner"><span>Teaches Voice Acting</span><input type="checkbox"><em></em></div></div>
						</div>
						<span class="swiper-button-next"></span>
					</div> -->
					<div class="row pt-2">
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Total No. Of module/topics included in the course*</label>
							<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" type="number" placeholder="Enter total no of Modules" name="no_of_modules" required="">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course Duration in hours:minutes*</label>
							<div class="form-control bg-dark border-dark border-0 rounded-pill p-0 d-flex align-items-center">
								<input class="font-16 text-xlight border-0 h-100 bg-transparent flex-fill px-4 font-18" placeholder="Enter Course Duration" type="text" name="duration" required="" id="timepicker" value="00:00" readonly>
							</div>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">The financial rewards at the end of Years 1,2 and 3 for each Course Description*</label>
							<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="3" name="rewards" required=""></textarea>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Upload PDF</label>
							<div class="bg-dark rounded-md">
								<div class="dragdrop mb-4 pt-4">
									<input id="id_proof" type="file" value="" name="pdf" accept="application/pdf,application/vnd.ms-excel" />
									<div class="mt-2 mb-3 pb-1" id="nameOfPdf">Upload PDF</div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Add Skills*</label>
								<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" type="text" placeholder="Add Skills" name="skills" required="">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Learning objectives*</label>
								<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" type="text" placeholder="Enter Learning objectives*" name="learning_objectives" required="">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">The expected study time and time spent for internship*</label>
								<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="study_time" required=""></textarea>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
								<label class="font-14 pb-1">Market overview of the course*</label>
								<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="overview" required=""></textarea>
						</div>
					</div>
					<div class="pb-2">
						<a href="{{route('faci_add_module')}}" class="text-primary text-underline-light">+ Add More Modules</a>
					</div>
					<hr class="border-top border-xlight border-solid-2 my-4">
					<div class="action d-flex align-items-center mt-4 pt-2">
						<a href="{{url()->previous()}}" class="btn btn-transparent border py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Cancel</span></a>
						<button class="btn btn-primary py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Submit</span></button>
					</div>
				</form>
			</div>
		</section>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
$(function () {
        $('#timepicker').timepicker({
            showMeridian: false,
            showInputs: true
        });
    });

 $(document).on('change', '#id_proof', function () {
            const [file] = id_proof.files
            // alert(file.name);
			// console.log(file.name);
			if (file) {
			  $('#nameOfPdf').html(file.name)
			}
        });

</script>
@endsection