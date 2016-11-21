<?php
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/home.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
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
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div> <!-- Logo -->
				<nav><?php require_once('standard/menu.php'); ?></nav>
			</header>
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>
			
			<!-- Slider -->
			<div id="slider">
				<ul id="slides">
				<?php

					$sql="select * from imagem where classname='TSlideHome'";
					$select=mysql_query($sql);

					while($img=mysql_fetch_array($select)){

				?>
					<li class="slideItem" <?php echo('style="background-image:url(CMS/'.$img['caminho'].');"'); ?>><h2><?php echo ($img['nome']); ?></h2></li>
					<?php
					}
					?>
				</ul>
				<div class="sliderBtn" id="btnEsquerdo"></div>
				<div class="sliderBtn" id="btnDireito"></div>
			</div>
			<div id="conteudo">
				<!-- Select dos produtos mais comprados do site -->
				<h1 class="caixaTitulo">produtos mais comprados</h1>
				<div class="caixaLn">
					<?php 
						$sql="select * from visualizacaopeca order by rand() limit 6;";
						$select=mysql_query($sql);

						while ($rs=mysql_fetch_array($select)) {
							$img = "empresa/" . $rs['caminho'];
							criar_produto($rs['oid_peca'], $rs['nome'], $rs['preco'], $img);
						}
					 ?>
				</div>

				<!-- Select dos produtos em promoção do site -->
				<h1 class="caixaTitulo">Promoções</h1>
				<div class="caixaLn">
					<?php 
						$sql="select * from visualizacaopeca order by rand() limit 3;";
						$select=mysql_query($sql);

						while ($rs=mysql_fetch_array($select)) {
							$img = "empresa/" . $rs['caminho'];
							criar_produto($rs['oid_peca'], $rs['nome'], $rs['preco'], $img);
						}
					 ?>
				</div>
			
				<!-- Select dos produtos mais novos do site -->
				<h1 class="caixaTitulo">novidades</h1>
				<div class="caixaLn">
					<?php 
						$sql="select * from visualizacaopeca order by oid_peca desc limit 3;";
						$select=mysql_query($sql);
						
						while ($rs=mysql_fetch_array($select)) {
							$img = "empresa/" . $rs['caminho'];
							criar_produto($rs['oid_peca'], $rs['nome'], $rs['preco'], $img);
						}
					 ?>
				</div>
			</div>
			<?php
				require_once('standard/rodape.php');
			?>
	<body>
</html>
