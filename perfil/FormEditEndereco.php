<?php
	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	$sql="select * from cliente where email='".$_SESSION['usuario']."'";
	$select=mysql_query($sql);

	$usuario = mysql_fetch_array($select);

	$sql="select es.oid_estado,es.nome as estado,ci.nome as cidade,e.* from endereco e inner join cidade ci on(e.oid_cidade = ci.oid_cidade) inner join estado es on(ci.oid_estado = es.oid_estado) where oid_endereco =".$usuario['oid_endereco'];

	$select=mysql_query($sql);

	$endereco = mysql_fetch_array($select);

?>

<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->

<script src="js/perfilValidacao.js" type="text/javascript"></script>
<script src="js/maskInput.js" type="text/javascript"></script>
<script src="js/masks.js" type="text/javascript"></script>
<script src="js/jquery3.1.js" type="text/javascript"></script> 

<form action="#" method="post" id="formeditendereco" name="formEditEndereco">
	<?php
							
		$sql="select * from estado";

		$select=mysql_query($sql);

	?>
	<span class="infCampo">Estado:</span>
	<select name="cbEstado" id="cbEstado" class="formText" >


	<?php

		while($estado=mysql_fetch_array($select)){

	?>
	<option value="<?php echo($estado['oid_estado']); ?>"><?php echo($estado['nome']." - ".$estado['uf']); ?></option>
	<?php

		}

	?>

	</select>

	<span class="infCampo">Cidade:</span>
	<select name="cbCidade" id="cbCidade" class="formText" >
	</select>
					
					
</form>				
		