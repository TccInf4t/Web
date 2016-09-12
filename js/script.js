$(function(){
	$("#btnMenu").click(function(){
		$("#barra_lateral").animate({
			left: "0px"
		}, 200);
	});
	
	$(document).click(function(event){
		var obj = event.target;
		
		if(obj.id != "barra_lateral" && obj.id != "btnMenu"){
			$("#barra_lateral").animate({
				left: "-400px"
			}, 200);
		}
	});
});