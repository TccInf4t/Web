<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/sobre.css" type="text/css" rel="stylesheet">

		<script src="js/jquery3.1.js" type="text/javascript"></script>
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
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>
		
			
			<div id="conteudo">
				<h1 class="titPag">Um pouco sobre nós</h1>
				<?php
					$sql="select * from conteudosite where classname='TSobre'";
					$select=mysql_query($sql);

					$sobre=mysql_fetch_array($select);
				?>
				<div id="texto_conteudo">
					<p>
						<?php
							echo(nl2br($sobre['descricao']));
						?>
					</p>
					<h3>Missão</h3>

					<p>
					<?php
						echo(nl2br($sobre['missao']));
					?>
					</p>
					<h3>Visão</h3>
					<p>
					<?php
						echo(nl2br($sobre['visao']));
					?>
					</p>
					<h3>Valores</h3>

					<p>
					<?php
						echo(nl2br($sobre['valores']));
					?>
					</p>
				</div>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
