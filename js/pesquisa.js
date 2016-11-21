$(function(){
	var messInicial = "Pesquise por qualquer coisa";
	var messVazio = "Desculpe, nada encontrado";

	$("#txtPesq").focus();
	
	$("#txtPesq").on("keyup", function(){
		var txt = $(this).val();
		if(txt != "") pesquisar(txt);
	});
});

function pesquisar(txt){
	$.ajax({
		url: "crud/listaPesquisa.php",
		data: {valor: txt}

	}).done(function(dados){
		$(".linkProduto").remove();

		if(dados != ""){
			$(".avi").css("display", "none");
			$("#titulo").css("display", "block");
			
			$("#valorPesquisa").text(txt);
			$(".caixaLn").append(dados);

		}else {
			$(".avi").css("display", "none");
			$("#vazio").fadeIn(200);
		}
	});
}

function mostrarMenssagem(txt){
	$("#titulo").css("display", "none");
	$("#menssagem").css("display", "block");
}

function esconderMenssagem(){
	$("#menssagem").css("display", "none");
}