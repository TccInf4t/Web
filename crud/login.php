<?php
	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	// Faz a autenticação do usuário
	function logar($email,$senha){
		$sql="select * from cliente where email='".$email."' and senha='".$senha."'";
		$select=mysql_query($sql);

		if(mysql_num_rows($select) != 0){
			$rs = mysql_fetch_array($select);
			$_SESSION['usuario'] = $rs;

			return 1;
		}else {
			return 0;
		}

	}

	function usuarioexiste($email){
		$sql="select * from cliente where email='".$email."'";
		$select=mysql_query($sql);

		if(mysql_num_rows($select) == 0) return 0;
		else return 1;
	}

	if(isset($_GET['lsenha'])){
		echo json_encode(array('valor' => logar($_GET['lemail'],$_GET['lsenha'])));

	}else{
		echo json_encode(array('valor' => usuarioexiste($_GET['lemail'])));
	}
?>