<script type="text/javascript" src="js/jquery3.1.js"></script>
<script type="text/javascript" src="js/perfilValidacao.js"></script>

<?php
	session_start();
	require_once("../bd/conexao.php");
	Conectar();


	if($_SESSION['usuario']['oid_imagem'] == 0){

		$src="img/icon/usuariopadrao.jpg";

	}else{

		$sql="select * from imagem where oid_imagem=".$_SESSION['usuario']['oid_imagem']."";
		$select=mysql_query($sql);
		$img = mysql_fetch_array($select);

		$src=$img['caminho'];

	}

?>
<img src=<?php echo($src); ?> alt="imagem do perfil" id="imgusuario" />
<img src="" alt="imagem do perfil" id="preview" />


