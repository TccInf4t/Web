<?php function criar_produto($id, $nome, $preco, $img){ ?>
<a href="produtoDetalhe.php?produto=<?php echo($id); ?>" id="<?php echo($id); ?>" class="linkProduto">
	<div class="caixa">
		<div class="caixaImg" style="background-image: url(<?php echo($img); ?>);">
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
			<span class="nome"><?php echo($nome); ?></span>
			<span class="preco">R$ <?php echo($preco); ?></span>
		</div>
	</div>
</a>
<?php } ?>