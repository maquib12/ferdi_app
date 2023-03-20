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

imgInp.onchange = evt => {
	const [file] = imgInp.files
	if (file) {
	  blah.src = URL.createObjectURL(file)
	  $('#blah').attr('style', 'width: 250px;')
	}
  }

  imgChange.onchange = evt => {
	const [file] = imgChange.files
	console.log(file);
	if (file) {
		blahs.src = URL.createObjectURL(file)
	  $('#blahs').attr('style', 'width: -webkit-fill-available;')
	}
  }

 //  id_proof.onchange = evt => {
	// const [file] = id_proof.files
	// if (file) {
	// 	console.log(file.name);
	// 	console.log(nameOfPdf.src);
	//   $('#nameOfPdf').html('<div class="mb-4 pt-4"><input id="id_proof" type="file" value="" name="pdf" accept="application/pdf,application/vnd.ms-excel" /><div class="mt-2 mb-3 pb-1" id="nameOfPdf">'+file.name+'</div></div>')
	// }
 //  }

  function openModal(id){
	$('#deleteValue').val(id);
	
   $('#deleteModal').modal('show');
}

	var swiper = new Swiper(".slider-3col .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
				navigation: {
					nextEl: '.swiper-arrow .next',
					prevEl: '.swiper-arrow .prev',
				}
      });


 
