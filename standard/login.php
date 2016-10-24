
<?php
	
	require_once('bd/conexao.php');
	Conectar();

	session_start();

	if(isset($_SESSION['usuario'])){

		$sql="select * from cliente where email='".$_SESSION['usuario']."'";
		$select=mysql_query($sql);
		$usuario = mysql_fetch_array($select);


?>


<div id="caixaUsuario">  
	
	<div id="imgUsuario">
	</div>
	<div id="infUsuario">
	<p>
	<?php

		echo("<span class='infoLogin'>".$usuario['nome']."</span>");
		echo("<span class='infoLogin'>".$usuario['email']."</span>");

	?>
	</p>
	<form action="#" method="post">

	<input type="submit" class="formBtnLogin" value="Perfil" name="btnPerfil"/>
	<input type="submit" class="formBtnLogin" value="Logoff" name="btnLogoff"/>

	</form>


	</div>

</div>
<?php
	
	if(isset($_POST['btnPerfil'])){

		header("location:perfil.php");

	}

	if(isset($_POST['btnLogoff'])){

		$sql="update cliente set ultimoacesso=NOW() where email='".$_SESSION['usuario']."'";
		mysql_query($sql);
		unset($_SESSION['usuario']);
		header("location:index.php");

	}

	}else{

?>
<div id="caixaLogin"> <!-- Botão de Inscrição e Login -->
	<a href="inscrever.php" id="inscrever"><span id="itemLogin2">inscrever-se</span></a>
	<div id="entrar"><span  class="itemLogin">entrar</span></div>
</div>
<?php
	}
?>

 <div id="login">
	<form id="flogin" action="#" method="post" name="formLogin">

		<h3 class="titPagLogin">Login</h3>
		<span id="loginerror">Usuário inválido!</span>

		<input id="lemail" name="txtEmail" class="formTextLogin" type="text" value="" placeholder="email" />
		
		<input id="lsenha" name="txtSenha" class="formTextLogin" type="password" placeholder="senha" value=""/>
		
		<input class="formBtnLogin" type="button" value="Entrar" id="logar"/>

	</form>
		
</div> 
<?php 

	if(isset($_POST['txtEmail'])){

		$_SESSION['usuario'] = $_POST['txtEmail'];
		header("location:index.php");

	}

 ?>
