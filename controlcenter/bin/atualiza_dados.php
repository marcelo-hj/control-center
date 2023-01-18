<?php

session_start();
include("bdconfig.php");

$nomeup = filter_input(INPUT_GET,"Pnomeup");
$nomeEmpup = filter_input(INPUT_GET."nomeEmpup");
$descEmpup = filter_input(INPUT_GET."descEmpup");


$query = mysqli_query($con,"UPDATE usuario SET Nome ='".$_POST['Nomeup']."',nomEmp ='".$_POST['nomEmpup']."',descEmp ='".$_POST['descEmpup']."' WHERE email = '".$_SESSION['email']."'");
if($query){
    header("Location: principal.php");
}else{
    echo "Impossível atualizar os campos!";
}

?>