<?php
	session_start();
	
	require_once("../bd/conexao.php");
	Conectar();

	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];

		switch($modo){
			case "excluir":
				$id = $_GET['id'];
				excluir($id);
				break;

			case "atualizar":
				$id = $_GET['id'];
				$qtd = $_GET['qtd'];
				$total = $_GET['total'];

				atualizar($id, $qtd, $total);
				break;

			case "inserir":
				$idPeca = $_GET['id_peca'];
				$valorVendido = $_GET['valor_vendido'];

				inserir($idPeca, $valorVendido);
				break;
		}
	}

	// Inseri um novo item no carrinho de compras
	function inserir($idPeca, $valorVendido){
		$idCliente = $_SESSION['usuario']['oid_cliente'];

		$query = "insert into carrinho(oid_peca, oid_cliente, qtd, valorvendido, valortotal)
				  values(". $idPeca .", ". $idCliente .", 1, ". $valorVendido .", ". $valorVendido .");";
		$exec = mysql_query($query);

		if(!$exec) echo($query);
	}

	// Atualiza um item do carrinho de compras
	function atualizar($id, $qtd, $total){
		$query = "update carrinho set qtd = ". $qtd .", valortotal = ". $total ." where oid_carrinho = ". $id .";";
		$exec = mysql_query($query);

		if(!$exec) echo($query);
	}

	// Exclui um item do carrinho de compras
	function excluir($id){
		$query = "delete from carrinho where oid_carrinho = ". $id .";";
		$exec = mysql_query($query);

		if(!$exec) echo($query);
	}
?>