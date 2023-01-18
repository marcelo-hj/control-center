<?php
 session_start();
 include ("bdconfig.php");

 $id = $_POST['id'];

 $sql = "DELETE FROM categorias WHERE id = '$id'";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: estoque.php");
    exit();
 }else{
    header("Location: estoque.php");
    exit ();
 }
?>