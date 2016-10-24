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
		<script src="js/perfil.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
	</head>
		
	<body>
		<div id="corpo">
			<header>	
				<div id="carrinho">  <!-- Carrinho de Compras  -->
					<!-- <div id="cont">02</div> -->
				</div>
				
				<?php

				require_once('standard/login.php');

				require_once('bd/conexao.php');
				Conectar();

				$sql="select * from imagem where classname='TLogo'";
				$select=mysql_query($sql);

				$logo=mysql_fetch_array($select);


				?>
				<div id="logo" style="background-image:url(<?php echo('CMS/'.$logo['caminho']); ?>);"></div>
				<nav>
					<div id="caixaPesq">
						<div id="caixaPesqFechar"></div>
						<form name="formPesq" id="formPesq" method="post" action="#">
							<input type="search" name="txtPesq" id="txtPesq" placeholder="Pesquisar" />
						</form>
					</div>
					<div id="pesqMenu"> <!-- Icone de Menu e Pesquisa  -->
						<div class="item" id="btnMenu"></div>
						<div class="item" id="btnPesquisa"></div>
					</div>
					
					<?php

						require_once('standard/menu.php');

					?>
				</nav>
			</header>
			<?php
				require_once 'standard/barraCategoria.php';
			 ?>
			<div id="conteudo">

				<?php

				$sql="select * from cliente where email='".$_SESSION['usuario']."'";
				$select=mysql_query($sql);

				$usuario = mysql_fetch_array($select);

				?>

				<h1 class="titPag">Perfil do usuário</h1>

				<div id="configuracoes">

					<div id="imgUser" >
						

					</div>

					<span class="infPerfil">Alterar Senha</span>

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
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
