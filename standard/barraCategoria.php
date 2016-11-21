<div id="barra_lateral">
	<span id="br_tit">categoria</span>
	<?php 

		$sql="select * from marca";
		$select=mysql_query($sql);

	?>
	<ul id="marcas">
	<?php

		while($marcas=mysql_fetch_array($select)){

	?>
		<li class="marca"><span class="br_item"><?php echo($marcas['nome']); ?></span>
			<ul>
		<?php

			$sql2="select * from modelo where oid_marca=".$marcas['oid_marca'];
			$select2=mysql_query($sql2);

		?>
		<?php

			while($modelos=mysql_fetch_array($select2)){

			?>
			<li class="modelo"><span class="br_item"><?php echo($modelos['nome']) ?></span>
			<ul class="tipo">
				
			<?php
				$sql3="select * from tipopeca";
				$select3=mysql_query($sql3);

				while($tipo=mysql_fetch_array($select3)){
			?>
			<li><a href="<?php echo('filtro.php?tipopeca='.$tipo['oid_tipopeca'].'&modelo='.$modelos['oid_modelo']); ?>" class="br_item"><?php echo($tipo['nome']); ?></a></li>
			<?php

				}
			?>
			</ul>
			</li>
			
			<?php	

			}

		?>
		
		</ul>
		</li>
		
	<?php

		}

	?>
	</ul>
</div>