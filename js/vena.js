// JavaScript Document
/*www.pluxnet.com.ng
08163212134
*/

	
$(document).ready(function(e) {
			
	
	/*login	sign_up			*/
	$(document).on("change","#level",function(e) {
if ($(this).val()=="1"){
	 $('#under').prop('disabled', 'disabled');
    }
    else {
        $('#under').prop('disabled', false);
    }
	});		
			
	$(document).on("click","#signIn", function(e) {
	e.preventDefault();
    $("div#ack").hide();
	$("#signIn").hide();
if ($("#inputEmail").val() == "" || $("#inputPassword").val() == ""){
	$("button#loading").hide();
	$("#signIn").show();
	$("div#ack").show();
    $("div#ack").html("Please Enter Username and Password !");
}
else 
  {
    $("button#loading").show();
    $.post($("#login_form").attr("action"),
    $("#login_form input").serializeArray(),
    function (data) 
    {
		if(data.match(/ERROR/)){

					$("button#loading").hide();
					$("div#ack").html(data);
					$("div#ack").show();
					$("#signIn").show();
				}
				else{
		$("div#ack").html(data).show();
	
}

        

    });     

  
  }
});


	
$(document).on('submit', "#signup_Form", function(e){
e.preventDefault();

$('.register-btn').hide();
$("button#loading").show();
var formData = new FormData(this);

$.ajax(
{
processData: false,
contentType: false,
type:$(this).attr("method"),
url: $(this).attr("action"),
data:formData,

success: function(response) {

if(response.match(/success::/)){
$("button#loading").hide();
				    $("div#ack").html("<div>" +response.replace('success::','')+ "</div>");
					$("div#ack").show();
					$('.register-btn').show();
}
else{
$("div#ack").html(response);
		$('div#ack').show();
		$("button#loading").hide();
		$('.register-btn').show();
}
},
error: function(jqXHR, textStatus, errorThrown) 
{
alert(errorThrown);    
}
});
});




	/*Library stats ere*/		
				var itemContainer = $('.library-wrap');
               /* var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';*/
   			    itemContainer.slimScroll({
				/**scrollTo : scrollTo_int,*/
        		height: '650px',
				//start: 'bottom',
				alwaysVisible: false,
				railBorderRadius: 0,
				railVisible: true
				}); 
		
$(document).on('submit', "#addbook-form", function(e){
e.preventDefault();

/*$('.register-btn').hide();
$("button#loading").show();*/
var formData = new FormData(this);

$.ajax(
{
processData: false,
contentType: false,
type:$(this).attr("method"),
url: $(this).attr("action"),
data:formData,

success: function(response) {

if(response.match(/success::/)){
$("button#loading").hide();
				    $("div#ack").html("<div>" +response.replace('success::','')+ "</div>");
					$("div#ack").show();
					$('.register-btn').show();
}
else{
$("div#ack").html(response);
		$('div#ack').show();
		$('#addbook-form').slideToggle(300);
	/*	$("button#loading").hide();
		$('.register-btn').show();*/
}
},
error: function(jqXHR, textStatus, errorThrown) 
{
alert(errorThrown);    
}
});
});


////add book category //////

$('#subcat').click(function(e) {
    
e.preventDefault();	

$.post('action/add-bookcat.php',
$("#addcat-form").serialize(),
function (data) {
if(data.match(/ok/)){
//$('#wait').hide();
$('#acks').html('Category successfully added').show();
}
else{
$("#ack").html(data).show(); 
}
});  

});

//////////////////////////////////
				
	$('#btn-pdffile').click(function(){
	//	e.preventDefault();	
	$('#attachment').trigger('click');	
	});		

	$('#btn-adbook').click(function(){
		//e.preventDefault();
		$('#addbook-form').slideToggle(300);
	});
	$('#btn-adbookcat').click(function(){
			$('#addcat-form').slideToggle(300);
		});
	});