@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Content Management System</h4>
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
						<div class="card bg-transparent shadow-none px-0">
							<form action="{{route('add_cms')}}" method="post" enctype="multipart/form-data" class="mt-4 row">
								@csrf
								<div class="form-group col-sm-12">
									<input class="form-control title lg" placeholder="Write Your Title Here..." name="title">
								</div>
								<div class="form-group col-sm-12">
									<div class="drag-box bg-white">
										<input type="file" id="upload-image" name="image">
										<div class="mb-4">
											<!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
										</div>
										<label class="btn btn-primary mb-4 rounded-pill" for="upload-image" role="button">Choose File...</label>
										<p class="my-0">Drag An Image File Here</p>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<input class="form-control title lg" placeholder="Video Link-Youtube link" name="link">
								</div>
								<div class="form-group col-sm-12">
									<select class="form-control lg rounded-pill border-dark text-black" name="application">
										<option>Select Application</option>
										@foreach($applications as $key=> $application)
										<option value="{{$application['id']}}">{{$application['applications']}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-sm-12">
									<textarea class="form-control p-4" rows="12" placeholder="What you would like to write ..." name="description"></textarea>
								</div>
								<div class="form-group col-sm-6">
									<a class="btn btn-secondary btn-lg rounded-pill col-sm-5" href="{{route('cms_list')}}">Cancel</a>
									<input type="submit" class="btn btn-primary btn-lg rounded-pill col-sm-5" value="Submit">
								</div>
							</form>
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection