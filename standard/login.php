<?php
	if(isset($_SESSION['usuario'])){
		echo('<div id="caixaUsuario"></div>');
	}else {
?>
<div id="caixaLogin"> <!-- Botão de Inscrição e Login -->
	<a href="inscrever.php" id="inscrever"><span id="itemLogin2">inscrever-se</span></a>
	<div id="entrar"><span class="itemLogin">entrar</span></div>
</div>
<?php } ?>

 <div id="login">
	<form id="flogin" action="#" method="post" name="formLogin">
		<h3 class="titPagLogin">Login</h3>
		<span id="loginerror">Usuário inválido!</span>

		<input id="lemail" name="txtEmail" class="formTextLogin" type="text" value="" placeholder="email" />
		<input id="lsenha" name="txtSenha" class="formTextLogin" type="password" placeholder="senha" />
		<input class="formBtnLogin" type="button" value="Entrar" id="logar"/>
	</form>
</div>