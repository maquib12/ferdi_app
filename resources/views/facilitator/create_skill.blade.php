@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form action="{{route('faci_addSkills')}}" method="post">
					@csrf
					<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
						<h3 class="pb-2 font-regular"> Create Skill Assessment for each course: Create Skill Assessment for course</h3>
						<p>(* marked are mandatory fields)</p>
					</div>
					<!-- @if (count($errors) > 0)
         		<div class = "alert alert-danger">
            	<ul>
               	@foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               	@endforeach
            	</ul>
         		</div>
      		@endif -->
      		
					<div class="row">
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Course name*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="course_id" required="" id="course_id">
								<option disabled selected hidden>Select course name </option>
								@foreach($courses as $key => $course)
								<option value="{{$course['id']}}">{{$course['name']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Number of test questions that will be shown to users*</label>
							<input class="form-control bg-dark border-dark rounded-pill p-4 font-14 text-white border-0" name="no_of_questions" placeholder="Number of test questions" type="number" min="10" max="30" name="test_question_number" required="">
						</div>
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Select module/topic name*</label>
							<select class="form-control bg-dark border-dark rounded-pill px-4 font-14 text-white border-0" name="level" id="module">
								<option disabled selected hidden>Select module/topic</option>
							</select>
						</div>
					</div>
					<hr class="border-top border-xlight border-solid-2 my-4">
					<div class="action d-flex align-items-center mt-4 pt-2">
						<a href="" class="btn btn-transparent border py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Cancel</span></a>
						<button class="btn btn-primary py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Submit</span></button>
					</div>
				</form>
			</div>
		</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#course_id').change(function(){
			var course_id = $(this).val();
			$.ajax({
				url : 'getModule/'+course_id,
				type : 'get',
				dataType : 'json',
				success: function(response){
					console.log(response);
					if(response){
						$("#module").empty();
						$("#module").append('<option value="">Select</option>');
						$.each(response,function(key,value){
							$("#module").append('<option value="'+key+'">'+value+'</option>');
						});
					}
					else{
						$("#module").empty();
					}
				}
			});
		});
	});
</script>