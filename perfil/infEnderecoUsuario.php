<?php 

	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	$sql="select * from cliente where email='".$_SESSION['usuario']."'";
	$select=mysql_query($sql);

	$usuario = mysql_fetch_array($select);

	$sql="select es.oid_estado,es.nome as estado,ci.nome as cidade,e.* from endereco e inner join cidade ci on(e.oid_cidade = ci.oid_cidade) inner join estado es on(ci.oid_estado = es.oid_estado) where oid_endereco =".$usuario['oid_endereco'];

	$select=mysql_query($sql);

	$endereco = mysql_fetch_array($select);

 ?>

<span class="infPerfil">Logradouro:<?php echo($endereco['logradouro']); ?></span>
<span class="infPerfil">Bairro:<?php echo($endereco['bairro']); ?></span>
<span class="infPerfil">CEP:<?php echo($endereco['cep']); ?></span>
<span class="infPerfil">Número:<?php echo($endereco['numero']); ?></span>
<span class="infPerfil">Complemento:<?php echo($endereco['complemento']); ?></span>
<span class="infPerfil">Cidade:<?php echo($endereco['cidade']); ?></span>
<span class="infPerfil">Estado:<?php echo($endereco['estado']); ?></span>