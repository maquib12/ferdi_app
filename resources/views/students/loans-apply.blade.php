
@extends('students.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<form method="post" action="{{route('loans-apply-post')}}">
				@csrf
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Loans Apply</h1>
				</div>
				<div class="bg-dark p-3 my-5 rounded-sm pb-5">
					<h4 class="text-center my-4">PLEASE SELECT LOAN AMOUNT</h4>
					<div class="col-sm-5 mx-auto">
						<h2 class="font-bold font-36 mt-5">$<span id="price">10,000</span></h2>
						<div class="price-slider mt-5">
							<input type="range" min="10000" max="1000000" value="10000" class="slider" data-target="#price" name="range" id="myRange">
							<input type="hidden" name="course_id" value="{{$id}}">
						</div>
						<textarea class="form-control rounded-sm p-3 mt-5" rows="3" placeholder="Type Your Message Here...." name="message"></textarea>
						<button type="submit" class="btn btn-primary btn-md rounded-pill col-sm-10 d-table mx-auto font-24 mt-5">NEXT</button>
					</div>
				</div>
			</div>
			</form>
		</section>
	
    <script src="{{asset('student/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/select-dropdown.js"></script>
    <script src="assets/js/acmeticker.min.js"></script>
    <script src="assets/js/fancybox.min.js"></script>
    <script src="assets/js/swiper-min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>
		<script>
			$('.price-slider').each(function(){
				var slider = $(this).find('.slider');
				var output = $(this).find('.slider').attr('data-target');
				$(output).html(ThousandSeparate(slider.val()));
				slider.on('input', function () {
					$(output).html(ThousandSeparate(slider.val()));
					console.log(ThousandSeparate(slider.val()));
					var matval = document.getElementById("myRange").value;
					

					var matNum = $("#myRange").val();
					console.log("======>",matNum)
				});

				function ThousandSeparate(val) {
						while (/(\d+)(\d{3})/.test(val.toString())){
							val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
						}
						return val;
				}
			});
		</script>
	@endsection