<?php 
	function Conectar(){
		$servidor="10.107.144.52";
		$usuario="csop";
		$senha="csoptcc@2016";

		if($conexao=mysql_connect($servidor, $usuario, $senha)){
			mysql_select_db("dbcsop");
			mysql_set_charset('utf8',$conexao);

		}else {
			echo("ERRO na conexão com o banco de dados".mysql_error());
			die();
		}

		return $conexao;
	}

	function Desconectar(){
		mysql_close();
	}
?>