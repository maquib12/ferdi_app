var base_url = $('meta[name="base_url"]').attr('content');

jQuery.validator.addMethod("validateEmail", function (value, element, param) {
  return value = value.replace(/\(|\)|\s+|-/g, ""), this.optional(element) || value.length > 5 && value.match(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
}, "Please enter a valid email address");

jQuery.validator.addMethod("lettersonly", function (value, element) {
  return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "Please enter alphabets only.");

jQuery.validator.addMethod("lettersDigit", function (value, element) {
  return this.optional(element) || /^[a-z 0-9]+$/i.test(value);
}, "Please do not enter special characters.");

jQuery.validator.addMethod(
  "checkFile",
  function (value, element) {
    $("[name^=document_image]").each(function (i, j) {
      var ext = value.split('.').pop().toLowerCase();
      console.log(ext);
      if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'PDF', 'doc', 'docx']) == -1) {
        return false;
      }
      return true;
    });
  },
  "invalid extension!"
);
jQuery.validator.addMethod(
  "checkFileLogo",
  function (value, element) {
      var ext = value.split('.').pop().toLowerCase();
      console.log(ext);
      if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
        return false;
      }
      return true;
  },
  "invalid extension!"
);


jQuery.validator.addMethod(
  "checkFileId",
  function (value, element) {
      var ext = value.split('.').pop().toLowerCase();
      console.log(ext);
      if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
        return false;
      }
      return true;
  },
  "invalid extension!"
);

jQuery.validator.addMethod(
            "trioDate",
            function(value, element) {
                return value.match(/^\d{1,2}\/\d{2}$/);
            },
            "Please enter a date in the format mm/yy"
        );



$("#loan-form1").validate({
  rules: {
    first_name: {
      required: true,    
    },
    last_name: {
      required: true,
    },
    gender: {
      required: true,
    },
    state_of_origin : {
      required: true,
    },
    mobile_number: {
      required: true,
      digits: true,
      maxlength:10
    },
    email: {
      required: true,
      validateEmail: true,
      email: true
    },
     dob: {
      required: true,
      date: true,
    },
    marital_status: {
      required: true,
    },
    street_address:{
      required: true,
    },
    landmark: {
      required: true,
    },
    country: {
      required: true,
    },
    state: {
      required: true,
    },
    bvn: {
      required: true,
    },
    government_id: {
      required: true,
    },
    id_number: {
      required: true,
    },
    institute_name: {
      required: true,
    },
    qualification: {
      required: true,
    },
    course: {
      required: true,
    },
    date_awarded: {
      required: true,
    },
    company_name: {
      required: true,
    },
    company_address: {
      required: true,
    },
    company_street_address: {
      required: true,
    },
    company_landmark: {
      required: true,
    },
    company_country: {
      required: true,
    },
    company_state:{
       required: true,
    },
    name_of_association: {
      required: true,
    },
    address_of_association: {
      required: true,
    },
    strength1: {
      required: true,
    },
    strength2: {
      required: true,
    },
    strength3: {
      required: true,
    },
    opportunity1: {
      required: true,
    },
    opportunity2: {
      required: true,
    },
    opportunity3: {
      required: true,
    },
    weakness1: {
      required: true,
    },
    weakness2: {
      required: true,
    },
    weakness3: {
      required: true,
    },
    threats1: {
      required: true,
    },
    threats2: {
      required: true,
    },
    threats3: {
      required: true,
    },
    owner_name: {
      required: true,
    },
    owner_share: {
      required: true,
    },
    manager_name: {
      required: true,
    },
    manager_responsibility: {
      required: true,
    },
    sector_engaged: {
      required: true,
    },
    sub_sector: {
      required: true,
    },
    aspect: {
      required: true,
    },
    nature_of_your_business: {
      required: true,
    },
    stage_of_business: {
      required: true,
    },
    totals_years: {
      required: true,
    }
  },
  messages: {
    first_name: {
      required: "*Please enter first name.",

    },
    last_name: {
       required: "*Please enter last name.",
    },
    gender: {
       required: "*Please enter your gender.",
    },
    state_of_origin: {
      required: "*Please enter state of origin.",
    },
    mobile_number: {
      required: "*Please enter mobile number."

    },
    email: {
      required: "*Please enter email.",
      email: "Please enter valid email."

    },

    dob: {
      required: "*Please enter your date of birth.",

    },
    marital_status: {
      required: "*Please select your marital status.",
    },
    street_address:{
      required: "*Please enter your street address.",
    },
    landmark: {
      required: "*Please enter your nearest landmark.",
    },
    country: {
      required: "*Please select your country.",
    },
    state: {
      required: "*Please select your state.",
    },
      bvn: {
      required: "*Please enter your Bank Verifcation Number.",
    },
    government_id: {
      required: "*Please enter your Id Issued government.",
    },
    id_number: {
      required: "*Please enter Id number.", 
    },
    institute_name: {
      required: "*Please enter institute name.",
    },
    qualification: {
      required: "*Please enter your qualification.",
    },
    course: {
      required: "*Please enter your course.",
    },
    date_awarded: {
      required: "*Please enter date awarded.",
    },
    company_name: {
      required: "*Please enter company name.",
    },
    company_address: {
      required: "*Please enter company address.",
    },
    company_street_address: {
      required: "*Please enter street address.",
    },
    company_landmark: {
      required: "*Please enter nearest landmark.",
    },
    company_country: {
      required: "*Please select country.",
    },
    company_state: {
       required: "*Please select state.",
    },
    name_of_association: {
      required: "*Please enter name of association.",
    },
    address_of_association: {
      required: "*Please enter address of association.",
    },
    strength1: {
      required: "*Please enter strength.",
    },
    strength2: {
      required: "*Please enter second strength.",
    },
    strength3: {
      required: "*Please enter third strength.",
    },
    opportunity1: {
      required: "*Please enter opportunity.",
    },
    opportunity2: {
      required: "*Please enter second opportunity.",
    },
    opportunity3: {
      required: "*Please enter third opportunity.",
    },
    weakness1: {
      required: "*Please enter weakness.",
    },
    weakness2: {
      required: "*Please enter second weakness.",
    },
    weakness3: {
      required: "*Please enter third weakness.",
    },
    threats1: {
      required: "*Please enter threats.",
    },
    threats2: {
      required: "*Please enter second threats.",
    },
    threats3: {
      required: "*Please enter third threats.",
    },
    owner_name: {
      required: "*Please enter owner name.",
    },
    owner_share: {
      required: "*Please enter share holding in %.",
    },
    manager_name: {
      required: "*Please enter manager name.",
    },
    manager_responsibility: {
      required: "*Please enter area of responsibility.",
    },
    sector_engaged: {
       required: "*Please select your sector.",
    },
    sub_sector: {
      required: "*Please enter your sub sector.",
    },
    aspect: {
      required: "*Please enter any aspect.",
    },
    nature_of_your_business: {
      required: "*Please enter nature of your business.",
    },
    stage_of_business: {
      required: "*Please enter stage of business.",
    },
    totals_years: {
      required: "*Please enter Years Have You Been Operating.",
    }
  }
});


$("#sign-up-sponsor").validate({ 
  rules: {
    email: {
      required: true,
      validateEmail: true,
      email: true
    },
    phone_no: {
      required: true,
      digits: true,
      maxlength:10
    },
    password: {
      minlength : 5
    },
    confirm_password: {
      minlength : 5,
      equalTo: "#password_sponsor"
    }
  },
  messages: {
    email: {
      required: "*Please enter email.",
      email: "Please enter valid email."

    },
    phone_no: {
      required: "*Please enter mobile number."

    },
    password: {
      required: "*Please enter password."

    },
    confirm_password: {
      required: "*Please enter confirm password.",
      equalTo: "Please enter confirm password same as password."

    },
  }
  });


  $("#complete_sponsor_profile").validate({ 
  rules: {
    business_name: {
      required: true,
      lettersonly: true,
    },
    business_owner_name: {
      required: true,
      lettersonly: true,
    },
    business_email: {
      required: true,
      validateEmail: true,
      email: true
    },
    sponsor_business_logo: {
      required: true,
      checkFileLogo: true,
    },
    upload_id_proof: {
      required: true,
      checkFileId: true,
    },
    checkboxes: {
       required: true,
    }
   
  },
  messages: {
    business_name: {
      required: "*Please enter business name.",

    },
    business_owner_name: {
      required: "*Please enter business owner name."

    },
    business_email: {
      required: "*Please enter email.",
      email: "Please enter valid email."

    },
    sponsor_business_logo: {
      required: "*Please select any logo."
    },
    upload_id_proof: {
      required: "*Please select any id."
    },
    checkboxes: {
       required: "*Please accept privacy & policy and Terms-n-condition."
    }
 
  }
  });

$("#sponsor-change-password").validate({
rules: {
  sponsor_current_password: {
      required: true,
    },
    sponsor_new_password: {
      required: true,
    },
    sponsor_confirm_password: {
      required: true,
      equalTo: "#sponsor_new_password"
    }
  },
  messages: {
    sponsor_current_password: {
      required: "*Please enter old password."
    },
    sponsor_new_password: {
      required: "*Please enter new password."
    },
    sponsor_confirm_password: {
      required: "*Please enter confirm password.",
      equalTo: "Please enter confirm password same as password."
    }
  }

});

$(".sponsor-reset-submit").on("click", function(){
  var val = $("#sponsor-change-password").valid();
  if(val == true){
    var formData = new FormData($('#sponsor-change-password')[0]);
    $.ajax({
            type: "POST",
            dataType: "json",
            url: "sponsor-change-password",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){
              if(response.success == 1){
                console.log(response);
                $('#change-password.modal').modal('hide');
                toastr.success(response.message);

              }else if(response.success == 0){
                toastr.error(response.message);
              }
                  
                     
            },
            error: function (err) {
               toastr.error(err);
            
            } 
        });
  }
  
});

$("#sponsor-login-form").validate({
rules: {
  sponsor_login_email: {
      required: true,
      validateEmail: true,
      email: true
    },
    sponsor_login_password: {
      required: true,
    }
  },
  messages: {
    sponsor_login_email: {
      required: "*Please enter email.",
      email: "Please enter valid email."

    },
    sponsor_login_password: {
      required: "*Please enter password.",
    }
  }

});

$("#addCard").validate({
rules: {
  holder_name: {
      required: true,
    },
    card_number: {
      required: true,
      digits: true,
      minlength:16,
      maxlength:16
    },
    card_expiry: {
      required: true,
      trioDate:true,
    },
    card_cvc: {
      required: true,
      minlength:3,
      maxlength:3
    },
    check: {
      required: true,
    }
  },
  messages: {
    holder_name: {
      required: "*Please Enter Card Holder Name.",

    },
    card_number: {
      required: "*Please Enter Card Number.",
    },
    card_expiry: {
      required: "*Please Enter Card Expiry.",
    },
    card_cvc: {
      required: "*Please Enter CVC.",
    },
    check: {
      required: "*Please Accept Terms & Conditions.",
    }
  }

});

$(".sponsor-login-submit").on("click", function(){
      var val = $("#sponsor-login-form").valid();
      if(val == true){
      var formData = new FormData($('#sponsor-login-form')[0]);
      $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "sponsor-login",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  success: function(response){
                    if(response.success == 1){
                      console.log(response);
                      toastr.options.onHidden = function() { window.location.href = window.location.origin + `/ferdi_app/public/sponsors/home`; }
                      toastr.success(response.message);

                    }else if(response.success == 0){
                      toastr.error(response.message);
                    }
                        
                           
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });

    }
   });

  $(".sponsor_details").on("click", function(){
    var validates = $("#complete_sponsor_profile").valid();
    var _token =  $("#token").val();
    if(validates == true){
      
      // var business_name = $('#business_name').val();
      // var business_owner_name = $('#business_owner_name').val();
      // var business_email = $('#business_email').val();
      // var business_type = $('#business_type').val();
      // var upload_id_proof = $('#upload_id_proof').val();

       //var sponsor_details = document.getElementById("complete_sponsor_profile");
      var formData = new FormData($('#complete_sponsor_profile')[0]);
      formData.append("_token",_token);
    
      // console.log(formData);return false;
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "complete-profile-sponsor",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  success: function(response){
                    if(response.success == 1){
                      console.log(response);
                      $('#login.modal').modal('hide');
                      $('#login.modal .complete_profile').hide();
                      $('#login.modal .step-1').show();
                      toastr.success(response.message);
                      //window.location.href = window.location.origin + `/ferdi/public/`;
                      

                    }else if(response.success == 0){
                      toastr.error(response.message);
                    }
                        
                           
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });

    }
    
 });   


$(".submit-details").on("click", function(){
      var validate = $("#sign-up-sponsor").valid();
      if(validate == true){
          var email = $('#email-sponsor').val();
          var code = $('#code').val();
          var phone = $('#phone_no').val();
          var password = $('#password_sponsor').val();
          var confirm_password = $('#confirm_password').val();
          console.log(email,phone)
          
            /*  $("#butsave").attr("disabled", "disabled"); */
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "registration-sponsor",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  data: {
                      email: email,
                      phone: phone,
                      code: code,
                      password: password,
                      confirm_password: confirm_password,
                      user_type: 5,
                  },
                  cache: false,
                  success: function(response){
                    if (response.success == 0) {
                      toastr.success(response.message);
                    }else if(response.success == 1){
                      console.log(response.data);
                        $('#sponsor_id').val(response.data.id)
                        $('#sponsor_email').val(response.data.email)
                        $('.complete_profile').removeClass('d-none');
                        $('.spr-signup').hide();
                        toastr.success(response.message);
                    }else{
                      toastr.success(response.message);
                    }
                        
                           
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });
      }
});



$(".saveCards").on("click", function(){
      var validate = $("#addCard").valid();
      if(validate == true){
          var formData = new FormData($('#addCard')[0]);
          console.log(formData)
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "add-card",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  success: function(response){
                    if(response.success == 1){
                      console.log(response);
                      toastr.success(response.message);
                      $('[data-hide=".addCard"][data-show=".myAccount"]').click();

                    }else if(response.success == 0){
                      toastr.error(response.message);
                    }
                        
                           
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });
      }
});

$(".stuSaveCards").on("click", function(){
      var validate = $("#addCard").valid();
      if(validate == true){
          var formData = new FormData($('#addCard')[0]);
          console.log(formData)
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "stu-add-card",
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  success: function(response){
                    if(response.success == 1){
                      console.log(response);
                      toastr.success(response.message);
                      $('[data-hide=".addCard"][data-show=".myAccount"]').click();

                    }else if(response.success == 0){
                      toastr.error(response.message);
                    }
                        
                           
                  },
                  error: function (err) {
                     toastr.error(err);
                  
                }
              });
      }
});

$(".business_logo").on("change",function(){
 var current_value = $("#sponsor_business_logo").val();
 $("#stat_business_logo").html("");
 $("#stat_business_logo").html(current_value);
});

$(".id_proof").on("change",function(){
 var current_value = $("#upload_id_proof").val();
 $("#stat_id_proof").html("");
 $("#stat_id_proof").html(current_value);
});