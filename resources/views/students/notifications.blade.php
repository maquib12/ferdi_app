@extends('students.layout.master')
@section('content')
		<section class="pt-5">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Notifications</h1>
				</div>
			</div>
		</section>
		<section class="mb-5 pb-4">
			<div class="container pb-5 mb-5 pt-1">
				<div class="card-list">
					@foreach($notification as $row)
					<div class="item py-3 my-3">
						<div class="row mx-0 position-relative">
							<div class="icon-70 overflow-hidden mr-md-3">
								<img src="assets/img/img-1.png" class="image-fit">
							</div>
							<div class="col d-md-flex align-items-start pr-md-0">
								<div class="flex-fill">
									<div class="font-semibold mb-1 pb-1">Admin Send You A New Message</div>
									<div class="font-12 lh-18 text-xlight">{{$row->message}}.</div>
								</div>
								<div class="font-12 text-light text-nowrap pt-1 ml-md-5"> {{date('d M Y', strtotime($row->created_at))}} AT {{date('H:i', strtotime($row->created_at))}}
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</section>
@endsection	