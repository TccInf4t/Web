$(function(){
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

// function slide(){
// 	var width = 1000;
// 	var vel = 200;
// 	var slides = $("#slides");
// 	var slideAtual = 1;

// 	$("#btnEsquerdo").click(anteriorSlide);
// 	$("#btnDireito").click(proximoSlide);

// 	function proximoSlide(){
// 		$("#slides").animate({
// 			left: "-=" + width + "px"
// 		}, vel, function(){
// 			slideAtual ++;

			
// 			if(slideAtual === $("#slides").children().length + 1){
// 				slideAtual = 1;
// 				slides.css("left", "0");
// 			}
// 		});
// 	}

// 	function anteriorSlide(){
// 		$("#slides").animate({
// 			left: "+=" + width + "px"
// 		}, vel);	
// 	}
// }