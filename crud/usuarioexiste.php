<?php

	require_once('../bd/conexao.php');

	Conectar();


	function usuarioexiste($email){

		$sql="select * from cliente where email='".$email."'";

		$select=mysql_query($sql);

		if(mysql_num_rows($select) == 0){

			return 0;

		}else{

			return 1;

		}	

	}
		echo json_encode(array('valor' => usuarioexiste($_POST['lemail'])));



?>