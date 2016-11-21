
			<div id="conteudo">
				<h1 class="titPag">Eventos</h1>

				<p>
					Aqui você encontra todos os eventos
				</p>

				<h2 class="outrosEventos">Eventos:</h2>

				<?php

					$sql="select * from conteudosite where classname='TEvento' order by oid_conteudosite desc";

				
					$select=mysql_query($sql);
					

					while($eventos=mysql_fetch_array($select)){
						

				?>
				<a href="<?php echo('eventos.php?oid='.$eventos['oid_conteudosite']); ?>">
				<div class="eventoItem"><?php echo(strip_tags($eventos['titulo'])); ?></div>
				</a>
				<?php
			}

				?>