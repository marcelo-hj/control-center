<?php
 session_start();
 include ("bdconfig.php");

 $id = $_POST['id'];

 $sql = "DELETE FROM produtos WHERE id = '$id'";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: inventario.php");
    exit();
 }else{
    header("Location: inventario.php");
    exit ();
 }
?>