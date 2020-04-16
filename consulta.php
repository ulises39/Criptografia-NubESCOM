<!-- Consulta de una base de datos y muestra de los resultados. -->
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>Resultados de la b&uacute;squeda</title>
    <style type = "text/css">
        body { font-family: sans-serif;
        background-color: lightyellow; }
        table { background-color: lightblue;
        border-collapse: collapse;
        border: 1px solid gray; }
        td { padding: 5px; }
        tr:nth-child(odd) {
        background-color: white; }
    </style>
</head>
<body>
    <?php
        $database = "crypto_prueba";
        $tabla = "datos";

        $select = $_POST["select"]; // crea la variable $select
        echo "Seleccion: ".$select;
        // construy la consulta SELECT
        $query = "SELECT " . $select . " FROM ". $tabla;
        // Connect to MySQL
        if ( !( $database = new mysqli("localhost", "root", "", $database) ) ) 
            die( "No se pudo conectar a la base de datos </body></html>" );

        // abre la base de datos datos
        if(!$database->select_db( "crypto_prueba" ) )
            die( "No se encontro la base de datos </body></html>" );

        // consulta a la base de datos datos

        if (!( $result = mysqli_query($database, $query) ) ) {
            print( "<p>No se pude ejecutar la consulta!</p>" );
            echo "Consulta: ".$query;
            die( $database->error. "</body></html>" );
        } // end if
        mysqli_close( $database );
    ?><!-- end PHP script -->
    <table>
    <caption>Resultdos de "SELECT <?php print( "$select" ) ?>
        FROM "</caption>
    <?php
        // busca cada registro en conjunto de results
        while( $row = mysqli_fetch_row( $result ) ){
        // construye la tabla para mostrar los resultados
            print( "<tr>" );
            foreach ( $row as $key => $value )
            print( "<td>$value</td>" );
            print( "</tr>" );
        } // end while
    ?><!-- end PHP script -->
        </table>
</body>
</html>