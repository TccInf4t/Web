<?php
				
				$sql="select * from conteudosite where classname='TDica'";
				
				$select=mysql_query($sql);

				$dica=mysql_fetch_array($select);	

			?>

				<h1 class="titPag">Dicas</h1>
				
				<div id="texto_conteudo">
					<p>
						Aqui você encontra todas as nossas dicas
					</p>
				</div>
				
				<div id="veja_mais">
					dicas:
				</div>
				<?php

					$sql="select * from conteudosite where classname='TDica'";
				
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
					
				?>