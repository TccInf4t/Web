<?php

	session_start();

	require_once('../bd/conexao.php');

	Conectar();

	function verificarSenha($senha){

		$sql="select * from cliente where email='".$_SESSION['usuario']."' and senha='".$senha."'";

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

			if($email != $_SESSION['usuario']){

				return 1;

			}else{

				return 0;


		}	

	}
}

	if(isset($_POST['lsenha'])){

		echo json_encode(array('valor' => verificarSenha($_POST['lsenha'])));

	}else{

		echo json_encode(array('valor' => usuarioexiste($_POST['lemail'])));

	}

	

?>