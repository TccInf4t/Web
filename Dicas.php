<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/dicas.css" type="text/css" rel="stylesheet">
		
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
				<div id="logo" style="background-image:url(<?php echo('../CMS/'.$logo['caminho']); ?>);"></div>
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

			<?php
				if(isset($_GET['oid'])){

					$sql="select * from conteudosite where classname='TDica' and oid_conteudosite=".$_GET['oid'];

				}else{

					$sql="select * from conteudosite where classname='TDica' order by oid_conteudosite desc";

				}
				
				$select=mysql_query($sql);

				$dica=mysql_fetch_array($select);	

			?>

				<h1 class="titPag"><?php echo($dica['titulo']); ?></h1>
				
				<div id="texto_conteudo">
					<p>
						<?php echo(nl2br($dica['descricao'])); ?>
					</p>
					<p>
						</br>Data de publicação  <?php echo($dica['datacriacao']); ?>
					</p>
				</div>
				
				<div id="veja_mais">
					Veja mais:
				</div>
				<?php

					$sql="select * from conteudosite where classname='TDica' and oid_conteudosite != ".$dica['oid_conteudosite']." ORDER BY RAND() LIMIT 0,3";
				
					$select=mysql_query($sql);

					while($dicas=mysql_fetch_array($select)){	

				?>
				<a href="<?php echo('dicas.php?oid='.$dicas['oid_conteudosite']); ?>">
				<div class="dicaItem" >
					<span><?php echo($dicas['titulo']); ?></span>
				</div>
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
