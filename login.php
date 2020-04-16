<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('sesiones.php');
?>

<!DOCTYPE html>
<html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="css/estilo.css">-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <link rel="stylesheet" href="CSSNubESCOM/css/Nube.css">

    <script language="JavaScript" type="text/javascript" src="js/jsbn.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/random.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/hash.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/rsa.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/aes.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/aesb.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/api.js"></script>
    <script src="js/sjcl.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>Acceso o registro</title>    
    <!--<script src="js/jquery-1.9.1.min.js"></script>-->
   
<head>
</head>

<body>
<div class="w3-row">
    <div class="w3-container w3-half">
       <h1 class="w3-lobster w3-wide">Welcome to</h1>
    </div>
    <div class="w3-container w3-half w3-left">
        <img src = "CSSNubESCOM\img\2.jpg" class=" w3-padding">
    </div>
</div>

<div id="uno" class="w3-row">
<div class=" w3-container w3-half">
    <br>
    <div class="w3-container w3-lime">
      <h2>Log In</h2>
    </div>
    <br>
  <div class="card w3-padding w3-card-4">
    <img class="card-img-top" src="CSSNubESCOM/img/login.png" alt="Card image" style="width:50%">
        <div class="card-body">
        <div class="formulario-acceso">
            <form method="POST" id="acceso" action="" accept-charset="utf-8">
                <table class="w3-table w3-centered">
                    <tr align="center">
                        <td><label class="acceso" style="color:#FFF">ID</label></td>
                        <td> <input type="number" name="boletaAcceso" class="acceso" id="boletaAcceso" placeholder=" ID" autocomplete="off" maxlength="12"> </td>
                    </tr>
                    <tr>
                        <td><label class="acceso" style="color:#FFF">Password</label> </td>
                        <td><input type="password" name="pwAcc" class="acceso" id="pwAcc" placeholder=" Password" autocomplete="off" maxlength="60" s></td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="acceso" class="boton-principal w3-btn w3-black" value="Go">
            </form> 
        </div>
  </div>
</div>
</div>

<div class="w3-half w3-container">
<br>
<div class="w3-container w3-light-green">
<h2>Sign In!</h2>
</div>
<br>
  <div class="card w3-padding w3-card-4">
    <img class="card-img-top" src="CSSNubESCOM\img\sign2.png" alt="Card image" style="width:45%">
    <div class="card-body">
    <div class="formulario-registro">
        <form method="POST" id="registro" action="" accept-charset="utf-8">
            <table class="w3-table w3-centered">
                <tr>
                    <td><label class="registro" style="color:#FFF">ID</label> </td>
                    <td> <input type="number" name="boletaRegistro" class="registro" id="boletaRegistro" placeholder="ID" autocomplete="off" maxlength="12"></td>
                </tr>
                <tr>
                    <td><label class="registro" style="color:#FFF">Name</label> </td>
                    <td> <input type="text" name="nombreRegistro" class="registro" id="nombreRegistro" placeholder="Name" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label class="registro" style="color:#FFF">E-mail</label> </td>
                    <td> <input type="email" name="correoRegistro" class="registro" id="correoRegistro" placeholder="ej@example.com" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label class="registro" style="color:#FFF">Password</label> </td>
                    <td> <input type="password" name="pwReg" class="registro" id="pwReg" placeholder="Password" autocomplete="off"></td>
                </tr>        
            </table>
            <br>
            <input type="submit" name="registro" class="boton-principal w3-btn w3-black" value="Submit">    
        </form>
</div>
</div>
</div>
</div>
</div>
<br>
<div id="mensaje"></div>
<hr>
<script>   

    function hash(pw) {
        const to_hash = pw;
        const myBitArray = sjcl.hash.sha256.hash(to_hash);
        const hashed = sjcl.codec.hex.fromBits(myBitArray);    
        return hashed;
    }
    
   //Guardamos el controlador del div con ID mensaje en una variable
    var mensaje = $("#mensaje");
    //Ocultamos el contenedor
    mensaje.hide();


    //Cuando el formulario con ID ACCESO se envíe...
    $("#acceso").on("submit", function(e){
        //Evitamos que se envíe por defecto
        e.preventDefault();
        
        //Creamos un FormData con los datos del mismo formulario
        var formData = new FormData(document.getElementById("acceso"));
        
        /*Se calcula el HASH de la contraseña*/
        var hashed = hash(document.getElementById("pwAcc").value);
        //console.log(hashed);
        
        /*Se añade el hash a la informacion del formulario*/
        formData.append("pwAcceso", hashed);

        console.log("pw: " + localStorage.getItem("pw"));
        //Llamamos a la función AJAX de jQuery
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "acceder.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "HTML",
            //Definimos la información que vamos a enviar
            data: formData,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false
        }).done(function(echo){
            localStorage.setItem("pw",document.getElementById("pwAcc").value);
            //Una vez que recibimos respuesta
            //comprobamos si la respuesta no es vacía
            if (echo !== "") {
                //Si hay respuesta (error), mostramos el mensaje
                mensaje.html(echo);
                mensaje.slideDown(500);
            } else {
                //Si no hay respuesta, redirecionamos a donde sea necesario
                //Si está vacío, recarga la página
                window.location.replace("");
            }
        });
    });

    //Cuando el formulario con ID REGISTRO se envíe...
    $("#registro").on("submit", function(e){
        //Evitamos que se envíe por defecto
        e.preventDefault();       
        
        var boleta = document.getElementById("boletaRegistro").value;
        var expresionboleta = new RegExp("[0-9]{8}");
        
        var password = document.getElementById("pwReg").value;
        var expresionpassword = new RegExp("^(?=.*\\d)(?=.*[\\u0021-\\u002b\\u003c-\\u0040])(?=.*[A-Z])(?=.*[a-z])\\S{8,16}$");
        
        var tempValidacion = true;
        if(!expresionpassword.test(password)){
            alert("Password required at least 1 Number, 1 Capital letter, 1 Symbol and between 8 and 16 caracteres");
            tempValidacion = false;
        }
        if(tempValidacion == true &&  !expresionboleta.test(boleta)){
            alert("Error on id");
            tempValidacion = false;
        }

        if(tempValidacion ==  true){
            //Creamos un FormData con los datos del mismo formulario
            var formData = new FormData(document.getElementById("registro"));
            
            /*Se calcula el HASH de la contraseña*/
            var hashed = hash(document.getElementById("pwReg").value);
            /*console.log(hashed);*/
            
            /*Se añade el hash a la informacion del formulario*/
            formData.append("pwRegistro", hashed);

            /*Generamos un par de llaves privada y pública para el usuario*/
            var Bits = 512;
            var PassPhrase = document.getElementById("boletaRegistro").value + document.getElementById("pwReg").value;
            var UsrKey = cryptico.generateRSAKey(PassPhrase, Bits);
            var UsrPublicKey = cryptico.publicKeyString(UsrKey);
            console.log("Public Key: " + UsrPublicKey );
            formData.append("pubkey", UsrPublicKey);


            //*Llamamos a la función AJAX de jQuery
            $.ajax({
                //Definimos la URL del archivo al cual vamos a enviar los datos
                url: "registro.php",
                //Definimos el tipo de método de envío
                type: "POST",
                //Definimos el tipo de datos que vamos a enviar y recibir
                dataType: "HTML",
                //Definimos la información que vamos a enviar
                data: formData,
                //Deshabilitamos el caché
                cache: false,
                //No especificamos el contentType
                contentType: false,
                //No permitimos que los datos pasen como un objeto
                processData: false
            }).done(function(echo){
                //Cuando recibamos respuesta, la mostramos
                mensaje.html(echo);
                mensaje.slideDown(500);
            });         
        }

    });
</script>
</body>
</html>  