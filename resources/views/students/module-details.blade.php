@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
					<h1 class="pb-2 font-bold font-36">Module Details</h1>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-sm-6">
							<h4 class="font-semibold pb-2">Video's</h4>
							<ul class="list text-xlight font-xlight underline font-18 mb-5 pb-md-4">
								@if(isset($mod_detail->videos))
								@php
								$mod_videos = explode(",",$mod_detail->videos);
								$i=1;
								@endphp
								@foreach($mod_videos as $mv)
								<li><a href="{{$mv}}" target="_blank">Video {{$i++}}</a></li>
								@endforeach
								@endif
							</ul>
						</div>
						<div class="col-sm-6">
							<h4 class="font-semibold pb-2">Pdf's</h4>
							<ul class="list text-xlight font-xlight underline font-18 mb-5 pb-md-4">
								@if(isset($mod_detail->pdf))
								@php
								$mod_pdfs = explode(",",$mod_detail->pdf);
								$j=1;
								@endphp
								@foreach($mod_pdfs as $mp)
								<li><a href="{{url('/module_pdf').'/'.$mp}}" target="_blank">PDF {{$j++}}</a></li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>
					<a href="{{route('stu-skill-assessment',['id' => $mod_detail->id,'q_id' => 1])}}" class="btn btn-primary btn-block py-2 rounded-pill mt-4"><span class="d-block my-1">Skill Assessment</span></a>
				</div>
			</div>
		</section>
@endsection