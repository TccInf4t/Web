<?php 
	session_start();
	require_once("../bd/conexao.php");
	Conectar();

 ?>

<span class="infPerfil">Nome:<?php echo($_SESSION['usuario']['nome']); ?></span>
<span class="infPerfil">Email:<?php echo($_SESSION['usuario']['email']); ?></span>
<span class="infPerfil">CPF/CNPJ:<?php echo($_SESSION['usuario']['cpfcnpj']); ?></span>
<span class="infPerfil">Data de Nascimento:<?php echo(implode("/",array_reverse(explode("-",$_SESSION['usuario']['data_nascimento'])))); ?></span>