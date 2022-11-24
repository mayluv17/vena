// JavaScript Document by pluxnet.com.ng 08163212134


$(document).ready(function(e) {

var itemContainer = $('.broadcast-wrap');
               /* var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';*/
   			    itemContainer.slimScroll({
				/**scrollTo : scrollTo_int,*/
        		height: '650px',
				//start: 'bottom',
				alwaysVisible: false,
				railBorderRadius: 0,
				railVisible: true
				}); 
				
var itemContainer = $('.group-wrap');
               /* var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';*/
   			    itemContainer.slimScroll({
				/**scrollTo : scrollTo_int,*/
        		height: '270px',
				//start: 'bottom',
				alwaysVisible: false,
				railBorderRadius: 0,
				railVisible: true
				}); 				
				
				
				
								
$('.group-selector li a').click(function(){

	$('#input-gid').val($(this).attr("gid"));
	});				
				
	$('#btn-file').click(function(){
	//	e.preventDefault();	
	$('#attachment').trigger('click');	
	});		

/*
$(document).on("click",".grp-to-join", function(e) {
	e.preventDefault();
	
	
    $.post($("this").attr("action"),
    $("#broadcast-form").serializeArray(),
    function (data) 
    {
		if(data.match(/error/)){
					alert (data);
				}
				else{
		$("div#ack").html(data).show();
    

  
  }
  
 });*/
 

 $(document).on("click",".add-to-group", function(e) {

var gid = $(this).attr("gid");
e.preventDefault();
$.post("action/join-grp.php",
   {gid:gid},
   
    function (data) 
    {
		if(data.match(/error/)){
					alert (data);
				}
				else{
		$("div#ack").html(data).show();
    

  
  }
  });
 });
 
 	
$(document).on('submit', "#broadcast-form", function(e){
e.preventDefault();

$('#ack').hide();
//$("button#loading").show();
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
		}
},
error: function(jqXHR, textStatus, errorThrown) 
{
alert(errorThrown);    
}
});
});
////////add group///////////////
 $(document).on('submit', "#form-addgrp", function(e){
e.preventDefault();

$('#ack222').hide();
$('#btn-addgrp').hide();
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
				    $("div#ack222").html("<div>" +response.replace('success::','')+ "</div>");
					$("div#ack222").show();
					$('#addgrp-modal').modal('hide');
}
else{
$("div#ack222").html(response);
		$('div#ack222').show();
		$('#btn-addgrp').show();
		$("button#loading").hide();
		}
},
error: function(jqXHR, textStatus, errorThrown) 
{
alert(errorThrown);    
}
});
});
/////////////////////////////////////////////////

 $('#attachment').change(function (){ 
 var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
 var  ext = filename.split ('.');
  ext = ext[ext.length-1];
  $('.filetype-wrap').html('<div class="well-sm" style="padding-left: 50px; border-top: 1px solid #E3E3E3"><img src="img/ftype/'+ext+'.png" width="42" style="border-right: 1px solid #E3E3E3;" > '+filename+'</div>');
  
  

 })
 
 
  });
   /*post broadcast ends	*/