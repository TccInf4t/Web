<?php
	session_start();
	require_once("../bd/conexao.php");
	Conectar();

	$idCliente = $_SESSION['usuario']['oid_cliente'];
	$query = "select * from visualizacaocarrinho where oid_cliente = ". $idCliente .";";
	$exec = mysql_query($query);

	while($rs = mysql_fetch_array($exec)){
		$img = "empresa/" . $rs['caminho'];
		criarItem($img, $rs['produto']);
	}
?>

<?php function criarItem($img, $nome){ ?>
<div class="carrinhoItem">
	<div class="carrinhoItemImg" style="background-image:url(<?php echo($img); ?>);"></div>
	<span class="carrinhoItemNome"><?php echo($nome); ?></span>
</div>
<?php } ?>