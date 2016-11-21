<?php
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();

	if(!isset($_SESSION['usuario'])){

		header("location:index.php");

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/perfil.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/perfilsembug.js" type="text/javascript"></script>
		<script src="js/script2.js" type="text/javascript"></script>

	</head>
		
	<body>
		<div id="corpo">
			<header>	
				<?php
					require_once("standard/carrinho.php");
					require_once("standard/login.php");

					$sql="select * from imagem where classname='TLogo'";
					$select=mysql_query($sql);

					$logo=mysql_fetch_array($select);
				?>
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div>
				<nav><?php require_once('standard/menu.php'); ?></nav>
			</header>
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>
			<div id="conteudo">

				<?php

				$sql="select * from cliente where email='".$_SESSION['usuario']['email']."';";
				$select=mysql_query($sql);

				$usuario = mysql_fetch_array($select);


				?>

				<h1 class="titPag">Perfil do usuário</h1>

				<div id="configuracoes">

					<div id="imgUser" >
						

					</div>

					<div id="temCerteza">
					<span class="infPerfil">Mudar imagem de perfil?</span>
					<span class="infEditar" id="editarSim">sim</span>
					<span class="infEditar" id="editarNao">não</span>
					</div>

					<div id="escolherimg">
					<span class="infEditar">Alterar Imagem</span></br>
					<input type="file" name="fileupload"  id="fileupload" />
					</div>
					
					<span class="infEditar" id="editarSenha">Alterar Senha</span>

				</div>
				<div class="conteudoPerfil" id="usuarioDados">

					<h1 class="tituloPerfil">Dados do usuário<span class="infEditar" id="editarDados">Editar</span></h1>

					<div id="infdadosusuario">
						
					</div></br>

					<h1 class="tituloPerfil">Endereço<span class="infEditar" id="editarEndereco">Editar</span></h1>

					<div id="infenderecousuario">
						
					</div>

				</div>

				<div class="conteudoPerfil" id="editDados">

					<h1 class="tituloPerfil">Editar dados<span class="infEditar" id="cancelarDados">Cancelar</span></h1>
					<div id="editDadosUsuario">
							
					
					</div>
				</div>
				<div class="conteudoPerfil" id="editEndereco">

					<h1 class="tituloPerfil">Editar Endereco<span class="infEditar" id="cancelarEndereco">Cancelar</span></h1>
					<div id="editEnderecoUsuario">
							
					
					</div>
				</div>
				<div class="conteudoPerfil" id="editSenha">

					<h1 class="tituloPerfil">Editar Senha <span class="infEditar" id="cancelarSenha">Cancelar</span></h1>
					<div id="editarUserSenha">
							

					</div>
				</div>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
