@extends('facilitator.include.master')
@section('content')

<section class="py-5">
			<div class="container">
				<form action="{{route('create-public-post')}}" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
						<h1 class="pb-2 font-bold font-36">Create Public Forum</h1>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<label class="font-light text-xlight pb-1">What would you like to write about today?</label>
							<div class="swiper-container category-slider mb-4">
								<span class="swiper-button-prev"></span>
								<div class="swiper-wrapper">
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Agriculture</span><input name="category[]" value="agriculture" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Fishery</span><input name="category[]" value="fishery" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:200px"><div class="inner"><span>Handyman</span><input name="category[]" value="handyman" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:175px"><div class="inner"><span>Woodworker</span><input name="category[]" value="woodworker" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Garden designer</span><input name="category[]" value="garden" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Landscaper</span><input name="category[]" value="landscaper" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Agriculture</span><input name="category[]" value="agriculture" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Fishery</span><input name="category[]" value="fishery" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:200px"><div class="inner"><span>Handyman</span><input name="category[]" value="handyman" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:175px"><div class="inner"><span>Woodworker</span><input name="category[]" value="woodworker" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Garden designer</span><input name="category[]" value="garden" type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Landscaper</span><input name="category[]" value="landscaper" type="checkbox"><em></em></div></div>
								</div>
								<span class="swiper-button-next"></span>
							</div>
						</div>
						<div class="form-group col-sm-12 mt-4">
							<input name = "title" class="h1 w-100 font-bold bg-transparent border-0 text-white ph-gray" placeholder="Write Your Forum Title Here...">
						</div>
						<div class="form-group col-sm-12 mt-4 mb-4 pb-1">
							<div class="bg-dark rounded-md">
								<div class="dragdrop mb-4 pt-4">
									<input accept="image/*" type="file" name="cover_pic" required="" id="imgInp">
									<div class="my-5 py-5">
										<div class="mt-2 mb-3 pb-1 imageSize"><img id="blah" src="{{asset('assets/img/icons/upload.svg')}}"  alt="your image"></div>
										<!-- <label class="btn btn-default-outline font-regular col-sm-3 mx-auto py-2 my-4"><span class="d-block my-1">Choose File...</span></label> -->
										<p class="mb-4 text-white font-xlight">Drop An Image File Here</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-12 mt-4 mb-4 pb-1">
							<textarea name="about" class="form-control bg-dark border-0 px-4 py-5 rounded-lg ph-gray" rows="18" placeholder="What you would like to write about today..."></textarea>
						</div>
						<div class="action col-sm-12 mt-2 d-flex align-items-center">
							<a href="{{route('forum')}}" class="btn btn-transparent border py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Cancel</span></a>
							<button type= "submit" class="btn btn-primary py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Submit</span></button>
						</div>
					</div>
				</form>
			</div>
		</section>

@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script>
	$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});


	

</script>
@endsection