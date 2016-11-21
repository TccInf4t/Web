<?php
	session_start();
	require_once("../bd/conexao.php");
	Conectar();

	if(strlen($_SESSION['usuario']['cpfcnpj']) > 14){

		$checkcnpj = "checked";
		$checkcpf= null;

	}else{

		$checkcnpj = null;
		$checkcpf= "checked";

	}

?>

<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->
<script src="js/jquery3.1.js" type="text/javascript"></script> 
<script src="js/perfilValidacao.js" type="text/javascript"></script>
<script src="js/funcoes.js" type="text/javascript"></script>

<?php

	$data=implode("/",array_reverse(explode("-",$_SESSION['usuario']['data_nascimento'])));

?>

<form action="#" method="post" id="formeditdados" name="formEditDados">
	<span class="infCampo">Nome completo *:</span>
	<span id="nomeerror" class="error"></span>
	<input type="text" name="txtNome" class="formText" id="nome" value="<?php echo($_SESSION['usuario']['nome']); ?>"  placeholder="jose da Silva"  />

	<span class="infCampo">Endereço de E-mail *:</span>
	<span id="emailerror" class="error"></span>
	<input type="text" name="txtEmail" class="formText" id="email" value="<?php echo($_SESSION['usuario']['email']); ?>" placeholder="josef10@outlook.com"  />


	<span class="infCampo">
	CPF *:<input type="radio" name="cp" id="cpfc" value="1" <?php echo($checkcpf); ?> />
	CNPJ *:<input type="radio" name="cp" id="cnpjc" value="2" <?php echo($checkcnpj); ?>/>
	</span>

<?php
	$cpf=null;
	$cnpj=null;

	if(strlen($_SESSION['usuario']['cpfcnpj']) == 14){
		$cpf=$_SESSION['usuario']['cpfcnpj'];

	}else {
		$cnpj=$_SESSION['usuario']['cpfcnpj'];
	}

	?>

	<div id="tcpf">
	<span id="cpferror" class="error"></span>
	<input type="text" name="txtCpf" class="formText" value="<?php echo($cpf); ?>" id="cpf"  placeholder="000.000.000.00"   minlength="8" />
	</div>

	<div id="tcnpj">
	<span id="cnpjerror" class="error"></span>
	<input type="text" name="txtCnpj"  class="formText" value="<?php echo($cnpj); ?>" id="cnpj" placeholder="00.000.000/0000-00"  minlength="8" />
	</div>

	<span class="infCampo">Data de Nascimento*:</span>
	<span id="dataerror" class="error"></span>
	<input  type="text" id="data"  name="txtData" class="formText" value="<?php echo($data); ?>" placeholder="24/12/1969"   minlength="8"/>

	<span class="infCampo">Sua Senha:</span>
	<span id="senhaerror" class="error"></span>
	<input type="password" name="txtSenha" class="formText" id="senha" value=""  />

	<input type="button" id="salvar" value="salvar" name="btnSalvar"/>
	
</form>				
		