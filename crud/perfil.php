<?php

	session_start();

	require_once('../bd/conexao.php');

	Conectar();

	function update($nome,$email,$cpfcnpj,$dtnascimento){

		$sql="update cliente set nome='".$nome."',email='".$email."',cpfcnpj='".$cpfcnpj."',data_nascimento='".$dtnascimento."' where email = '".$_SESSION['usuario']."'";

		mysql_query($sql);

	}

	if($_POST['cp'] == 1){

		$cnpjcpf = $_POST['txtCpf'];

	}else{

		$cnpjcpf = $_POST['txtCnpj'];

	}

	$data=implode("-",array_reverse(explode("/",$_POST['txtData'])));

	update($_POST['txtNome'],$_POST['txtEmail'],$cnpjcpf,$data);
	$_SESSION['usuario'] = $_POST['txtEmail'];

?>