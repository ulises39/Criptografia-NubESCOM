<?php
include_once ('validar_sesion.php');
require('conexion.php'); 
?>

<!DOCTYPE html>
<html>
<head>
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

    <script> var nombre_sesion = "<?php echo $estado ?>";</script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jsbn.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/random.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/hash.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/rsa.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/aes.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/aesb.js"></script>

    <script language="JavaScript" type="text/javascript" src="js/api.js"></script>
    <script src="js/sjcl.js"></script>
    <script src="js/base64ArrayBuffer.js"></script>
    <script src="js/hash_functions.js"></script>
    <script src="js/bytes_functions.js"></script>
    <script src="js/subir_archivo.js"></script>

<style type="text/css">
    body{
      margin: 3cm 3cm 1cm 3cm;
    }
    h2{
      text-align: center;
    }
</style>

</head>
<body onload="hide()" >
<a href="pagina.php" class="w3-btn w3-round-xxlarge w3-xlarge w3-highway-green w3-hover-deep-purple fas fa-angle-left" target="_self"> Back</a>
<div id="up">
    <p>Upload File</p>
</div>
<br>
<div id="formcont" class="w3-container w3-center">
    <form id="upload_form" enctype="multipart/form-data" method="post">      
      <input type="file" name="file1" id="file1" class="w3-button w3-khaki w3-round"><br>
      <br>
      <input type="button" id="sel_file" class="w3-button w3-win8-magenta w3-hover-pink w3-large w3-round-large" name="sel_file" value="Upload" onclick="upload()">
      <progress id="progressBar" name="progressBar" value="0" max="100" style="width:300px;"></progress>
      <h3 id="status"></h3>
      <button class="cancel w3-button w3-xxxlarge w3-round-xxlarge w3-win8-olive" id="cancel_button">Cancel</button> 
      <p id="loaded_n_total"></p>
    </form>
</div>
</body>
</html>