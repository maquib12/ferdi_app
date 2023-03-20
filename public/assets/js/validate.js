function pushNotification(type)
    {
      $.ajax({
       
        url: baseUrl+'/facilitator/notifications-push',
        type: 'get',
        data:{"_token": $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function(response){
          var html= "";
          for(var a =0; a<response.push.length; a++){
          var res = response.push[a];
          html+='<div class="item"><p>'+res['message']+'</p><div class="dateTime">'+res['timeAgo']+'</div></div>';
         }
         var pushCount = (response.count !== "undefined" && response.count > 0)?response.count:0;
         $(".pushCount").html(pushCount);
         $('.push_notification').html(html);
        }
      });
  }