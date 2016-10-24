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

		//CÓDIGO PARA ATUALIZAR A QUANTIDADE DE ENVIOS DE CADA TIPO DE MOTIVO
		$sqlMotivoContato="select * from  motivocontato WHERE oid_motivocontato='".$motivo."';";
		$select=mysql_query($sqlMotivoContato);
		$rs=mysql_fetch_array($select);

		$cont = $rs["qntd"];
		$cont ++;
		//atualizo o campo qntd da tabela motivocontato para +1
		$update="update motivocontato set qntd = '".$cont."' WHERE oid_motivocontato=".$motivo."; ";

		mysql_query($update);
		mysql_query($sql);

		header("Location: ../contato.php");

	}

?>