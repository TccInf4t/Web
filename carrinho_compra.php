<?php
	session_start();
	require_once('bd/conexao.php');
	Conectar();
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/carrinho_compras.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/carrinho_compra.js" type="text/javascript"></script>
	</head>
	<body>
	</div>
		<div id="corpo">
			<header>	
				<?php
					require_once("standard/carrinho.php");
					require_once("standard/login.php");

					$sql="select * from imagem where classname='TLogo'";
					$select=mysql_query($sql);

					$logo=mysql_fetch_array($select);
				?>
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div>
				<nav><?php require_once('standard/menu.php'); ?></nav>
			</header>
			<?php require_once 'standard/barraCategoria.php'; ?>

			<div id="conteudo">
				<h1 class="titPag">Meus Produtos</h1>


				<form name="form" id="form" method="post" action="pagamento.php">
					<?php
						$vazioStyle = "";
						if($_SESSION['usuario'] != null){
							$id_cliente = $_SESSION['usuario']['oid_cliente'];

							$query = "select * from visualizacaocarrinho where oid_cliente = ". $id_cliente .";";
							$exec = mysql_query($query);

							while($rs = mysql_fetch_array($exec)){
					?>
							<div class="produto" id="<?php echo($rs['oid_carrinho']); ?>">
								<div class="produtoImg" style="background-image:url(<?php echo("empresa/" . $rs['caminho']) ?>);"></div>

								<div class="produtoNome produtoItem">
									<span class="item">Produto</span>
									<span class="cont"><?php echo($rs['produto']); ?></span>
								</div>
								<div class="produtoPreco produtoItem">
									<span class="item">Preço</span>
									<span class="cont precoUnitario">R$ <?php echo($rs['valorvendido']); ?></span>
								</div>
								<div class="produtoPrecoTotal produtoItem">
									<span class="item">Total</span>
									<span class="cont precoTotal">R$ <?php echo($rs['valortotal']); ?></span>
								</div>
								<div class="produtoQtd produtoItem">
									<span class="item">Quantidade</span>
									<input type="number" min="1" class="numQtd" name="<?php echo("numQtd" . $rs['oid_carrinho']) ?>" class="numQtd formText" value="<?php echo($rs['qtd']); ?>" />
								</div>
								<div class="btn_fechar"></div>
							</div>
					<?php } } ?>

					<div id="btns">
						<input type="submit" class="btn" id="btnFinalizar" value="confirmar">
					</div>
					<div id="vazio">Sua lista está vazia</div>
				</form>
			</div>
			<?php require_once('standard/rodape.php'); ?>
		</div>
	<body>
</html>