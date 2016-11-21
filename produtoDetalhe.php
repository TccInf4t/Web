<?php 
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();

	//Buscando o id do link do produto para o detalhe do mesmo
	$produto=$_GET['produto'];

	$sql="select * from visualizacaopeca where oid_peca=".$produto;
	$select= mysql_query($sql);
	$rs=mysql_fetch_array($select);
 ?>
 <!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title><?php echo($rs['nome']); ?></title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/produto.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/produto.js" type="text/javascript"></script>
	</head>
	<body>
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
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>

			<div id="conteudo">
				<?php 
					$sql="select * from visualizacaopeca where oid_peca=".$produto;
					$select= mysql_query($sql);
					$rs=mysql_fetch_array($select);
				?>
				<h1><?php echo($rs['nome']); ?></h1>
				<div id="detalhe">				
					<div id="detalheEsq">
						<div id="produtoImg" style="background: transparent url(<?php echo('empresa/'.$rs['caminho']); ?>) center/auto 100% no-repeat;">
					</div>
					</div>
					<div id="detalheDir">
						<span class="addCarrinho" id="<?php echo($rs['oid_peca']); ?>"></span>

						<div class="caixaItem">
							<span class="item">preço</span>
							<span class="cont" id="preco">R$ <?php echo($rs['preco']); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">ano</span>
							<span class="cont"><?php echo date('d/m/y', strtotime($rs['ano'])); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">peso</span>
							<span class="cont"><?php echo($rs['peso']); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">marca</span>
							<span class="cont"><?php echo($rs['marca']); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">modelo</span>
							<span class="cont"><?php echo($rs['modelo']); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">tipo</span>
							<span class="cont"><?php echo($rs['tipo']); ?></span>
						</div>
						<div class="caixaItem">
							<span class="item">validade</span>
							<span class="cont"><?php echo date('d/m/y', strtotime($rs['validade']));?></span>
						</div>
					</div>
				</div>
				<h2>Descrição do Produto</h2>
				<p>
					<?php echo($rs['descricao']); ?>
				</p>

			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
