@extends('facilitator.include.master')
@section('content')

<?php $qid= Request::segment(4); ?>
		<section class="py-5">
			<div class="container">
				<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1 d-flex align-items-center">
					<h1 class="pb-2 font-bold font-36 my-0 flex-fill">Skill Assessment</h1>
					<div class="action">
						<a href="{{url('facilitator/add_questions_in_bulk',$modules->id)}}" class="ml-3">Bulk Upload</a>
						<a href="{{url('facilitator/questions_edit').'/'.$modules->id.'/'.$qid}}" class="ml-3"><img src="{{asset('assets/img/icons/edit-circle-w.svg')}}"></a>
						<a href="{{url('facilitator/questions_add').'/'.$modules->id.'/'.$qid}}" class="ml-3"><img src="{{asset('assets/img/icons/plus-circle.svg')}}"></a>
					</div>
				</div>
				<div class="row pt-2">
					<div class="col-sm-4">
						<div class="bg-dark px-4 py-4 rounded-md">
							<div class="px-2">
								<small class="text-uppercase text-primary">Business Analysis</small>
								<p class="font-semibold mt-2">{{$modules->name}}</p>
								<p>Module 1</p>
								<div class="border-bottom border-primary border-solid-2 mt-4"></div>
								<div class="check-list mt-3">
									<input type="hidden" id="module_id" value="{{$modules->id}}">
									<ul class="list-group list-group-flush">
										@for($i = 1; $i <= ($no_of_questions->no_of_question); $i++)
										<li class="list-group-item active" onclick="openQuestion({{$i}})">Question {{$i}}
										@if ($count_question >= $i)<i></i>@endif
									   </li>
										@endfor
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<form action="{{route('addQuestionsPost')}}" method="POST">
							@csrf
							<div class="d-flex align-items-center mb-4 pb-1">
								<?php $total = $no_of_questions->no_of_question; ?>
								<h4 class="my-0 flex-fill">Question <span id="question_no"></span> /{{$total}}  </h4>
								<input type="hidden" name="course_id" value="{{$modules->course_id}}">
								<input type="hidden" name="module_id" value="{{$modules->id}}">
								<input type="hidden" name="question_id" value="{{$total}}">
								<button class="btn btn-primary rounded-pill px-5" onClick = "handleNext()"><span class="d-block my-1" >Next</span></button>
							</div>
							@if($question)<textarea class="form-control border-0 lh-32 bg-dark px-4 py-2 rounded-sm resize-none text-white font-xlight shadow-none" name="text" rows="3" readonly>{{$question->question}}</textarea>@endif
							@if($question)<div class="row mt-3">
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="a" class="edit-opt"  onclick="changeCorrectAnswer('A')">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt mr-1">A</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_a}}" name="a" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="b" class="edit-opt" onclick="changeCorrectAnswer('B')">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt mr-1">B</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_b}}" name="b" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="c" class="edit-opt" onclick="changeCorrectAnswer('C')">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt mr-1">C</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_c}}" name="c" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="d" class="edit-opt" onclick="changeCorrectAnswer('D')">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt mr-1">D</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_d}}" name="d" readonly>
										</div>
									</label>
								</div>
							</div>@endif
						</form>
					</div>
					
				</div>
			</div>
		</section>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script>
	var path = window.location.pathname.split('/');
	var current_q = path[path.length - 1];
	function openQuestion(id){
		var module_id = $('#module_id').val();
		var path = window.location.origin + `/ferdi_app/public/facilitator/add_questions/${module_id}/${id}`;

		window.location.href = path;
	}
	function handleNext(){	
		openQuestion(parseInt(current_q) + 1);
	}
	$("#question_no").text(current_q)
	function changeCorrectAnswer(ans) {
		
	}
</script>
@endsection