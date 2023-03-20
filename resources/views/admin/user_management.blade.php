@extends('admin.layout.master')
@section('content')

        <div class="main-panel">

          <div class="content-wrapper">
            <div class="d-flex align-items-center mb-2">
              <div class="sub-title flex-fill">
                <h4 class="weight-500 my-0">User Management</h4>
              </div>
              <div class="tab-content flex-fill">
                <div class="tab-pane fade show active tab-1">
                  <div class="d-flex align-items-center">
                   <div class="search flex-fill mx-2">
                        <div class="form-group my-0">
                          <input class="form-control search-icon" placeholder="Search..."  id="search" type="search">
                          <span class="clearsearch mdi mdi-close"></span>
                        </div>  
                    </div>
                    <button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport()">Export data</button>
                  </div>
                </div>
                <div class="tab-pane fade tab-2">
                  <div class="d-flex align-items-center">
                    <div class="search flex-fill mx-2">
                        <div class="form-group my-0">
                          <input class="form-control search-icon" onkeyup="searchFunction()" id="searchInput" placeholder="Search by name/email address...">
                          <span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
                        </div>
                    </div>
                    @if(!isset($dateselector))
                      <input type="hidden" id="date" value="2">
                      <input type="hidden" id="tab_decesion" value="0">
                    @else
                    <input type="hidden" id="date" value="{{$dateselector}}">
                    <input type="hidden" id="tab_decesion" value="1">
                    @endif
                    <button class="btn btn-primary float-right rounded-pill px-4" type="button" onclick="userexport()" id="export_data" value="all">Export data</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="search-bar d-flex align-items-center justify-content-between mb-2">
              <div class="filter-tabs">
                <ul class="nav nav-tabs targetClass" id="myTab">
                  @if($tab != 'all')
                  <li class="nav-item"><a class="nav-link" href="{{route('user_management')}}">All Users</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1">All Users</a></li>
                  @endif
                  @if($tab == 'students')
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2">Students</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">Students</a></li>
                  @endif
                  @if($tab == 'facilitators & mentors')
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2">Facilitators & Mentors</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">Facilitators & Mentors</a></li>
                  @endif
                  @if($tab == 'sponsors')
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-2" data-target=".tab-2">Sponsors</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2">Sponsors</a></li>
                  @endif
                </ul>
              </div>
              <div class="filter flex-fill d-flex justify-content-md-end">
                <!-- <a href="" class="dropdown-toggle text-black" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter_texts">
                  Filter
                  <img src="{{asset('assets/images/icons/filter.svg')}}">
                </a> -->
                <!-- <div class="dropdown-menu dropdown-menu-right w-auto py-2">
                  <button class="dropdown-item bg-transparent px-0" type="button" onclick="filter(0)">Today</button>
                  <button class="dropdown-item bg-transparent px-0" type="button" onclick="filter(1)">Last 7 days</button>
                  <button class="dropdown-item bg-transparent px-0" type="button" onclick="filter(2)">All</button>
                </div> -->
                @if(!isset($dateselector))
                <form method="get" action="{{route('userdate_filtered')}}" class="my-0">
                  @csrf
                <select id="status" name="date" class="status filter dropdown-toggle text-black" onchange="this.form.submit()">
                  <option disabled selected hidden>Filter</option>
                  <option value="0">Today</option>
                  <option value="1">Last 7 days</option>
                  <option value="2">All</option>
                </select>
                <input type="hidden" name="tabFilter" id="tabFilter" value="{{$tab}}">
                </form>
                @else
                <form method="get" action="{{route('userdate_filtered')}}" class="my-0">
                  @csrf
                <select id="status" name="date" class="status filter dropdown-toggle text-black" onchange="this.form.submit()">
                  @if($dateselector == 0) <option disabled selected hidden>Today</option> @endif
                  @if($dateselector == 1) <option disabled selected hidden>Last 7 days</option> @endif
                  @if($dateselector == 2) <option disabled selected hidden>All</option> @endif
                  <option value="0">Today</option>
                  <option value="1">Last 7 days</option>
                  <option value="2">All</option>
                </select>
                <input type="hidden" name="tabFilter" id="tabFilter" value="{{$tab}}">
                </form>
                @endif
              </div>
              <!-- <div class="filter ml-2">
                <a class="btn btn-primary float-right rounded-pill px-4 btn-sm font-12"  href="{{route('mentor_request')}}">
                Mentor Requests
                </a>
              </div> -->
              <div class="filter ml-2">
                <a class="btn btn-primary float-right rounded-pill px-4 btn-sm font-12"  href="{{route('facilitator_request')}}">
									<img src="{{asset('assets/img/icons/request.svg')}}" height="24" class="mr-1"> Facilitator
                </a>
              </div>
              <div class="filter ml-2">
                <a class="btn btn-primary float-right rounded-pill px-4 btn-sm font-12"  href="{{route('sponsor_request')}}">
                <img src="{{asset('assets/img/icons/request.svg')}}" height="24" class="mr-1"> Sponsor
                </a>
              </div>
            </div>
            <div class="card card-table round data-table bg-transparent">
              <div class="tab-content">
                <div class="tab-pane fade show active tab-1">
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless text-black mb-0 dataTable" id="userTable">
                      <thead>
                        <tr>
                          <th class="py-4">S.N.</th>
                          <th class="py-4">User name</th>
                          <th class="py-4">Email</th>
                          <th class="py-4">User Type</th>
                          <th class="py-4">City</th>
                          <th class="py-4">Time Spent</th>
                          <th class="py-4">Registration Date</th>
                          <th class="py-4">Status</th>
                          <!-- <th class="py-4">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;?>
                        @foreach($users as $key => $user)
                        <tr id="trr">
                          <td>{{$i}}</td>
                          <td><a href="{{route('userDetails',['id'=> $user['id']])}}" class="text-info">{{$user['name']}}</a></td>
                          <td >{{$user['email']}}</td>
                          <td class="type" id="user_type">
                            <div class="action">
                              @if($user['user_type_id'] == 5)<span class="border border-info text-info rounded-pill btn-8" id='user_type'>Sponsor</span>
                              @elseif($user['user_type_id'] == 4)<span class="border border-warning text-warning rounded-pill btn-8" id='user_type'>Facilitator</span>
                              @elseif($user['user_type_id'] == 3) <span class="border border-success text-success rounded-pill btn-8" id='user_type'>Mentor</span>
                              @elseif($user['user_type_id'] == 6)<span class="border border-danger text-danger rounded-pill btn-8" id='user_type'>Student</span>
                              @endif
                            </div>
                          </td>
                          <td>
                            @if($user->userdetails == null)
                              <div class="w100 text-truncate">-</div>
                            @else
                              <div class="w100 text-truncate">{{isset($user->userdetails->city->name) ? $user->userdetails->city->name : ""}}</div>
                            @endif
                          </td>
                          @if((time() - strtotime($user['created_at'])) < 86400)
                          <td>0 days</td>
                          @else
                          <td>{{ floor((time() - strtotime($user['created_at'])) / (3600*24)) }} days</td>
                          @endif
                          <td><?php echo date("d-m-Y", strtotime($user['created_at']));?></td>
                          <td>
                            <form method="post" action="{{route('changeUserStatus')}}">
                              @csrf
                              @if($user['status'] == 1)
                              <select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
                                <option class="text-success" value="active" selected>Active</option>
                                <?php 
                                  if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>  
                                <option class="text-danger" value="inactive">Inactive</option>
                              <?php } ?>
                              </select>
                              @endif
                              @if($user['status'] == 0)
                              <select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
                                <option class="text-success" value="inactive" selected>Inactive</option>
                                <?php 
                                  if((Auth::user()->user_type_id == 7 && (page_access_permission(2,1) != 0 || page_access_permission(2,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-danger" value="active">Active</option>
                              <?php } ?>
                              </select>
                              @endif
                            <input type="hidden" name="user_id" value="{{$user['id']}}">
                            </form>
                          </td>
                          <!-- <td>
                            <button class="btn border-success btn-sm text-success px-3 rounded-pill font-12 ml-2"><a href="{{route('delete_user',['id'=>$user['id']])}}">Delete</a></button>
                          </td> -->
                        </tr>
                        <?php $i = $i+1;?>
                        @endforeach         
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade tab-2">
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless text-black mb-0 bg-white" id="searchTable">
                      <thead>
                        <tr>
                          <th class="py-4">S.N.</th>
                          <th class="py-4">User name</th>
                          <th class="py-4">Email</th>
                          <th class="py-4">User Type</th>
                          <th class="py-4">City</th>
                          <th class="py-4">Time Spent</th>
                          <th class="py-4">Registration Date</th>
                          <th class="py-4">Status</th>
                          <!-- <th class="py-4">Action</th> -->
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>  
            </div>
            <!-- <div class="d-md-flex align-items-center justify-content-between mt-3">
              <div class="font-14 weight-500 text-gray">10 Results Per Page</div>
              </div>  
          </div> -->
          <!-- content-wrapper ends -->   
      </div>

    </div>
  </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("ul[id*=myTab] li").click(function(){
    var choice = $(this).text().toLowerCase();
    var date = document.getElementById('date').value;
    if(choice == 'all users'){
      location.reload();
    }else{
    $.ajax({
         url: 'getUsers/'+choice+'/'+date,
         type: 'get',
         dataType: 'json',
         success: function(response){
          var len = 0;
          $('#searchTable tbody').empty(); // Empty <tbody>
          if(response != null){
              len = response.length;
          }
          if(len > 0){
            document.getElementById('export_data').value = choice;
            document.getElementById('tabFilter').value = choice;
              for(var i=0; i<len; i++){
                 var id = response[i].id;
                 var username = response[i].name;
                 var email = response[i].email;
                 var user_type = response[i]['user_type']['user_type'];
                 var time_spent = response[i]['time_spent'];
                 var created_at = response[i]['created_at_modified'];
                 var status = response[i].status;
                 var city = '-';
                 if(response[i]['userdetails'] != null){
                  var city = response[i]['userdetails']['city']['name'];
                 }
                 var status_td;
                 if(status == 0){
                  status_td = "<select class='status border-0 bg-transparent text-danger' onchange='changeStatus("+id+",1)' id='status'><option class='text-success' value='active'>Active</option>"
                      +"<option class='text-danger' value='inactive' selected>Inactive</option></select>";
                 }
                 if(status == 1){
                  status_td = "<select class='status border-0 bg-transparent text-success' onchange='changeStatus("+id+",1)' id='status'><option class='text-success' value='active' selected>Active</option>"
                      +"<option class='text-danger' value='inactive'>Inactive</option></select>";
                 }
                 var tr_str = "<tr>" +
                   "<td>" + (i+1) + "</td>" +
                   "<td><a href='userDetails?id="+id+"-"+user_type+"' class='text-info'>" + username + "</a></td>" +
                   "<td>" + email + "</td>" +
                   "<td class='type'><div class='action'><span class='border border-info text-info rounded-pill btn-8' id='user_type'>" + user_type + "</span></div></td>" +
                   "<td><div class='w100 text-truncate'>"+city+"</div></td>"+
                   "<td>"+time_spent+" days</td>"+
                   "<td>"+created_at+"</td>"+
                   "<td>"
                      + status_td
                    +"</td>"+
                 "</tr>";

                 $("#searchTable tbody").append(tr_str);
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#searchTable tbody").append(tr_str);
           }

        }
    });
  }
  });
});

// $(document).ready(function() {
//   $("ul[id*=myTab] li").click(function(){
//     var  tr, category, i, txtValueCategory;
//     var filter = $(this).text().toUpperCase();
//     if(filter == 'ALL USERS'){
//       location.reload();
//     }
//     if(filter == 'FACILITATOR & MENTOR'){
//       filter = 'FACILITATOR';
//     }
//     var table = document.getElementById("userTable");
//     var tr = table.getElementsByTagName("tr");
//     for (i = 1; i < tr.length; i++) {
//       category = tr[i].getElementsByTagName("td")[3];
//       if (category) {
//         txtValueCategory = category.textContent || category.innerText;
//         if (txtValueCategory.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         }else{
//             tr[i].style.display = "none";
//       }
//     }       
//   }
//   });
// });


function searchFunction() {
  var  tr, name,email, i, txtValue, txtValueEmail;
  var input = document.getElementById("searchInput");
  var upper = input.value.toUpperCase();
  var filter = upper.trim();
  var table = document.getElementById("searchTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    email = tr[i].getElementsByTagName("td")[2];
    if (name || email) {
      txtValue = name.textContent || name.innerText;
      txtValueEmail = email.textContent || email.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if(txtValueEmail.toUpperCase().indexOf(filter) > -1){
        tr[i].style.display = "";
      } else{
        tr[i].style.display = "none";
      }
    }       
  }
}



function changeStatus(id,type) {
  var type = document.getElementById("status").value;
  var formData = {
      user_id: id,
      status: type,
      "_token": "{{ csrf_token() }}",
  };
   $.ajax({
         url: 'changeUserStatus',
         type: 'post',
         data: formData,
         dataType: 'json',
         success: function(response){
          return response;
         }
   });
}

function userexport_filtered() {
    var date = document.getElementById('date').value;
    console.log(date)
    // var url = "{{URL::to('admin/userexport')}}?date="+date ;
    // window.location = url;
}
function userexport() {
    var date = document.getElementById('date').value;
    var tab_decesion = document.getElementById('tab_decesion').value;
    if(tab_decesion == 0){
      var choice = document.getElementById('export_data').value;
    }
    if(tab_decesion == 1){
      var choice = document.getElementById('tabFilter').value;
    }
    console.log(date,tab_decesion,choice);
    var choice_lower = choice.toLowerCase();
    var url = "{{URL::to('admin/userexport_filtered')}}?filter_user="+choice_lower+"&date="+date ;
    window.location = url;
}

function clean_search() {
    console.log('a');
    document.getElementById("searchInput").value = "";
    searchFunction();
}
</script>
