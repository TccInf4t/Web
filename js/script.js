$(function(){
	var cont=0;

	$.ajax({
		url: "perfil/areaLogin.php",
	}).done(function(dados){
		$("#caixaUsuario").html(dados);
		
		$("#opt").click(function(){
			$("#optUsuario").fadeIn(100);
		});
	});

	$(".br_item").click(function(){
		$(this).parent(".marca").children('ul').toggle("fast");
	});

	$(".br_item").click(function(){
		$(this).parent(".modelo").children('ul').toggle("fast");
	});

	$("#entrar").click(function(){
		if(cont == 0){
			$("#login").show("fast");
			cont = 1;

		}else{
			$("#login").hide("fast");
			cont = 0;
		}
	});

	// Botão para fazer o login
	$("#logar").click(function(event) {
		event.preventDefault();
		console.log("Chegou!");

		$.ajax({
		    url:'crud/login.php',
		    data:{lemail : $("#lemail").val(), lsenha : $("#lsenha").val()},
		    type:'get',
		    dataType:'json',

		    success:function(data){
		        if(data.valor == 0){
		        	$("#loginerror").show("fast");

		        }else{
			        $("#loginerror").hide("fast");
			        $("#flogin").submit();
		        }
		    },
		});

	});

	$("#carrinhoFechar").click(esconderListaCarrnho);
	$("#carrinho").click(mostrarListaCarrnho);

	// Adicionando o produto clicado ao carrinho de compras
	$(".btnAdicionar").click(function(e){
		e.preventDefault();

		var caixa = $(this).parent(".caixaImg").parent(".caixa");
		var elPreco = caixa.children(".caixaInfo").children(".preco");
		var elLink = caixa.parent(".linkProduto");

		var id = elLink.attr("id");
		var preco = elPreco.text();
			preco = preco.replace("R$", "");
			preco = parseFloat(preco).toFixed(2);

		addCarrinho(id, preco);
	});

	$("#btnPesquisa").click(mostrarPesquisa);
	$("#caixaPesqFechar").click(esconderPesquisa);

	// Mostrando a barra de detalhes
	$("#btnMenu").click(function(){
		$("#barra_lateral").animate({
			left: "0px"
		}, 200);
	});
	
	// Escondendo a barra de detalhes
	$(document).click(function(event){
		var obj = event.target;
		
		if(obj.id != "barra_lateral" && obj.id != "btnMenu" && obj.id != "marcas" && obj.className != "br_item"){
			$("#barra_lateral").animate({left: "-400px"}, 200);

			$(".br_item").parent(".marca").children('ul').hide("fast");
			$(".br_item").parent(".modelo").children('ul').hide("fast");
		}

		if(obj.id != "optUsuario" && obj.id != "opt"){
			$("#optUsuario").fadeOut(100);
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

// Adiciona um item ao carrinho de compra
function addCarrinho(id, valorVendido){
	$.ajax({
		url: "crud/carrinho_compra.php",
		data: {modo: "inserir", id_peca: id, valor_vendido: valorVendido}

	}).done(function(){
		console.log("Item Adicionado!");
		atualizarListaCarrinho();
	});
}

// Mostra a lista de itens do carrinho de compras
function mostrarListaCarrnho(){
	$("#listaCarrinho").css("display", "block");
	$("#listaCarrinho").animate({
		top: "80px",
		opacity: "1"
	}, 200);
}

// Esconde a lista de itens do carrinho de compras
function esconderListaCarrnho(){
	$("#listaCarrinho").animate({
		top: "85px",
		opacity: "0"
	}, 200, function(){
		$("#listaCarrinho").css("display", "none");
	});
}

function atualizarListaCarrinho(){
	$.ajax({
		url: "crud/listaCarrinhoCompra.php",
	}).done(function(dados){
		var qtdItem;

		$("#carrinhoConteudo").html(dados);
		qtdItem = $("#carrinhoConteudo").children(".carrinhoItem").length;

		$("#cont").text(qtdItem);
	});
}

// Mostra a caixa de pesquisa
function mostrarPesquisa(){
	$("#caixaPesq").css("display", "block");
	$("#txtPesq").focus();
	$("#caixaPesq").animate({
		top: "70px",
		opacity: "1"
	}, 100);
}

// Esconde a caixa de pesquisa
function esconderPesquisa(){
	$("#caixaPesq").animate({
		top: "80px",
		opacity: "0"
	}, 100, function(){
		$("#caixaPesq").css("display", "none");	
	});	
}