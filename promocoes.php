<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/promocoes.css" type="text/css" rel="stylesheet">
		
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
				<h1 class="titPag">Promoção Dia Dos Pais</h1>
				<!-- <h2 id="subTit">de 15/09 até 23/09/2016</h2> -->

				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg1">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="precoNormal">R$ 195,00</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					
					<div class="caixa">
						<div class="caixaImg" id="caixaImg2">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="precoNormal">R$ 195,00</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					
					<div class="caixa">
						<div class="caixaImg" id="caixaImg3">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="precoNormal">R$ 195,00</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
