<?php
	$sql="select * from rodape";
	$select=mysql_query($sql);

	$rodape=mysql_fetch_array($select);
?>
<footer>
<div id="rod_centro">
	<div id="rodContato">
		<div class="rod_bloco">
			<div class="rod_img" id="rodBlocoImg1"></div>
			<span class="rod_val"><?php echo($rodape['email']); ?></span>
		</div>
		<div class="rod_bloco">
			<div class="rod_img" id="rodBlocoImg2"></div>
			<span class="rod_val"><?php echo($rodape['telefone']); ?></span>
		</div>
		<div class="rod_bloco">
			<a target="blank" href="<?php echo($rodape['facebook']); ?>"><div class="rod_img" id="rodBlocoImg3"></div></a>
			<span class="rod_val">facebook/OnPeças</span>
		</div>
		<div class="rod_bloco">
			<a target="blank" href="<?php echo($rodape['twitter']); ?>"><div class="rod_img" id="rodBlocoImg4"></div></a>
			<span class="rod_val">twitter/OnPeças</span>
		</div>
	</div>

		<div id="rodTexto">
			<?php

			 echo($rodape['nome']." - CNPJ:".$rodape['cnpj']); 
			 ?></br>
			©OnPeças 1998-2016. Todos os Direitos Reservados.
		</div>
	</div>
</footer>