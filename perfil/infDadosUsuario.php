<?php 

	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	$sql="select * from cliente where email='".$_SESSION['usuario']."'";
	$select=mysql_query($sql);

	$usuario = mysql_fetch_array($select);

 ?>

<span class="infPerfil">Nome:<?php echo($usuario['nome']); ?></span>
<span class="infPerfil">Email:<?php echo($usuario['email']); ?></span>
<span class="infPerfil">CPF/CNPJ:<?php echo($usuario['cpfcnpj']); ?></span>
<span class="infPerfil">Data de Nascimento:<?php echo(implode("/",array_reverse(explode("-",$usuario['data_nascimento'])))); ?></span>