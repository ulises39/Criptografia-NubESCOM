<?php
include_once ('validar_sesion.php');
require('conexion.php'); 

$file = $_POST["file"];
$dir = 'uploads/'.$estado.'/';
$consulta = "DELETE FROM archivos WHERE nombre = '$file' AND propietario = '$estado'";
$path = $dir.$file;

//echo '<p><a href="download.php?file=' . urlencode($image) . '">Download</a></p>';

if(mysqli_query($conexion, $consulta)){
	echo "El archivo se borro con exito";
}

?>