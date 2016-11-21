<?php
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();

	if(!isset($_SESSION['usuario'])){
		header("location:index.php");
	}

	//Verificação para o cliente visualizar apenas os seus pedidos
	$codPedido=$_GET['codigopedido'];

	$sql="select oid_pedido, oid_cliente from pedido where  oid_cliente=".$_SESSION['usuario']['oid_cliente'].";";
	$select=mysql_query($sql);
	
	$pedido = 0;

	while($rs=mysql_fetch_array($select)){
		if($rs['oid_pedido'] == $codPedido){
			$pedido = 1;
		}
	}

	if($pedido == 0) header("location: pedido.php");
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
				<div class="caixaLn">
					<h1>Detalhes do Pedido</h1>
						<?php 
							$query="select p.*, s.* from pedido as p
									inner join status as s on(p.oid_status = s.oid_status) where oid_pedido=".$codPedido.";";

							$array=mysql_query($query);
							$rs=mysql_fetch_array($array);
						?>
						<h3>Status:</h3>
						<span><?php echo($rs['nome']); ?></span>	
						<h3>Forma de pagamento:</h3>
						<span><?php echo($rs['formapagamento']); ?></span>
						<h3>Data realizado:</h3>
						<span><?php echo date('d/m/y', strtotime($rs['dtrealizado'])); ?></span>
						<h3>Frete:</h3>
						<span><?php echo($rs['frete']); ?></span><br>
							<?php 
								$sql="select pp.*, pec.nome,pec.oid_peca,pec.oid_imagem, i.caminho, i.oid_imagem, p.*
			   							  from pedido as p
									      inner join pedido_peca as pp on(pp.oid_pedido = p.oid_pedido)
									      inner join peca as pec on(pec.oid_peca = pp.oid_peca)
									      inner join imagem as i on(i.oid_imagem = pec.oid_imagem)
									      where p.oid_pedido=".$codPedido.";";

								$select=mysql_query($sql);
								while ($rs=mysql_fetch_array($select)) {

							?>
								<div class="caixa">
									<div class="caixaImg" style="background-image: url(<?php echo("empresa/".$rs['caminho']); ?>);">
									</div>
									<div class="caixaInfo">
										<span class="nome"><?php echo($rs['nome']); ?></span>
									</div>
								</div>
							<?php 
								}
							?>
				</div>
			</div>
			<?php
				require_once('standard/rodape.php');
			?>
		</div>
	<body>
</html>
