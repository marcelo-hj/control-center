<?php
 include ("bdconfig.php");

 $email=$_POST['email'];
 $senha=$_POST['senha'];
 $nomEmp=$_POST['nomEmp'];
 $descEmp=$_POST['desc'];
 $nome=$_POST['nome'];


 $sql = "INSERT INTO usuario (email,senha,nomEmp,descEmp,Nome) VALUES ('$email','$senha','$nomEmp','$descEmp','$nome')";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
 	$_SESSION['usuario_sucesso'] = true;
    header("Location:..\index.php");
    exit();
 }else{
 	$_SESSION['erro_registro'] = true;
    header("Location: registrar.php");
    exit ();
 }
?>