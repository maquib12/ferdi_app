@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<nav class="d-flex align-items-center justify-content-between">
							<ol class="breadcrumb h4">
								<li class="breadcrumb-item"><a href="{{route('loanManagementView')}}">Assign A Mentor</a></li>
								<li class="breadcrumb-item active">Mentors</li>
							</ol>
							<a class="btn btn-primary float-right rounded-pill px-4" type="button" href="{{ url()->previous() }}">Back</a>
						</nav>
						<div class="search-bar d-flex align-items-center justify-content-between mb-3">
							<div class="search flex-fill">
									<div class="form-group my-0">
										<input class="form-control search-icon" placeholder="Search by name, email address, specialization..." id="searchInput" onkeyup="searchFunction()">
										<span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
									</div>
							</div>
							<div class="filter">
								<!-- <a href="" class="dropdown-toggle text-black" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Filter
									<img src="{{asset('assets/images/icons/filter.svg')}}">
								</a> -->
								<div class="dropdown-menu dropdown-menu-right">
									<button class="dropdown-item" type="button">Action</button>
									<button class="dropdown-item" type="button">Another action</button>
									<button class="dropdown-item" type="button">Something else here</button>
								</div>
							</div>
						</div>
						<div class="card card-table round">
							<div class="table-responsive">
								<table class="table table-striped table-borderless text-black mb-0" id="myTable">
									<tbody>
									@foreach($mentors as $key => $mentor)
										<tr>
											@if($mentor->userdetails == null || $mentor->userdetails->image == null)
											<td><div class="avatar md-2"><div class="inner"><img src="{{asset('assets/images/faces/1.jpg')}}"></div></div></td>
											@else
											<td><div class="avatar md-2"><div class="inner"><img src="{{asset('profile_pic/' .$mentor->userdetails->image)}}"></div></div></td>
											@endif
											<td class="w-100 pl-1">
												<div class="font-16 weight-600 mb-2">{{$mentor->name}}</div>
												<small>{{$course_name}}</small>
												<small>[{{$mentor->count}} User alloted]</small>
											</td>
											<td class="pr-4"><a href="{{route('mentor_assign',['student_id' => $student_id, 'mentor_id'=>$mentor->id ,'course_id'=>$course_id])}}"><button class="btn btn-primary rounded-pill">Assign</button></a></td>
										</tr>
									@endforeach						
									</tbody>
								</table>
								{{ $mentors->links() }}
							</div>
						</div>
						<div class="d-md-flex align-items-center justify-content-between mt-3">
							<div class="font-14 weight-500 text-gray">10 Results Per Page</div>
							<!-- <nav aria-label="Page navigation example">
								<ul class="pagination my-0">
									<li class="page-item"><a class="page-link px-2" role="button"><i class="mdi mdi-chevron-double-left"></i></a></li>
									<li class="page-item"><a class="page-link px-2" role="button"><i class="mdi mdi-chevron-left"></i></a></li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link px-2" role="button"><i class="mdi mdi-chevron-right"></i></a></li>
									<li class="page-item"><a class="page-link px-2" role="button"><i class="mdi mdi-chevron-double-right"></i></a></li>
								</ul>
							</nav> -->
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function searchFunction() {
  var  tr, name, i, txtValue, txtValueEmail;
  var input = document.getElementById("searchInput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("myTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    if (name) {
      txtValue = name.textContent || name.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else{
        tr[i].style.display = "none";
      }
    }       
  }
}
function clean_search() {
    console.log('a');
    document.getElementById("searchInput").value = "";
    searchFunction();
}
</script>