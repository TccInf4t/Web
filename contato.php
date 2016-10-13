<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/contato.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
		<script src="js/mascaraTelefone.js" type="text/javascript"></script>
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
				<h1 class="titPag">Contate-nos</h1>

				<form name="formContato" id="formContato" method="post" action="crud/contato.php">
					<input type="text" name="txtNome" class="formText" value="" placeholder="Insira seu nome"  required="required"/>
					<input type="email" name="txtEmail" class="formText" value="" placeholder="Insira seu email" />
					<input type="text" name="txtTelefone" class="formText" value="" placeholder="Insira seu telefone" id="telefone"/>
					<input type="text" name="txtCelular" class="formText" value="" placeholder="Insira seu celular" id="celular"/>
					<?php 
						require_once('crud/selectMotivos.php');
					 ?>
				

					<textarea name="txtArea" class="formTextArea" placeholder="Insira seu comentário" required="required"></textarea>
					<input type="submit" name="btnSalvar" class="formBtn" value="enviar" />
				</form>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
