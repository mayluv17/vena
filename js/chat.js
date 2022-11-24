$(document).ready(function() {
	
/* setInterval(function() {
			  
			  $.ajax({
				type: "GET",
				url: "talkcount.php",
			    async: true,
				success : function(response){
				$("div#display_chat").append(response);
				
				}
				}); }, 1000);*/
		  
  setInterval(function() {
			$.ajax({
				type: "GET",
				url: "chat/retrivetalk.php?method=newchat",
				async: true,
				success : function(response){
				$('.not1').html('');
				$("div#display_chat").append(response).fadeIn(300);
				
				if (response){
				var itemContainer = $('#display_chat');
                var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';
   			    itemContainer.slimScroll({
				scrollTo : scrollTo_int,
        		height: '500px',
				//start: 'bottom',
				alwaysVisible: true ,
				railBorderRadius: 0,
				railVisible: true
				}); 
				
				}
				
			
			
				},
				
				error:function (xhr, ajaxOptions, thrownError){
               
				$('.not1').html('<div id="Nett_not"><span>Check your network Connection</span></div>');
               
            }
			
			});
        }, 2000);
		
	
function loadtalk(myData){
	
		    jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "chat/retrivetalk.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //data to process 
            success: function (response){
            $("div#display_chat").html(response);
            var itemContainer = $('#display_chat');
    		var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';
			itemContainer.slimScroll({
		    scrollTo : scrollTo_int,
            height: '480px',
		   start: 'bottom',
		   alwaysVisible: true,
		   railBorderRadius: 0,
		   railColor: '#ffffff',
		   railVisible: true
		});
			}, 
			
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
				$('.not1').html('<div id="Nett_not"><span>Check your network Connection</span></div>');
               
            }
            });
			
		  }
//$("div#inner-chatlist-div").load("talklist.php");			
     //##### Send Ajax request  #########
	// $(".userToChat").click( function(e) {
        $("body").on("click", ".userToChat", function(e) {
         e.preventDefault();
         var clickedID = $(this).attr('id').split('_'); //Split ID string (Split works as PHP explode)
         var DbNumberID = clickedID[1]; //and get number from array
         var myData = 'ChatToRetrieve='+ DbNumberID;//build a post data structure
		 $('#toUser').val(DbNumberID);
		 var uname = $(this).attr('title').split('_');
		 var uname = uname[1];
		 $('#uname').html(uname);
		  loadtalk(myData);
		  
		  
             //$('#adfasdf', form).html('<img src="../../images/ajax-loader.gif" />'); loading gif while retrieving
		    
		             });
	  
	


function postchat(){			
var text=$('#chatData').val(); 
  var to=$('#toUser').val(); 
  var dataString = 'chat_msg='+ text + '&toUser='+ to; 
  $.ajax({ 
    type: "POST", 
    url: "chat/post_talk.php", 
    data: dataString, 
    cache: false, 
    success: function(data){
   $('#display_chat').append(data).show(400);
   document.getElementById('display_chat').scrollTop = document.getElementById('display_chat').scrollHeight;
      
    }
  });
		
}


$(document).on('click','#submitChat',function (){
	if(!$('#toUser').val() | !$('#chatData').val() ){ alert ('choose a user to chat with and Type a message'); }
	else{
	 postchat();
	}
	});	
$(document).keypress(function(e) {
    if(e.which == 13) {
        $('#submitChat').trigger('click');
		$('#chatData').val('');
    }
});			
		//document.getElementById('display_chat').scrollTop = document.getElementById('display_chat').scrollHeight;
	/*   var click_lastchat ='<?php echo $chatwith; ?>';
	 
	 	 
		    if (click_lastchat){
		$('#user_' + click_lastchat).trigger("click");
		
		}
		else if(!click_lastchat) {
			
		$("div#display_chat").append('<p>Welcome to veefone chat!</p>');
			}*/

			
		
});
