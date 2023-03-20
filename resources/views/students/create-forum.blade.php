@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<form>
					<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
						<h1 class="pb-2 font-bold font-36">Create Forum</h1>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<label class="font-light text-xlight pb-1">What would you like to write about today?</label>
							<div class="swiper-container category-slider mb-4">
								<span class="swiper-button-prev"></span>
								<div class="swiper-wrapper">
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Agriculture</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Fishery</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:200px"><div class="inner"><span>Handyman</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:175px"><div class="inner"><span>Woodworker</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Garden designer</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Landscaper</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Agriculture</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Fishery</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:200px"><div class="inner"><span>Handyman</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:175px"><div class="inner"><span>Woodworker</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:150px"><div class="inner"><span>Garden designer</span><input type="checkbox"><em></em></div></div>
									<div class="swiper-slide" style="width:100px"><div class="inner"><span>Landscaper</span><input type="checkbox"><em></em></div></div>
								</div>
								<span class="swiper-button-next"></span>
							</div>
						</div>
						<div class="form-group col-sm-12 mt-4">
							<input class="h1 w-100 font-bold bg-transparent border-0 text-white ph-gray" placeholder="Write Your Forum Title Here...">
						</div>
						<div class="form-group col-sm-12 mt-4 mb-4 pb-1">
							<div class="bg-dark rounded-md">
								<div class="dragdrop mb-4 pt-4">
									<input type="file">
									<div class="my-5 py-5">
										<div class="mt-2 mb-3 pb-1"><img src="assets/img/icons/upload.svg"></div>
										<label class="btn btn-default-outline font-regular col-sm-3 mx-auto py-2 my-4"><span class="d-block my-1">Choose File...</span></label>
										<p class="mb-4 text-white font-xlight">Drop An Image File Here</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-12 mt-4 mb-4 pb-1">
							<textarea class="form-control bg-dark border-0 px-4 py-5 rounded-lg ph-gray" rows="18" placeholder="What you would like to write about today..."></textarea>
						</div>
						<div class="action col-sm-12 mt-2 d-flex align-items-center">
							<a href="" class="btn btn-transparent border py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Cancel</span></a>
							<button class="btn btn-primary py-1 rounded-pill my-2 mr-md-4 px-5"><span class="my-2 mx-4 d-block">Submit</span></button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>		
		<script>
			$('[data-step]').click(function(){
				var target_elem = $(this).data('step');
				$(this).closest('div[class*="step-"]').slideUp('fast');
				$('.'+target_elem).removeClass('d-none').slideDown('fast');
				console.log(target_elem);
			})
			$('.category-slider .inner span').each(function(){
				var elem_w = $(this).outerWidth();
				$(this).closest('.swiper-slide').width(elem_w+50+'px')
			});
			var swiper = new Swiper(".category-slider", {
				slidesPerView: 'auto',
				spaceBetween: 35,
				navigation: {
          nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
        },
      });
			function masonry(){
				$('.masonry-grid').masonry({
					itemSelector: '.grid-item',
				});
			}
			masonry();
			$('[data-sort="masonry"]').click(function(){
				setTimeout(function() {
					masonry();
				}, 400);
			});
		</script>
@endsection