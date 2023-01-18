<?php
 $hostname = "localhost";
 $user = "root";
 $password = "";
 $database = "controlcenter";

 $con = mysqli_connect($hostname,$user,$password,$database);

 if(!$con){
    echo "Não foi possível conectar ao banco de dados";
 }

?>