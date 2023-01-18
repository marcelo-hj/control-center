<?php
 session_start();
 include ("bdconfig.php");

 $nome=$_POST['nome'];
 
 $busca = mysqli_query($con, "SELECT id FROM usuario WHERE email ='".$_SESSION['email']."'");

 $id = mysqli_fetch_array($busca);

 $nome=$_POST['nome'];
 $idUser=$id['id'];



 $sql = "INSERT INTO categorias (nome, idUser) VALUES ('$nome','$idUser')";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: principal.php");
    exit();
 }else{
    header("Location: adicionar.php");
    exit ();
 }
?>