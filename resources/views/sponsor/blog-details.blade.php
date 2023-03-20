@extends('sponsor.layout.master')
@section('content')
		<section class="pt-5">
			<div class="container">
				<div class="heading pb-3">
					<div class="text-uppercase text-info font-semibold mb-3 font-18">{{$blog->title}}</div>
					<h1 class="font-bold font-36 col-8 px-0 my-0">Start-Up Founder Mary-Brenda Shares How Learning Can Empower You To Discover A World Without Limits</h1>
					<div class="text-xlight mt-4">Last Updated: Mar 7, 2021 • 1 Min Read</div>
				</div>
				<div class="image overflow-hidden rounded-md mt-4">
					<img src="{{asset('blog_image/' .$blog->image_one)}}" class="image-fit">
				</div>
				<div class="content mt-5">
					<p>{{$blog->content}}</p>
				</div>
				<div class="border-light border-top border-bottom py-5 mt-5"></div>
			</div>
		</section>
@endsection