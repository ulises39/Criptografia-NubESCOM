<?php
	
//Conectamos a la base de datos
require('conexion.php');

//Obtenemos los datos del formulario de acceso. Boleta, nombre, correo y contraseña(el hash de la misma)
$boleta = $_POST["boletaAcceso"];
$pw = $_POST["pwAcceso"];

//Filtro anti-XSS
$boleta = htmlspecialchars(mysqli_real_escape_string($conexion, $boleta));
$pw = htmlspecialchars(mysqli_real_escape_string($conexion, $pw));


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
$consulta = "SELECT * FROM datos WHERE boleta = '$boleta' AND pw = '$pw' ";

//Obtenemos los resultados
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$userBD = $datos['boleta'];
$passwordBD = $datos['pw'];

//echo "UserBD: ".$userBD." Boleta: ".$boleta." pwBD: ".$passwordBD." pw: ".$pw;

//Comprobamos si los datos son correctos
if($userBD == $boleta and $pw==$passwordBD){

	session_start();
	$_SESSION['usuario'] = $datos['boleta'];
	$_SESSION['estado'] = 'Autenticado';

	/* Sesión iniciada, se redirecciona desde el servidor  */
    //header("location:pagina.php"); <---- Ese metodo debería redireccionar, pero no lo hace :( 
    echo "<script>window.location.assign('pagina.php')</script>"; // <--- Por eso ocupamos ese 

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else if ( $userBD != $boleta || $boleta == "" || $pw == "" || !password_verify($pw, $passwordBD) ) {
	die ('<script>$(".acceso").val("");</script>
Los datos de acceso son incorrectos');
} else {
	die('Error');
};
?>