<?php

	require_once('bd/conexao.php');
	Conectar();

?>

<ul id="listaMenu">
	<li class="pag_atuals">
		<a href="index.php">home</a>
	</li>
	<li>
		<a href="dicas.php">dicas</a>
	</li>
	<li>
		<a href="#">institucional</a>
		<ul class="subMenu">
			<li><a href="parceiro.php">parceiros</a></li>
			<li><a href="eventos.php">eventos</a></li>
			<li><a href="sobre.php">sobre</a></li>
		</ul>
	</li>
	<li>
		<a href="lojas.php">lojas</a>
	</li>
	<li>
		<a href="promocoes.php">promoções</a>
	</li>
	<li>
		<a href="contato.php">contato</a>
	</li>
</ul>