<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
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
				
				<div id="caixaLogin"> <!-- Botão de Inscrição e Login -->
					<span class="itemLogin">inscrever-se</span>
					<span class="itemLogin">entrar</span>
				</div>
				<?php

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
				$sql="select * from conteudosite where classname='TEvento' order by oid_conteudosite desc";
				$select=mysql_query($sql);

				$evento=mysql_fetch_array($select);

			?>
			<div id="conteudo">
				<h1 class="titPag"><?php echo($evento['titulo']); ?></h1>
				<span id="dtEvento">
					dia <strong><?php echo($evento['dt']); ?></strong> às <strong><?php echo($evento['hr']); ?></strong>
				</span>

				<p>
					<?php echo($evento['descricao']); ?>
				</p>

				<h2 class="outrosEventos">Outros Eventos</h2>

				<?php

					$sql="select * from conteudosite where classname='TEvento' and oid_conteudosite != ".$evento['oid_conteudosite']." order by rand() limit 3;";

				
					$select=mysql_query($sql);

					while($eventos=mysql_fetch_array($select)){

				?>
				<a href="<?php echo('eventos.php?oid='.$eventos['oid_conteudosite']); ?>">
				<div class="eventoItem"><?php echo($eventos['titulo']); ?></div>
				</a>
				<?php
			}
				?>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
