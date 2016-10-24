<?php

	$sql="select * from conteudosite where classname='TEvento' and oid_conteudosite=".$_GET['oid'];
	$select=mysql_query($sql);

				$evento=mysql_fetch_array($select);

			?>
			<div id="conteudo">
				<h1 class="titPag"><?php echo($evento['titulo']); ?></h1>
				<span id="dtEvento">
					dia <strong><?php echo(strip_tags($evento['dt'])); ?></strong> às <strong><?php echo(strip_tags($evento['hr'])); ?></strong>
				</span>

				<p>
					<?php echo(strip_tags($evento['descricao'])); ?>
				</p>

				<h2 class="outrosEventos">Outros Eventos</h2>

				<?php

					if(mysql_num_rows($select) != 0){

					$sql="select * from conteudosite where classname='TEvento' and oid_conteudosite != ".$evento['oid_conteudosite']." order by rand() limit 3;";

				
					$select=mysql_query($sql);
					

					while($eventos=mysql_fetch_array($select)){
						

				?>
				<a href="<?php echo('eventos.php?oid='.$eventos['oid_conteudosite']); ?>">
				<div class="eventoItem"><?php echo(strip_tags($eventos['titulo'])); ?></div>
				</a>
				<?php
			}
			
			}

?>