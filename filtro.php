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
		<link href="css/home.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/jqueryCycle.js" type="text/javascript"></script>
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
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div> <!-- Logo -->
				<nav><?php require_once('standard/menu.php'); ?></nav>
			</header>
			<?php
				require_once 'standard/barraCategoria.php';

				$sql="select * from peca where oid_tipopeca =".$_GET['tipopeca']." and oid_modelo=".$_GET['modelo'];
				$select=mysql_query($sql);

			 ?>


			<div id="conteudo">
			<div class="caixaLn">
			<?php

					while($rs=mysql_fetch_array($select)){

						$sql2="select * from imagem where oid_imagem=".$rs['oid_imagem'];
						$select2=mysql_query($sql2);

						$imagem=mysql_fetch_array($select2);

				?>
					<a href="produtoDetalhe.php?produto=<?php echo($rs['oid_peca']); ?>">
						<div class="caixa" id="caixaProduto">
							<div class="caixaImg" id="caixaImg2" style="background-image:url(<?php echo('empresa/'.$imagem['caminho']); ?>)">
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
								<span class="nome"><?php echo($rs['nome']); ?></span>
								<span class="preco">R$ <?php echo($rs['preco']); ?></span>
							</div>
						</div>
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
