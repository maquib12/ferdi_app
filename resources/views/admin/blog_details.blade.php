@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="sub-title">
              <h4 class="weight-500">Add New Blog</h4>
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
            <div class="card px-4">
              <form method="post" action="{{route('addBlog')}}" enctype="multipart/form-data">
                @csrf
								<div class="row mt-4">
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white">
                      <input type="file" id="upload-image-1" name="image_1" onchange="loadFile_one(event)">
                      <p><img id="output_one" class="bordered" style="max-height: 160px;" /></p>
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-1" role="button">Choose Image...</label>
                      <p class="my-0">Drag An Image File Here to add</p>
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white">
                      <input type="file" id="upload-image-2" name="image_2" onchange="loadFile_two(event)">
                      <p><img id="output_two" class="bordered" style="max-height: 160px;" /></p>
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-2" role="button">Choose Image...</label>
                      <p class="my-0">Drag An Image File Here to add</p>
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white">
                      <input type="file" id="upload-image-3" name="image_3" onchange="loadFile_three(event)">
                      <p><img id="output_three" class="bordered" style="max-height: 160px;" /></p>
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-3" role="button">Choose Image...</label>
                      <p class="my-0">Drag An Image File Here to add</p>
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white">
                      <input type="file" id="upload-image-4" name="image_4" onchange="loadFile_four(event)">
                      <p><img id="output_four" class="bordered" style="max-height: 160px;" /></p>
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-4" role="button">Choose Image...</label>
                      <p class="my-0">Drag An Image File Here to add</p>
                    </div>
                  </div>
									<div class="form-group col-sm-12">
										<label>Title</label>
										<input class="form-control lg rounded-pill" placeholder="Write Your Blog Title Here..." name="title" required="">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Video Link</label>
										<input class="form-control lg rounded-pill" placeholder="Add Video Link Here..." name="video_link">
									</div>
									<div class="col-sm-6 form-group px-3">
										<label>Contributor</label>
										<input class="form-control lg rounded-pill" name="contributor" placeholder="Add Contrubutor...">
									</div>
									<div class="form-group col-sm-12">
										Content
										<textarea class="form-control p-3 font-16" rows="12" placeholder="Write Content Here ..." name="content"></textarea>
									</div>
                </div>
								<div class="row mb-4 pb-3 mx-0">
									<a class="btn btn-secondary btn-lg rounded-pill col-sm-3 mr-3" href="{{route('blog_management')}}">Cancel</a>
									<input type="submit" class="btn btn-primary btn-block rounded-pill btn-lg col-sm-3" value="Save">
								</div>
              </form>
            </div>
          </div>
          <!-- content-wrapper ends -->
      </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
  var loadFile_one = function(event) {
    var image = document.getElementById('output_one');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_two = function(event) {
    var image = document.getElementById('output_two');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_three = function(event) {
    var image = document.getElementById('output_three');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_four = function(event) {
    var image = document.getElementById('output_four');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>