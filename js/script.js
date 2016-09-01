$(function(){
	$("#btnMenu").click(function(){
		$("#barra_lateral").animate({
			left: "0px"
		}, 200);
	});
	
	$(document).click(function(Event){
		if(Event.attr("id") != "barra_lateral") console.log("Hide");
	});
});