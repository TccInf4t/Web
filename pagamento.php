<?php
	session_start();
	require_once('bd/conexao.php');
	require_once("crud/pagamento.php");
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
		<link href="css/finalizarcompra.css" type="text/css" rel="stylesheet">
		
		<script src="js/jquery3.1.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/finalizarcompra.js" type="text/javascript"></script>
		<script src="js/script2.js" type="text/javascript"></script>
		<script src="js/maskInput.js" type="text/javascript"></script>
		<script src="js/masks.js" type="text/javascript"></script>

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


				<h1 class="titPag">Finalizar Compra</h1>
				<h2 class="inftitulo">Endereço</h2>
				<form name="formFinalizarCompra" action="#" method="post">
				<h3 class="infCampo">
				Usar endereço cadastrado:<input type="radio" name="end" id="endCadastrado" value="1" checked />
				Usar outro endereço:<input type="radio" name="end" id="endNovo" value="2"/>
				</h3>
				<div id="divEndereco">
					
					<span class="infCampo">Logradouro *:</span>
					<span id="logradouroerror" class="error"></span>
					<input type="text" name="txtLogradouro" id="logradouro" class="formText" value="" placeholder="Rua Augusta"  />

					<?php
							
						$sql="select * from estado";

						$select=mysql_query($sql);

					?>
					<span class="infCampo">Estado:</span>
					<select name="cbEstado" id="cbEstado" class="formText" >


						<?php

							while($estado=mysql_fetch_array($select)){

						?>
						<option value="<?php echo($estado['oid_estado']); ?>" <?php if(isset($_GET['editar'])){ if($estado['oid_estado'] == $estado2){ ?> selected <?php  } } ?>><?php echo($estado['nome']." - ".$estado['uf']); ?></option>
						<?php

							}

						?>

					</select>

					<span class="infCampo">Cidade:</span>
					<select name="cbCidade" id="cbCidade" class="formText" >
					</select>

					<span class="infCampo">Número *:</span>
					<span id="numeroerror" class="error"></span>
					<input type="text" name="txtNumero" id="numero" class="formText" value="" placeholder="24" />

					<span class="infCampo">CEP *:</span>
					<span id="ceperror" class="error"></span>
					<input type="text" name="txtCep" class="formText" value="" id="cep" placeholder="06657-015" minlength="9" maxlength="9" />

					<span class="infCampo">Bairro *:</span>
					<span id="bairroerror" class="error"></span>
					<input type="text" name="txtBairro" class="formText" id="bairro" value="" placeholder="24"  />

					<span class="infCampo">Complemento *:</span>
					<span id="complementoerror" class="error"></span>
					<input type="text" name="txtComplemento" id="complemento" class="formText" value="" placeholder="2A" />
				</div>
				<h2 class="inftitulo">Forma de Pagamento</h2>
				<h3 class="infCampo">
				Boleto:<input type="radio" name="cp" id="boleto" value="1" checked />
				Cartão:<input type="radio" name="cp" id="cartao" value="2"/>
				</h3>
				<div id="divBoleto">
					<a href="boleto.pdf" class="infCampo" target="blank">Gerar Boleto</a>
				</div>
				<div id="divCartao">
					<span class="infCampo">Número do cartão *:</span>
					<span id="cartaoerror" class="error"></span>
					<input type="text" name="txtCartao" id="cartao" class="formText" value="" placeholder="4024007110838066" />
					<span class="infCampo2">Débito:</span><input type="radio" name="cartao" id="debito" value="Debito" checked />
					<span class="infCampo2">Crédito:</span><input type="radio" name="cartao" id="credito" value="Credito"/>
				</div>

				<div id="aff"><input type="submit" name="btnSalvar" class="formBtn" value="Finalizar Compra" id="salvar" /></div>
				</div>
				</form>
			</div>
			<?php

				require_once('standard/rodape.php');

			?>
		</div>
	<body>
</html>
