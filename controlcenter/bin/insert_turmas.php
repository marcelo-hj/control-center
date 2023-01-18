<?php
 session_start();
 include ("bdconfig.php");
 
 $busca = mysqli_query($con, "SELECT id FROM usuario WHERE email ='".$_SESSION['email']."'");

 $id = mysqli_fetch_array($busca);

  $nome_turma=$_POST['nome_turma'];
 $idUser=$id['id'];



 $sql = "INSERT INTO turmas (turma, idUser) VALUES ('$nome_turma','$idUser')";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: principal.php");
    exit();
 }else{
    header("Location: adicionar.php");
    exit ();
 }
?>