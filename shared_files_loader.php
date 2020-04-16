<?php

include_once ('validar_sesion.php');
require('conexion.php'); 

$shared = "(shared)";
$dir = '/'.$estado.'/';
$nombre = "nombre";
$consulta = "SELECT * FROM arch_comp WHERE dest = '$estado'";

$thelist = "<table id='table'><tr>"; 
	$thelist.="<th>File</th>";
  $thelist.="<th>Owner</th>";
	$thelist.="<th>Date</th>";
  $thelist.= "<th>Options</th>";
$thelist.="</tr>";

if(mysqli_query($conexion, $consulta)){
	$qry_result = mysqli_query($conexion, $consulta) or die(mysqli_error());
	while( $row = mysqli_fetch_array($qry_result) ){
		
		$dir = "uploads/".$estado."/shared";

		// Open a directory, and read its contents
		if (is_dir($dir)){
  			if ($dh = opendir($dir)){
    			while (($file = readdir($dh)) !== false ){
            $button="";
            if(contains($row[$nombre], $shared)){
              //$file = str_replace($shared, "", $file);
              $button = '<td> <button id = "acc-button">Accept File</button></td> ';
            }else{
              $button = '<td> <button id="download-button">Download</button> </td>';
            }

    				if( $file != "." && $file != ".."  /*&& $file == $row[$nombre] */){
    					if( !contains($thelist, $file)){
      					$thelist .= 
      				  	'<tr id="box"> 
      							<td id="'.$file.'">'.$file.'</td>
                    <td> '.$row['prop'].' </td>
      						 	<td> "'.date ("F d Y H:i:s.", filemtime($dir.'/'.$file)).'" </td>
                    '.$button.'
      						 </tr>';
    					}
    				}
    			}
    			closedir($dh);
  			}
		}	
	}
  //echo "Result: ". $thelist;
}
else{
	die( mysqli_error($conexion) );
};

function contains($cadena, $subcadena){   
    return strpos($cadena, $subcadena) !== false;
}

?>