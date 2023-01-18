<?php
 session_start();
 include ("bdconfig.php");

 $nome=$_POST['nome'];
 $descProd=$_POST['descProd'];
 $estoqueMin=$_POST['estoqueMin'];
 $estoque=$_POST['estoque'];
 $locprod=$_POST['locprod'];
 $estoqueSeg=$_POST['estoqueSeg'];

 
$busca_categoria=mysqli_query($con, "SELECT id FROM categorias WHERE nome ='".$_POST['categoria']."'");
$id_categoria = mysqli_fetch_array($busca_categoria);
$categoria=$id_categoria['id'];


date_default_timezone_set('America/Sao_Paulo');//fuso horario de sp
$hora = date('H:i:s');//pega a hora do sistema
$dia = date('d/m/Y');//pega a data do sistema

//trigger
$sql_trigger = "INSERT INTO historico(nome_prod,dia,hora,qtd)VALUES('$nome','$dia','$hora','$estoque')";
$sql_trigger_execute = mysqli_query($con,$sql_trigger);

 $sql = "INSERT INTO produtos (nome, estoqueMin, estoqueSeg, estoque, descProd, categoria, locprod) VALUES ('$nome','$estoqueMin','$estoqueSeg','$estoque','$descProd','$categoria','$locprod')";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: estoque.php");
    exit();
 }else{
    header("Location: adicionar.php");
    exit ();
 }
?>