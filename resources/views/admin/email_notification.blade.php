@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Send Email Notifications</h4>
						</div>
						<div class="card mt-3">
							<form action="{{route('send_email_notification')}}" method="post" class="mt-4">
								@csrf
								<div class="form-group col-sm-8 row mx-0 mb-0">
									<div class="form-group col-sm-6">
										<label>Select User Type</label>
										<select class="form-control selectpicker" data-live-search="true" data-actions-box="true" id="user_type">
											<option value="all">All</option>
											<option value="6">Users</option>
											<option value="4">Facilitators</option>
											<option value="3">Mentors</option>
											<option value="5">Sponsors</option>
										</select>
									</div>
									<div class="form-group col-sm-6">
										<label>Select Template</label>
										<select class="form-control selectpicker" data-live-search="true" data-actions-box="true" name="template">  
											@foreach($email_templates as $key => $email_template)
											<option value="{{$email_template['id']}}">{{$email_template['template_name']}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group col-sm-6">
										<div class="search-list d-none">
											<div class="d-flex align-items-center justify-content-between mb-2">
												<label class="my-0">Select List</label>
												<div class="d-flex align-items-center">
													<span class="font-12 px-1 select-all" role="button">Select All</span>
													<span class="font-12 px-1 deselect-all" role="button">Deselect All</span>
												</div>
											</div>
											<input class="form-control font-14" placeholder="Search" onkeyup="searchFunction()" id="searchInput">
											<ul id="list" class="list border-top-0"></ul>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group col-sm-6">
										<a class="btn btn-secondary btn-lg rounded-pill col-sm-5" href="{{route('email_notification_templates')}}">Cancel</a>
										<input type="submit" class="btn btn-primary btn-lg rounded-pill col-sm-5" value="Send">
									</div>
								</div>
							</form>
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#user_type').change(function(){
			var user_type = $(this).val();
			$.ajax({
				url : 'select_user_type/'+user_type,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						$("#list").empty();
						$.each(response,function(key,value){
							$('.search-list').removeClass('d-none')
							$("#list").append('<li><label>'+value+'<input type="checkbox" name="checkArr[]" value="'+key+'"></label></li><p>');
						});
					}
					else{
						$("#list").empty();
					}
				}
			});
		});
	});

function searchFunction() {
  var i, txtValue;
  var input = document.getElementById("searchInput");
  var upper = input.value.toUpperCase();
  var filter = upper.trim();
  var ul = document.getElementById("list");
  var li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    label = li[i].getElementsByTagName("label")[0];
    txtValue = label.textContent || label.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        } 
  }
}
</script>