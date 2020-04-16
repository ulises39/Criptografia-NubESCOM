<?php

$boleta = $_POST['boleta'];
$pw = $_POST['pw'];

$host = "localhost";
$user = "root";
$hostpw = "";
$database = "crypto_prueba";

$conexion = mysqli_connect($host, $user, $hostpw, $database);

$hashed = $hashed = hash('sha256',$pw); 

/*Seleccionar por boleta y hash de la contraseña*/
$selec_boleta = "SELECT * FROM datos WHERE boleta = '$boleta' AND pw = '$hashed' ";

$resultado = mysqli_query($conexion, $selec_boleta);

if(!$resultado){
    echo mysqli_error($conexion);
}

$filas = mysqli_num_rows($resultado);

if( $filas > 0 ){
    header("location:inicio.html");
}else{
    echo "Error en la autentificación";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>