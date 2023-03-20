@extends('facilitator.include.master')
@section('content')
		<section class="py-5">
		<!-- 	<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v14.0" nonce="ssHuiSdO"></script> -->

			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
					<h1 class="pb-2 font-bold font-36">Refer &amp; Earn</h1>
				</div>
				<div class="row">
					<div class="col-sm-7 pr-md-5 border-right border-xSolid border-primary">
						<div class="mr-md-3">
							<h4>Share Your Unique Invite Link</h4>
							<input type="hidden" id="share" value="{{$referalCode->email}}">
							<p class="text-xlight font-xlight mt-3 mb-4 pb-2">Lorem Ipsum Is Simply Text Of The Printing IN IPSUM Typesettin Industry.</p>
							<div class="d-flex bg-dark rounded-sm rounded-sm overflow-hidden share_url_wrap">
								<div class="link d-flex align-items-center pl-4 text-xlight share_url_div"><input type="text" id="share_url" class="border-0 bg-transparent w-100" value="https://quytech.net/ferdi_app/public/refer?ref={{$referalCode->referal_code}}" class="url_link" readonly></div>
								<button  class="btn btn-primary rounded-0 px-4 py-2 text-uppercase font-18 ml-auto cToCb">COPY TO LINK</button>
							</div>
						</div>
						<div class="border-bottom border-xlight border-solid-2 mr-md-3 my-4 py-1"></div>
						<div class="d-flex align-items-center pt-2 mr-md-3">
							<h5>Share The Referral Link On</h5>
							<div class="d-flex ml-auto">
								<a id ="shareWithMail" class="bg-dark p-2 rounded-sm d-flex align-items-center ml-3 icon ease"><img src="{{asset('assets/img/icons/mail.svg')}}"></a>
								<a id ="shareWithMessenger" class="bg-dark p-2 rounded-sm d-flex align-items-center ml-3 icon ease"><img src="{{asset('assets/img/icons/messenger.svg')}}"></a>
								<a id ="shareWithWhatsapp" class="bg-dark p-2 rounded-sm d-flex align-items-center ml-3 icon ease"><img src="{{asset('assets/img/icons/phone-call.svg')}}"></a>
							</div>
						</div>
						<!-- <div class="fb-share-button" data-href="https://quytech.net/ferdi_app/public/refer?ref={{$referalCode->referal_code}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://quytech.net/ferdi_app/public/refer?ref={{$referalCode->referal_code}}" class="fb-xfbml-parse-ignore">Share</a></div> -->
					</div>
					<div class="col-sm-5 d-flex align-items-center pl-md-4">
						<div class="bg-primary px-4 py-3 rounded-md bg-rounded overflow-hidden position-relative ml-md-5 flex-fill">
							<div class="position-relative">
								<h5 class="font-bold ferdi-bLine pr-2 pb-3 mb-4">ferdi</h5>
								<h4 class="font-bold text-uppercase">Refer &amp; Earn</h4>
								<div class="d-flex align-items-center ba-sm-line">
									<span class="mx-3">UP TO</span>
								</div>
								<div class="h2 font-bold mb-0 text-shadow mt-2">$ 150</div>                                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	let copiedLink = "";
	let user =  $('#share').val();

	function copyToClipboard(element, btnElem){
		let $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).val()).select();
		document.execCommand("copy");
		$temp.remove();
		$(btnElem).html('<i class="fa fa-link"></i>');
		setTimeout(()=>{
			$(btnElem).html('<i class="fa fa-clipboard"></i>');
		},2000);
	}
	$(document).ready(function() {
		copiedLink = $('#share_url').val();
		$('#shareWithMessenger').click(function(){
			window.open('https://www.facebook.com/sharer/sharer.php?u=' + copiedLink,'_blank')
		});

		$('#shareWithWhatsapp').click(function(){
			window.open('https://api.whatsapp.com/send?text=' + copiedLink,'_blank')
		});

		$(document).on('click','.cToCb',function() {
			copyToClipboard($(this).parent().find('input'),$(this));
		});

		$('#shareWithMail').click(function(){
			let formattedBody = "Hello i am working as a Mentor: "+ (copiedLink);
			let mailToLink = "mailto:?subject=" + user + "wants to share link with you&body= " + encodeURIComponent(formattedBody);
			window.location.href = mailToLink;
		});
	});
</script>