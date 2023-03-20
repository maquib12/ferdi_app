@extends('students.layout.master')
@section('content')
		<section class="py-5">
			<div class="container position-relative">
				<div class="heading border-bottom border-xlight border-solid-2 mb-4 pb-1">
					<h1 class="pb-2 font-bold font-36">Skill Assessment</h1>
				</div>
				<div class="row pt-2">
					<div class="col-sm-4">
						<div class="bg-dark px-4 py-4 rounded-md">
							<div class="px-2">
								<small class="text-uppercase text-primary">{{$modules->name}}</small>
								<p class="font-semibold mt-2">{{$modules->name}} Course 2021</p>
								<p>Module 1</p>
								<div class="border-bottom border-primary border-solid-2 mt-4"></div>
								<div class="check-list mt-3">
									<input type="hidden" id="module_id" value="{{$modules->id}}">
									<ul class="list-group list-group-flush">
										@for($i = 1; $i <= ($no_of_questions->no_of_question); $i++)
										<li class="list-group-item active" onclick="openQuestion({{$i}})">Question {{$i}}
											@if ($count_question >= $i)
											<i></i>
											@endif
										</li>
										@endfor
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<form>
							<div class="d-flex align-items-center mb-4 pb-1">
								<?php $total = $no_of_questions->no_of_question; ?>
								<h4 class="my-0 flex-fill">Question <span id="question_no"></span> /{{$total}}</h4>
								<input type="hidden" id="total" value={{$total}}>
								<input type="hidden" name="course_id" value="{{$modules->course_id}}" id="course_id">
								<input type="hidden" name="module_id" value="{{$modules->id}}">
								<button type="button" class="btn btn-primary rounded-pill px-5" data-toggle="collapse"  onClick = "handleNext(event)"><span class="d-block my-1">Next</span></button>
							</div>
							<div class="question">{{$question->question}}</div>
							<div class="row mt-3">
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="a">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt">A</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_a}}" name="a" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="b">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt">B</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_b}}" name="b" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="c">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt">C</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_c}}" name="c" readonly>
										</div>
									</label>
								</div>
								<div class="col-sm-6 my-2 py-1">
									<label class="lg-opt d-block">
										<input type="radio" name="ques-1" value="d">
										<div class="d-flex align-items-center bg-dark p-4 rounded-md">
											<div class="opt">D</div>
											<input type="text" class="text form-control border-0 bg-transparent text-white shadow-none" value="{{$question->answer_d}}" name="d" readonly>
										</div>
									</label>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="popup my-n4 rounded-md collapse" id="successful">
					<div class="close tr mt-n3 mr-n3" role="button" data-toggle="collapse" href="#successful"><img src="asset('assets/img/icons/close-w.svg')}}" height="40"></div>
					<div class="popup-inner col-sm-9 mx-auto text-center">
						<h1 class="font-bold mb-0">SUCCESSFUL</h1>
						<p class="text-xlight font-light my-4 lh-30">Lorem Ipsum Is Simply Text Of The Printing IN IPSUM Typesettin Industry Lorem Ipsum Is Text Of The Printing IN IPSUM Typesettin Industry Lorem Ipsum</p>
						<h1 class="font-bold">{{$percentage}}% <span class="font-xlight">You Scored</span></h1>
						<div class="row w-100 mt-5 ">
							@if($percentage < 70)
							<div class="col-sm-6 mx-auto">
								<button class="btn btn-primary btn-block px-5 rounded-md" onclick="retake()"><span class="d-block my-2">Retake</span></button>
							</div>
							@else
							<div class="col-sm-6 mx-auto">
								<button class="btn btn-primary btn-block px-5 rounded-md"><span class="d-block my-2">Next Module</span></button>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script>
	var path = window.location.pathname.split('/');
	var current_q = path[path.length - 1];
	function openQuestion(id){
			var module_id = $('#module_id').val();
			var total = $('#total').val();
		    var answer = $('[name="ques-1"]:checked').val();
			var course_id = $('#course_id').val();
			$.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('students/add-answer') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                module: module_id,
                answer: answer,
                course_id: course_id,
                question_no: parseInt(current_q),
                _token: "{{csrf_token()}}",

            },
            success: function (response) {
            	console.log(response);
            },
            error: function (err) {
            	console.log(" error Set Status");
            	if(parseInt(current_q)+1 <= total){
                    var path = window.location.origin + `/ferdi_app/public/students/stu-skill-assessment/${module_id}/${id}`;

                    window.location.href = path;
                    }else{
                        $('#successful').show();
                    }
            },
            complete: function (response) {
            	console.log(response.responseJSON.answer);
                if(response.responseJSON.answer != null){
                    if(parseInt(current_q)+1 <= total){
                    var path = window.location.origin + `/ferdi/public/students/stu-skill-assessment/${module_id}/${id}`;

                    window.location.href = path;
                    }else{
                        $('#successful').show();
                    }
                }else{
                	 $('#successful').hide();
                	toastr.error("Please select Answer");
                }


                // console.log(response.responseJSON.success);
                // if(response.responseJSON.success == true){
                //     if(response.responseJSON.current_q == total){
                //     var path = window.location.origin + `/ferdi_app/public/students/stu-skill-assessment/${module_id}/${id}`;

                //     window.location.href = path;
                //     }else{
                //         $('#successful').show();
                //     }
                // }else{
                // 	 $('#successful').hide();
                // 	toastr.error("Please select Answer");
                // }
            }
        });
	
		// if(parseInt(current_q)+1 <= total){
		// 	var path = window.location.origin + `/ferdi/public/students/stu-skill-assessment/${module_id}/${id}`;

		//     window.location.href = path;
		// 	}else{
		// 		$('#successful').show();
		// 	}
		
	}
	function handleNext(e){	
		    e.preventDefault();

		openQuestion(parseInt(current_q) + 1);
	   
	}

	function retake(){
		var course_id = $('#course_id').val();
		var module_id = $('#module_id').val();
		$.ajax({
            method: "POST",
            // dataType: "json",
            url: "{{ url('students/retake-assessment') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                module: module_id,
                course_id: course_id,
                _token:"{{csrf_token()}}",

            },
            success: function (response) {
            
            	window.location.href = window.location.origin + `/ferdi_app/public/students/stu-skill-assessment/`+response.module_id+`/`+response.question_id;
            },
            error: function (err) {
            	console.log(" error Set Status");
            	
            }
        });
	}
	$("#question_no").text(current_q)
	function changeCorrectAnswer(ans) {
		
	}
</script>
@endsection
