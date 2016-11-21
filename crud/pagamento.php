<?php
	require_once("bd/conexao.php");
	Conectar();

	function selecionarEstado($oid){

		$sql="select * from estado where oid_estado=".$oid;
		$select=mysql_query($sql);

		return mysql_fetch_array($select);

	}

	function selecionarCidade($oid){

		$sql="select * from cidade where oid_cidade=".$oid;
		$select=mysql_query($sql);

		return mysql_fetch_array($select);

	}

	if(isset($_POST['btnSalvar'])){

		if($_POST['end'] == 2){

			$cidade=selecionarCidade($_POST['cbCidade']);
			$estado=selecionarEstado($cidade['oid_estado']);

			$enderecoCompleto=$_POST['txtLogradouro'].",".$_POST['txtNumero'].",".$_POST['txtComplemento'].",".$_POST['txtBairro']."-".$_POST['txtCep']."-".$cidade['nome']."-".$estado['nome'];

			$sql="insert into endereco (oid_cidade,logradouro,complemento,numero,cep,bairro,classname,enderecocompleto) values(".$_POST['cbCidade'].",'".$_POST['txtLogradouro']."','".$_POST['txtComplemento']."',".$_POST['txtNumero'].",'".$_POST['txtCep']."','".$_POST['txtBairro']."','TCliente','".$enderecoCompleto."')";

			mysql_query($sql);

			$sql="select * from endereco order by oid_endereco desc limit 1";
			$select=mysql_query($sql);
			$e=mysql_fetch_array($select);

			$endereco=$e['oid_endereco'];

		}else{

			$endereco=$_SESSION['usuario']['oid_endereco'];

		}

		if($_POST['cp'] == 1){

			$tipopagamento="Boleto";
			$tipocartao=null;
			$numcartao=0;

		}else{

			$tipopagamento="Cartão";
			$tipocartao=$_POST['cartao'];
			$numcartao=$_POST['txtCartao'];

		}

		$sql="insert into pedido(oid_cliente,oid_endereco,tipocartao,numcartao,dtrealizado,formapagamento,oid_status) values(".$_SESSION['usuario']['oid_cliente'].",".$endereco.",'".$tipocartao."',".$numcartao.",NOW(),'".$tipopagamento."',1)";

		mysql_query($sql);

		header("location:compraFinalizada.php");

	}

?>