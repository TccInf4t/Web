
$(function(){

			
	$("#divBoleto").css("display","block");
	$("#divCartao").css("display","none");


	$("#boleto").click(function(){
			
		$("#divBoleto").show("fast");
		$("#divCartao").hide("fast");
			
	});
			
	$("#cartao").click(function(){
			
		$("#divBoleto").hide("fast");
		$("#divCartao").show("fast");
			
	});
			
	$("#endNovo").click(function(){
			
		$("#divEndereco").show("fast");
			
	});

	$("#endCadastrado").click(function(){
			
		$("#divEndereco").hide("fast");
			
	});		

});

