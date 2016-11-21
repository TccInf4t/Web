<?php
	session_start();
	require_once('bd/conexao.php');
	Conectar();

	if(!isset($_SESSION['usuario'])){

		header("location:index.php");

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/finalizarcompra.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/finalizarcompra.js" type="text/javascript"></script>
		<script src="js/script2.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
		<script src="js/masks.js" type="text/javascript"></script>

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
				<nav>
					<div id="caixaPesq">
						<div id="caixaPesqFechar"></div>
						<form name="formPesq" id="formPesq" method="post" action="#">
							<input type="search" name="txtPesq" id="txtPesq" placeholder="Pesquisar" />
						</form>
					</div>
					<div id="pesqMenu"> <!-- Icone de Menu e Pesquisa  -->
						<div class="item" id="btnMenu"></div>
						<div class="item" id="btnPesquisa"></div>
					</div>
					
					<?php

						require_once('standard/menu.php');


					?>
				</nav>
			</header>
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>
			<div id="conteudo">

				<h1 class="titPag">Compra finalizada</h1>
				<span class="infCampo">A sua compra foi realizada com sucesso. Você pode acompanhar o seu pedido na página "meus pedidos" ou pelo nosso aplicativo mobile.</span>
				
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
