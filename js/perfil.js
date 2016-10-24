$(function(){


$("#infdadosusuario").load("perfil/infDadosUsuario.php");
$("#infenderecousuario").load("perfil/infEnderecoUsuario.php");

$("#editarDados").click(function(){
		
	$("#editDados").show("fast");
	$("#usuarioDados").hide("fast");
	$("#editDadosUsuario").load("perfil/formEditDados.php");
});

$("#editarEndereco").click(function(){
		
	$("#editEndereco").show("fast");
	$("#usuarioDados").hide("fast");
	$("#editEnderecoUsuario").load("perfil/formEditEndereco.php");
});

$("#cancelarDados").click(function(){
		
	$("#editDados").hide("fast");
	$("#editEndereco").hide("fast");
	$("#usuarioDados").show("fast");

});

$("#cancelarEndereco").click(function(){
		
	$("#editEndereco").hide("fast");
	$("#usuarioDados").show("fast");

});

});


