
<script src="js/jquery3.1.js" type="text/javascript"></script> 
<script src="js/perfilValidacao.js" type="text/javascript"></script>
<script src="js/funcoes.js" type="text/javascript"></script>

<form action="#" method="post" name="formEditarSenha" id="formEditarSenha">

	<span class="infCampo">Sua Senha:</span>
	<span id="senhaerror" class="error"></span>
	<input type="password" name="txtSenha" class="formText" id="senha" value=""  />

	<span class="infCampo">Senha nova:</span>
	<span id="senhaAtualerror" class="error"></span>
	<input type="password" name="txtreSenhaAtual" class="formText" id="senhaAtual" value=""  />

	<span class="infCampo">Repita a senha nova:</span>
	<span id="resenhaAtualerror" class="error"></span>
	<input type="password" name="txtSenhaAtual" class="formText" id="resenhaAtual" value=""  />

	<input type="button" value="Salvar" id="senhaSalvar"/>

</form>