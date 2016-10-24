$(function(){

	var cont=0;

	$("#entrar").click(function(){

	if(cont == 0){

		$("#login").show("fast");
		cont = 1;

	}else{

		$("#login").hide("fast");
		cont = 0;

	}

});

$( "#logar" ).click(function( event ) {
	event.preventDefault();
	$.ajax({
	    url : 'crud/login.php',
	    data: {
	     lemail : $("#lemail").val(),
	     lsenha : $("#lsenha").val()
	    },
	    type : 'post',
	    dataType : 'json',
	    success : function(data){
	        if(data.valor == 0){

	         $("#loginerror").show("fast");

	        }else{

	         $("#loginerror").hide("fast");
	         $("#flogin").submit();

	        }
	    },
	});

});

	$(".caixa").click(function(){
		window.location = "produto.php";
	});

	// Caixa de pesquisa
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

	// Slider
	$('#slides').cycle({
		fx: 'fade',
		pause: 1,
		prev: '#btnEsquerdo',
		next: '#btnDireito'
	});
});

