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
		<link href="css/lojas.css" type="text/css" rel="stylesheet">
		
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
			<h1 class="titPag">Nossas Lojas</h1>
				<?php

						$sql="select l.*,t.*,e.*,c.nome as cidade,es.nome as estado from conteudosite l inner join telefone t on(l.oid_telefone = t.oid_telefone) inner join endereco e on(l.oid_endereco = e.oid_endereco) inner join cidade c on(e.oid_cidade = c.oid_cidade) inner join estado es on(c.oid_estado = es.oid_estado) where l.classname='TLoja'";

						$select=mysql_query($sql);

						while($lojas=mysql_fetch_array($select)){

					?>
				<div class="lojaItem">
					<div class="lojaInfo">
						<span class="infoNome"><?php echo(strip_tags($lojas['titulo'])); ?></span>
						
						<span class="infoItem">cidade</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['cidade'])); ?></span>

						<span class="infoItem">estado</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['estado'])); ?></span>
						
						<span class="infoItem">CEP</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['cep'])); ?></span>

						<span class="infoItem">logradouro</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['logradouro'])); ?></span>

						<span class="infoItem">bairro</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['bairro'])); ?></span>
						
						<span class="infoItem">número</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['numero'])); ?></span>

						<span class="infoItem">telefone</span>
						<span class="infoCont"><?php echo(strip_tags($lojas['telefone'])); ?></span>
					</div>
					<div class="lojaMapa"></div>

				</div>
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
