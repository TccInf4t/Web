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
	</head>
	<body>
		<div id="corpo">
			<header>	
				<div id="carrinho">  <!-- Carrinho de Compras  -->
					<!-- <div id="cont">02</div> -->
				</div>
				
				<?php

				require_once('standard/login.php');

				require_once('bd/conexao.php');
				Conectar();

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

				require_once("selectevento.php");

			}else{

				require_once("alleventos.php");

			}

				?>
				
			</div>

			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
