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
		<link href="css/pesquisa.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/pesquisa.js" type="text/javascript"></script>
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
			<?php require_once 'standard/barraCategoria.php'; ?>

			<div id="conteudo">
				<!-- Select dos produtos mais comprados do site -->
				<h1 class="caixaTitulo avi" id="titulo">Resultados para '<span id="valorPesquisa">produto</span>'</h1>
				<div class="caixaLn">
					<div id="menssagem" class="avi">nada encontrado</div>
				</div>
			</div>

			<?php require_once('standard/rodape.php');	?>
	<body>
</html>
