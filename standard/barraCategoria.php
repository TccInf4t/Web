<div id="barra_lateral">
	<span id="br_tit">categoria</span>
	<?php 
		$sql="select * from tipopeca;";
		$select=mysql_query($sql);
		$cont=0;

			while ($rs=mysql_fetch_array($select)) {
				$cont++;
	 ?>
	<span class="br_item">
		<a href="#"><?php echo($rs['nome']); ?></a>
	</span>
	<?php 
		}
	 ?>
</div>