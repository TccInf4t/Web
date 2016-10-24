//Javascript do inscrever-se
$(function(){

	var id = $("#cbEstado").val();

	$("#endereco").css("display","none");
	$("#dadosbasicos").css("display","block");
			
	$("#tcpf").css("display","block");
	$("#tcnpj").css("display","none");


	$("#cpfc").click(function(){
			
		$("#tcpf").show("fast");
		$("#tcnpj").hide("fast");
			
	});
			
	$("#cnpjc").click(function(){
			
		$("#tcpf").hide("fast");
		$("#tcnpj").show("fast");
			
	});
			
			
	$("#voltar").click(function(){
			
		$("#endereco").hide("fast");
		$("#dadosbasicos").show("fast");
			
	});


	$.get("cidades.php", {id: id}, function(dados){
		$("#cbCidade").html(dados);
	});
	
	$("#cbEstado").change(function(){
		var id = $(this).val();

		$.get("cidades.php", {id: id}, function(dados){
			$("#cbCidade").html(dados);
		});
	});

});

