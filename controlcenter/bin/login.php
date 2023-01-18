<?php
session_start();

include("bdconfig.php");

//não deixa ir para página home sem logar
if(empty($_POST['email']) || empty($_POST['senha'])){
    header ("Location: ..\index.php");
    exit ();
}

$email = mysqli_real_escape_string($con,$_POST['email']);
$senha = mysqli_real_escape_string($con,$_POST['senha']);

$query = "SELECT email, senha from usuario where email = '{$email}' and senha = '{$senha}'";

$resultado = mysqli_query($con,$query);

$row = mysqli_num_rows($resultado);

if($row == 1){
    $_SESSION['email'] = $email;
    header("Location: principal.php");
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header("Location: ..\index.php");
    exit ();
}
?>