<?php
	require_once("bd/conexao.php");

	Conectar();

	$id = $_GET['id'];

	$sql="select * from cidade where oid_estado= ". $id .";";
	$select = mysql_query($sql);

	while($cidade = mysql_fetch_array($select)){
?>
<option value="<?php echo($cidade['oid_cidade']); ?>"><?php echo($cidade['nome']); ?></option>
<?php } ?>