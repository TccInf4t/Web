<?php
	
	$sql="select * from tipopeca where oid_tipopeca=".$_GET['oid'];
	$select=mysql_query($sql);
	$categoria=mysql_fetch_array($select);


?>

			<div id="conteudo">
<h1 class="caixaTitulo"><?php echo($categoria['nome']); ?></h1>

				<?php

				$sql="select p.nome as nomepeca,p.preco,i.* from peca as p inner join imagem as i on(p.oid_imagem = i.oid_imagem) where p.oid_tipopeca =".$categoria['oid_tipopeca'];
				$select=mysql_query($sql);

				$cont=0;

				

					?>

				<div class="caixaLn">
					<?php

						while($peca=mysql_fetch_array($select)){

					?>

					<div class="caixa" id="caixaProduto">
						<div class="caixaImg" <?php echo('style="background-image: url(SGE/'.$peca['caminho'].');"'); ?>>

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
						<span class="nome"><?php echo(strip_tags($peca['nomepeca'])); ?></span>
						<span class="preco"><?php echo(strip_tags($peca['preco'])); ?></span>
					</div>
				</div>

				<?php
			
			}
				?>
		</div>
				
	</div>
</div>


				</div>
					