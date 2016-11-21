<script type="text/javascript" src="js/jquery3.1.js"></script>
<script type="text/javascript" src="js/perfilValidacao.js"></script>

<?php
	session_start();
	require_once("../bd/conexao.php");
	Conectar();

	if($_SESSION['usuario']['oid_imagem'] == 0){
		$src="img/icon/usuariopadrao.jpg";

	}else{
		$sql="select * from imagem where oid_imagem=".$_SESSION['usuario']['oid_imagem'].";";
		$select=mysql_query($sql);
		$img = mysql_fetch_array($select);

		$src=$img['caminho'];
	}
?>
<div id="imgUsuario" style="background-image:url(<?php echo($src); ?>);"></div>
<div id="infUsuario">
	<span class="infoLogin" id="infoLoginNome"><?php echo($_SESSION['usuario']['nome']); ?></span>
	<span class="infoLogin" id="infoLoginEmail"><?php echo($_SESSION['usuario']['email']); ?></span>
	<div id="opt">
		<div id="optUsuario">
			<a href="pedido.php">meus produtos</a>
			<a href="perfil.php">perfil</a>
			<a href="crud/logout.php">sair</a>
		</div>
	</div>
</div>