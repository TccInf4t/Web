<div id="carrinho">  <!-- Carrinho de Compras  -->
	<?php
		if(isset($_SESSION['usuario'])){
			$idCliente = $_SESSION['usuario']['oid_cliente'];
			
			$query = "select * from visualizacaocarrinho where oid_cliente = ". $idCliente .";";
			$exec = mysql_query($query);
			$qtdCarrinho = mysql_num_rows($exec);

			echo('<div id="cont">'. $qtdCarrinho .'</div>');
	?>
		<div id="listaCarrinho">
			<span id="carrinhoFechar"></span>
			<div id="carrinhoConteudo">
				<?php
					while($rs = mysql_fetch_array($exec)){
						$img = "empresa/" . $rs['caminho'];
				?>
					<div class="carrinhoItem">
						<div class="carrinhoItemImg" style="background-image:url(<?php echo($img); ?>);"></div>
						<span class="carrinhoItemNome"><?php echo($rs['produto']); ?></span>
					</div>
				<?php } ?>
			</div>
			
			<a href="carrinho_compra.php" id="carrinhoVerTodos">ver todos</a>
		</div>
	<?php } ?>
</div>
