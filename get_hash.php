<?php
include_once ('validar_sesion.php');
require('conexion.php'); 

$file = $_POST["file"];
$dir = 'uploads/'.$estado.'/';
$path = $dir.$file;
$hash = "hash";
$shared = "(shared)";
$consulta = "";
$request = $_POST["request"];
if ( $request == "m" ){
	$consulta = "SELECT * FROM archivos WHERE nombre = '$file' AND propietario = '$estado'";
}else if( $request == "s" ){
	$search = $shared.$file;
	$consulta = "SELECT hash FROM arch_comp WHERE nombre = '$search' AND dest = '$estado'";
	$path = $dir.'/shared/'.$file;
}

if(mysqli_query($conexion, $consulta)){
	$qry_result = mysqli_query($conexion, $consulta) or die(mysqli_error());
	$row = mysqli_fetch_array($qry_result);
	$hash_get = $row[$hash];
	$url = $file;
	$typ = "";

	if(file_exists($path)){
		$typ = mime_content_type($path);
	}

	$jsondata = array(
		'hash' => $hash_get,
		'url' =>  $url,
		'typ' => $typ
	);
	header('Content-Type: application/json');
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

?>