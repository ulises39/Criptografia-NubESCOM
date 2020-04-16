<?php
//Conectamos a la base de datos
require('conexion.php');

//Obtenemos los datos del formulario de registro. Boleta, nombre, correo y contraseña(el hash de la misma)
$boleta = $_POST["boletaRegistro"];
$nombre = $_POST["nombreRegistro"];
$correo = $_POST["correoRegistro"];
$pw = $_POST["pwRegistro"];
$pubkey = $_POST["pubkey"];

//Filtro anti-XSS
$boleta = htmlspecialchars(mysqli_real_escape_string($conexion, $boleta));
$nombre = htmlspecialchars(mysqli_real_escape_string($conexion, $nombre));
$correo = htmlspecialchars(mysqli_real_escape_string($conexion, $correo));
$pw = htmlspecialchars(mysqli_real_escape_string($conexion, $pw));
$pubkey = htmlspecialchars(mysqli_real_escape_string($conexion, $pubkey));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

$maxCaracteresBoleta = "12";
$maxCaracteresPassword = "256";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($boleta) > $maxCaracteresBoleta) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresBoleta.' caracteres');
};

if(strlen($pw) > $maxCaracteresPassword) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Escribimos la consulta necesaria
$consultaBoleta = "SELECT boleta FROM datos";

//Obtenemos los resultados
$resultadoConsultaBoleta = mysqli_query($conexion, $consultaBoleta) or die(mysql_error());
$datosConsultaBoleta = mysqli_fetch_array($resultadoConsultaBoleta);
$boletaBD = $datosConsultaBoleta['boleta'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($boleta) || empty($pw)) {
	die('Debes introducir datos válidos');
} else if ($boleta == $boletaBD) {
	die('Ya existe un usuario con la boleta '.$boleta.'');
}
else {

    //Si no hay errores, hacemos la insercion
	//Armamos la consulta para introducir los datos
    $consulta = "INSERT INTO datos (boleta, nombre, correo, pw, pub) VALUES ('$boleta','$nombre', '$correo','$pw', '$pubkey')";
	//Si los datos se introducen correctamente, mostramos los datos
    
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		die('<script>$(".registro").val("");</script>
				Registrado con éxito <br>
			Ya puedes acceder a tu cuenta <br>');
	} else {
		die(mysqli_error($conexion));
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>