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
		<link href="css/dicas.css" type="text/css" rel="stylesheet">

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

			<?php

			if(isset($_GET['oid'])){

				require_once("dicas/selectdica.php");

			}else{

				require_once("dicas/alldicas.php");

			}

			?>

			</div>
			<?php
			
				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
