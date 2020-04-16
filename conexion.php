<?php

$host = "localhost";
$user = "root";
$hostpw = "";
$database = "crypto_prueba";

$conexion = mysqli_connect($host, $user, $hostpw, $database);
if($conexion===false){
    //echo "Conexion fallida";
}else{
    //echo "Conexion exitosa";
}
?>