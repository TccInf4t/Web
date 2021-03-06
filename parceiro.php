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
		<link href="css/parceiro.css" type="text/css" rel="stylesheet">
		
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
				<h1 class="titPag">Nossos Parceiros</h1>

				<div id="logos">
				<?php
					$sql="select c.*,i.*  from conteudosite c inner join imagem i on(c.oid_imagem = i.oid_imagem) where c.classname='TParceiro'";
					$select=mysql_query($sql);

					while($parceiro=mysql_fetch_array($select)){
				?>
					<h1 class="tituloParceiro"><?php echo(strip_tags($parceiro['titulo'])); ?></h1>
						<a <?php echo('href="'.$parceiro['site'].'"'); ?> target="_blank">
							<div class="logoPaceiro" <?php echo('style="background-image: url(CMS/'.$parceiro['caminho'].');"'); ?>  ></div>
						</a>
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
