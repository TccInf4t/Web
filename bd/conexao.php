<?php 
		function Conectar(){

			$servidor="10.107.144.52";
			$usuario="root";
			$senha="bcd127";

			if($conexao=mysql_connect($servidor, $usuario, 
				$senha)){

				mysql_select_db("csoptcc");

			}else{
				echo("ERRO na conexão com o banco de dados".mysql_error());
				die();
			}

			return $conexao;
		}

		function Desconectar(){
			mysql_close($conexao);
		}
?>