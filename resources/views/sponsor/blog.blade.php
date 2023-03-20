@extends('sponsor.layout.master')
@section('content')
		<section class="pt-5">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Blogs</h1>
				</div>
			</div>
		</section>
<section class="mb-5 pb-4">
			<div class="container pb-5 mb-5 pt-1">
				<!-- <div class="swiper-container category-slider text-center gray my-4">
					<span class="swiper-button-prev"></span>
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="width:150px"><div class="inner"><span>Agriculture</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:100px"><div class="inner"><span>Fishery</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:200px"><div class="inner"><span>Handyman</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:175px"><div class="inner"><span>Woodworker</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:150px"><div class="inner"><span>Garden Designer</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:100px"><div class="inner"><span>Landscaper</span><input type="checkbox"><em></em></div></div>
						<div class="swiper-slide" style="width:220px"><div class="inner"><span>Home Inspector</span><input type="checkbox"><em></em></div></div>
					</div>
					<span class="swiper-button-next"></span>
				</div> -->
				<div class="courses-list">
					@foreach($blog as $blogs)
					<div class="item py-4">
						<a href="{{url('blog_detail',$blogs->id)}}">
						<div class="row">
							<div class="col-sm-3 pb-md-2">
								<div class="image rounded-md overflow-hidden h-175 mb-md-4">
									<img src="{{asset('blog_image/' .$blogs->image_one)}}" class="image-fit">
								</div>
							</div>
							<div class="col-sm-9 d-flex flex-column mt-4 mt-md-0">
								<div class="border-bottom border-light flex-fill">
									<div class="text-uppercase text-info font-semibold mb-3 pb-1">{{$blogs->title}}</div>
									<h4 class="font-bold">{{$blogs->content}}</h4>
									<div class="font-12 text-xlight mt-4 mb-4 mb-md-0">Last Updated: {{ date('M d, y', strtotime($blogs->updated_at)) }}</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					@endforeach
				</div>
				{!! $blog->links() !!}
			</div>
		</section>
	@endsection