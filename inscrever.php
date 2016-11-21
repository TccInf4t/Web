<?php
	session_start();
	require_once('bd/conexao.php');
	require_once('funcao/produto.php');
	Conectar();
?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>

		<title>OnPeças</title>
		<meta charset="utf-8">
		
		<link href="css/base.css" type="text/css" rel="stylesheet">
		<link href="css/item.css" type="text/css" rel="stylesheet">
		<link href="css/inscrever.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/inscrever.js" type="text/javascript"></script>
		<script src="js/inscreverValidacao.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
		<script src="js/masks.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
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

			<form name="formInscrever" id="formInscrever" method="post" action="#">

			<div id="dadosbasicos">
				<h1 class="titPag">Dados Básicos</h1>

					<span class="infoNome">Nome completo *:</span>
					<span id="nomeerror" class="error"></span>
					<input type="text" name="txtNome" class="formText" id="nome" value=""  placeholder="jose da Silva"  />

					<span class="infoNome">Endereço de E-mail *:</span>
					<span id="emailerror" class="error"></span>
					<input type="text" name="txtEmail" class="formText" id="email" value="" placeholder="josef10@outlook.com"  />

					<span class="infoNome">Senha *:</span>
					<span id="senhaerror" class="error"></span>
					<input type="password" name="txtSenha" class="formText" id="senha" value=""  minlength="8" />

					<span class="infoNome">Repita sua senha *:</span>
					<span id="resenhaerror" class="error"></span>
					<input type="password" name="txtReSenha" class="formText" id="resenha" value=""  minlength="8" />

					<span class="infoNome">
					CPF *:<input type="radio" name="cp" id="cpfc" value="1" checked />
					CNPJ *:<input type="radio" name="cp" id="cnpjc" value="2"/>
					</span>

					<div id="tcpf">
					<span id="cpferror" class="error"></span>
					<input type="text" name="txtCpf" class="formText" value="" id="cpf"  placeholder="000.000.000.00"   minlength="8" />
					</div>

					<div id="tcnpj">
					<span id="cnpjerror" class="error"></span>
					<input type="text" name="txtCnpj"  class="formText" value="" id="cnpj" placeholder="00.000.000/0000-00"  minlength="8" />
					</div>

					<span class="infoNome">Data de Nascimento*:</span>
					<span id="dataerror" class="error"></span>
					<input type="text" id="data" id="data" name="txtData" class="formText" value="" placeholder="24/12/1969"   minlength="8" />


					<input type="button" name="btnProsseguir" class="formBtn" value="prosseguir" id="prosseguir" />

				</div>
				<div id="endereco">
					<h1 class="titPag">Endereço</h1>

					<?php
							
						$sql="select * from estado";

						$select=mysql_query($sql);

					?>
					<span class="infoNome">Estado:</span>
					<select name="cbEstado" id="cbEstado" class="formText" >


						<?php

							while($estado=mysql_fetch_array($select)){

						?>
						<option value="<?php echo($estado['oid_estado']); ?>" <?php if(isset($_GET['editar'])){ if($estado['oid_estado'] == $estado2){ ?> selected <?php  } } ?>><?php echo($estado['nome']." - ".$estado['uf']); ?></option>
						<?php

							}

						?>

					</select>
					<span class="infoNome">Cidade:</span>
					<select name="cbCidade" id="cbCidade" class="formText" >
					</select>
					
					<span class="infoNome">Logradouro *:</span>
					<span id="logradouroerror" class="error"></span>
					<input type="text" name="txtLogradouro" id="logradouro" class="formText" value="" placeholder="Rua Augusta"  />

					<span class="infoNome">Número *:</span>
					<span id="numeroerror" class="error"></span>
					<input type="text" name="txtNumero" id="numero" class="formText" value="" placeholder="24" />

					<span class="infoNome">CEP *:</span>
					<span id="ceperror" class="error"></span>
					<input type="text" name="txtCep" class="formText" value="" id="cep" placeholder="06657-015" minlength="9" maxlength="9" />

					<span class="infoNome">Bairro *:</span>
					<span id="bairroerror" class="error"></span>
					<input type="text" name="txtBairro" class="formText" id="bairro" value="" placeholder="24"  />

					<span class="infoNome">Complemento *:</span>
					<span id="complementoerror" class="error"></span>
					<input type="text" name="txtComplemento" id="complemento" class="formText" value="" placeholder="2A" />

					<input type="button" name="btnProsseguir" class="formBtn" value="voltar" id="voltar" />

					<input type="button" name="btnSalvar" class="formBtn" value="salvar" id="salvar" />

				</div>
			</form>

			</div>
			<?php

				require_once('standard/rodape.php');

			?>

		</div>
	<body>
</html>
