<?php
include_once ('validar_sesion.php');
require('conexion.php'); 

$user = $_POST["user"]; 
$pub = "pub";
$consulta = "SELECT pub FROM datos WHERE boleta = '$user'";
$res = "RES";


if(mysqli_query($conexion, $consulta)){
	$qry_result = mysqli_query($conexion, $consulta) or die(mysqli_error());
	$row = mysqli_fetch_array($qry_result);
	$res = $row[$pub];
	echo $res;
}else{
	echo $user;
	die( mysqli_error($conexion) );
};

?>