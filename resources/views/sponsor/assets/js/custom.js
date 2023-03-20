$('[data-toggle="tooltip"]').tooltip()
new WOW().init();
$('.ticker ul').AcmeTicker({
	type:'typewriter',/*horizontal/horizontal/Marquee/type*/
	direction: 'right',/*up/down/left/right*/
	speed:50,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
	controls: {
			prev: $('.acme-news-ticker-prev'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
			toggle: $('.acme-news-ticker-pause'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
			next: $('.acme-news-ticker-next')/*Can be used for horizontal/horizontal/marquee/typewriter*/
	}
});

$('.testimonials .swiper-container').each(function(){
	var left_arrow = $(this).find('.controls .swiper-button-prev');
	var right_arrow = $(this).find('.controls .swiper-button-next');
	const swiper = new Swiper('.testimonials .swiper-container', {
		loop: false,
		pagination: {
			el: '.testimonials .swiper-pagination',
		},
		navigation: {
			nextEl: '.controls .swiper-button-next',
			prevEl: '.controls .swiper-button-prev',
		}
	});
});
$('.testimonials .controls').each(function(){
	$(this).prependTo($(this).closest('.bg-dark'))
});
$('[data-more]').click(function(){
	$(this).hide();
	var target_elem = $(this).data('more');
	$(this).parent().find(target_elem).removeClass('d-none');
});
$('.edit-opt').click(function(){
	var value = $(this).parent().find('.form-control').val();
	$(this).parent().find('.form-control').focus().val('').val(value);
});

$('[data="toggle"]').click(function(){
	var hide_elem = $(this).data('hide');
	var show_elem = $(this).data('show');
	$(hide_elem).addClass('d-none');
	$(show_elem).removeClass('d-none');
});

$('.progress.label .progress-bar').each(function(){
	if($(this).attr('data-value')>=55){
		var w = $(this).find('.cent').outerWidth();
		$(this).find('.cent').css('margin-left','-'+w+'px')
	}
});