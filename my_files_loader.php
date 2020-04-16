<?php

include_once ('validar_sesion.php');
require('conexion.php'); 

$dir = '/'.$estado.'/';
$nombre = "nombre";
$consulta = "SELECT nombre FROM archivos WHERE propietario = '$estado'";

$thelist = "<table id='table'><tr>"; 
	$thelist.="<th>File</th>";
	$thelist.="<th>Date</th>";
$thelist.="</tr>";

if(mysqli_query($conexion, $consulta)){
	$qry_result = mysqli_query($conexion, $consulta) or die(mysqli_error());
	while( $row = mysqli_fetch_array($qry_result) ){
		
		$dir = "uploads/".$estado;

		// Open a directory, and read its contents
		if (is_dir($dir)){
  			if ($dh = opendir($dir)){
    			while (($file = readdir($dh)) !== false ){
    				if( $file != "." && $file != ".."  && $file == $row[$nombre]){
    					if( !contains($thelist, $file )){
      						$thelist .= 
      						'<tr id="box"> 
      							<td id="'.$file.'">'.$file.'</td>
      						 	<td> "'.date ("F d Y H:i:s.", filemtime($dir.'/'.$file)).'" </td>
      						 	<td> <button id="download-button">Download</button> </td>
      						 </tr>';
    					}
    				}
    			}
    			closedir($dh);
  			}
		}	
	}
}
else{
	die( mysqli_error($conexion) );
};

function contains($cadena, $subcadena){   
    return strpos($cadena, $subcadena) !== false;
}

?>