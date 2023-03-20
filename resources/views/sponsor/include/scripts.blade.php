
    <script src="{{asset('student/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('student/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/acmeticker.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/fancybox.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/swiper-min.js')}}"></script>
    <script src="https://unpkg.com/swiper@6.6.2/swiper-bundle.min.js"></script>
    <script src="{{asset('student/assets_new/js/parallax-scroll.js')}}"></script>
    <script src="{{asset('student/assets_new/js/wow.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/custom.js')}}"></script>
    <script src="{{asset('student/assets_new/js/sweetalert.js')}}"></script>
    <script src="{{asset('student/assets_new/js/validate.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/validate.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('student/assets_new/js/chart.min.js')}}"></script>
	<script>
	$( document ).ready(function() {
		// alert('ready');
	});
	</script>
	
    {!! Toastr::message() !!}
<script>
            $('[data-step]').click(function(){
                var target_elem = $(this).data('step');
                $(this).closest('div[class*="step-"]').slideUp('fast');
                $('.'+target_elem).removeClass('d-none').slideDown('fast');
                console.log(target_elem);
            });
            $('.category-slider .inner span').each(function(){
                var elem_w = $(this).outerWidth();
                $(this).closest('.swiper-slide').width(elem_w+50+'px')
            });
            var swiper = new Swiper(".category-slider", {
                slidesPerView: '6',
                spaceBetween: 20,
                navigation: {
          nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
        },
      });

            var swiper = new Swiper(".slider-3col .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
                navigation: {
                    nextEl: '.swiper-arrow .next',
                    prevEl: '.swiper-arrow .prev',
                }
      });

            $(document).on("click", ".open-login", function () {
             var eventId = $(this).data('id');
             var plant = document.getElementById('user_type');
             plant.setAttribute('data-id',eventId);
});

            $(document).on("click", ".open-register", function () {
             var userType = $(this).data('id');
             var plant = document.getElementById('user_value');
             plant.setAttribute('value',userType);
});

    </script>
	
	
<!-- notification end -->
@stack('scripts')
