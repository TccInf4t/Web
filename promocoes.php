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
		<link href="css/promocoes.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
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
				<?php 
					// $sqlPromocao="select * from promocao;";
					$sqlPromocao="select * FROM promocao WHERE now() BETWEEN date(dt_inicio) AND date(dt_termino);";
					$select = mysql_query($sqlPromocao);

					while ($rs=mysql_fetch_array($select)) {
				?>

				<h1 class="titPag"><?php echo($rs['nome']." - ".$rs['perc']."% de desconto"); ?></h1>
				<span>Válida até <?php echo date('d/m/y', strtotime($rs['dt_termino'])); ?></span>
				<div class="caixaLn">

					<?php
						$sql = "select p.*, p.nome as produto, i.*, pr.nome as promocao, pp.perc_unico from peca_promocao as pp
								inner join peca as p on(pp.oid_peca = p.oid_peca)
								inner join imagem as i on(p.oid_imagem = i.oid_imagem)
								inner join promocao as pr on(pp.oid_promocao = pr.oid_promocao)
								where pr.oid_promocao = ". $rs['oid_promocao'] ." order by rand();";
						$exec =mysql_query($sql);

						while($rsItem = mysql_fetch_array($exec)){
					?>
					<a href="produtoDetalhe.php?produto=<?php echo($rsItem['oid_peca']); ?>"> 
						<div class="caixa">
							<div class="caixaImg" style="background-image:url(<?php echo('empresa/'.$rsItem['caminho']); ?>);">
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
								<span class="nome"><?php echo($rsItem['produto']); ?></span>
								<span class="precoNormal"><?php echo($rsItem['preco']); ?></span>
								<span class="preco">
									<?php
										if ($rsItem['perc_unico'] > 0) {
											$percentual=$rsItem['perc_unico'];
											$preco=$rsItem['preco'];
											$valor=$percentual * $preco/100;
											$total=$preco - $valor;

											printf ('%.2f', $total);
											echo('<br>OFF ');
											echo (" - ".$rsItem['perc_unico']."%");

										}else{

											$percentual=$rs['perc'];
											$preco=$rsItem['preco'];
											$valor=$percentual * $preco/100;
											$total=$preco - $valor;

											printf ('%.2f', $total);
										}
									?>
								</span>
							</div>
						</div>
					</a>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<?php
				require_once('standard/rodape.php');
			?>
		</div>
	<body>
</html>
