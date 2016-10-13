<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Layout Test</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/home.css" type="text/css" rel="stylesheet">
		
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
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div> <!-- Logo -->
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
			
			<!-- Slider -->
			<div id="slider">
				<ul id="slides">
				<?php

					$sql="select * from imagem where classname='TSlideHome'";
					$select=mysql_query($sql);

					while($img=mysql_fetch_array($select)){

				?>
					<li class="slideItem" <?php echo('style="background-image:url(CMS/'.$img['caminho'].');"'); ?>><h2><?php echo ($img['nome']); ?></h2></li>
					<?php
					}
					?>
				</ul>
				<div class="sliderBtn" id="btnEsquerdo"></div>
				<div class="sliderBtn" id="btnDireito"></div>
			</div>

			<div id="conteudo">
				<h1 class="caixaTitulo">produtos mais compradas</h1>
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					
					<div class="caixa" id="caixaProduto">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
				
				<h1 class="caixaTitulo">recomendados</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg4">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg5">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg6">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
				<?php

					$sql="select * from conteudosite where classname='TDica' order by oid_conteudosite desc";
				
					$select=mysql_query($sql);

					$dica=mysql_fetch_array($select);	

				?>
				<!-- Dicas -->
				<div id="caixaDica">
					<h1>
						<?php echo($dica['titulo']); ?>
						<a href="Dicas.php" id="outrasDicas">ver outras dicas</a>
					</h1>
					<p>
						<?php echo($dica['descricao']); ?>
					</p>
				</div>
				
				<h1 class="caixaTitulo">promoções</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg7">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg8">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg9">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>

				<h1 class="caixaTitulo">novidades</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg10">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg11">
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
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg12">
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
