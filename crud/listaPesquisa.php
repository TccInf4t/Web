<?php
	require_once("../bd/conexao.php");
	require_once("../funcao/produto.php");
	Conectar();

	$valor = $_GET['valor'];

	$query = "select * from visualizacaopeca where nome like '%". $valor ."%';";
	$exec = mysql_query($query);

	while($rs = mysql_fetch_array($exec)){
		$img = "empresa/" . $rs['caminho'];
		criar_produto($rs['oid_peca'], $rs['nome'], $rs['preco'], $img);
	}
?>