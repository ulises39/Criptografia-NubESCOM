<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	//$salir = '<a href="salir.php" target="_self">Log out</a>';
	require('sesiones.php');
};

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-signal.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <link rel="stylesheet" href="CSSNubESCOM/css/Nube.css">

    <script> var nombre_sesion = "<?php echo $estado ?>";
            localStorage.setItem("ss", nombre_sesion);
    </script>

    <title>Welcome to NubESCOM</title>

<style type="text/css">
    body{
    margin: 3cm 3cm 1cm 11cm;
    }
</style>
</head>

<body>

    <div id="bienvenido" class="w3-myfont w3-lobster w3-padding">   
        <p>Hi, <?php echo $estado; ?></p>
    </div>
 
    <div id="question" class="w3-tag w3-round w3-win8-lime w3-border w3-border-black w3-padding-large">
        <b><p>What do you want to do?</p></b>
    </div>

<br>
<br>
<div class="w3-row">
    <div class="w3-container w3-third w3-padding-large w3-center">
        <div id="close">
            <a href="salir.php" class="w3-btn w3-round-xxlarge w3-xlarge w3-highway-red w3-hover-red" target="_self">Log out</a>
        </div>
    </div>
    <div class=" w3-container w3-third w3-padding-large">
        <a href="subir_archivo.php" class="w3-btn w3-2018-quetzal-green w3-hover-teal w3-round-xxlarge w3-xlarge">Upload file</a>
    </div>
    <div class=" w3-container w3-third w3-padding-large">
        <a href="my_files.php" class="w3-btn w3-2018-quetzal-green w3-hover-teal w3-round-xxlarge w3-xlarge">My files</a>
    </div>
</body>
</html>