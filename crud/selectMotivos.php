<select class="formSlt" name="txtMotivo">
	<?php 
		require_once('bd/conexao.php');
		Conectar();

		$sql="select * from motivocontato;";
		$select=mysql_query($sql);
		$cont=0;

		while ($rs=mysql_fetch_array($select)) {
			$cont++;	
 	?>
		<option value="<?php echo($rs['oid_motivocontato']);?>"> <?php echo($rs['nome']);?> </option>

	<?php 
		}
	 ?>
</select>