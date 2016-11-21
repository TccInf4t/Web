<?php
	session_start();
	require_once("../bd/conexao.php");
	Conectar();

	$sql="select * from cliente where email='".$_SESSION['usuario']['email']."'";
	$select=mysql_query($sql);

	$usuario = mysql_fetch_array($select);

	$sql="select es.oid_estado,es.nome as estado,ci.nome as cidade,e.* from endereco e inner join cidade ci on(e.oid_cidade = ci.oid_cidade) inner join estado es on(ci.oid_estado = es.oid_estado) where oid_endereco =".$usuario['oid_endereco'];

	$select=mysql_query($sql);

	$endereco = mysql_fetch_array($select);

?>

<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->

<script src="js/perfilValidacao.js" type="text/javascript"></script>
<script src="js/jquery3.1.js" type="text/javascript"></script> 
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="js/mascaras.js" type="text/javascript"></script>
<script src="js/funcoes.js" type="text/javascript"></script>

<form action="#" method="post" id="formeditendereco" name="formEditEndereco">
	<?php
							
		$sql="select * from estado";

		$select=mysql_query($sql);

	?>
					
	<span class="infCampo">Logradouro *:</span>
	<span id="logradouroerror" class="error"></span>
	<input type="text" name="txtLogradouro" id="logradouro" class="formText" value="<?php echo($endereco['logradouro']) ?>" placeholder="Rua Augusta"  />

	<span class="infCampo">Número *:</span>
	<span id="numeroerror" class="error"></span>
	<input type="text" name="txtNumero" id="numero" class="formText" value="<?php echo($endereco['numero']) ?>" placeholder="24" />

	<span class="infCampo">CEP *:</span>
	<span id="ceperror" class="error"></span>
	<input type="text" name="txtCep" class="formText" value="<?php echo($endereco['cep']) ?>" id="cep" placeholder="06657-00" minlength="9" maxlength="9" />

	<span class="infCampo">Bairro *:</span>
	<span id="bairroerror" class="error"></span>
	<input type="text" name="txtBairro" class="formText" id="bairro" value="<?php echo($endereco['bairro']) ?>" placeholder="24"  />

	<span class="infCampo">Estado *:</span>
	<select name="cbEstado" id="cbEstado" class="formText">


		<?php

			while($estado=mysql_fetch_array($select)){

		?>
		<option value="<?php echo($estado['oid_estado']); ?>" <?php if($estado['oid_estado'] == $endereco['oid_estado']){ ?> selected <?php  }  ?>><?php echo($estado['nome']." - ".$estado['uf']); ?></option>
		<?php

			}

		?>

	</select>
	<span class="infCampo">Cidade *:</span>
	<select name="cbCidade" id="cbCidade" required class="formText">
	</select>

	<span class="infCampo">Complemento *:</span>
	<span id="complementoerror" class="error"></span>
	<input type="text" name="txtComplemento" id="complemento" class="formText" value="<?php echo($endereco['complemento']) ?>" placeholder="2A" />

	<span class="infCampo">Sua Senha:</span>
	<span id="senhaerror" class="error"></span>
	<input type="password" name="txtSenha" class="formText" id="senha" value=""  />

	<input type="button" id="salvarEnd" value="salvar" name="btnSalvarEnd"/>
					
					
</form>				
		