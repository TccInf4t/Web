$(function(){
	item_espera = []; // Lista de itens que estão esperando para serem atualizados
	tempo = null; // Intervalo de tempo

	// Mudando o valor total e a quantidade do item
	$(".numQtd").change(atualizarItem);
	$(".numQtd").keyup(atualizarItem);

	// Removendo um item do carrinho de compras
	$(".btn_fechar").click(function(){
		var elProduto = $(this).parent(".produto");
		var elCont = $("#cont");
		var id = elProduto.attr("id");

		if($(".produto").length == 1) $("#btnFinalizar").fadeOut(200);

		elProduto.css("position", "relative");
		elProduto.animate({
			height: "1px",
			margin: "0",
			right: "500px",
			opacity: "0"
		}, 200, function(){
			removerItemDB(id);
			elProduto.remove();
			elCont.text($(".produto").length);

			if($(".produto").length == 0) $("#vazio").fadeIn(100);
		});

	});
});

// Atualiza a quantidade e o total na página
function atualizarItem(){
	var elProduto = $(this).parent().parent();
	var elPrecoTotal = $(this).parent().parent().children(".produtoPrecoTotal").children(".precoTotal");
	var elPrecoUnitario = $(this).parent().parent().children(".produtoPreco").children(".precoUnitario");
	
	var id = elProduto.attr("id");
	var precoUnitario = elPrecoUnitario.text().replace("R$", "");
	var qtd = $(this).val();
	var precoTotal = precoUnitario * qtd;

	elPrecoTotal.text("R$ " + precoTotal.toFixed(2));
	atualizarItemDB(id, qtd, precoTotal);
}

// Atualiza a quantidade e o total de um item no DB
function atualizarItemDB(id, qtd, total){
	var existeID = procurarItem(item_espera, id); // Posição do item encontrado
	var tempo = null; // Intervalo

	// Verificando se o item já não está na lista
	if(existeID == -1){
		item_espera.push([id, tempo]);
		existeID = procurarItem(item_espera, id);

	}else {
		clearTimeout(item_espera[existeID][1]);
		console.log("Chegou!");
	}

	// Intervalo para atualizar o item
	item_espera[existeID][1] = setTimeout(function(){
		$.ajax({
			url: "crud/carrinho_compra.php",
			data: {modo: "atualizar", id: id, qtd: qtd, total: total}
		}).done(function(){
			item_espera.splice(existeID, 1); // Removendo o item que já foi atualizado
		});
	}, 1000);
}

// Procura um ID em uma lista de 'Array' e retorna sua posição
function procurarItem(arr, id){
	var res = -1;

	for(i in arr){
		if(arr[i][0] == id){
			res = i;
			break;
		}
	}

	return parseInt(res);
}

// Remove um item no DB
function removerItemDB(id){
	$.ajax({
		url: "crud/carrinho_compra.php",
		data: {modo: "excluir", id: id}
	}).done(function(){
		console.log("Remove Complete!");
	});
}