$(function(){
	$(".addCarrinho").click(function(){
		var id = $(this).attr("id");
		var valorVendido = $("#preco").text().replace("R$", "");

		// Adicionando o produto no carrinho de compras
		addCarrinho(id, valorVendido); 

		// Atualizando a lista do carrinho de compras
		atualizarListaCarrinho();
	});
});