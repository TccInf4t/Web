<?php 
	require_once('../bd/conexao.php');
	Conectar();

	if (isset($_POST['btnSalvar'])) {

	$nome=$_POST['txtNome'];
	$email=$_POST['txtEmail'];
	$telefone=$_POST['txtTelefone'];
	$celular=$_POST['txtCelular'];
	$motivo=$_POST['txtMotivo'];
	$comentario=$_POST['txtArea'];

	$sql="insert into contato (nome, telefone, celular, email, oid_motivocontato, comentario, classname, dt) values ('".$nome."', '".$telefone."', '".$celular."', '".$email."','".$motivo."', '".$comentario."', 'TContatoCliente', NOW());";
	
	mysql_query($sql);
	header("Location: ../contato.php");

	}

?>