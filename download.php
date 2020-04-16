<?php
include_once ('validar_sesion.php');
require('conexion.php'); 
$dir = 'uploads/'.$estado.'/';

if(!empty($_GET['file'])) {
    $filename = basename($_GET['file']);
    $filepath = $dir.$filename;
    if(!empty($filename) && file_exists($filepath)){
 
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Transfer-Emcoding: binary");
 
        readfile($filepath);
        exit;
 
    }
    else{
        echo "This File Does not exist.";
    }
}
?>