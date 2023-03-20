@extends('students.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Scoreboard</h1>
				</div>
				<div class="list no-last-border pt-5">
					<div class="item pb-4 border-bottom border-light mb-4">
						@foreach($ladderData as $data)
						@php
							$percentage_count = Helper::get_module_percentage($data->m_id);
						@endphp
						<div class="row mx-0 py-2">
							<div class="w175 mx-auto mx-md-0">
								<div class="image-md rounded-md overflow-hidden h105">
									<img src="{{url('/cover_pic').'/'.$data->images}}" class="image-fit">
								</div>
							</div>
							<div class="flex-fill pl-md-4">
								<div class="d-flex align-items-center pt-3 pt-md-1 pl-md-2">
									<div class="flex-fill">
										<div class="font-regular font-18 mb-2">{{$data->mname}}</div>
										<table  class="lh-30 font-18 font-sm-12 lh-sm-16">
											<tr>
												<td class="mb-3 text-xlight font-xlight">Course <span class="mx-2">:</span></td>
												<td>{{$data->name}}</td>
											</tr>
											<tr>
												<td class="mb-3 text-xlight font-xlight">Marks <span class="mx-2">:</span></td>
												<td>100/{{$percentage_count}}</td>
											</tr>
										</table>
									</div>
									<div class="font-18 font-sm-12 lh-sm-16 text-center">
										<img src="{{asset('assets/img/icons/arrow-right.svg')}}" class="mb-3">
										<div class="text-primary">{{$percentage_count}}% Score</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<!-- <div class="d-flex align-items-center py-3 py-md-4 border-top-dash font-sm-12">
					<div>Subtotal</div>
					<div class="ml-auto">$ 300</div>
				</div>
				<div class="d-flex align-items-center py-3 py-md-4 border-top-dash font-24 font-sm-14">
					<div>Total</div>
					<div class="ml-auto">$ 300</div>
				</div> -->
			</div>
		</section>
@endsection