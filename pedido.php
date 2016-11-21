<?php
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();

	if(!isset($_SESSION['usuario'])){

		header("location:index.php");

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/perfil.css" type="text/css" rel="stylesheet">
		<link href="css/carrinho_compras.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/perfilsembug.js" type="text/javascript"></script>
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
				<!--  DESENVOLVIDO POR LUCAS AUGUSTO-->
				<div id="caixaPedidos">
					<h1 class="titPag">Meus Pedidos</h1>
					<?php 
						//Buscando os pedidos do cliente 
						$sql="select s.*, p.* from pedido as p inner join status as s on(p.oid_status = s.oid_status) where oid_cliente=".$_SESSION['usuario']['oid_cliente']." limit 8;";
						$select=mysql_query($sql);
						while ($rs=mysql_fetch_array($select)) {
							
						
					?>

					<div class="produto">
						<div class="produtoPreco produtoItem">
							<span class="item">Cód Pedido</span>
							<span class="cont"><?php echo($rs['oid_pedido']); ?></span>
						</div>
						<div class="produtoPreco produtoItem">
							<span class="item">Frete</span>
							<span class="cont"><?php echo($rs['frete']); ?></span>
						</div>
						<div class="produtoPreco produtoItem">
							<span class="item">Data</span>
							<span class="cont"><?php echo date('d/m/y', strtotime($rs['dtrealizado'])); ?></span>
						</div>
						<div class="produtoNome produtoItem">
							<span class="item">Status</span>
							<span class="cont"><?php echo ($rs['nome']); ?></span>
						</div>
						<a href="pedidoDetalhe.php?codigopedido=<?php echo($rs['oid_pedido']); ?>">
							<span class="item">Visualizar pedido</span>
						</a>
					</div>
					<?php  
						}
					?>
				</div>
				<!--  DESENVOLVIDO POR LUCAS AUGUSTO-->
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
