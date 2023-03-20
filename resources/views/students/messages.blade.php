@extends('students.layout.master')
@section('content')
	<section class="py-5">
		<!-- <iframe src="{{route('message')}}" onload="showMessage({{$mentor[0]['id']}});" frameborder="0"></iframe> -->
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-5 pb-1">
					<h1 class="pb-2 font-bold font-36">Messages</h1>
				</div>
				<div class="row mx-0 chat-wrapper overflow-hidden rounded-sm">
					<div class="col-sm-3 bg-dark pt-4 d-flex flex-column h-100">
						<div class="avatar-v position-relative d-table mx-auto">
							@if(isset($mentor[0]['userdetails']) && $mentor[0]['userdetails']['image'] != null)
											<img src="{{asset('profile_pic/' .$mentor[0]['userdetails']['image'])}}" class="rounded-sm" id="sender_image">
										@else
											<img src="{{asset('assets/img/users/5.jpg')}}" class="rounded-sm">
										@endif
							<span class="status mr-n1 mb-n1"></span>
						</div>
						<div class="text-center mt-2">
							<h5 class="mb-1">{{$mentor[0]['name']}}</h5>
							<div class="font-12 font-xlight text-xlight mb-3">Teaches Sales and Persuasion</div>
							<label class="m-0 d-inline-flex align-items-center mx-auto" role="button">
								<span class="switch mr-3">
								  <input type="checkbox">
								  <em></em>
								</span>
								Active
							</label>
						</div>
						<div class="d-flex align-items-center mt-4 pb-3 border-bottom border-xlight">
							<div class="font-18">Mentors</div>
							<div class="countw30 bg-theme-blue text-white ml-auto">{{$totalNoOfMentors}}</div>
						</div>
						<div class="list mx-md-n3 slim-scroll h-100 overflow-auto">
							
							@foreach($user as $users)
							@php 
								$user_name = $users['name'];
								$user_img = isset($users['userdetails']['image']) ? $users['userdetails']['image'] : '';
								if($user_img!=""){
									$image_user = asset('profile_pic').'/'.$user_img;
								}else{
									$image_user = asset('/assets/img/users/2.jpg');
								}
							@endphp
							<div class="item" onclick="openTab({{$users['id']}},'{{$user_name}}','{{$image_user}}')">
								<div class="item-inner">
									<div class="avatar-v md">
									   @if(isset($users['userdetails']) && $users['userdetails']['image'] != null)
											<img src="{{asset('profile_pic/' .$users['userdetails']['image'])}}" class="img-fit rounded-xs">
										@else
										<img src="{{asset('assets/img/users/2.jpg')}}" class="img-fit rounded-xs">
										@endif 
									</div>
									<div class="font-18 ml-4">{{$users['name']}}</div>
									<!-- <div class="count">3</div> -->
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-sm-9 border border-xlight px-3 d-flex flex-column h-100">
						<div class="d-flex align-items-center py-3 border-bottom border-xlight user_chat">
							<div class="avatar-v md mr-3">
								<img src="" class="img-fit rounded-xs d-none" id='my_image'>
							</div>
							<div class="flex-fill">
								<div class="font-18" id="chatName"></div>
								<!-- <div class="font-12">Active Now</div> -->
							</div>
							<div>	
							<a onclick="chatDelete({{$mentor[0]['id']}})" class="text-white ml-4 d-none del_btn">
								<img src="{{asset('assets/img/icons/delete.svg')}}">
							</a>
							</div>
						</div>
						<div class="chat-box flex-fill overflow-auto my-2 pr-2 slim-scroll chatList">
							<!-- <div class="rounded-sm overflow-hidden mx-n2">
								<img src="https://pepupsales.net/quytech-new/assets/images/inner-images/hire-developer.png" style="max-width: 250px;">
							</div> -->
						</div>
						<!-- <form action="{{route('chatPost')}}" id="chatPost" method="post"> -->
							<div class="chat-footer pb-4 d-flex">
								<!-- @csrf -->
								<div class="bg-dark border-0 rounded-pill d-flex flex-fill">
									<input type="text" class="shadow-none border-0 flex-fill bg-transparent px-4 input text-white message_box" placeholder="Enter your message here," name="text" id="text">
									<label for ="file-input" class="my-0 px-4 ml-3 border-left border-xlight d-flex align-items-center" role="button">
										<img src="{{asset('assets/img/icons/link.svg')}}"><input type="file" id="file-input" class="d-none">
									</label>
								</div>

								<input type="hidden" id="reciever_id">
								<input type="hidden" id="reciever_name">
								@php $name = $mentor[0]['name'] @endphp
								<button onclick="openChat(this, {{$mentor[0]['id']}},'{{$name}}')" class="btn btn-primary rounded-pill px-4 d-flex align-items-center ml-md-3">SEND <img src="{{asset('assets/img/icons/send-2.svg')}}" class="ml-3"></button>
							</div>                        <!-- </form> -->
					</div>
				</div>
			</div>
	</section>
@endsection
	@section('scripts')
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase-app.js"></script>
    <!-- <script src="https://www.gstatic.com/firebasejs/3.3.0/firebase-database.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase-storage.js"></script>
<script>
  
  const firebaseConfig = {
    apiKey: "AIzaSyBNvMGPr1Jh8IpSEPY_N49gR54xN8Qdm5c",
    authDomain: "ferdi-app-aa189.firebaseapp.com",
  	databaseURL: "https://ferdi-app-aa189-default-rtdb.firebaseio.com",
    projectId: "ferdi-app-aa189",
    storageBucket: "ferdi-app-aa189.appspot.com",
    messagingSenderId: "230243721439",
    appId: "1:230243721439:web:56bd8c307a5f91648b096a",
    measurementId: "G-JWD932C2J7"
  };
  firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();
		const storage = firebase.storage();
        db.settings({
            timestampsInSnapshots: true
        });

		// $('#chatPost').on(submit, function(e){
		// 	e.preventDefault();
		// 	console.log('fswdaef');
		// });

	function openChat(curr, id,name) 
		{
			let message = $('#text').val();
                // e.preventDefault();
                // let key = localStorage.getItem("chat_key");

				var file = document.getElementById('file-input').files[0];
				var reciever_id = $('#reciever_id').val();
				var reciever_name = $('#reciever_name').val();
				var senderImage = $("#sender_image").attr('src');
				var receiverImage = $("#my_image").attr('src');
				// console.log('--------------------------->',reciever_id);
                let key = String(id);
				if(key < reciever_id){
					var conv_id = key + '_' + reciever_id;
				}else{
					var conv_id = reciever_id + '_' + key;
				}
				if(reciever_id != null && reciever_id != '' )
				{
					if (file) 
					{
						const storageRef = storage.ref(file.name);
						storageRef.put(file).then((snap) => {
							snap.ref.getDownloadURL().then((snapshot) => {
								db.collection("help")
									.doc(conv_id)
									.collection("chats")
									.add({
										chatType: 2,
										mediaUrl: snapshot,
										messageType: 0,
										msgDeliveryStatus: 0,
										receiverId: reciever_id,
										receiverName: reciever_name,
										senderId: key,
										senderName: name,
										senderPic: senderImage,
										receiverPic: receiverImage,
										text: message,
										conv_id: conv_id,
										time: new Date().toISOString(),
										timestamp: Math.floor(
											new Date().getTime() / 1000.0
										),
									});
									 // showMessage(id);
									
									$("#text").val("");

							});
						});
					}else if (!file && message){
							db.collection("help")
								.doc(conv_id)
								.collection("chats")
								.add({
									chatType: 2,
									mediaUrl: "",
									messageType: 0,
									msgDeliveryStatus: 0,
									receiverId: reciever_id,
									receiverName: reciever_name,
									senderId: key,
									senderName: name,
									senderPic: senderImage,
									receiverPic: receiverImage,
									text: message,
									conv_id: conv_id,
									time: new Date().toISOString(),
									timestamp: Math.floor(
										new Date().getTime() / 1000.0
									),
								});

								// db.collection("conversations")
								// .doc(key)
								// .update({ lastMessage: this.message });
								 // showMessage(id);
								
								$("#text").val("");
					}
				}
                
		}

function chatDelete(id) 
{
	var reciever_id = $('#reciever_id').val();
	let key = String(id);
	if(key < reciever_id){
		var conv_id = key + '_' + reciever_id;
	}else{
		var conv_id = reciever_id + '_' + key;
	};
	
	db.collection("help")
						.doc(conv_id)
						.collection("chats")
						.onSnapshot((snapshot) => {
							this.selected = [];
							snapshot.docs.forEach((element) => {
								element.ref.delete()
							});
						});
}
var perv_conv = "";
function showMessage(ids)
{
	var reciever_id = $('#reciever_id').val();
	let key = String(ids);
	if(key < reciever_id){
		var conv_id = key + '_' + reciever_id;
	}else{
		var conv_id = reciever_id + '_' + key;
	};
	perv_conv=conv_id;
	db.collection("help")
				.doc(conv_id)
				.collection("chats")
				.orderBy("timestamp", "asc")
				.onSnapshot((snapshot) => {

					
	let data = [];
					if(conv_id==perv_conv){
					$(".chatList").html('');
					// $("#message_send").html('');
					snapshot.docs.forEach((element) => {
						 console.log(element.data());
						var recever = key+"_"+reciever_id;
						var agoTime = timeSince(element.data().timestamp);
						if(element.data().senderId !== key )
						{
							if(element.data().text){
								$(".chatList").append(	
								"<div class='message received' id='message_received'><div class='message-inner'><div class='avatar-v md'><img src='"+element.data().senderPic+"' class='img-fit rounded-xs'></div><div class='message-text'><div class='text'>"+element.data().text+"</div><div class='date'>"+ agoTime +"</div</div></div></div>"
								);
							}else{
								$(".chatList").append("<div class='message received' id='message_received'><div class='rounded-sm overflow-hidden mx-n2'><img src='"+element.data().senderPic+"' style='max-width: 250px;'></div></div>");
							}
							
						}else{
							if(element.data().text){
							$(".chatList").append(	
							"<div class='message send' id='message_send'><div class='message-inner'><div class='avatar-v md'><img src='"+element.data().senderPic+"' class='img-fit rounded-xs'></div><div class='message-text'><div class='text'>"+element.data().text+"</div><div class='date'>"+ agoTime +"</div</div></div></div>"
							);
							}else{
								$(".chatList").append("<div class='message send' id='message_send'><div class='rounded-sm overflow-hidden mx-n2'><img src='"+element.data().senderPic+"' style='max-width: 250px;'></div></div>");
							}
						}
					});
				}
					var target = $('.chatList'); 
                	target.animate({scrollTop: target.height()}, 500);
				});
						
				
}
function pad(pad, str, padLeft) {
	if (typeof str === 'undefined') 
		return pad;
	if (padLeft) {
		return (pad + str).slice(-pad.length);
	} else {
		return (str + pad).substring(0, pad.length);
	}
}
function timeSince(time) {

	var ptime = time;
	var min7days = {{ strtotime('-7 days') }};
	var d = new Date(time*1000);
	
	var orgDate = pad(d.getDate(), '0', false) + '-' + pad((d.getMonth()+1), '0', false) + '-' + d.getFullYear();

        if(ptime < min7days){
            return orgDate;
        }else{
            var etime = {{ time() }} - ptime;
    
            if (etime < 1){
                return '0 seconds';
            }
    
			var a = [365 * 24 * 60 * 60,30 * 24 * 60 * 60,24 * 60 * 60,60 * 60,60,1];
			var b = ['year','month','day','hour','minute','second'];
			var obj = {};
			for(var i = 0; i < a.length; i++){
             obj[a[i]] = b[i];
            }

			var a_plural = ['year','month','day','hour','minute','second'];
			var b_plural = ['years','months','days','hrs','mins','sec']
			var obj1 = {};
			for(var i = 0; i < a_plural.length; i++){
             obj1[a_plural[i]] = b_plural[i];
            }
			
            for (var i = 0; i < Object.keys(obj).length; i++){
                var d = etime / (a[i]);
                if (d >= 1){
                    var r = Math.round(d);
					if(r > 1){
						return r + ' ' + obj1[b[i]]+ ' ago';
					}else{
						return r + ' ' + obj1[b[i]]+ ' ago';
					}
                }
            }
        }
}
function openTab(id,name,image_user){
	$("#my_image").removeClass('d-none');
	$(".del_btn").removeClass('d-none');
    $('#reciever_id').val(id);
	$('#reciever_name').val(name);
	$('#chatName').html(name);
	$("#my_image").attr("src",image_user);
	showMessage("{{$mentor[0]['id']}}")
}
</script>
@endsection