<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/lojas.css" type="text/css" rel="stylesheet">
		
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
			<h1 class="titPag">Nossas Lojas</h1>
				<?php

						$sql="select l.*,t.*,e.*,c.nome as cidade,es.nome as estado from conteudosite l inner join telefone t on(l.oid_telefone = t.oid_telefone) inner join endereco e on(l.oid_endereco = e.oid_endereco) inner join cidade c on(e.oid_cidade = c.oid_cidade) inner join estado es on(c.oid_estado = es.oid_estado) where l.classname='TLoja'";

						$select=mysql_query($sql);

						while($lojas=mysql_fetch_array($select)){

					?>
				<div class="lojaItem">
					<div class="lojaInfo">
						<span class="infoNome"><?php echo($lojas['titulo']); ?></span>
						
						<span class="infoItem">cidade</span>
						<span class="infoCont"><?php echo($lojas['cidade']); ?></span>

						<span class="infoItem">estado</span>
						<span class="infoCont"><?php echo($lojas['estado']); ?></span>
						
						<span class="infoItem">CEP</span>
						<span class="infoCont"><?php echo($lojas['cep']); ?></span>

						<span class="infoItem">logradouro</span>
						<span class="infoCont"><?php echo($lojas['logradouro']); ?></span>

						<span class="infoItem">bairro</span>
						<span class="infoCont"><?php echo($lojas['bairro']); ?></span>
						
						<span class="infoItem">número</span>
						<span class="infoCont"><?php echo($lojas['numero']); ?></span>

						<span class="infoItem">telefone</span>
						<span class="infoCont"><?php echo($lojas['telefone']); ?></span>
					</div>
					<div class="lojaMapa">
						<iframe src="https://www.google.com.br/maps/place/Jardim+Sao+Jose,+Barueri+-+SP,+06433-090/@-23.5249824,-46.8880512,17z/data=!3m1!4b1!4m5!3m4!1s0x94cf015db63f67d7:0x1d29ceb73d723f6c!8m2!3d-23.5253324!4d-46.887071" allowfullscreen></iframe>
					</div>

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
