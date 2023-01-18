<?php
 session_start();
 include ("bdconfig.php");
 
 $busca = mysqli_query($con, "SELECT id FROM usuario WHERE email ='".$_SESSION['email']."'");

 $exibe1 = mysqli_fetch_array($busca);

  $busca2 = mysqli_query($con, "SELECT id FROM turmas WHERE turma ='".$_POST['turma']."'");

  $exibe2 = mysqli_fetch_array($busca2);
  $turma = $_POST['turma'];
  $rm = $_POST['rm'];
  $nome = $_POST['nome'];



 $sql = "INSERT INTO alunos (rm, nome, nome_turma, id_turma) VALUES ('$rm','$nome','$turma','".$exibe2['id']."')";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: principal.php");
    exit();
 }else{
    header("Location: adicionar.php");
    exit ();
 }
?>