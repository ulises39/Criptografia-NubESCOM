<?php
include_once ('validar_sesion.php');
require('conexion.php'); 

$file = $_POST["file"];
$dir = 'uploads/'.$estado.'/';
$consulta = "";
$request = $_POST["request"];

if ( $request == "m" ){
	$consulta = "SELECT * FROM archivos WHERE nombre = '$file' AND propietario = '$estado'";
}else if( $request == "s" ){
	$shared = "(shared)".$file;
	$consulta = "SELECT * FROM arch_comp WHERE nombre = '$shared' AND dest = '$estado'";
}

$filename = $dir.$file;
if( $request == "s" ){
	$filename = 'uploads/'.$estado.'/shared/'.$file;
}

if(mysqli_query($conexion, $consulta)){

	if(file_exists($filename)){
	    //Get file type and set it as Content Type
	    $finfo = finfo_open(FILEINFO_MIME_TYPE);
	    header('Content-Type: ' . finfo_file($finfo, $filename));
	    finfo_close($finfo);

	    //Use Content-Disposition: attachment to specify the filename
	    header('Content-Disposition: attachment; filename='.basename($filename));

	    //No cache
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');

	    //Define file size
	    header('Content-Length: ' . filesize($filename));

	    ob_clean();
	    flush();
	    readfile($filename);
	    
	    exit;
	}else{
		die("Error with ".$filename);
	}
	
}

?>