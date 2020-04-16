<?php
include_once ('validar_sesion.php');
require('conexion.php'); 

$file = $_POST["file"];
$hash = "hash";
$file = "(shared)".$file;
$consulta = "SELECT fkey FROM arch_comp WHERE nombre = '$file' AND dest = '$estado'";

if(mysqli_query($conexion, $consulta)){
	$qry_result = mysqli_query($conexion, $consulta) or die(mysqli_error());
	$row = mysqli_fetch_array($qry_result);
	$fkey = $row["fkey"];

	$jsondata = array(
		'fkey' => $fkey
	);
	header('Content-Type: application/json');
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

?>