<?php
	session_start();
	require_once('../bd/conexao.php');
	Conectar();

	session_destroy();

	header("location: ../index.php");
?>