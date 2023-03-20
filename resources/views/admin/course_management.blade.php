@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="sub-title d-flex align-items-center justify-content-between mb-3">
              <h4 class="weight-500 my-0 flex-fill">Course Management</h4>
              <div class="search flex-fill mx-2">
                <div class="form-group my-0">
                  <input type="search" class="form-control search-icon" onkeyup="searchFunction()" id="searchInput" placeholder="Search by name/business type...">
                  <span class="clearsearch mdi mdi-close" onclick="clean_search()"></span>
                </div>
              </div>
            </div>
            <div class="search-bar d-flex align-items-center justify-content-between mb-4">
              <div class="filter-tabs col-sm-9 pl-0">
                <ul class="nav nav-tabs slim-scroll" id="myTab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href=".tab-1" data-target=".tab-1" onclick="course_searches(0)">All Courses</a></li>
                  @foreach($categories as $row => $category)
                   <li class="nav-item"><a class="nav-link" data-toggle="tab" href=".tab-2" data-target=".tab-2" href="#" onclick="course_searches('<?php echo $category->id; ?>')"><?php echo ucfirst($category->category_name); ?></a></li>
                  @endforeach
                </ul>
              </div>
              <div class="filter ml-2">
                <a class="btn btn-primary float-right rounded-pill px-4"  href="{{route('course_facilitator_request')}}">
                Course Request
                </a>
              </div>
              <!-- <div class="filter">
                <a href="" class="dropdown-toggle text-black" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filter
                  <img src="{{asset('assets/images/icons/filter.svg')}}">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <button class="dropdown-item" type="button">Action</button>
                  <button class="dropdown-item" type="button">Another action</button>
                  <button class="dropdown-item" type="button">Something else here</button>
                </div>
              </div> -->
            </div>
            <div class="form-check form-check-inline d-flex align-items-center simpleTab mb-3">
                  <label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" role="button" data-target="tab2-1">
                    <input class="form-check-input" type="radio" name="requests" checked onclick="statusType(0)">
                    All
                  </label>
                  <!-- <label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" role="button" data-target="tab2-1">
                    <input class="form-check-input" type="radio" name="requests" onclick="statusType(1)">
                    Requested
                  </label> -->
                  <label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-2" role="button">
                    <input class="form-check-input" type="radio" name="requests" onclick="statusType(2)">
                    Approved Requests
                  </label>
                  <label class="form-check-label navlink mr-3 pl-4 position-relative ml-0" data-target="tab2-3" role="button">
                    <input class="form-check-input" type="radio" name="requests" onclick="statusType(3)">
                    Rejected Requests
                  </label>
            </div>
            <input type="hidden" name="status_type" id="status_type" value="0">
            <input type="hidden" name="filter_type" id="filter_type" value="0">
            <div class="tab-content">
              <div class="tab-pane fade show active tab-1">
                <div class="card card-table round">
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless text-black mb-0" id="courseTable">
                      <thead>
                        <tr>
                          <th class="py-4">S.N.</th>
                          <th class="py-4">Course name</th>
                          <th class="py-4">Business Type</th>
                          <th class="py-4">Language</th>
                          <th class="py-4">Facilitator/Mentor</th>
                          <th class="py-4">Price(₦)</th>
                          <th class="py-4">Time Spent</th>
                          <th class="py-4">Applied On</th>
                          <th class="py-4">Last Updated On</th>
                          <th class="py-4">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($courses as $key => $course)
                        <tr id="trr">
                          <td>{{$key+1}}</td>
                          <td><a href="{{route('course_details',['id' => $course['id']])}}">{{$course['name']}}</a></td>
                          <td >{{$course['category']['category_name']}}</td>
                          <td >{{$course['language']['language']}}</td>
                          <td >{{$course['createdBy']['name']}}</td>
                          <td >{{$course['price']}}</td>
                          <td>{{$course['time_spent']}} days</td>
                          <td><?php echo date("d-m-Y", strtotime($course['created_at']));?></td>
                          <td><?php echo date("d-m-Y", strtotime($course['updated_at']));?></td>
                          <td>
                            <input type="hidden" name="sts" id="sts" value="{{$course['status']}}">
                            <?php 
                              if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                            ?>
                            <form method="post" action="{{route('changeCourseStatus')}}">
                            <?php } ?>
                              @csrf
                              @if($course['status'] == 0)
                              <select class="status border-0 bg-transparent text-warning" onchange="this.form.submit()" name="status">
                                <option disabled selected hidden>Requested</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <option class="text-info" value="rejected">Rejected</option>
                                <?php }else{ ?>
                                <option class="text-warning" value="active">Requested</option><?php } ?>
                              </select>
                              @endif
                              @if($course['status'] == 1)
                              <select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
                                <option class="text-success" value="active" selected>Active</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <option class="text-info" value="rejected">Rejected</option>
                                <?php } ?>
                              </select>
                              @endif
                              @if($course['status'] == 2)
                              <select class="status border-0 bg-transparent text-primary" onchange="this.form.submit()" name="status">
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <?php } ?>
                                <option class="text-info" value="rejected" selected>Rejected</option>
                              </select>
                              @endif
                              @if($course['status'] == 3)
                              <select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option><?php } ?>
                                <option class="text-danger" value="inactive" selected>Inactive</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-info" value="rejected">Rejected</option><?php } ?>
                              </select>
                              @endif
                            <input type="hidden" name="course_id" value="{{$course['id']}}">
                            <?php 
                              if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                            ?>
                            </form><?php } ?>
                          </td>
                        </tr>
                        @endforeach
                        @foreach($course_facilitators as $k => $course)
                        <tr id="trr">
                          <td>{{$key+$k+2}}</td>
                          <td><a href="{{route('course_details',['id' => $course['id']])}}">{{$course['name']}}</a></td>
                          <td >{{$course['category']['category_name']}}</td>
                          <td >{{$course['language']['language']}}</td>
                          <td >{{$course['createdBy']['name']}}</td>
                          <td >{{$course['price']}}</td>
                          <td>{{$course['time_spent']}} days</td>
                          <td><?php echo date("d-m-Y", strtotime($course['created_at']));?></td>
                          <td><?php echo date("d-m-Y", strtotime($course['updated_at']));?></td>
                          <td>
                            <input type="hidden" name="sts" id="sts" value="{{$course['status']}}">
                            <?php 
                              if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                            ?>
                            <form method="post" action="{{route('changeCourseStatus')}}">
                            <?php } ?>
                              @csrf
                              @if($course['status'] == 0)
                              <select class="status border-0 bg-transparent text-warning" onchange="this.form.submit()" name="status">
                                <option disabled selected hidden>Requested</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <option class="text-info" value="rejected">Rejected</option>
                                <?php }else{ ?>
                                <option class="text-warning" value="active">Requested</option><?php } ?>
                              </select>
                              @endif
                              @if($course['status'] == 1)
                              <select class="status border-0 bg-transparent text-success" onchange="this.form.submit()" name="status">
                                <option class="text-success" value="active" selected>Active</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <option class="text-info" value="rejected">Rejected</option>
                                <?php } ?>
                              </select>
                              @endif
                              @if($course['status'] == 2)
                              <select class="status border-0 bg-transparent text-primary" onchange="this.form.submit()" name="status">
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option>
                                <option class="text-danger" value="inactive">Inactive</option>
                                <?php } ?>
                                <option class="text-info" value="rejected" selected>Rejected</option>
                              </select>
                              @endif
                              @if($course['status'] == 3)
                              <select class="status border-0 bg-transparent text-danger" onchange="this.form.submit()" name="status">
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-success" value="active">Active</option><?php } ?>
                                <option class="text-danger" value="inactive" selected>Inactive</option>
                                <?php 
                                if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                                ?>
                                <option class="text-info" value="rejected">Rejected</option><?php } ?>
                              </select>
                              @endif
                            <input type="hidden" name="course_id" value="{{$course['id']}}">
                            <?php 
                              if((Auth::user()->user_type_id == 7 && (page_access_permission(3,1) != 0 || page_access_permission(3,2) != 0)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
                            ?>
                            </form><?php } ?>
                          </td>
                        </tr>
                        @endforeach         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade tab-2">
                <div class="card card-table round">
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless text-black mb-0 bg-white" id="searchTable">
                      <thead>
                        <tr>
                          <th class="py-4">S.N.</th>
                          <th class="py-4">Course name</th>
                          <th class="py-4">Business Type</th>
                          <th class="py-4">Language</th>
                          <th class="py-4">Facilitator/Mentor</th>
                          <th class="py-4">Price(?)</th>
                          <th class="py-4">Time Spent</th>
                          <th class="py-4">Applied On</th>
                          <th class="py-4">Last Updated On</th>
                          <th class="py-4">Status</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{ $courses->links() }}
            <div class="d-md-flex align-items-center justify-content-between mt-3" id="pagiantion">
              <div class="font-14 weight-500 text-gray">10 Results Per Page</div>
            </div>
          <!-- content-wrapper ends -->   
      </div>
    </div>
  </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

function course_searches(filter){
  var status_type = document.getElementById("status_type").value;
  document.getElementById("filter_type").value = filter;
  if(filter == 0 && status_type == 0){
    location.reload();
  }
  $.ajax({
         url: 'course_management_filter/'+filter+'/'+status_type,
         type: 'get',
         dataType: 'json',
         success: function(response){
          var len = 0;
          $('#searchTable tbody').empty();
          $('#courseTable tbody').empty();
          if(response != null){
              len = response.length;
          }
          if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response[i].id;
                 var name = response[i].name;
                 var category = response[i]['category']['category_name'];
                 var language = response[i]['language']['language'];
                 var created_by = response[i]['created_by']['name'];
                 var price = response[i]['price'];
                 var time_spent = response[i]['time_spent'];
                 var created_at =  response[i]['created_at'];
                 var updated_at = response[i]['updated_at'];
                 var status = response[i].status;
                 var status_td;
                 if(status == 0){
                  status_td = "<select class='status border-0 bg-transparent text-warning' onchange='changeStatus("+id+",0)' id='status' name='status'><option disabled selected hidden>Requested</option>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 if(status == 1){
                  status_td = "<select class='status border-0 bg-transparent text-success' onchange='changeStatus("+id+",1)' id='status' name='status'>"
                      +"<option class='text-success' value='active' selected>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 if(status == 2){
                  status_td = "<select class='status border-0 bg-transparent text-primary' onchange='changeStatus("+id+",2)' id='status' name='status'>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected' selected>Rejected</option></select>";
                 }
                 if(status == 3){
                  status_td = "<select class='status border-0 bg-transparent text-danger' onchange='changeStatus("+id+",3)' id='status' name='status'>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive' selected>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 var tr_str = "<tr>" +
                   "<td>" + (i+1) + "</td>" +
                   "<td><a href='course_details?id="+id+"' class='text-info'>" + name + "</a></td>" +
                   "<td>" + category + "</td>" +
                   "<td>" + language + "</td>" +
                   "<td>" + created_by + "</td>" +
                   "<td>" + price + "</td>" +
                   "<td>"+time_spent+" days</td>"+
                   "<td>"+created_at+"</td>"+
                   "<td>"+updated_at+"</td>"+
                   "<td>"
                      + status_td
                    +"</td>"+
                 "</tr>";

                if(filter == 0){
                  $("#courseTable tbody").append(tr_str);
                }else{
                  $("#searchTable tbody").append(tr_str);
                }
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              if(filter == 0){
                  $("#courseTable tbody").append(tr_str);
              }else{
                  $("#searchTable tbody").append(tr_str);
              }
           }

        }
    });
  console.log(filter)
}

function searchFunction() {
  var  tr, name,category, i, txtValue, txtValueCategory;
  var input = document.getElementById("searchInput");
  var trim = input.value.toUpperCase();
  var filter = trim.trim();
  var table = document.getElementById("courseTable");
  var tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
    category = tr[i].getElementsByTagName("td")[2];
    if (name || category) {
      txtValue = name.textContent || name.innerText;
      txtValueCategory = category.textContent || category.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if(txtValueCategory.toUpperCase().indexOf(filter) > -1){
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
      course_id: id,
      status: type,
      "_token": "{{ csrf_token() }}",
  };
   $.ajax({
         url: 'changeCourseStatus',
         type: 'post',
         data: formData,
         dataType: 'json',
         success: function(response){
          return response;
         }
   });
}
function clean_search() {
    console.log('a');
    document.getElementById("searchInput").value = "";
    searchFunction();
}
function statusType(id){
  document.getElementById("status_type").value=id;
  var filter = document.getElementById("filter_type").value;
  document.getElementById("filter_type").value=filter;
  if(filter == 0 && id == 0){
    location.reload();
  }
  $.ajax({
         url: 'course_management_filter/'+filter+'/'+id,
         type: 'get',
         dataType: 'json',
         success: function(response){
          var len = 0;
          $('#searchTable tbody').empty(); // Empty <tbody>
          $('#courseTable tbody').empty();
          if(response != null){
              len = response.length;
          }
          if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response[i].id;
                 var name = response[i].name;
                 var category = response[i]['category']['category_name'];
                 var language = response[i]['language']['language'];
                 var created_by = response[i]['created_by']['name'];
                 var price = response[i]['price'];
                 var time_spent = response[i]['time_spent'];
                 var created_at =  response[i]['created_at'];
                 var updated_at = response[i]['updated_at'];
                 var status = response[i].status;
                 var status_td;
                 if(status == 0){
                  status_td = "<select class='status border-0 bg-transparent text-warning' onchange='changeStatus("+id+",0)' id='status' name='status'><option disabled selected hidden>Requested</option>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 if(status == 1){
                  status_td = "<select class='status border-0 bg-transparent text-success' onchange='changeStatus("+id+",1)' id='status' name='status'>"
                      +"<option class='text-success' value='active' selected>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 if(status == 2){
                  status_td = "<select class='status border-0 bg-transparent text-primary' onchange='changeStatus("+id+",2)' id='status' name='status'>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive'>Inactive</option><option class='text-info' value='rejected' selected>Rejected</option></select>";
                 }
                 if(status == 3){
                  status_td = "<select class='status border-0 bg-transparent text-danger' onchange='changeStatus("+id+",3)' id='status' name='status'>"
                      +"<option class='text-success' value='active'>Active</option><option class='text-danger' value='inactive' selected>Inactive</option><option class='text-info' value='rejected'>Rejected</option></select>";
                 }
                 var tr_str = "<tr>" +
                   "<td>" + (i+1) + "</td>" +
                   "<td><a href='course_details?id="+id+"' class='text-info'>" + name + "</a></td>" +
                   "<td>" + category + "</td>" +
                   "<td>" + language + "</td>" +
                   "<td>" + created_by + "</td>" +
                   "<td>" + price + "</td>" +
                   "<td>"+time_spent+" days</td>"+
                   "<td>"+created_at+"</td>"+
                   "<td>"+updated_at+"</td>"+
                   "<td>"
                      + status_td
                    +"</td>"+
                 "</tr>";

                if(filter == 0){
                  $("#courseTable tbody").append(tr_str);
                }else{
                  $("#searchTable tbody").append(tr_str);
                }
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              if(filter == 0){
                  $("#courseTable tbody").append(tr_str);
              }else{
                  $("#searchTable tbody").append(tr_str);
              }
           }

        }
    });
}
</script>