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
		<link href="css/contato.css?0" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
		<script src="js/mascaraTelefone.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script  src="js/jquery.validate.js" type="text/javascript"></script>
		<script  src="js/validacaoContato.js" type="text/javascript"></script>
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
				<h1 class="titPag">Contate-nos</h1>

				<form name="formContato" id="form" method="post" action="crud/contato.php">
					<input type="text" name="txtNome" id="nome" class="formText" value="" placeholder="Insira seu nome"  />
					<input type="email" name="txtEmail" class="formText" value="" placeholder="Insira seu email" />
					<input type="text" name="txtTelefone" class="formText" value="" placeholder="Insira seu telefone" id="telefone"/>
					<input type="text" name="txtCelular" class="formText" value="" placeholder="Insira seu celular" id="celular"/>
					<?php 
						require_once('crud/selectMotivos.php');
					?>
					<textarea name="txtArea" class="formTextArea" placeholder="Insira seu comentário" required="required" id="comentario"></textarea>
					<input type="submit" name="btnSalvar" class="formBtn" value="enviar" id="botao" />
				</form>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
