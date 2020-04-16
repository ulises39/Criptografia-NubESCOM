<?php
include_once ('validar_sesion.php');
require('conexion.php');

$dir = $estado;
$dest = "";
$fkey = "";
$request = $_POST["request"];
if( $request == "share" ){
    $dir = $_POST["dest"];
    $fkey = $_POST["fkey"];
}else if( $request == "update"){
    $dir = $_POST["dest"];
    $dest = $dir;
}


$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$propietario = $_POST["propietario"];
$hash = $_POST["hash"];
$frag = $_POST["frag"];

$fileName = newFileName($fileName, $dir);

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button";
    exit();
}

$shared = "(shared)";

/*MEJOR COLOCARLO DENTRO DEL REGISTRO*/
$carpeta = 'uploads/'.$dir.'/';
if( $request == "share" || $request == "update"){
    $carpeta .= '/shared/';
}

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

if(move_uploaded_file($fileTmpLoc, $carpeta."$fileName")){
    //echo "$fileName upload is complete. <p>Data recieved: <p>Propietario: $propietario</p><p>Hash: $hash</p> <p>Path: $fileName<p>Fragmentos: $frag";
    if( $request == "share" ){
        insert_shared($conexion, $estado, $dir, $shared.$fileName, $hash, $fkey, $frag );
    }
    else if ( $request == "update" ) {
        updateTable($conexion, $dest, $fileName, $hash, "");
    }else{
        insert($conexion, $dir, $fileName, $hash, $frag);
    }

} else {    
    echo "move_uploaded_file function failed";
}

function insert($conexion, $dir, $ruta, $hash, $frag){
    $consulta = "INSERT INTO archivos (propietario, nombre, hash, frag) VALUES ('$dir','$ruta', '$hash', '$frag')";
    if(mysqli_query($conexion, $consulta)) {
        die('File successfully uploaded!<br>');
    } else {
        die(mysqli_error($conexion));
    };    
};

function insert_shared($conexion, $prop, $dest, $nombre, $hash, $fkey, $frag){
    $consulta = "INSERT INTO arch_comp (prop, dest, nombre, hash, fkey, frag) 
                VALUES ('$prop','$dest', '$nombre', '$hash', '$fkey', '$frag')";
    if(mysqli_query($conexion, $consulta)) {
        die('File successfully shared! <br>');
    } else {
        die(mysqli_error($conexion));
    };
};

function updateTable($conexion, $dest, $nombre, $hash, $fkey){
    $consulta = "UPDATE arch_comp SET nombre = '$nombre', fkey = '$fkey' WHERE dest = '$dest' AND hash = '$hash' ";
    if(mysqli_query($conexion, $consulta)) {
        //die ( 'File accepted!');
        die('<script> location.reaload() </script>');
    } else {
        die(mysqli_error($conexion));
    };
};

function newFileName($fileName, $dir){
    $sep = explode(".", $fileName);
    $name = $sep[0]; 
    $ext = $sep[1];
    $aux = $fileName;
    $fileName = str_replace($ext, "", $fileName);
    $i = 0;
    while(file_exists($dir.'/'.$aux)){
        $n = "(".$i.")";

        $fileName = str_replace($n, "", $fileName);
        $fileName = $fileName.$n;
        $aux = $fileName;
        $i++;
    }
    return $fileName.$ext;
};

?>