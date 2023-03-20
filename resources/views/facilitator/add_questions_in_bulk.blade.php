@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
			<div class="container">
					<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
						<h3 class="pb-2 font-regular">Add Bulk Questions</h3>
					</div>
					<div class="form-group col-sm-6 mb-4 pb-1">
						<a href=""><label class="font-14 pb-1">Import Format</label></a>
					</div>
					<form action="{{route('faci_add_bulk_questions')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-sm-6 mb-4 pb-1">
							<label class="font-14 pb-1">Upload File</label>
							<p></p>
							<input type="file" name="file">
							<input type="hidden" name="module_id" value="{{$modules->id}}">
							<input type="hidden" name="course_id" value="{{$modules->course_id}}">
						</div>
					<hr class="border-top border-xlight border-solid-2 my-4">
					<div class="action d-flex align-items-center mt-4 pt-2">
						<a href="{{url('facilitator/add_questions',$modules->id)}}" class="btn btn-transparent border py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Cancel</span></a>
						<button class="btn btn-primary py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Submit</span></button>
					</div>
				</form>
			</div>
		</section>
@endsection
