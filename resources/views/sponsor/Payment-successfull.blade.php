@extends('sponsor.layout.master')
@section('content')
		<section class="banner">
			<div class="container">
				<div class="card bg-blue p-4 rounded-md my-3 text-center">
					<div class="icon d-table mx-auto mb-4 pb-3 mt-3">
						<img src="{{asset('sponsor/assets_new/img/icons/tick-lg.svg')}}">
					</div>
					<h2 class="text-uppercase font-36 font-bold">Successful</h2>
					<div class="font-xlight col-sm-10 mx-auto mt-3 mb-1"><b>Transaction ID:</b> {{$payment->trans_id}}</div>
					<div class="font-xlight col-sm-10 mx-auto mb-1"><b>Email ID:</b> {{$payment->email}}</div>
					<div class="font-xlight col-sm-10 mx-auto mb-1"><b>Amount:</b> NGN {{$payment->amounts}}</div>
					<a href="{{route('student_home')}}" class="btn btn-primary btn-block py-2 rounded-pill mt-md-5 mb-4 col-sm-3 mx-auto"><span class="d-block my-1 font-regular">Back to Home</span></a>
				</div>
			</div>
		</section>
@endsection