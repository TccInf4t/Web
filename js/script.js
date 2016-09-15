$(function(){
	$("#btnPesquisa").click(function(){
		$("#caixaPesq").css("display", "block");
		$("#txtPesq").focus();
		$("#caixaPesq").animate({
			top: "70px",
			opacity: "1"
		}, 100);
	});

	$("#caixaPesqFechar").click(function(){
		$("#caixaPesq").animate({
			top: "80px",
			opacity: "0"
		}, 100, function(){
			$("#caixaPesq").css("display", "none");	
		});
		
	});

	// Mostrando a barra de detalhes
	$("#btnMenu").click(function(){
		$("#barra_lateral").animate({
			left: "0px"
		}, 200);
	});
	
	// Escondendo a barra de detalhes
	$(document).click(function(event){
		var obj = event.target;
		
		if(obj.id != "barra_lateral" && obj.id != "btnMenu"){
			$("#barra_lateral").animate({
				left: "-400px"
			}, 200);
		}
	});
});