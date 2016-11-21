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
		<link href="css/eventos.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
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
			
			<!-- Barra Lateral -->
			<div id="barra_lateral">
				<span id="br_tit">categoria</span>
				<span class="br_item">
					<a href="#">acessorio interno</a>
				</span>
				<span class="br_item">
					<a href="#">carro</a>
				</span>
				<span class="br_item">
					<a href="#">montadora</a>
				</span>
				<span class="br_item">
					<a href="#">acessorio externo</a>
				</span>
				<span class="br_item">
					<a href="#">marca</a>
				</span>
			</div>
			<?php

			if(isset($_GET['oid'])){

				require_once("eventos/selectevento.php");

			}else{

				require_once("eventos/alleventos.php");

			}

				?>
				
			</div>

			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
