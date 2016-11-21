<?php
				
				$sql="select * from conteudosite where classname='TDica' and oid_conteudosite=".$_GET['oid'];
				
				$select=mysql_query($sql);

				$dica=mysql_fetch_array($select);	

			?>

				<h1 class="titPag"><?php echo($dica['titulo']); ?></h1>
				
				<div id="texto_conteudo">
					<p>
						<?php echo(nl2br(strip_tags($dica['descricao']))); ?>
					</p>
					<p>
						</br>Data de publicação  <?php echo(strip_tags($dica['datacriacao'])); ?>
					</p>
				</div>
				
				<div id="veja_mais">
					Veja mais:
				</div>
				<?php

				if(mysql_num_rows($select) != 0){

					$sql="select * from conteudosite where classname='TDica' and oid_conteudosite != ".$dica['oid_conteudosite']." ORDER BY RAND() LIMIT 0,3";
				
					$select=mysql_query($sql);

					while($dicas=mysql_fetch_array($select)){	

				?>
				<a href="<?php echo('dicas.php?oid='.$dicas['oid_conteudosite']); ?>">
				<div class="dicaItem" >
					<span><?php echo(strip_tags($dicas['titulo'])); ?></span>
				</div>
				</a>

				<?php

					}
				}
					
				?>