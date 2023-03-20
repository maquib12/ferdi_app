@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title d-flex align-items-center justify-content-between mb-3">
							<h4 class="weight-500 my-0 flex-fill">Course Details</h4>
							<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{ url()->previous() }}">Back</a>
						</div>
						<div class="card px-4">
<!-- 							<form action="{{route('add_cms')}}" method="post" enctype="multipart/form-data" class="mt-4 row">
								@csrf -->
								<div class="row">
									<div class="forn-group col-sm-12 my-3 text-center">
										@if($course->images != null)
											<img src="{{asset('cover_pic/' .$course->images)}}" class="bordered rounded-lg mw-100">
										@else
											<img src="{{asset('assets/images/faces/course.jpg')}}" class="bordered rounded-lg mw-100">
										@endif
									</div>
									<div class="form-group col-sm-12">
										<input class="form-control lg rounded-pill" placeholder="Write Your Title Here..." name="title" value="{{$course['name']}}" readonly="">
									</div>
									<!-- <div class="form-group col-sm-12">
										<div class="drag-box bg-white">
											<input type="file" id="upload-image" name="image">
											<div class="mb-4">
											</div>
											<label class="btn btn-primary mb-4 rounded-pill" for="upload-image" role="button">Choose File...</label>
											<p class="my-0">Drag An Image File Here</p>
										</div>
									</div> -->
									<div class="col-sm-6 form-group px-3">
										<label>Category</label>
										<input class="form-control lg rounded-pill" value="{{$course->category->category_name}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Language</label>
										<input class="form-control lg rounded-pill" value="{{$course->language->language}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Price(₦)</label>
										<input class="form-control lg rounded-pill" value="{{$course->price}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Total No. Of module</label>
										<input class="form-control lg rounded-pill" value="{{$course->total_no_of_module}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Video Link</label>
										<input class="form-control lg rounded-pill" value="{{$course->videos}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Course Duration</label>
										<input class="form-control lg rounded-pill" value="<?php echo gmdate("H:i:s",$course->course_duration_in_hours) ?>" readonly="">
									</div>
									<div class="form-group col-sm-12">
										Description
										<textarea class="form-control p-3 font-16" rows="12" placeholder="What you would like to write ..." name="description" readonly="">{{$course['description']}}</textarea>
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>Learning objectives</label>
										<input class="form-control lg rounded-pill" value="{{$course->learning_objects}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Created By</label>
										<input class="form-control lg rounded-pill" value="{{$course->createdBy->name}}" readonly="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Created at</label>
										<input class="form-control lg rounded-pill" value="<?php echo date("d-m-Y", strtotime($course->created_at));?>" readonly="">
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>PDF</label>
										<p><a href="{{route('download_course_pdf',['id'=>$course->id])}}">{{$course->course_pdf}}</a></p>
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>Market overview of the course</label>
										<textarea class="form-control p-3 font-16" rows="12" placeholder="Market overview of the course" name="market_overview" readonly="" >{{$course->market_overview}}</textarea>
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>The expected study time </label>
										<textarea class="form-control p-3 font-16" rows="12" placeholder="The expected study time" name="time_spent_for_internship" readonly="" >{{$course->time_spent_for_internship}}</textarea>
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>The financial rewards at the end of Years </label>
										<textarea class="form-control p-3 font-16" rows="12" placeholder="The financial rewards at the end of Years" name="financial_rewards" readonly="" >{{$course->financial_rewards}}</textarea>
									</div>
									<div class="col-sm-12 form-group px-3">
										<label>Skills</label>
										<input class="form-control lg rounded-pill" value="{{$course->add_skills}}" readonly="">
									</div>
									<div class="form-group col-sm-6">
										<a class="btn btn-secondary btn-lg rounded-pill col-sm-5" href="{{route('course_management')}}">Cancel</a>
									</div>
								</div>
<!-- 							</form> -->
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection