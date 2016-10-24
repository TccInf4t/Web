<?php

	require_once('../bd/conexao.php');

	Conectar();

	function logar($email,$senha){

		$sql="select * from cliente where email='".$email."' and senha='".$senha."'";

		$select=mysql_query($sql);

		if(mysql_num_rows($select) == 0){

			return 0;

		}else{

			return 1;

		}	

	}

	function usuarioexiste($email){

		$sql="select * from cliente where email='".$email."'";

		$select=mysql_query($sql);

		if(mysql_num_rows($select) == 0){

			return 0;

		}else{

			return 1;

		}	

	}

	if(isset($_POST['lsenha'])){

		echo json_encode(array('valor' => logar($_POST['lemail'],$_POST['lsenha'])));

	}else{

		echo json_encode(array('valor' => usuarioexiste($_POST['lemail'])));

	}

	

?>