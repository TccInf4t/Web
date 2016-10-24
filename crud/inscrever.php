<?php

function selecionarEstado($oid){

		$sql="select * from estado where oid_estado=".$oid;
		$select=mysql_query($sql);

		return mysql_fetch_array($select);

	}

	function selecionarCidade($oid){

		$sql="select * from cidade where oid_cidade=".$oid;
		$select=mysql_query($sql);

		return mysql_fetch_array($select);

	}

	if(isset($_POST['txtNome'])){

		$cidade=selecionarCidade($_POST['cbCidade']);
		$estado=selecionarEstado($cidade['oid_estado']);

		$enderecoCompleto=$_POST['txtLogradouro'].",".$_POST['txtNumero'].",".$_POST['txtComplemento'].",".$_POST['txtBairro']."-".$_POST['txtCep']."-".$cidade['nome']."-".$estado['nome'];

		$sql="insert into endereco (oid_cidade,logradouro,complemento,numero,cep,bairro,classname,enderecocompleto) values(".$_POST['cbCidade'].",'".$_POST['txtLogradouro']."','".$_POST['txtComplemento']."',".$_POST['txtNumero'].",'".$_POST['txtCep']."','".$_POST['txtBairro']."','TCliente','".$enderecoCompleto."')";

		mysql_query($sql);

		$sql1="select oid_endereco from endereco order by oid_endereco desc limit 1";
		$select1=mysql_query($sql1);

		$endereco=mysql_fetch_array($select1);

		if($_POST['cp'] == 1){

			$cp=$_POST['txtCpf'];

		}else{

			$cp=$_POST['txtCnpj'];

		}

		$data=implode("-",array_reverse(explode("/",$_POST['txtData'])));

	
		$sql2="insert into cliente(oid_endereco,email,senha,ultimoacesso,nome,cpfcnpj,data_nascimento,ativo) values(".$endereco['oid_endereco'].",'".$_POST['txtEmail']."','".$_POST['txtSenha']."',NOW(),'".$_POST['txtNome']."','".$cp."','".$data."',1);";
		    
		mysql_query($sql2);

		header("location:inscrever.php");

	}

?>
