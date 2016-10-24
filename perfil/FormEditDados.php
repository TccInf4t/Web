<?php
	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	$sql="select * from cliente where email='".$_SESSION['usuario']."'";
	$select=mysql_query($sql);

	$usuario = mysql_fetch_array($select);

?>

<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->

<script src="js/perfilValidacao.js" type="text/javascript"></script>
<script src="js/maskInput.js" type="text/javascript"></script>
<script src="js/masks.js" type="text/javascript"></script>
<script src="js/jquery3.1.js" type="text/javascript"></script> 

<form action="#" method="post" id="formeditdados" name="formEditDados">
	<span class="infCampo">Nome completo *:</span>
	<span id="nomeerror" class="error"></span>
	<input type="text" name="txtNome" class="formText" id="nome" value="<?php echo($usuario['nome']); ?>"  placeholder="jose da Silva"  />

	<span class="infCampo">Endereço de E-mail *:</span>
	<span id="emailerror" class="error"></span>
	<input type="text" name="txtEmail" class="formText" id="email" value="<?php echo($usuario['email']); ?>" placeholder="josef10@outlook.com"  />


	<span class="infCampo">
	CPF *:<input type="radio" name="cp" id="cpfc" value="1" checked />
	CNPJ *:<input type="radio" name="cp" id="cnpjc" value="2"/>
	</span>

<?php
	$cpf=null;
	$cnpj=null;

	if(strlen($usuario['cpfcnpj']) == 14){
		$cpf=$usuario['cpfcnpj'];

	}else {
		$cnpj=$usuario['cpfcnpj'];
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
	<input  type="text" id="data"  name="txtData" class="formText" value="<?php echo($usuario['data_nascimento']); ?>" placeholder="24/12/1969"   minlength="8" />

	<span class="infCampo">Senha *:</span>
	<span id="senhaerror" class="error"></span>
	<input type="password" name="txtSenha" class="formText" id="senha" value=""  />

	<input type="button" id="salvar" value="salvar" name="btnSalvar"/>
</form>				
		