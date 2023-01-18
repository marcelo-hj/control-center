<?php
session_start();
include ("bdconfig.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$estoque = $_POST['estatual'];
$estoqueMin = $_POST['estmin'];
$estoqueSeg = $_POST['estseg'];
$descProd = $_POST['desc'];
$locprod = $_POST['loc'];

$categoria = $_POST['categoria'];

//buscando o nome do produto
$sql_produto = "SELECT estoque FROM produtos WHERE id = $id";
$sql_produto_query = mysqli_query($con,$sql_produto); //executa a query
$produto_resultado = mysqli_fetch_assoc($sql_produto_query);//agrupa os resultados
if($estoque != $produto_resultado['estoque'] ){
$qtd = $estoque - $produto_resultado['estoque']; //define a quantidade que foi retirada ou colocada (estoque anterior - estoque atual)
date_default_timezone_set('America/Sao_Paulo');//fuso horario de sp
$hora = date('H:i:s');//pega a hora do sistema
$dia = date('d/m/Y');//pega a data do sistema

//trigger
$sql_trigger = "INSERT INTO historico(nome_prod,dia,hora,qtd)VALUES('$nome','$dia','$hora','$qtd')";
$sql_trigger_execute = mysqli_query($con,$sql_trigger);



$sql = " UPDATE produtos SET nome = '$nome', estoque = '$estoque', estoqueMin = '$estoqueMin', estoqueSeg = '$estoqueSeg', descProd = '$descProd', locprod = '$locprod' WHERE id = '$id' ";
$salvar = mysqli_query($con,$sql);

if($salvar){
	header("Location: estoque.php");
	exit();
}else{
	header("Location: perfil.php");
	exit ();
}
}else{
	$sql = " UPDATE produtos SET nome = '$nome', estoque = '$estoque', estoqueMin = '$estoqueMin', estoqueSeg = '$estoqueSeg', descProd = '$descProd', locprod = '$locprod' WHERE id = '$id' ";
	$salvar = mysqli_query($con,$sql);

	if($salvar){
		header("Location: estoque.php");
		exit();
	}else{
		header("Location: perfil.php");
		exit ();
	}
}
?>