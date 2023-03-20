@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form action="{{route('faci_addModule')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
						<h3 class="pb-2 font-regular">Add Modules</h3>
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
							<label class="font-14 pb-1">Course name*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="course_id">
								<option disabled selected hidden>Select course name </option>
								@foreach($courses as $key => $course)
								<option value="{{$course['id']}}">{{$course['name']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Topic Name*</label>
							<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="Topic name" type="text" name="name" >
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course Level*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="level" >
								<option disabled selected hidden>Select Course Level</option>
								@foreach($stage_status as $k => $stage)
								<option value="{{$stage['id']}}">{{$stage['course_level']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Module Duration in hours:minutes*</label>
							<div class="form-control bg-dark border-dark border-0 rounded-pill p-0 d-flex align-items-center">
								<input class="font-16 text-xlight border-0 h-100 bg-transparent flex-fill px-4 font-18" placeholder="Enter Course Duration" type="text" name="duration" id="timepicker" value="00:00" readonly>
							</div>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Learning outcomes*</label>
							<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="outcomes" ></textarea>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">No of Lectures*</label>
							<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="No of Lectures" type="number" name="no_of_lecturs" >
						</div>
					</div>
					<div class="row pt-2">
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Module description*</label>
							<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="description" ></textarea>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Market overview of the course*</label>
							<textarea class="form-control bg-dark border-dark rounded-md p-4 font-14 text-white border-0 resize-none" rows="6" name="overview"></textarea>
						</div>
					</div>
					<div class="row pt-2">
						<div class="col-lg-12 d-flex multiVideo mb-4">
            				<div id="inputFormRow" class="flex-fill">
                				<div id="newRow"><div class="input-group mb-3">
                    				<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" type="text" name="links[]" class="form-control m-input" placeholder="Add Video Link" autocomplete="off">
                    				<div class="input-group-append mx-2">                
                        				<button id="removeRow" type="button" class="btn btn-danger rounded-xs"><i class="fas fa-times"></i></button>
                    				</div>
                				</div>
            				</div>
							</div>
            					<button id="addRow" type="button" class="btn btn-info rounded-xs"><i class="fas fa-plus"></i></button>
        					</div>
    					</div>
					<div class="row pt-2">
        			  <div class="col-lg-6">
						<label class="font-14 pb-1">Upload Image or Video</label>
						<div id="inputImage">
						<div class="bg-dark rounded-md">
							<div class="dragdrop mb-2 pt-4 d-flex justify-content-center align-items-center">
								<input id="upload_image" type="file" name="image[]" multiple="" accept="video/*,image/*" />
								<div id="imageName">Drop An Image & Video File Here</div>
							</div>
                    	</div>
						<div class="input-group-append d-flex justify-content-end mb-3">                
                        	<button id="removeImage" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>
                        	<button id="addRowImage" type="button" class="btn btn-info"><i class="fas fa-plus"></i></button>
                    	</div>
                    		<div id="newImage"></div>
            				
        				</div>
					</div>	
    				<div class="form-group col-sm-6 mb-4 pb-1">
						<label class="font-14 pb-1">Upload PDF</label>
						<div id="inputFormPDF">
						<div class="bg-dark rounded-md">
							<div class="dragdrop mb-2 pt-4 d-flex justify-content-center align-items-center">
								<input id="id_proof" type="file" name="pdf[]" multiple="" accept="application/pdf,application/vnd.ms-excel" />
								<div id="namePdf">Upload PDF</div>
							</div>
						</div>
						<div class="input-group-append">                
                        	<button id="removePDF" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>
            				<button id="addRowPDF" type="button" class="btn btn-info"><i class="fas fa-plus"></i></button>   
            			</div>
                    	<div id="newPDF"></div>

        				</div>
					</div>
<!-- 					<div class="pb-2">
						<a href="" class="text-primary text-underline-light">+ Add More Modules</a>
					</div> -->
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
        // add row
        $(document).on('click', '#addRow', function () {
            var html = '';
            html += '<div id="inputFormRow" class="addon">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="links[]" class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" placeholder="Add Video Link" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('.addon').remove();
        });

        $(document).on('click', '#addRowPDF', function () {
            var html = '';
            html += '<div id="inputFormPDF" class="addon">'
            html += '<div class="bg-dark rounded-md">';
            html += '<div class="dragdrop mb-4 pt-4 d-flex justify-content-center align-items-center">';
            html += '<input class="id_proof" type="file" name="pdf[]" multiple="" accept="application/pdf,application/vnd.ms-excel" />';
            html += '<div>Upload PDF</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="input-group-append"><button id="removePDF" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></div></div>';

            $('#newPDF').append(html);
        });
        $(document).on('click', '#removePDF', function () {
            $(this).closest('.addon').remove();
        });

        $(document).on('click', '#addRowImage', function () {
            var html = '';
            html += '<div id="inputImage" class="addon">'
            html += '<div class="bg-dark rounded-md">';
            html += '<div class="dragdrop mb-4 pt-4 d-flex justify-content-center align-items-center">';
            html += '<input id="upload_image" type="file" name="image[]" multiple="" accept="video/*,image/*" />';
            html += '<div>Drop An Image & Video File Here</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="input-group-append"><button id="removeImage" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></div></div>';

            $('#newImage').append(html);
        });
        $(document).on('click', '#removeImage', function () {
            $(this).closest('.addon').remove();
        });


   //      upload_image.onchange = evt => {
			// const [file] = upload_image.files
			// alert(file.name);
			// console.log(file.name);
			// if (file) {
			//   $('#imageName').html(file.name)
			// }
		 //  }
		   $(document).on('change', '#upload_image', function () {
            const [file] = upload_image.files
            // alert(file.name);
			// console.log(file.name);
			if (file) {
			  $('#imageName').html(file.name)
			}
        });

		$(document).on('change', '#id_proof', function () {
            const [file] = id_proof.files
			// console.log(file.name);
			if (file) {
			  $('#namePdf').html(file.name)
			}
        });

$(function () {
        $('#timepicker').timepicker({
            showMeridian: false,
            showInputs: true
        });
    });
    </script>
 @endsection