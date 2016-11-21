<?php

	session_start();

	require_once('../bd/conexao.php');

	Conectar();

	function update($nome,$email,$cpfcnpj,$dtnascimento){

		$sql="update cliente set nome='".$nome."',email='".$email."',cpfcnpj='".$cpfcnpj."',data_nascimento='".$dtnascimento."' where email = '".$_SESSION['usuario']['email']."'";

		mysql_query($sql);

		$sql="select * from cliente where email='".$email."'";
		$select=mysql_query($sql);

		$_SESSION['usuario']=mysql_fetch_array($select);


	}

	function updateEndereco($logradouro,$cep,$numero,$complemento,$bairro,$cidade){

		$sql="select * from cliente where email='".$_SESSION['usuario']['email']."'";

		$select=mysql_query($sql);

		$cliente=mysql_fetch_array($select);

		$sql="update endereco set logradouro='".$logradouro."',cep='".$cep."',numero='".$numero."',complemento='".$complemento."',bairro='".$bairro."',oid_cidade=".$cidade." where oid_endereco = '".$cliente['oid_endereco']."'";

		mysql_query($sql);

	}

	function updateSenha($senha){

		$sql="update cliente set senha='".$senha."' where email = '".$_SESSION['usuario']['email']."'";

		$sql="select * from cliente where email='".$email."'";
		$select=mysql_query($sql);

		$_SESSION['usuario']=mysql_fetch_array($select);

		mysql_query($sql);

	}

	function updateImage($img){


		$sql="select * from cliente where email='".$_SESSION['usuario']['email']."'";

		$select=mysql_query($sql);

		$cliente = mysql_fetch_array($select);

		if($cliente['oid_imagem'] == 0){



			$sql="insert into imagem(caminho,classname) values('".$img."','TCliente')";

			mysql_query($sql);

			$sql2="select * from imagem where classname = 'TCliente' order by oid_imagem desc limit 1";

			$select=mysql_query($sql2);

			$img2 = mysql_fetch_array($select);

			$sql3 = "update cliente set oid_imagem=".$img2['oid_imagem']." where email='".$_SESSION['usuario']['email']."'";
			mysql_query($sql3);
				

		}

			$sql="update imagem set caminho='".$img."' where oid_imagem = ".$cliente['oid_imagem'];

			mysql_query($sql);


	}


	if(isset($_POST['txtNome'])){

		if($_POST['cp'] == 1){

			$cnpjcpf = $_POST['txtCpf'];

		}else{

			$cnpjcpf = $_POST['txtCnpj'];

		}

		$data=implode("-",array_reverse(explode("/",$_POST['txtData'])));

		update($_POST['txtNome'],$_POST['txtEmail'],$cnpjcpf,$data);

	}else if(isset($_POST['txtSenhaAtual'])){

		updateSenha($_POST['txtSenhaAtual']);

	}else if(isset($_POST['txtLogradouro'])){

		updateEndereco($_POST['txtLogradouro'],$_POST['txtCep'],$_POST['txtNumero'],$_POST['txtComplemento'],$_POST['txtBairro'],$_POST['cbCidade']);

	}else{


		updateImage($_POST['img']);

	}

	

?>