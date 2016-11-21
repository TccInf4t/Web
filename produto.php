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
		<link href="css/produto.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/script2.js" type="text/javascript"></script>
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
				<div id="detalhe">
					<div id="detalheEsq">
						<div id="produtoImg"></div>
					</div>
					<div id="detalheDir">
						<span class="addCarrinho"></span>

						<div class="caixaItem">
							<span class="item">preço</span>
							<span class="cont">R$ 195,80</span>
						</div>
						<div class="caixaItem">
							<span class="item">ano</span>
							<span class="cont">1998</span>
						</div>
						<div class="caixaItem">
							<span class="item">peso</span>
							<span class="cont">10 kg</span>
						</div>
						<div class="caixaItem">
							<span class="item">marca</span>
							<span class="cont">ford</span>
						</div>
						<div class="caixaItem">
							<span class="item">modelo</span>
							<span class="cont">HB20</span>
						</div>
						<div class="caixaItem">
							<span class="item">tipo</span>
							<span class="cont">acessório interno</span>
						</div>
					</div>
				</div>

				<div id="desc">
					<h1 class="subTit">Descrição</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur.
					</p>
				</div>

				<div id="comentario">
					<h1 class="subTit">Comentarios</h1>
					<div class="comentarioItem">
						<span class="comentarioUsuario">Mateus Ferreira Morelli</span>
						<p class="comentarioCont">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</div>

					<div class="comentarioItem">
						<span class="comentarioUsuario">Mateus Ferreira Morelli</span>
						<p class="comentarioCont">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur.
						</p>
					</div>

					<div class="comentarioItem">
						<span class="comentarioUsuario">Mateus Ferreira Morelli</span>
						<p class="comentarioCont">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
					</div>
				</div>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
