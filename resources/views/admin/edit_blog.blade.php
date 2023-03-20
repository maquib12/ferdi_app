@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="sub-title">
              <?php 
                if((Auth::user()->user_type_id == 7 && (page_access_permission(15,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
              ?>
              <h4 class="weight-500">Edit Blog</h4>
              <?php }else{ ?>
              <h4 class="weight-500">View Blog</h4>
            <?php } ?>
            </div>
            <div class="card px-4">
              <?php 
                if((Auth::user()->user_type_id == 7 && (page_access_permission(15,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
              ?>
              <form method="post" action="{{route('editBlog')}}" enctype="multipart/form-data"><?php } ?>
                @csrf
                <div class="row mt-4">
                  <?php 
                    if((Auth::user()->user_type_id == 7 && (page_access_permission(15,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                  ?>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                      <!-- <div class="removeIcon" role="button" title="Delete" data-toggle="tooltip" data-placement="top" >
                        <img src="{{asset('assets/images/icons/remove.png')}}">
                      </div> -->
                      @if(isset($blog['image_one']) && $blog['image_one'] != null)
                        <input type="file" id="upload-image-1" name="image_1" value="{{$blog['image_one']}}" onchange="loadFile_one(event)">
                        <img src="{{asset('blog_image/' .$blog['image_one'])}}" class="bordered" style="max-height: 160px; display:block;" id="output_one">
                        <input type="hidden" name="image_one_edit" value="{{$blog['image_one']}}">
                      @else
                        <input type="file" id="upload-image-1" name="image_1" onchange="loadFile_one(event)">
                        <p><img id="output_one" class="bordered" style="max-height: 160px display:block;" /></p>
                      @endif
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-1" role="button">Choose Image...</label>
                      @if(isset($blog['image_one']) && $blog['image_one'] != null)
                      <div class="col-sm-6 px-3">
                        <input type="button" class="btn btn-primary btn-block rounded-pill btn-lg" name="image_1" value="Remove Image" onclick="remove_image_one()">
                        <input type="hidden" name="remove_image_1" id="remove_image_1" value="">
                      </div>
                      @endif
                      <!-- <p class="my-0">Drag An Image File Here</p> -->
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                      <!-- <div class="removeIcon" role="button" title="Delete" data-toggle="tooltip" data-placement="top" >
                        <img src="{{asset('assets/images/icons/remove.png')}}">
                      </div> -->
                      @if(isset($blog['image_second']) && $blog['image_second'] != null)
                        <input type="file" id="upload-image-2" name="image_2" value="{{$blog['image_second']}}" onchange="loadFile_two(event)">
                        <img src="{{asset('blog_image/' .$blog['image_second'])}}" class="bordered" style="max-height: 160px;display:block;" id="output_two">
                        <input type="hidden" name="image_second_edit" value="{{$blog['image_second']}}">
                      @else
                        <input type="file" id="upload-image-2" name="image_2" onchange="loadFile_two(event)">
                        <p><img id="output_two" class="bordered" style="max-height: 160px display:block;" /></p>
                      @endif
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-2" role="button">Choose Image...</label>
                      @if(isset($blog['image_second']) && $blog['image_second'] != null)
                      <div class="col-sm-6 px-3">
                        <input type="button" class="btn btn-primary btn-block rounded-pill btn-lg" name="image_2" value="Remove Image" onclick="remove_image_two()">
                        <input type="hidden" name="remove_image_2" id="remove_image_2" value="">
                      </div>
                      @endif
                      <!-- <p class="my-0">Drag An Image File Here</p> -->
                    </div>
                  </div>
                 <div class="form-group col-sm-6">
                    <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                      <!-- <div class="removeIcon" role="button" title="Delete" data-toggle="tooltip" data-placement="top" >
                        <img src="{{asset('assets/images/icons/remove.png')}}">
                      </div> -->
                      @if(isset($blog['image_third']) && $blog['image_third'] != null)
                        <input type="file" id="upload-image-3" name="image_3" value="{{$blog['image_third']}}" onchange="loadFile_three(event)">
                        <img src="{{asset('blog_image/' .$blog['image_third'])}}" class="bordered" style="max-height: 160px; display:block;" id="output_three">
                        <input type="hidden" name="image_third_edit" value="{{$blog['image_third']}}">
                      @else
                        <input type="file" id="upload-image-3" name="image_3" onchange="loadFile_three(event)">
                        <p><img id="output_three" class="bordered" style="max-height: 160px display:block;" /></p>
                      @endif
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-3" role="button">Choose Image...</label>
                      @if(isset($blog['image_third']) && $blog['image_third'] != null)
                      <div class="col-sm-6 px-3">
                        <input type="button" class="btn btn-primary btn-block rounded-pill btn-lg" name="image_3" value="Remove Image" onclick="remove_image_three()">
                        <input type="hidden" name="remove_image_3" id="remove_image_3" value="">
                      </div>
                      @endif
                      <!-- <p class="my-0">Drag An Image File Here</p> -->
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                      <!-- <div class="removeIcon" role="button" title="Delete" data-toggle="tooltip" data-placement="top" >
                        <img src="{{asset('assets/images/icons/remove.png')}}">
                      </div> -->
                      @if(isset($blog['image_fourth']) && $blog['image_fourth'] != null)
                        <input type="file" id="upload-image-4" name="image_4" value="{{$blog['image_fourth']}}" onchange="loadFile_four(event)">
                        <img src="{{asset('blog_image/' .$blog['image_fourth'])}}" class="bordered" style="max-height: 160px; display:block;" id="output_four">
                        <input type="hidden" name="image_fourth_edit" value="{{$blog['image_fourth']}}">
                      @else
                        <input type="file" id="upload-image-4" name="image_4" onchange="loadFile_four(event)">
                        <p><img id="output_four" class="bordered" style="max-height: 160px display:block;" /></p>
                      @endif
                      <div class="mb-4">
                        <!-- <img src="{{asset('assets/images/photo.svg')}}" width="100"> -->
                      </div>
                      <label class="btn btn-primary mb-4 rounded-pill" for="upload-image-4" role="button">Choose Image...</label>
                      @if(isset($blog['image_fourth']) && $blog['image_fourth'] != null)
                      <div class="col-sm-6 px-3">
                        <input type="button" class="btn btn-primary btn-block rounded-pill btn-lg" name="image_4" value="Remove Image" onclick="remove_image_four()">
                        <input type="hidden" name="remove_image_4" id="remove_image_4" value="">
                      </div>
                      @endif
                      <!-- <p class="my-0">Drag An Image File Here</p> -->
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <input class="form-control lg rounded-pill" placeholder="Write Your Blog Title Here..." name="title" value="{{$blog['title']}}" readonly="">
                  </div>
                  <div class="col-sm-6 form-group px-3">
                    <label>Video Link</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['video_link']}}">
                  </div>
                  <div class="col-sm-6 form-group px-3">
                    <label>Contributor</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['contributor']}}">
                  </div>
                  <div class="form-group col-sm-12">
                    Content
                    <textarea class="form-control p-3 font-16" rows="12" placeholder="What you would like to write ..." name="content">{{$blog['content']}}</textarea>
                  </div>
                  <div class="col-sm-12 form-group px-3">
                    <label>Author</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['owner']['name']}}" readonly="">
                  </div>
                  <input type="hidden" name="blog_id" value="{{$blog['id']}}">
                </div>
                <div class="row mb-4 pb-3 mx-0">
                  <a class="btn btn-secondary btn-lg rounded-pill col-sm-3 mr-3" href="{{route('blog_management')}}">Cancel</a>
                  <input type="submit" class="btn btn-primary btn-block rounded-pill btn-lg col-sm-3" value="Save">
                </div>
              </form>
            <?php }else{  ?>
              <div class="form-group col-sm-6">
                <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                  @if(isset($blog['image_one']) && $blog['image_one'] != null)
                    <img src="{{asset('blog_image/' .$blog['image_one'])}}" class="bordered" style="max-height: 160px;" id="output_one">
                  @else
                    <p><img id="output_one" class="bordered" style="max-height: 160px;" /></p>
                  @endif
                </div>
              </div>
              <div class="form-group col-sm-6">
                <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                  @if(isset($blog['image_second']) && $blog['image_second'] != null)
                    <img src="{{asset('blog_image/' .$blog['image_second'])}}" class="bordered" style="max-height: 160px;" id="output_two">
                  @else
                    <p><img id="output_one" class="bordered" style="max-height: 160px;" /></p>
                  @endif
                </div>
              </div>
              <div class="form-group col-sm-6">
                <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                  @if(isset($blog['image_third']) && $blog['image_third'] != null)
                    <img src="{{asset('blog_image/' .$blog['image_third'])}}" class="bordered" style="max-height: 160px;" id="output_three">
                  @else
                    <p><img id="output_three" class="bordered" style="max-height: 160px;" /></p>
                  @endif
                </div>
              </div>
              <div class="form-group col-sm-6">
                <div class="drag-box bg-white py-4 h-100 d-flex flex-column align-items-center justify-content-center">
                  @if(isset($blog['image_fourth']) && $blog['image_fourth'] != null)
                    <img src="{{asset('blog_image/' .$blog['image_fourth'])}}" class="bordered" style="max-height: 160px;" id="output_four">
                  @else
                    <p><img id="output_four" class="bordered" style="max-height: 160px;" /></p>
                  @endif
                </div>
              </div>
                  <div class="form-group col-sm-12">
                    <input class="form-control lg rounded-pill" placeholder="Write Your Blog Title Here..." name="title" value="{{$blog['title']}}" readonly="">
                  </div>
                  <div class="col-sm-6 form-group px-3">
                    <label>Video Link</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['video_link']}}" readonly="">
                  </div>
                  <div class="col-sm-6 form-group px-3">
                    <label>Contributor</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['contributor']}}" readonly="">
                  </div>
                  <div class="form-group col-sm-12">
                    Content
                    <textarea class="form-control p-3 font-16" rows="12" placeholder="What you would like to write ..." name="content" readonly="">{{$blog['content']}}</textarea>
                  </div>
                  <div class="col-sm-12 form-group px-3">
                    <label>Author</label>
                    <input class="form-control lg rounded-pill" value="{{$blog['owner']['name']}}" readonly="">
                  </div>
            <?php } ?>
            </div>
          </div>
          <!-- content-wrapper ends -->
      </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
  function remove_image_one(){
    document.getElementById("output_one").style.display="none"; 
    document.getElementById('remove_image_1').value = 'remove_image_1';
  }
  function remove_image_two(){
    document.getElementById("output_two").style.display="none"; 
    document.getElementById('remove_image_2').value = 'remove_image_2';
  }
  function remove_image_three(){
    document.getElementById("output_three").style.display="none"; 
    document.getElementById('remove_image_3').value = 'remove_image_3';
  }
  function remove_image_four(){
    document.getElementById("output_four").style.display="none"; 
    document.getElementById('remove_image_4').value = 'remove_image_4';
  }
  var loadFile_one = function(event) {
    console.log('a');
    document.getElementById("output_one").style.display="block"; 
    var image = document.getElementById('output_one');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_two = function(event) {
    document.getElementById("output_two").style.display="block"; 
    var image = document.getElementById('output_two');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_three = function(event) {
    document.getElementById("output_three").style.display="block"; 
    var image = document.getElementById('output_three');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile_four = function(event) {
    document.getElementById("output_four").style.display="block"; 
    var image = document.getElementById('output_four');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>