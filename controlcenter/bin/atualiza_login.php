<?php

session_start();
include("bdconfig.php");

$busca = mysqli_query($con, "SELECT * FROM usuario WHERE email ='".$_SESSION['email']."'");
while($exibe = mysqli_fetch_array($busca)){

	$emailup = filter_input(INPUT_GET,"emailup");
	$senhaup = filter_input(INPUT_GET,"senhaup");
	$senhaatual = filter_input(INPUT_GET,"senhaatual");


	if($senhaatual == $exibe['senha']){
		$query = mysqli_query($con,"UPDATE usuario SET email ='".$_POST['emailup']."',senha ='".$_POST['senhaup']."' WHERE email = '".$_SESSION['email']."'");
		if($query){
			header("Location: principal.php");
			session_destroy();
		}
	}else{
		$_SESSION['senha_atual'] = true;
		header("Location: perfil.php");
		exit();
	}
}

?>