@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container">
					<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-4 d-flex align-items-center">
						<h1 class="col-sm-3 p-0 font-bold font-36">Forum</h1>
						<div class="flex-fill d-flex">
							<div class="search-bar flex-fill mr-4">
								<form class="d-flex align-items-center" action="{{route('forum')}}" method="get">
									@csrf
									<input class="form-control bg-transparent search border-0" name="search" placeholder="Search">
									<button type = "submit" class="btn btn-primary rounded-pill search px-4 py-md-2 mr-1"><span class="mx-md-4 px-md-2 py-md-1 d-block">Search</span></button>
								</form>
							</div>
							<a href="{{route('create-forum')}}" class="btn btn-primary rounded-pill search px-3 py-md-2 my-1 d-flex align-items-center justify-content-center"><span class="mx-1">Create Forum</span></a>
						</div>
					</div>
					<div class="row">
					</div>
					<div class="row masonry-grid">
						 @foreach($forum_details as $forum)
						<div class="col-sm-6 grid-item">
							<div class="card bg-dark rounded-md px-4 pt-3 mb-4">
								<div class="head d-flex align-items-center mb-4">
									<div class="avatar md">
										<div class="inner border-0 rounded-xs">
											@if(isset($forum) && $forum->image != null)
												<img src="{{asset('profile_pic/' .$forum->image)}}">
											@else
											     <img src="{{asset('assets/img/users/4.jpg')}}">
											@endif
										</div>
									</div>
									<div class="caption flex-fill pl-4">
										<div class="name font-18 mb-2">{{$forum->name}}</div>
										<div class="font-12 text-uppercase text-xlight">{{ isset($forum->created_at) ? $forum->created_at->format('d M Y') : $forum->email }} AT {{$forum->created_at->format('H:i')}}</div>
									</div>
									<div>
										@if($forum->heading == 'agriculture')
										<span class="bg-primary font-12 px-4 py-2 rounded-xs">Agriculture</span>
										@elseif($forum->heading == 'fishery')
										<span class="bg-primary font-12 px-4 py-2 rounded-xs">Fishery</span>
										@else
										<span class="bg-primary font-12 px-4 py-2 rounded-xs">Handyman</span>
										@endif
									</div>
								</div>
								<p class="font-12 lh-24 font-xlight text-xlight">{{$forum->about}}</p>
								<div class="row mx-n2 mb-3">
									<div class="col-sm-6 px-2">
										<div class="image-box my-2 rounded-sm" style="--h:240px">@if(isset($forum) && $forum->images != null)
												<img src="{{asset('forum_pic/' .$forum->images)}}">
											@else
											     <img src="{{asset('assets/img/img-9.jpg')}}">
											@endif</div>
									</div>
									<div class="col-sm-6 px-2">
										<div class="d-flex flex-column justify-content-between h-100">
											<div class="image-box my-2 flex-fill rounded-sm" style="--h:110px"><img src="assets/img/img-10.jpg" style="--h:160px"></div>
											<div class="image-box my-2 flex-fill rounded-sm" style="--h:110px"><img src="assets/img/img-11.jpg" style="--h:160px"></div>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-between border-top border-xlight border-solid-2 py-4">
									<?php
											$totalCount = App\ForumComment::where('forum_id',$forum->id)->count();
										?>
										<div class="font-12 icon-white" data-toggle="collapse" data-target="#comment-1{{$forum->id}}" role="button" data-sort="masonry"><img src="{{asset('assets/img/icons/comment-color.svg')}}" class="icon mr-2"> <span id="comment_{{$forum->id}}">{{$totalCount}}</span> Comments</div>
										<div class="font-12 icon-white" role="button" onclick="forumLike({{$forum->id}})"><img src="{{asset('assets/img/icons/heart-color.svg')}}" class="icon mr-2">
											<span id="like_{{$forum->id}}">{{isset($totallikes[$forum->id]) ? $totallikes[$forum->id] : 0}}</span> Likes</div>
										<div class="font-12 icon-white" role="button" onclick="forumDislike({{$forum->id}})"><img src="{{asset('assets/img/icons/dislike.svg')}}" class="icon mr-2"> <span id="dislike_{{$forum->id}}">{{isset($totaldislikes[$forum->id]) ? $totaldislikes[$forum->id] : 0}}</span> Dislikes</div>
								</div>
								<div class="collapse" id="comment-1{{$forum->id}}">
									<div class="comment-box">
										  <div class="add-comment px-1">
												<input type = "hidden" name="forum_id" id="forum_id" value="">
												<input class="form-control bg-dark font-12 text-white ph-gray pr-5" id ="comment_forum" name="comment" placeholder="Type your Comment Here.....">
												<button class="send" onclick="forumComment({{$forum->id}})" type="submit"><img src="{{asset('assets/img/icons/send.svg')}}"></button>
											</div>
										@foreach($comments as $comment)
										@if($comment->forum_id == $forum->id)
										<div class="comments">
											<div class="item mt-4 py-2">
												<div class="d-flex mb-4">
													<div class="avatar sm2">
														<div class="inner border-0 rounded-xs">
															<img src="{{asset('assets/img/users/1.jpg')}}">
														</div>
													</div>
													<div class="info pl-2 ml-1 mt-3">
														<div class="caption flex-fill d-flex align-items-center mb-1">
															<div class="name font-18">{{$comment->name}}</div>
															<div class="font-12 text-uppercase text-xlight"><span class="mx-2">-</span> 48 Minutes</div>
														</div>
														<p class="font-12 lh-24 font-xlight text-xlight mb-0">{{$comment->comments}}</p>
														<a href="" class="text-primary text-underline font-12">Reply</a>
													</div>
												</div>
												<div class="comments ml-4 border-left border-gray border-solid-2">
													<div class="item py-2 pl-3">
														<div class="d-flex">
															<div class="avatar xs">
																<div class="inner border-0 rounded-xs">
																	<img src="{{asset('assets/img/users/2.jpg')}}">
																</div>
															</div>
															<div class="info pl-2 ml-1 mt-2 flex-fill">
																<div class="caption flex-fill d-flex align-items-center mb-1">
																	<div class="name font-12">John Doe</div>
																	<div class="font-10 text-uppercase text-xlight"><span class="mx-2">-</span> 48 Minutes</div>
																</div>
																<p class="font-12 lh-24 font-xlight text-xlight mb-0">Lorem Ipsum is simply dummy text the printing and typesetting THE dustry Lorem Ipsum has been the industry's standard dummy inter took a galley of</p>
																<a href="" class="text-primary text-underline font-12">Reply</a>
															</div>
														</div>
													</div>
													<div class="item py-2 pl-3">
														<div class="d-flex">
															<div class="avatar xs">
																<div class="inner border-0 rounded-xs">
																	<img src="{{asset('assets/img/users/3.jpg')}}">
																</div>
															</div>
															<div class="info pl-2 ml-1 mt-2 flex-fill">
																<div class="caption flex-fill d-flex align-items-center mb-1">
																	<div class="name font-12">Daniel Pink</div>
																	<div class="font-10 text-uppercase text-xlight"><span class="mx-2">-</span> 48 Minutes</div>
																</div>
																<textarea class="form-control bg-dark w-100 font-12 lh-24 font-xlight text-xlight mb-0 p-2 resize-none mt-2" rows="3">Lorem Ipsum is simply dummy text the printing and YOUR typesetting industry Lorem Ipsum has been inter galley of</textarea>
																<a href="" class="text-primary text-underline font-12">Reply</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="item mt-4 py-2">
												<div class="d-flex mb-4">
													<div class="avatar sm2">
														<div class="inner border-0 rounded-xs">
															<img src="{{asset('assets/img/users/4.jpg')}}">
														</div>
													</div>
													<div class="info pl-2 ml-1 mt-3">
														<div class="caption flex-fill d-flex align-items-center mb-1">
															<div class="name font-18">George Doe</div>
															<div class="font-12 text-uppercase text-xlight"><span class="mx-2">-</span> 48 Minutes</div>
														</div>
														<p class="font-12 lh-24 font-xlight text-xlight mb-0">Lorem Ipsum is simply dummy text the printing and typesetting THE dustry Lorem Ipsum has been the industry's standard dummy inter took a galley of</p>
														<a href="" class="text-primary text-underline font-12">Reply</a>
													</div>
												</div>
											</div> -->
										</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>
							<div class="collapse comment mb-3">
								<a href="" class="font-18 text-primary">View All Comments</a>
							</div>
						</div>
						@endforeach
						
					</div>
					{!! $forum_details->links() !!}
				</form>
			</div>
		</section>
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script>
	function forumComment(forum_id) {
		var comment = $('#comment_forum').val();
		console.log(comment);
        $.ajax({

            type: "POST",
            dataType: "json",
            url: "{{ url('students/comments-post') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                forum_id: forum_id,
                comment: comment

            },
            success: function (response) {

            },
            error: function (err) {

            },
            complete: function (err) {
            	var count = $('#comment_'+forum_id).html();
                if (count == "") {
                	count = 1;
                }else{
                	count = parseInt(count) + 1;
                }
            	console.log(forum_id);
            	$('#comment_'+forum_id).html(count);
                // substitutePlayers();
                console.log(" COMPLETED Set Status");
            }
        });

    }

    function forumLike(forum_id) {

		// var forum_id = $('#forum_id').val();
        $.ajax({

            type: "POST",
            dataType: "json",
            url: "{{ url('students/forum_like') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                forum_id: forum_id,
                like: 1

            },
            success: function (response) {
            },
            error: function (err) {
            	console.log(" error Set Status");
            },
            complete: function (response) {
                var count = $('#like_'+forum_id).html();
                if (count == "") {
                	count = 1;
                }else{
                	count = parseInt(count) + 1;
                }
            	console.log(count);
            	$('#like_'+forum_id).html(count);
                console.log(" COMPLETED Set Status");
            }
        });

    }


     function forumDislike(forum_id) {

        $.ajax({

            type: "POST",
            dataType: "json",
            url: "{{ url('students/forum_dislike') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                forum_id: forum_id,
                like: 0

            },
            success: function (response) {
            },
            error: function (err) {
            	console.log(" error Set Status");
            },
            complete: function (response) {
                var count = $('#dislike_'+forum_id).html();
                if (count == "") {
                	count = 1;
                }else{
                	count = parseInt(count) + 1;
                }
            	console.log(count);
            	$('#dislike_'+forum_id).html(count);
                console.log(" COMPLETED Set Status");
            }
        });

    }

    $('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});

</script>

@endsection
 